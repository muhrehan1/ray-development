<?php


defined('BASEPATH') OR exit('No direct script access allowed');

use FedEx\ShipService;
use FedEx\ShipService\Request;
use FedEx\ShipService\ComplexType;
use FedEx\ShipService\SimpleType;


class Shipping_label
{
	protected $ci;
	protected $config;

	public function __construct() {
		$this->CI = &get_instance();
	
		$this->CI->load->config('fedex');
		$this->CI->load->library('session');
	
	}
	public function generateShippingLabel($recipient)
	{
	    
	      
	      function selectServiceType($rateType) {
        switch ($rateType) {
            case 'FIRST_OVERNIGHT':
                return SimpleType\ServiceType::_FIRST_OVERNIGHT;
            case 'PRIORITY_OVERNIGHT':
                return SimpleType\ServiceType::_PRIORITY_OVERNIGHT;
            case 'STANDARD_OVERNIGHT':
                return SimpleType\ServiceType::_STANDARD_OVERNIGHT;
            case 'FEDEX_GROUND':
                return SimpleType\ServiceType::_FEDEX_GROUND;
            case 'FEDEX_2_DAY_AM':
                return SimpleType\ServiceType::_FEDEX_2_DAY_AM;
            case 'FEDEX_2_DAY':
                return SimpleType\ServiceType::_FEDEX_2_DAY;
            case 'FEDEX_EXPRESS_SAVER':
                return SimpleType\ServiceType::_FEDEX_EXPRESS_SAVER;
            // Add more cases as needed
            default:
                return SimpleType\ServiceType::_FEDEX_GROUND; // Default to FedEx Ground if rate type is not recognized
        }
    }
    $selectedServiceType = selectServiceType($recipient['rate_type']);
    
   
		$config = $this->CI->config->item('sender_Address');
		$userCredential = new ComplexType\WebAuthenticationCredential();

		$userCredential
			->setKey('fdb8xgLWPCo6zPWO')
			->setPassword('REgmsp6Tfpc8MF1TpvcZaYtJw');



		$webAuthenticationDetail = new \FedEx\ShipService\ComplexType\WebAuthenticationDetail();
		$webAuthenticationDetail->setUserCredential($userCredential);

		$clientDetail = new ComplexType\ClientDetail();
		$clientDetail
			->setAccountNumber('179030616')
			->setMeterNumber('108956126');

		$version = new ComplexType\VersionId();
		$version
			->setMajor(23)
			->setIntermediate(0)
			->setMinor(0)
			->setServiceId('ship');

		$shipperAddress = new ComplexType\Address();
		$shipperAddress
			->setStreetLines($config['address'])
			->setCity($config['city'])
			->setStateOrProvinceCode($config['state'])
			->setPostalCode($config['postalCode'])
			->setCountryCode($config['countryCode']);

		$shipperContact = new ComplexType\Contact();
		$shipperContact
			->setCompanyName($config['company'])
			->setEMailAddress($config['email_address'])
			->setPersonName($config['name'])
			->setPhoneNumber(($config['phone']));

		$shipper = new ComplexType\Party();
		$shipper
			->setAccountNumber('179030616')
			->setAddress($shipperAddress)
			->setContact($shipperContact);

		$recipientAddress = new ComplexType\Address();
		$recipientAddress
			->setStreetLines($recipient['address'])
			->setCity($recipient['city'])
			->setStateOrProvinceCode($recipient['state'])
			->setPostalCode($recipient['zipcode'])
			->setCountryCode('US');

		$recipientContact = new ComplexType\Contact();
		$recipientContact
			->setPersonName('Lucas')
			->setPhoneNumber($recipient['contact_number']);

		$recipient = new ComplexType\Party();
		$recipient
			->setAddress($recipientAddress)
			->setContact($recipientContact);

		$labelSpecification = new ComplexType\LabelSpecification();
		$labelSpecification
			->setLabelStockType(new SimpleType\LabelStockType(SimpleType\LabelStockType::_PAPER_7X4POINT75))
			->setImageType(new SimpleType\ShippingDocumentImageType(SimpleType\ShippingDocumentImageType::_PDF))
			->setLabelFormatType(new SimpleType\LabelFormatType(SimpleType\LabelFormatType::_COMMON2D));

		$packageLineItem1 = new ComplexType\RequestedPackageLineItem();
		$packageLineItem1
			->setSequenceNumber(1)
			->setItemDescription('Product description')
			->setDimensions(new ComplexType\Dimensions(array(
				'Width' => 10,
				'Height' => 10,
				'Length' => 25,
				'Units' => SimpleType\LinearUnits::_IN
			)))
			->setWeight(new ComplexType\Weight(array(
				'Value' => 2,
				'Units' => SimpleType\WeightUnits::_LB
			)));

		$shippingChargesPayor = new ComplexType\Payor();
		$shippingChargesPayor->setResponsibleParty($shipper);

		$shippingChargesPayment = new ComplexType\Payment();
		$shippingChargesPayment
			->setPaymentType(SimpleType\PaymentType::_SENDER)
			->setPayor($shippingChargesPayor);

		$requestedShipment = new ComplexType\RequestedShipment();
		$requestedShipment->setShipTimestamp(date('c'));
		$requestedShipment->setDropoffType(new SimpleType\DropoffType(SimpleType\DropoffType::_REGULAR_PICKUP));
		$requestedShipment->setServiceType(new SimpleType\ServiceType($selectedServiceType));
		$requestedShipment->setPackagingType(new SimpleType\PackagingType(SimpleType\PackagingType::_YOUR_PACKAGING));
		$requestedShipment->setShipper($shipper);
		$requestedShipment->setRecipient($recipient);
		$requestedShipment->setLabelSpecification($labelSpecification);
		$requestedShipment->setRateRequestTypes(array(new SimpleType\RateRequestType(SimpleType\RateRequestType::_PREFERRED)));
		$requestedShipment->setPackageCount(1);
		$requestedShipment->setRequestedPackageLineItems([$packageLineItem1]);
		$requestedShipment->setShippingChargesPayment($shippingChargesPayment);

		$processShipmentRequest = new \FedEx\ShipService\ComplexType\ProcessShipmentRequest();
		$processShipmentRequest->setWebAuthenticationDetail($webAuthenticationDetail);
		$processShipmentRequest->setClientDetail($clientDetail);
		$processShipmentRequest->setVersion($version);
		$processShipmentRequest->setRequestedShipment($requestedShipment);

		$shipService = new \FedEx\ShipService\Request();
		$shipService->getSoapClient()->__setLocation(Request::PRODUCTION_URL);
	 $trackingNumber = null;
    $pdfFilePath = null;

    // Your existing code for setting up FedEx API request...

    // Send the request to FedEx API and receive the response
    $result = $shipService->getProcessShipmentReply($processShipmentRequest);
    
  

    // Check if the response is valid and contains completed shipment details
    if ($result && isset($result->CompletedShipmentDetail)) {
        $completedShipmentDetail = $result->CompletedShipmentDetail;

        // Check if the completed shipment details contain package and label information
        if (isset($completedShipmentDetail->CompletedPackageDetails[0]) &&
            isset($completedShipmentDetail->CompletedPackageDetails[0]->Label) &&
            isset($completedShipmentDetail->CompletedPackageDetails[0]->Label->Parts[0]) &&
            isset($completedShipmentDetail->CompletedPackageDetails[0]->Label->Parts[0]->Image)) {

            $trackingNumber = $completedShipmentDetail->CompletedPackageDetails[0]->TrackingIds[0]->TrackingNumber;
            $imageData = $completedShipmentDetail->CompletedPackageDetails[0]->Label->Parts[0]->Image;

            // Generate a unique filename for the PDF
            $random_number = rand(100000, 999999);
            $timestamp = round(microtime(true) * 1000);
            $hash = md5($random_number . $timestamp);
            $unique_url = $hash;
            $filename = $unique_url;
            $pdfFolder = FCPATH . '/pdf/';
            $pdfFilePath = $pdfFolder . $filename . '_shipping_label.pdf';

            // Ensure the PDF folder exists, if not, create it
            if (!is_dir($pdfFolder)) {
                mkdir($pdfFolder, 0777, true);
            }

            // Attempt to save the label image data into a PDF file
            $pdfFile = fopen($pdfFilePath, 'wb');
            fwrite($pdfFile, $imageData);
            fclose($pdfFile);

            // Check if the PDF file was successfully created
            if (file_exists($pdfFilePath)) {
                // Return tracking number and PDF file path on successful generation
                return array('trackingNumber' => $trackingNumber, 'pdfFilePath' => $pdfFilePath);
            } else {
                // Return false if PDF file creation fails
                return false;
            }
        } else {
            // Return false if response is missing required label information
            return false;
        }
    } else {
        // Return false if response is invalid or missing completed shipment details
        return false;
    }
    
	}

}

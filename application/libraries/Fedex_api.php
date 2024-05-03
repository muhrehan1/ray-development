<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once APPPATH.'../vendor/autoload.php';

	use FedEx\RateService\Request;
	use FedEx\RateService\ComplexType;
	use FedEx\RateService\SimpleType;
	use FedEx\ShipService\Request as ShipServiceRequest;

	class Fedex_api {

		protected $ci;
		protected $config;

		public function __construct() {
			$this->CI = &get_instance();
			// Load the necessary libraries, helpers, or models if needed
			$this->CI->load->config('fedex');
		}

		public function get_shipping_rates($recipient)
		{
		  
			$rateRequest = new ComplexType\RateRequest();

			// Set up the RateRequest object
			$rateRequest->WebAuthenticationDetail->UserCredential->Key = 'fdb8xgLWPCo6zPWO';
			$rateRequest->WebAuthenticationDetail->UserCredential->Password = 'REgmsp6Tfpc8MF1TpvcZaYtJw';
			$rateRequest->ClientDetail->AccountNumber = '179030616';
			$rateRequest->ClientDetail->MeterNumber = '108956126';
			$rateRequest->TransactionDetail->CustomerTransactionId = 'testing rate service request';
			$rateRequest->Version->ServiceId = 'crs';
			$rateRequest->Version->Major = 24;
			$rateRequest->Version->Minor = 0;
			$rateRequest->Version->Intermediate = 0;
			$rateRequest->ReturnTransitAndCommit = true;

			// Set up addresses
			$config = $this->CI->config->item('sender_Address');
			$rateRequest->RequestedShipment->PreferredCurrency = 'USD';
			$rateRequest->RequestedShipment->Shipper->Address->StreetLines = $config['address'];
			$rateRequest->RequestedShipment->Shipper->Address->City = $config['city'];
			$rateRequest->RequestedShipment->Shipper->Address->StateOrProvinceCode = $config['state'];
			$rateRequest->RequestedShipment->Shipper->Address->PostalCode = $config['postalCode'];
			$rateRequest->RequestedShipment->Shipper->Address->CountryCode = $config['countryCode'];


			$rateRequest->RequestedShipment->Recipient->Address->StreetLines = $recipient['address'];
			$rateRequest->RequestedShipment->Recipient->Address->City = $recipient['city'];
			$rateRequest->RequestedShipment->Recipient->Address->StateOrProvinceCode = $recipient['state'];
			$rateRequest->RequestedShipment->Recipient->Address->PostalCode = $recipient['zipcode'];
			$rateRequest->RequestedShipment->Recipient->Address->CountryCode = 'US';

			// Set up shipping charges payment and rate request types
			$rateRequest->RequestedShipment->ShippingChargesPayment->PaymentType = SimpleType\PaymentType::_SENDER;
			$rateRequest->RequestedShipment->RateRequestTypes = [SimpleType\RateRequestType::_PREFERRED, SimpleType\RateRequestType::_LIST];

			// Create a requested package line item
			$requestedPackageLineItem = new ComplexType\RequestedPackageLineItem();
			$requestedPackageLineItem->Weight->Value = 1;
			$requestedPackageLineItem->Weight->Units = SimpleType\WeightUnits::_LB;
			$requestedPackageLineItem->Dimensions->Length = 9.252;
			$requestedPackageLineItem->Dimensions->Width = 13.189;
			$requestedPackageLineItem->Dimensions->Height = 1;
			$requestedPackageLineItem->Dimensions->Units = SimpleType\LinearUnits::_IN;
			$requestedPackageLineItem->GroupPackageCount = 1;

			// Assign the requested package line item to the RateRequest
			$rateRequest->RequestedShipment->RequestedPackageLineItems = [$requestedPackageLineItem];

			// Make the rate request
			$rateServiceRequest = new Request();
			$rateServiceRequest->getSoapClient()->__setLocation(Request::PRODUCTION_URL);
			$rateReply = $rateServiceRequest->getGetRatesReply($rateRequest);

			// Optionally print the request object for debugging
			// echo "<pre>";
			// print_r($rateRequest);

			return $rateReply;
		}

//		protected function buildAddress($address) {
//			$addr = new ComplexType\Address();
//			$addr->setStreetLines([$address['street']]);
//			$addr->setCity($address['city']);
//			$addr->setStateOrProvinceCode($address['state']);
//			$addr->setPostalCode($address['zip']);
//			$addr->setCountryCode($address['country']);
//			return $addr;
//		}
	}

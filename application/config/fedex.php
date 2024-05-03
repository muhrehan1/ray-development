<?php
// application/config/fedex.php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['fedex'] = array(
    'key' => 'fdb8xgLWPCo6zPWO',
    'password' => 'REgmsp6Tfpc8MF1TpvcZaYtJw',
    'account_number' => '179030616',
    'meter_number' => '108956126',
    'endpoint' => 'https://ws.fedex.com:443/web-services'
);



// ===================================
// Production Credentials

// $config['key'] = 'fdb8xgLWPCo6zPWO';
// $config['password'] = 'REgmsp6Tfpc8MF1TpvcZaYtJw';
// $config['account_number'] = '179030616';
// $config['meter_number'] = '108956126';
// $config['endpoint'] = 'https://ws.fedex.com:443/web-services';


// Testing Credentials
// $config['fedex'] = array(
//     'key' => 'wYPCj4QY3Q06vSEs',
//     'password' => '8iTfL1WtZJPYrkeLBPsIVIzRr',
//     'account_number' => '510087305',
//     'meter_number' => '118569218',
//     'endpoint' => 'https://ws.fedex.com:443/web-services'
// );

$config['sender_Address'] = array(
	'name' => 'H Ray Priest',
	'company' => 'RJR Passports',
	'phone' => '123-456-7890',
	'address' => '5301 Alpha Road Suite 80-13',
	'city' => 'DALLAS',
	'state' => 'TX', // Corrected state abbreviation
	'postalCode' => '75240',
	'countryCode' => 'US',
	'email_address'=> 'ray@rjrpv.com'
);




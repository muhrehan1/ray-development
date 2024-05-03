<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//---------------------------------------------Front routes start-------------------------------------------
$route['default_controller'] = 'home';
$route['about-us'] = 'about_us/index';
$route['request-consultation'] = 'passport/request_consultation';
$route['another-applicant'] = 'passport/anotherAplicant';

$route['get-packages'] = 'passport/get_packages_by_cat';
$route['get-cart-data'] = 'passport/getCartsData';
$route['faq'] = 'faq/faq';
$route['contact'] = 'contact/index';
$route['travel-visas'] = 'visa/index';
$route['get-all-countries'] = 'passport/get_all_countries';
// $route['travel-visas'] = 'visa/index';
$route['login'] = 'user/index';
$route['renewal-passport'] = 'passport/index';
$route['visa-ask-email'] = 'passport/visa_ask_lead';
$route['get-passport'] = 'passport/get_passport';
$route['new-passport'] = 'passport/new_passport';
$route['lost-passport'] = 'passport/lost_passport';
$route['minor-passport'] = 'passport/minor_passport';
$route['data-correction-passport'] = 'passport/data_correction_passport';
$route['second-additonal-passport'] = 'passport/second_additonal_passport';
$route['second-additonal-renewal-passport'] = 'passport/second_additonal_renewal_passport';
$route['terms-and-conditions'] = 'website_policies/index';
$route['renewal-packages'] = 'passport/renewal_packages';
$route['checkout-process'] = 'passport/processOrder';
$route['checkout-step-2'] = 'passport/processStep';
$route['country-visa'] = 'passport/country_visa';
$route['thankyou'] = 'passport/thankyou';
$route['cart/remove_item_ajax'] = 'passport/remove_item_ajax';
$route['passport/get_cart_items'] = 'passport/get_cart_items';
//$route['passport/show_cart'] = 'passport/show_cart';
$route['user/profile'] = 'user/user_edit_profile';
$route['admin/transaction-details'] = 'passport/applications_list';

$route['admin/visa-leads'] = 'passport/visa_leads';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['privacy-policy'] = 'home/privacy_policy';
$route['refund-policy'] = 'home/refund_policy';
$route['terms-of-services'] = 'home/terms_of_services';
$route['send-email'] = 'passport/send_email';
$route['send-email-new-passport'] = 'passport/send_email_new_pssport';

$route['send-email-lost-passport'] = 'passport/send_email_lost_pssport';
$route['send-email-minor-passport'] = 'passport/send_email_minor_pssport';
$route['send-email-data-correction-passport'] = 'passport/data_correction_email';
$route['send-email-additional'] = 'passport/second_additional_email';
$route['send-email-additional-renewal'] = 'passport/second_additional_renewal_email';



$route['payment-process'] = 'passport/process_payment';
//---------------------------------------------Front routes ends-------------------------------------------


//---------------------------------------------Admin auth routes start-------------------------------------------
$route['admin'] = 'admin_auth/index';
$route['get-recovery-link'] = 'admin_auth/get_recovery_link';
$route['password-recovery/(:any)'] = 'admin_auth/recover_account/$1';
$route['dashboard'] = 'admin/dashboard';
$route['admin-logout'] = 'admin/admin_logout';
$route['admin-update-profile'] = 'admin/profile_update';
$route['user/order-details']= 'user/order_details_user';

$route['admin-application-detail/(:any)'] = 'passport/application_detail/$1';
//---------------------------------------------Admin auth routes end---------------------------------------------

//---------------------------------------------User auth routes start-------------------------------------------
$route['user'] = 'User/index';

//---------------------------------------------User auth routes ends-------------------------------------------

//----------------------------------------Admin Dynamic Parser routes start---------------------------------------
$route['edit/(:any)/(:any)'] = 'admin/dynamic_edit/$1/$2';
$route['listing/(:any)'] = 'admin/dynamic_listing/$1';
$route['specificlisting/(:any)/(:any)'] = 'admin/specific_listing/$1/$2';
$route['add/(:any)'] = 'admin/dynamic_add/$1';

//----------------------------------------Admin Dynamic Parser routes End---------------------------------------

//------------------------------------------------ROUTES FOR FRONT-------------------------------------------

$route['user-dashboard'] = 'user/user_dashboard';
$route['login'] = 'user/index';
$route['user-logout'] = 'user/user_logout';

$route['models'] = 'models/index';
$route['model-detail'] = 'model_detail/index';
$route['model-detail/(:any)'] = 'model_detail/index/$1';
$route['cart'] = 'cart/index';
$route['checkout'] = 'checkout/index';
$route['sign-up'] = 'user/sign_up';
$route['thankyou'] = 'passport/thankyou';



$route['documents/update'] = 'passport/update_documents';

$route['cart'] = 'cart/index';
$route['checkout'] = 'checkout/index';

$route['help'] = 'help/index';
$route['home'] = 'home/index';
$route['my_account'] = 'my_account/index';
$route['policy'] = 'policy/index';

$route['gallery'] = 'gallery/index/';
$route['terms'] = 'terms/index';

// $route['sign-in'] = 'customer/sign_in';
// $route['sign-up'] = 'customer/sign_up';
// $route['customer-logout'] = 'customer/customer_logout';

$route['product-details/(:any)'] = "product_details/index/$1";


$route['customer-orders'] = 'customer/customer_orders';
$route['customer-profile'] = 'customer/customer_edit_profile';
$route['customer-invoice/(:any)'] = 'customer/customer_invoice/$1';
$route['proceed-checkout'] = 'ecom_process/proceed_checkout';



// =================================================
	// PASSPORT PACKAGES ROUTE
// =================================================

$route['new-passport-packages'] = 'passport/new_passport_packages';
$route['lost-passport-packages'] = 'passport/lost_passport_packages';
$route['minor-passport-packages'] = 'passport/minor_passport_packages';
$route['data-correction-passport-packages'] = 'passport/data_correction_passport_packages';
$route['second-additional-packages'] = 'passport/second_additional_packages';
$route['second-additional-renewal-packages'] = 'passport/second_additional_renewal_packages';

$route['document-requirements'] = 'passport/documents';


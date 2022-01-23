<?php
session_start();

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
         $url = "https://";
    else
         $url = "http://";
    // Append the host(domain name, ip) to the URL.
    $url.= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $url.= $_SERVER['REQUEST_URI'];

    if(strpos($_SERVER['REQUEST_URI'], 'sunny_daes_trumbull.php') !== false){
        // echo $_SERVER['REQUEST_URI'];
        //$address = "trumbull";
        // define('EMAILNOTIF', 'trumbull@sunnydaesicecream.com');
    } else if(strpos($_SERVER['REQUEST_URI'], 'sunny_daes_stamford.php') !== false){
        // echo $_SERVER['REQUEST_URI'];
        //$address = "stamford";
        // define('EMAILNOTIF', 'stamford@sunnydaesicecream.com');
    } else if(strpos($_SERVER['REQUEST_URI'], 'sunny_daes_westport.php') !== false){
        // echo $_SERVER['REQUEST_URI'];
        //$address = "west_port";
        // define('EMAILNOTIF', 'westport@sunnydaesicecream.com');
    } else if(strpos($_SERVER['REQUEST_URI'], 'fairfield_black_rock.php') !== false){
        // echo $_SERVER['REQUEST_URI'];
        //$address = "black_rock";
        // define('EMAILNOTIF', 'fairfieldblackrock@sunnydaesicecream.com');
    } else if(strpos($_SERVER['REQUEST_URI'], 'sunny_daes_fairfield.php') !== false){
        // echo $_SERVER['REQUEST_URI'];
        //$address = "fairfield_23";
        // define('EMAILNOTIF', 'fairfieldpost@sunnydaesicecream.com');
    } else {
        //$address = "";
    }
/*
* NOTE:
* Payment Form
* Version: 5.0.0
* Modified: 19/08/2020
*/


// Include Wordpress Functions
$scriptPath = dirname(__FILE__);
$path = realpath($scriptPath . '/./');
$filepath = explode("wp-content",$path);
define('WP_USE_THEMES', false);
require(''.$filepath[0].'/wp-blog-header.php');
// End Wordpress Functions


// Get Form Configuration
global $wpdb;

$_FORM_CONFIG = $wpdb->get_row( "SELECT * FROM formdatabase_payment_forms WHERE file_name = '$_FILENAME'" );
// End Get Form Configuration


ini_set('display_errors', get_option('debug_mode', false));
ini_set('display_startup_errors', get_option('debug_mode', false));

if (get_option('debug_mode', false)) {
    error_reporting(E_ALL);
}

////////////////////////////////////////////////////////
// define('TEST_MODE', get_option('sandbox_mode', false));
define('TEST_MODE', false);
define('COMPANY_NAME', get_option('comp_name', false));
define('TEST_EMAIL',  get_option('email_test_mode', false)); // test if e-mail functionality is working. If TEST_EMAIL = true, make sure $gateways are false
////////////////////////////////////////////////////////

// Payment Form Config
define('FORM_NAME', $_FORM_CONFIG->form_name);
define('DONATION', $_FORM_CONFIG->donation);


if(DONATION){
  define('RECURRING', $_FORM_CONFIG->recurring);
  $donation_amounts = array(10,25,50,100,200);
}else {
  $payments = array(
    '8" Cake Soft Serve' => '33.00',
    '10" Cake Soft Serve' => '39.00',
    '1/2 Sheet Cake Soft Serve' => '49.00',
    '8" Cake Hard Serve' => '39.00',
    '10" Cake Hard Serve' => '45.00',
    '1/2 Sheet Cake Hard Serve' => '54.00',
    '8" Cake Yogurt Serve' => '39.00',
    '10" Cake Yogurt Serve' => '45.00',
    '1/2 Sheet Cake Yogurt Serve' => '54.00',
    '8" Cake Gelato Serve' => '48.00',
    '10" Cake Gelato' => '54.00',
    '1/2 Sheet Cake Gelato Serve' => '70.00',
    // 'SamplePayment' => '1.00',
    // 'PaymentWithMinMax' => '2.00|5.00',
    // 'PaymentWithGroup' => array(
    //   'SampleInsideGroup1' => '10.00|100.00',
    //   'SampleInsideGroup2' => '5.00',
    //   'SampleInsideGroupOther' => ''
    // ),
    // 'Other' => ''
  );
}

$gateways = array(
  'paypal'    => (!TEST_EMAIL) ? get_option('paypal_enabled', false) : false,
  'authorize' => true,
  'payeezy'   => (!TEST_EMAIL) ? get_option('payeezy_enabled', false) : false,
  'stripe'    => (!TEST_EMAIL) ? get_option('stripe_enabled', false) : false,
  'square'    => (!TEST_EMAIL) ? get_option('square_enabled', false) : false
);

$required = array('First_Name','Last_Name','Email');
$AUTHORIZE_TKEY = "";
if(TEST_MODE){
  //NOTE: PAYPAL
  define("PAYPAL_USERNAME", get_option("sandbox_paypal_username", 'sp-facilitator_api1.proweaver.net'));
  define("PAYPAL_PASSWORD", get_option("sandbox_paypal_password", '1399873650'));
  define("PAYPAL_SIGNATURE", get_option("sandbox_paypal_signature", 'AiPC9BjkCyDFQXbSkoZcgqH3hpacA74rJq85b-pTFAHAZ.71hb30iH12'));


  // ===========================================================================================================
  //
  //               NAA SA AJAX PAYMENT NAKO G BUTANG ANG AUTHORIZE API
  //
  // ===========================================================================================================

    //NOTE: AUTHORIZE.NET
  // if($address == "trumbull"){
  //
  //     define('AUTHORIZE_LOGINID','9r52BTU4dyJ');
  //     define('AUTHORIZE_TKEY','83JU8Mjs7n2g8r4p');
  //     //echo $address;
  // }else if($address == "stamford"){
  //     define('AUTHORIZE_LOGINID','9r52BTU4dyJ');
  //     define('ATESTAUTHORIZE_TKEY','83JU8Mjs7n2g8r4p');
  //     echo $address;
  // }else if($address == "west_port"){
  //     define('AUTHORIZE_LOGINID','9r52BTU4dyJ');
  //     $AUTHORIZE_TKEY = "83JU8Mjs7n2g8r4p";
  //     define('AUTHORIZE_TKEY','83JU8Mjs7n2g8r4pTEST');
  //     echo $address;
  // }else if($address == "black_rock"){
  //     define('AUTHORIZE_LOGINID','9r52BTU4dyJ');
  //     define('AUTHORIZE_TKEY','83JU8Mjs7n2g8r4p');
  //     echo $address;
  // }else if($address == "fairfield_23"){
  //     define('AUTHORIZE_LOGINID','9r52BTU4dyJ');
  //     define('AUTHORIZE_TKEY','83JU8Mjs7n2g8r4pTEST');
  //     echo $address;
  // }else{
  //     define('AUTHORIZE_LOGINID', get_option("sandbox_authorize_login_id", '9r52BTU4dyJ'));
  //     define('AUTHORIZE_TKEY', get_option("sandbox_authorize_tkey", '83JU8Mjs7n2g8r4p'));
  // }

  //NOTE: PAYEEZY
  define('PAYEEZY_GATEWAYID', get_option("sandbox_payeezy_gateway_id", 'HE7801-89'));
  define('PAYEEZY_PASSWORD', get_option("sandbox_payeezy_password", '8hNeQwaoyZ8kySsbuk09jbo5M1EQo6sM'));
  define('PAYEEZY_KEYID', get_option("sandbox_payeezy_key_id", '709589'));
  define('PAYEEZY_HMACKEY', get_option("sandbox_payeezy_hmac_key", 'r9pAJyrt5FNBW~QHApVDhBFuNFolueBV'));

  //NOTE: STRIPE
  define('STRIPE_PUBLISHABLE_KEY', get_option("sandbox_stripe_publishable_key", 'pk_test_Y2XsAOSNSABe2aOW2Y4s1B0x'));
  define('STRIPE_SECRET_KEY', get_option("sandbox_stripe_secret_key", 'sk_test_O2dUx2u1rnMoIEAbjo1fxhzJ'));

  //NOTE: SQUARE
  define('SQUARE_APPLICATION_ID', get_option("sandbox_application_key", 'sandbox-sq0idp-Cv-UCD-d58VKczDvd8PXog'));
  define('SQUARE_ACCESS_TOKEN', get_option("sandbox_access_token", 'sandbox-sq0atb-s3f9nBf4GmWjTLcRoEm9aw'));
  define('SQUARE_LOCATION_ID', get_option("sandbox_location_id", 'CBASEICWWAw5k2TCC_Ez-1bJueUgAQ'));

}else {
  //NOTE: PAYPAL
  define('PAYPAL_USERNAME', get_option("live_paypal_username", ''));
  define('PAYPAL_PASSWORD', get_option("live_paypal_password", ''));
  define('PAYPAL_SIGNATURE', get_option("live_paypal_signature", ''));


  // ===========================================================================================================
  //
  //               NAA SA AJAX PAYMENT NAKO G BUTANG ANG AUTHORIZE API
  //
  // ===========================================================================================================

  // //NOTE: AUTHORIZE.NET
  // if($address == "trumbull"){
  //
  //     define('AUTHORIZE_LOGINID', get_option("sandbox_authorize_login_id", '9r52BTU4dyJ'));
  //     define('AUTHORIZE_TKEY', get_option("sandbox_authorize_tkey", '83JU8Mjs7n2g8r4p'));
  //     echo $address;
  // }else if($address == "stamford"){
  //     define('AUTHORIZE_LOGINID', get_option("sandbox_authorize_login_id", '9r52BTU4dyJ'));
  //     define('AUTHORIZE_TKEY', get_option("sandbox_authorize_tkey", '83JU8Mjs7n2g8r4p'));
  //     echo $address;
  // }else if($address == "west_port"){
  //     define('AUTHORIZE_LOGINID', get_option("sandbox_authorize_login_id", '9r52BTU4dyJ'));
  //     define('AUTHORIZE_TKEY', get_option("sandbox_authorize_tkey", '83JU8Mjs7n2g8r4p'));
  //     echo $address;
  // }else if($address == "black_rock"){
  //     define('AUTHORIZE_LOGINID', get_option("sandbox_authorize_login_id", '9r52BTU4dyJ'));
  //     define('AUTHORIZE_TKEY', get_option("sandbox_authorize_tkey", '83JU8Mjs7n2g8r4p'));
  //     echo $address;
  // }else if($address == "fairfield_23"){
  //     define('AUTHORIZE_LOGINID', get_option("sandbox_authorize_login_id", '9r52BTU4dyJ'));
  //     define('AUTHORIZE_TKEY', get_option("sandbox_authorize_tkey", '83JU8Mjs7n2g8r4p'));
  //     echo $address;
  // }else{
  //     define('AUTHORIZE_LOGINID', get_option("sandbox_authorize_login_id", '9r52BTU4dyJ'));
  //     define('AUTHORIZE_TKEY', get_option("sandbox_authorize_tkey", '83JU8Mjs7n2g8r4p'));
  // }

  //NOTE: PAYEEZY
  define('PAYEEZY_GATEWAYID', get_option("live_payeezy_gateway_id", ''));
  define('PAYEEZY_PASSWORD', get_option("live_payeezy_password", ''));
  define('PAYEEZY_KEYID', get_option("live_payeezy_key_id", ''));
  define('PAYEEZY_HMACKEY', get_option("live_payeezy_hmac_key", ''));

  //NOTE: STRIPE
  define('STRIPE_PUBLISHABLE_KEY', get_option("live_stripe_publishable_key", ''));
  define('STRIPE_SECRET_KEY', get_option("live_stripe_secret_key", ''));

  //NOTE: SQUARE
  define('SQUARE_APPLICATION_ID', get_option("live_application_key", ''));
  define('SQUARE_ACCESS_TOKEN', get_option("live_access_token", ''));
  define('SQUARE_LOCATION_ID', get_option("live_location_id", ''));
}

<?php
@session_start();
@$_FILENAME = end(explode('/', $_SERVER['HTTP_REFERER']));

require_once 'payment-assets/config-payment.php';
require_once 'functions.php';

if(TEST_MODE == true){

    if(FORM_NAME == "Sunny Daes Fairfield"){
        $AUTHORIZE_LOGINID = "9r52BTU4dyJ";
        $AUTHORIZE_TKEY = "83JU8Mjs7n2g8r4p";
    }else if(FORM_NAME == "Fairfield Black Rock"){
        $AUTHORIZE_LOGINID = "9r52BTU4dyJ";
        $AUTHORIZE_TKEY = "83JU8Mjs7n2g8r4p";
    }else if(FORM_NAME == "Sunny Daes Stamford"){
        $AUTHORIZE_LOGINID = "9r52BTU4dyJ";
        $AUTHORIZE_TKEY = "83JU8Mjs7n2g8r4p";
    }else if(FORM_NAME == "Sunny Daes Trumbull"){
        $AUTHORIZE_LOGINID = "9r52BTU4dyJ";
        $AUTHORIZE_TKEY = "83JU8Mjs7n2g8r4p";
    }else if(FORM_NAME == "Sunny Daes Westport"){
        $AUTHORIZE_LOGINID = "9r52BTU4dyJ";
        $AUTHORIZE_TKEY = "83JU8Mjs7n2g8r4p";
    }

}else{

    if(FORM_NAME == "Sunny Daes Fairfield"){
        $AUTHORIZE_LOGINID = "84nQv6H4hh3q";
        $AUTHORIZE_TKEY = "57sV28fH4U85Kh9u";
    }else if(FORM_NAME == "Fairfield Black Rock"){
        $AUTHORIZE_LOGINID = "547psAJNeU";
        $AUTHORIZE_TKEY = "3pLKuuv53D53M22p";
    }else if(FORM_NAME == "Sunny Daes Stamford"){
        $AUTHORIZE_LOGINID = "73ryTt3CS";
        $AUTHORIZE_TKEY = "4yBC88N72w7a3Xhu";
    }else if(FORM_NAME == "Sunny Daes Trumbull"){
        $AUTHORIZE_LOGINID = "4Kxtm3M6B";
        $AUTHORIZE_TKEY = "48ptV8Cs76E9qvNU";
    }else if(FORM_NAME == "Sunny Daes Westport"){
        $AUTHORIZE_LOGINID = "395UctNZtq5q";
        $AUTHORIZE_TKEY = "9xMGHn45f8Gs74Hr";
    }
}


if(!empty($_POST)){
  echo '<pre>'; print_r($_POST); exit;
   if(!validateData($_POST, $required)){
      echo json_encode(message('danger','<b><i class="fas fa-times-circle"></i></b> Please fill in the required fields.',null,'has_errors'));
      exit;
   }else{

      if(($_GET['paypal'] == 'direct') || TEST_EMAIL){
         $gRecaptchaResponse = $_POST['g-recaptcha-response']; //google captcha post data

         if($gRecaptchaResponse == ""){
           echo json_encode(message('danger','<b><i class="fas fa-times-circle"></i></b> reCAPTCHA not verified.',null,'has_errors'));;
           exit;
         }
      }
   }

  if(!TEST_EMAIL){
    switch ($_POST['gateway']) {
      case 'paypal':
        if($_GET['paypal'] == 'direct')
          echo json_encode(paypaldirect());
        else
          echo json_encode(paypalreturn());
        break;
      case 'authorize':
        echo json_encode(authorizepayment($AUTHORIZE_TKEY,$AUTHORIZE_LOGINID));
        break;
      case 'payeezy':
        echo json_encode(payeezypayment());
        break;
      case 'stripe':
        if(isset($_POST['stripe_token']))
          echo json_encode(stripepayment());
        else
          echo json_encode(message('info','<b><i class="fas fa-spinner fa-spin"></i></b> Processing Payment...','token'));
        break;
      case 'square':
        if(isset($_POST['square_token']))
          echo json_encode(squarepayment());
        else
          echo json_encode(message('info','<b><i class="fas fa-spinner fa-spin"></i></b> Processing Payment...','token'));
        break;
      default:
        echo json_encode(message('danger','<b><i class="fas fa-times-circle"></i></b> No Payment Gateway Selected.'));
        exit;
      break;
    }
}else{
   echo json_encode(sendtestemail());
}
  exit;
}

function validateData($data, $required){
  array_push($required,'Amount');
  if($data['gateway'] == 'authorize' || $data['gateway'] == 'payeezy'){
    array_push($required,"number","fname","lname","expiry","cvc");
  }
  foreach ($data as $key => $value) {
    if(!in_array($key,$required)) continue;
    if(empty($value)){
      return false;
    }
  }
  return true;
}

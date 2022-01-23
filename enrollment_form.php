<?php
@$_FILENAME = end(explode('/', $_SERVER['PHP_SELF']));

require_once 'payment-assets/config-payment.php';

$selectedgateways = array_filter($gateways);
$gatewayname = array_keys($selectedgateways);
$gcount = count($selectedgateways);
$btn_text = 'Pay';

if(DONATION){
  $btn_text = 'Donate';
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Online Payment Form</title>
<link rel="stylesheet" href="payment-assets/css/bootstrap.min.css">
<link rel="stylesheet" href="payment-assets/css/fa-solid.min.css">
<link rel="stylesheet" href="payment-assets/css/fontawesome.min.css">
<?php if ($gateways['authorize'] || $gateways['payeezy']): ?>
<link rel="stylesheet" href="payment-assets/css/card.css">
<?php endif; ?>
<link rel="stylesheet" href="payment-assets/css/square.css">
<link rel="stylesheet" href="payment-assets/css/style.css">
<style>
@media only screen and (max-width: 365px) {
   #form_recaptcha > div{
      width: 150px !important;
      transform: scale(0.77); transform-origin: 0 0;
      transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;
   }
}
@media only screen and (max-width: 320px) {
   #form_recaptcha{
      padding-left: 5px !important;
   }
   #paymentform .donation-class{
   padding-right: 27px !important;
   padding-left: 0px !important;
   }
}

.fieldheader p {padding: 8px;color: #333;text-align: center;font-weight: 700;margin-bottom: 15px;font-size: 20px;text-transform: uppercase;margin-top: 15px;}
.infoheader{text-align: center;}
.subfieldheader {width: 100%;display: inline-flex;background: rgb(249, 0, 146);}
.subfieldheader p{padding: 8px;color: #fff;text-align: center;font-weight: 700;font-size: 25px;width: 40%;margin: auto 0px;}
.form_label {text-transform: uppercase;font-weight: bold;}
.form_box1 {padding:20px;border: 3px solid #f90092;}
.mail_fee_check{width: 35%;display: block;margin: 0px auto 20px;background: #FEFEFE;padding: 8px;color: #333;text-align: center;font-weight: 700;font-size: 15px;text-transform: uppercase;border: 2px solid red;}
.mail_fee_check p{margin: 10px 0;}
table {width: 50%;height: 50px;}
.radio_option{margin: 0px 30px 0 25px;}
.radio_option_container{padding-top: 10px;}
.form_header_comp_address{color: #ee028a;font-size: 20px;text-align: center;}
.radio_option{margin: 0px 30px 0 25px;}
.radio_option_container{padding-top: 10px;}
.form_header_comp_address{color: #ee028a;font-size: 20px;text-align: center;}
.radio_guardian label{padding-left: 1vw;font-size: 18px;color: #fff;font-weight: bold;}
.radio label{padding-left: 2vw;color: #000;}
.checkbox_custom{width: unset;display: inline;margin-right: 10px;}
.Schedule{margin: 0 auto; display: inherit; }
.Schedule_label{margin-left: 10px; margin-right: 10px}
u {font-weight: bold;}
td {width: 50%;padding-top: 15px;}
h1 {padding: 8px;color: #333;text-align: center;font-weight: 700;margin-bottom: 15px;font-size: 20px;text-transform: uppercase;margin-top: 15px;}



</style>
<script type="text/javascript">
  var onloadCallback = function() {
    grecaptcha.render('form_recaptcha', {
      'sitekey' : '6LftnpIUAAAAAGSTlCV2ZtZxiKevQ7SrM5baht7p'
    });
  };
</script>
</head>
	<body>
		<div>
      <div id="coverpage">
        <div class="spinner-box">
          <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
          </div>
          <p>Loading Form</p>
          <p>Please Wait...</p>
        </div>
      </div>

			<form id="paymentform" class="" action="" method="post">
        <input type="hidden" id="is_valid" value="false">
			  <fieldset>
					<br />
						<div class="col-sm-12">
							<div class="form-row">
								<div class="col-sm-12">
								<?php if(TEST_MODE) : ?>
									<div class="alert alert-dismissible alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="fas fa-info-circle"></i></strong> Test mode is enabled. While in test mode, no live transactions are processed</div>
								<?php endif; ?>
									<div id="alert" hidden>
										<p class="mb-0" id="alert-content"></p>
									</div>
								</div>
							</div>
    <!-- ----------------------------Start------------------------------------------------------------------------- -->

        <div class="form_box">
            <div class="form_box_col1">
                <div class="group">
                    <figure style="text-align: center;height: ;"><img src="https://www.arcencielny.com/wp-content/themes/arcenciel/images/main_logo.png" alt="Petits Poussins Brooklyn" style="height: 140px;"></figure>
                </div>
            </div>
        </div>
        <p class="form_header_comp_address"> Bilingual French Pre-school1656 Third Ave., New York, NY 10128 Tel/Fax: 212-410-0180</p>

        <div class="fieldheader">
            <p>APPLICATION: ONE-TIME FAMILY FEE: $200.00</p>
            <input type="hidden" name="APPLICATION: ONE-TIME FAMILY FEE: $200.00" value=":">
        </div>
        <div class="infoheader">
            <strong><p>Your child must   be 2.0    years    old  and <u>toilet trained</u> by Sep. 1st to be accepted in the program.</p></strong>
          </div>
        <br>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="form_label" for="Academic_Year">Academic Year (YYYY / YYYY)</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
              </div>
              <input type="Text" name="Academic_Year" class="form-control form-control-lg required" id="Academic_Year" placeholder="YYYY / YYYY" required>
              <div class="invalid-tooltip">
                Please Enter Academic Year Here
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form_label" for="Ideal_Start_date">What would be your ideal start date?</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
              </div>
              <input type="date" name="Ideal_Start_date" class="form-control form-control-lg" value="" id="Ideal_Start_date" >
              <!-- <input type="date" name="Ideal_Start_date" class="form-control form-control-lg required" id="Ideal_Start_date" placeholder="" > -->
              <div class="invalid-tooltip">
                Please Enter Ideal Start Date Here
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="Child_First_Name" class="form_label">Child's Name</label>
            <div class="input-group">
              <div class="input-group-prepend responsive_disp">
                <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="Child_First_Name" class="form-control form-control-lg required" id="Child_First_Name" placeholder="Enter First Name Here" required>
              <input type="text" name="Child_Middle_Name" class="form-control form-control-lg required" id="Child_Middle_Name" placeholder="Enter Middle Name Here">
              <input type="text" name="Child_Last_Name" class="form-control form-control-lg required" id="Child_Last_Name" placeholder="Enter Last Name Here">
              <div class="invalid-tooltip">
                Please Enter Child's Name Here
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="Date_Of_Birth" class="form_label">Date of Birth</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
              </div>
              <input type="date" name="Date_Of_Birth" class="form-control form-control-lg required" id="Date_Of_Birth" placeholder="" required>
              <div class="invalid-tooltip">
                Please Enter Date of Birth Here
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Place_Of_Birth" class="form_label">Place of Birth</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-hospital"></i></span>
              </div>
              <input type="text" name="Place_Of_Birth" class="form-control form-control-lg required" id="Place_Of_Birth" placeholder="Enter Place Here">
              <div class="invalid-tooltip">
                Please Enter Place of Birth Here
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="Street_Address" class="form_label">Street Address</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-map"></i></span>
              </div>
              <input type="Text" name="Street_Address" class="form-control form-control-lg required" id="Street_Address" placeholder="Enter Address Here" required>
              <div class="invalid-tooltip">
                Please Enter Street Address Here
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="City" class="form_label">City</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-map"></i></span>
              </div>
              <input type="text" name="City" class="form-control form-control-lg required" id="City" placeholder="Enter City Here" required>
              <div class="invalid-tooltip">
                Please Enter City Here
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Zip_Code" class="form_label">Zip Code</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input type="text" name="Zip_Code" class="form-control form-control-lg required" id="Zip_Code" placeholder="Enter Zip Code Here">
              <div class="invalid-tooltip">
                Please Enter Zip Code Here
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="group">
                <div class="fieldheader2">
                    <div class="subfieldheader">
                        <p>Guardian 1</p>

                        <table class="radio_guardian" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="Guardian_1" value="Mother" id="Guardian0" class="required" checked="checked"><label for="Guardian0" >Mother</label></td>
                                    <td><input type="radio" name="Guardian_1" value="Father" id="Guardian1"class="required"><label for="Guardian1" >Father</label></td>
                                     <div class="invalid-tooltip">Please Choose an option</div>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="fieldcontent">
                        <div class = "form_box1">
                            <div class="form-row">
                              <div class="col-md-12 mb-3">
                                <label for="Guardian_1_First_Name" class="form_label">First and Last Name</label>
                                <div class="input-group">
                                  <div class="input-group-prepend responsive_disp_guardian">
                                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                  </div>
                                  <input type="text" name="Guardian_1_First_Name" class="form-control form-control-lg required" id="Guardian_1_First_Name" placeholder="First Name">
                                  <input type="text" name="Guardian_1_Last_Name" class="form-control form-control-lg required" id="Guardian_1_Last_Name" placeholder="Last Name">
                                  <div class="invalid-tooltip">
                                    Please Enter Guardian Name Here
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3 unset_flex" >
                                <label for="Cell_Number_of_Guardian_1" class="form_label">Cell Number</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></i></span>
                                  </div>
                                  <input type="tel" name="Cell_Number_of_Guardian_1" class="form-control form-control-lg " id="Cell_Number_of_Guardian_1" placeholder="+1 (phone number)">
                                  <div class="invalid-tooltip">
                                    Please Enter Cell Number Here
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 mb-3 unset_flex">
                                <label for="Email" class="form_label">Email Address</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="email" name="Email" class="form-control form-control-lg required" id="Email" placeholder="Enter Email Here">
                                  <div class="invalid-tooltip">
                                    Please Enter Email Address Here
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-12 mb-3">
                                <label for="Employer_of_Guardian_1" class="form_label">Employer</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                  </div>
                                  <input type="text" name="Employer_of_Guardian_1" class="form-control form-control-lg" id="Employer_of_Guardian_1" placeholder="Enter Employer Here">
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3 unset_flex">
                                <label for="Business_Number_of_Guardian_1" class="form_label">Business Number</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></i></span>
                                  </div>
                                  <input type="tel" name="Business_Number_of_Guardian_1" class="form-control form-control-lg" id="Business_Number_of_Guardian_1" placeholder="+1 (phone number)">
                                </div>
                              </div>
                              <div class="col-md-6 mb-3 unset_flex">
                                <label for="Home_Phone_Number_of_Guardian_1" class="form_label">Home Phone Number</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></i></span>
                                  </div>
                                  <input type="tel" name="Home_Phone_Number_of_Guardian_1" class="form-control form-control-lg" id="Home_Phone_Number_of_Guardian_1" placeholder="+1 (phone number)">
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- --------------- -->
        <div class="col-md-6 mb-3">
            <div class="group">
                <div class="fieldheader2">
                    <div class="subfieldheader">
                        <p>Guardian 2</p>
                        <table class="radio_guardian" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="Guardian_2" value="Mother" id="Guardian0_2"><label for="Guardian0_2" >Mother</label></td>
                                    <td><input type="radio" name="Guardian_2" value="Father" id="Guardian1_2"><label for="Guardian1_2" >Father</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="fieldcontent">
                        <div class = "form_box1">
                            <div class="form-row">
                              <div class="col-md-12 mb-3">
                                <label for="Guardian_2_First_Name" class="form_label">First and Last Name</label>
                                <div class="input-group">
                                  <div class="input-group-prepend responsive_disp_guardian">
                                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                  </div>
                                  <input type="text" name="Guardian_2_First_Name" class="form-control form-control-lg" id="Guardian_2_First_Name" placeholder="First Name">
                                  <input type="text" name="Guardian_2_Last_Name" class="form-control form-control-lg" id="Guardian_2_Last_Name" placeholder="Last Name">
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3 unset_flex">
                                <label for="Cell_of_Number_Guardian_2" class="form_label">Cell Number</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></i></span>
                                  </div>
                                  <input type="tel" name="Cell_of_Number_Guardian_2" class="form-control form-control-lg" id="Cell_of_Number_Guardian_2" placeholder="+1 (phone number)">
                                </div>
                              </div>
                              <div class="col-md-6 mb-3 unset_flex">
                                <label for="Email_address_of_guardian_2" class="form_label">Email Address</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="email" name="Email_address_of_Guardian_2" class="form-control form-control-lg" id="Email_address_of_Guardian_2" placeholder="Enter Email Here">
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-12 mb-3">
                                <label for="Employer_of_Guardian_2" class="form_label">Employer</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                  </div>
                                  <input type="text" name="Employer_of_Guardian_2" class="form-control form-control-lg" id="Employer_of_Guardian_2" placeholder="Enter Employer Here">
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3 unset_flex">
                                <label for="Business_Number_of_Guardian_2" class="form_label">Business Number</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="tel" name="Business_Number_of_Guardian_2" class="form-control form-control-lg" id="Business_Number_of_Guardian_2" placeholder="+1 (phone number)">
                                </div>
                              </div>
                              <div class="col-md-6 mb-3 unset_flex">
                                <label for="Home_Phone_Number_of_Guardian_2" class="form_label">Home Phone Number</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="tel" name="Home_Phone_Number_of_Guardian_2" class="form-control form-control-lg" id="Home_Phone_Number_of_Guardian_2" placeholder="+1 (phone number)">
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- ---------------- -->
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="Does_your_child_speak_French?" class="form_label">Does Your Child Speak French?</label>
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <table class="radio" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                      <tr>
                          <td><input type="radio" name="Does_your_child_speak_French?" value="Yes" id="Does_your_child_speak_French?0"><label for="Does_your_child_speak_French?0" >Yes</label></td>
                          <td><input type="radio" name="Does_your_child_speak_French?" value="No" id="Does_your_child_speak_French?1"><label for="Does_your_child_speak_French?1" >No</label></td>
                      </tr>
                  </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Does_parent_speak_French?" class="form_label">Do Parent Speak French?</label>
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <table class="radio" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                      <tr>
                          <td><input type="radio" name="Does_parent_speak_French?" value="Yes" id="Does_parent_speak_French?0"><label for="Does_parent_speak_French?0" >Yes</label></td>
                          <td><input type="radio" name="Does_parent_speak_French?" value="No" id="Does_parent_speak_French?1"><label for="Does_parent_speak_French?1" >No</label></td>
                      </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="What_is_the_first_language_spoke__at_home?" class="form_label">What is the first language spoken at home?</label>
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" name="What_is_the_first_language_spoke__at_home?" class="form-control form-control-lg" id="What_is_the_first_language_spoke__at_home?" placeholder="Enter Language Here">
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="What_is_the_second_language_spoken_at_home_if_any?" class="form_label">What is the second language spoken at home, if any?</label>
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" name="What_is_the_second_language_spoken_at_home_if_any?" class="form-control form-control-lg" id="What_is_the_second_language_spoken_at_home_if_any?" placeholder="Enter Language Here">
            </div>
          </div>
        </div>

        <h1>In case of an emergency, who can we call if we are unable to reach you</h1>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="In_Case_Of_Emergency_Contact_Name" class="form_label">Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="In_Case_Of_Emergency_Contact_Name" class="form-control form-control-lg required" id="In_Case_Of_Emergency_Contact_Name" placeholder="Enter Name Here">
              <div class="invalid-tooltip">
                Please Enter Name Here
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="In_Case_Of_Emergency_Telephone" class="form_label">Telephone</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
              </div>
              <input type="tel" name="In_Case_Of_Emergency_Telephone" class="form-control form-control-lg required" id="In_Case_Of_Emergency_Telephone" placeholder="Enter Number Here">
              <div class="invalid-tooltip">Enter Phone Here</div>
            </div>
          </div>
        </div>

        <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="In_Case_Of_Emergency_Street_Address" class="form_label">Street Address</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id=""><i class="fas fa-map"></i></span>
                </div>
                <input type="text" name="In_Case_Of_Emergency_Street_Address" class="form-control form-control-lg" id="In_Case_Of_Emergency_Street_Address" placeholder="Enter Address Here">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="In_Case_Of_Emergency_City" class="form_label">City</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id=""><i class="fas fa-map"></i></span>
                </div>
                <input type="text" name="In_Case_Of_Emergency_City" class="form-control form-control-lg" id="In_Case_Of_Emergency_City" placeholder="Enter City Here">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="In_Case_Of_Emergency_Zip_Code" class="form_label">Zip Code </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id=""><i class="fas fa-map"></i></span>
                </div>
                <input type="tel" name="In_Case_Of_Emergency_Zip_Code" class="form-control form-control-lg" id="In_Case_Of_Emergency_Zip_Code" placeholder="Enter Zip Here">
                <div class="invalid-tooltip"></div>
              </div>
            </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="Emergency_Doctor_Name" class="form_label">Emergency Doctor's Name</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="Emergency_Doctor_Name" class="form-control form-control-lg " id="Emergency_Doctor_Name" placeholder="Enter Emergency Doctor's Name Here">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="Emergency_Doctor_phone" class="form_label">Emergency Doctor's Phone</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="tel" name="Emergency_Doctor_phone" class="form-control form-control-lg " id="Emergency_Doctor_phone" placeholder="Enter Emergency Doctor's Phone Here">
                </div>
              </div>
            </div>

            <h1>September - June</h1>
            <div class="form-row">
              <div class="col-md-12mb-3">
              <label for="" ><strong>Full Day (8:30am-3:30pm)</strong> </label>
                <div class="input-group" >
                  <div class="Schedule" >
				            <input type="radio" name="Full Day_(8:30am-3:30pm)"  value="Full Day (Monday through Friday): 8:30 am - 3:30 pm" id="Schedule0" class="required" ><label class="Schedule_label" for="Schedule0"><u>Monday through Friday</u></label><br>
                    <input type="radio" name="Full Day_(8:30am-3:30pm)"  value="Full Two Days (Tuesday &amp; Thursday): 8:30 am - 3:30 pm" id="Schedule2" class="required"><label class="Schedule_label" for="Schedule1"><u>2 Days (Tuesday &amp; Thursday)</u></label><br>
                    <input type="radio" name="Full Day_(8:30am-3:30pm)"  value="Full Three Days (Monday, Wednesday &amp; Friday): 8:30 am - 3:30 pm" id="Schedule1" class="required"><label class="Schedule_label" for="Schedule2"><u>3 Days (Monday, Wednesday &amp; Friday)</u></label><br>
                    <div class="invalid-tooltip">Please Select an option</div>
                 </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-md-12mb-3">
                <label for=""><strong>Half Day AM(8:30am-11:30am)</strong> </label>
                <div class="input-group">
                <div class="Schedule" >
                    <input type="radio" name="Schedule"  value="Half Day AM(Monday through Friday): 8:30 am - 11:30 am" id="Schedule0" class="required" ><label class="Schedule_label" for="Schedule0"><u>Monday through Friday</u></label><br>
                    <input type="radio" name="Schedule"  value="Half Day AM Two Days (Tuesday &amp; Thursday): 8:30 am - 11:30 am" id="Schedule2" class="required"><label class="Schedule_label" for="Schedule1"><u>2 Days (Tuesday &amp; Thursday)</u></label><br>
                    <input type="radio" name="Schedule"  value="Half Day AM Three Days (Monday, Wednesday &amp; Friday): 8:30 am - 11:30 am" id="Schedule1" class="required"><label class="Schedule_label" for="Schedule2"><u>3 Days (Monday, Wednesday &amp; Friday)</u></label><br>
                    <div class="invalid-tooltip">Please Select an option</div>
                </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-md-12mb-3">
                <label for=""><strong>Half Day PM(12:30pm-3:30pm)</strong> </label>
                <div class="input-group">
                  <div class="Schedule" >
                      <input type="radio" name="Schedule"  value="Half Day PM(Monday through Friday): 12:30 pm - 3:30 pm" id="Schedule0" class="required" ><label class="Schedule_label" for="Schedule0"><u>Monday through Friday</u> </label><br>
                      <input type="radio" name="Schedule"  value="Half Day PM Two Days (Tuesday &amp; Thursday): 12:30 pm - 3:30 pm" id="Schedule2" class="required"><label class="Schedule_label" for="Schedule1"><u>2 Days (Tuesday &amp; Thursday)</u> </label><br>
                      <input type="radio" name="Schedule"  value="Half Day PM Three Days (Monday, Wednesday &amp; Friday): 12:30 pm - 3:30 pm" id="Schedule1" class="required"><label class="Schedule_label" for="Schedule2"><u>3 Days (Monday, Wednesday &amp; Friday)</u></label><br>
                      <div class="invalid-tooltip">Please Select an option</div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-md-12mb-3">
                <label for=""><strong>Enrichment (3:30pm-5:30pm)</strong> </label>
                <div class="input-group">
                  <div class="Schedule" >
                      <input type="radio" name="Schedule"  value="Enrichment (Monday through Friday): 3:30 pm - 5:30 pm" id="Schedule0" class="required"><label class="Schedule_label" for="Schedule0"><u>Monday through Friday</u> </label><br>
                      <input type="radio" name="Schedule"  value="Enrichment Two Days (Tuesday &amp; Thursday): 3:30 pm - 5:30 pm" id="Schedule1" class="required"><label class="Schedule_label" for="Schedule1"><u>2 Days (Tuesday &amp; Thursday)</u> </label><br>
                      <input type="radio" name="Schedule"  value="Enrichment Three Days (Monday, Wednesday &amp; Friday): 3:30 pm - 5:30 pm" id="Schedule2" class="required"><label class="Schedule_label" for="Schedule2"><u>3 Days (Monday, Wednesday &amp; Friday)</u></label><br>
                      <div class="invalid-tooltip">Please Select an option</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <input type="checkbox" name="Enrichment:_3:00_pm_-_6:00_pm:_Monday_through_Friday" value="checked" id="Enrichment: 3:00 pm - 6:00 pm: Monday through Friday" checked="checked"><label  class="Schedule_label" for="Enrichment: 3:00 pm - 6:00 pm: Monday through Friday"><u>Enrichment:</u> 3:00 pm - 6:00 pm: Monday through Friday</label> -->

            <h1>Medical Statements and Consent</h1>
            <div class="input-group">
            <p><span class="compname">Arc-En-Ciel</span> is not permitted to administer any medication, if needed, please do so at home or after school.</p>
            <p><input type="checkbox" name="Authorize_staff_and_director_checkbox" value="checked" checked="checked" class="form-control form-control-lg checkbox_custom required" > I (we) authorize staff and Director of <span class="compname">Arc-En-Ciel Preschool</span> to obtain all necessary Emergency Medical treatment,  in case of an emergency.</p>
            <div class="invalid-tooltip">Please Check if you agree</div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label for="Authorize_staff_and_director" class="form_label">Do you authorize staff and director of <span class="compname">Arc En Ciel Preschool</span> to administer all necessary first aid care for your child, if necessary?</label>
                </div>
              <div class="col-md-6 mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <div class="radio_option_container">
                      <input type="radio" name="Authorize_staff_and_director" class="form-control-lg radio_option" id="Authorize_staff_and_director1" value="yes" placeholder="First Name" class="required" checked="checked"><label  for="Authorize_staff_and_director1">Yes</label>
                      <input type="radio" name="Authorize_staff_and_director" class="form-control-lg radio_option" id="Authorize_staff_and_director2" value="no" placeholder="Last Name" class="required"><label  for="Authorize_staff_and_director2">No</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="Parent_Initials" class="form_label">Parent Initials</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <input type="text" name="Parent_Initials" class="form-control form-control-lg required" id="Parent_Initials" placeholder="Enter Initials Here">
                  <div class="invalid-tooltip">Please Enter Initials Here</div>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="Allergies" class="form_label">List any allergies your child has, or medical conditions, seizures, asthma, handicap, he/she has</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id=""><i class="fas fa-sticky-note"></i></span>
                  </div>
                  <textarea name="Allergies" class="form-control form-control-lg" id="Allergies" placeholder="Enter Allergies Here"></textarea>
                </div>
              </div>
            </div>

            <p><strong>Note:</strong> All allergies/medical conditions must be stated on the child's medical form. Additionally, a "Standing Order" from the Pediatrician will be required in order to administer an Epi-Pen, Benadryl, or any Asthma medication. Your child will not be admitted without it.</p>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="Does_your_child_has_any_disability?" class="form_label">Does your child has any disability?</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <div class="radio_option_container">
                      <input type="radio" name="Does_your_child_has_any_disability?" class="form-control-lg radio_option" id="Any_disability1" value="yes" placeholder="First Name" ><label  for="Any_disability1">Yes</label>
                      <input type="radio" name="Does_your_child_has_any_disability?" class="form-control-lg radio_option" id="Any_disability2" value="no" placeholder="Last Name"><label  for="Any_disability2">No</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="Disability_Specification" class="form_label">If yes, Please Specify</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <input type="text" name="Disability_Specification" class="form-control form-control-lg" id="Disability_Specification" placeholder="Enter Disabilty Here">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="Does_your_child_has_speech_delay?" class="form_label">Does your child has speech delay?</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <div class="radio_option_container">
                      <input type="radio" name="Does_your_child_has_speech_delay?" class="form-control-lg radio_option" id="has_speech_delay1" value="yes" placeholder="First Name" ><label  for="has_speech_delay1">Yes</label>
                      <input type="radio" name="Does_your_child_has_speech_delay?" class="form-control-lg radio_option" id="has_speech_delay2" value="no" placeholder="Last Name"><label  for="has_speech_delay2">No</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="Speech_Delay_Specification" class="form_label">If yes, Please Specify</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <input type="text" name="Speech_Delay_Specification" class="form-control form-control-lg" id="Speech_Delay_Specification" placeholder="Enter Speech Delay Here">
                </div>
              </div>
            </div>

            <h1>New York department of health requires that all children are vaccinated for school entrance.</h1>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="Do_you_vaccinate_your_child?" class="form_label">Do you vaccinate your child?</label>
                <div class="input-group">
                  <div class="input-group-prepend">

                  </div>
                  <div class="radio_option_container">
                      <input type="radio" name="Do_you_vaccinate_your_child?" class="form-control-lg radio_option" id="do_vaccinate1" value="yes" class="required" checked="checked"><label  for="do_vaccinate1">Yes</label>
                      <input type="radio" name="Do_you_vaccinate_your_child?" class="form-control-lg radio_option" id="do_vaccinate2" value="no"class="required"><label  for="do_vaccinate2">No</label>
                  </div>
                </div>
              </div>
            </div>

            <p><input type="checkbox" name="I_hereby_authorized_Arc_En_Ciel_to_provide_care_for_my_child"  value="checked" class="form-control form-control-lg checkbox_custom required" checked="checked"> I, hereby, authorize <span class="compname">Arc-En-Ciel Preschool</span> to provide care for my child.</p>
            <div class="invalid-tooltip">Please Check if you agree</div>
            <p><input type="checkbox" name="I_declare_to_the_best_of_my_knowledge_that_all_statements_made_in_this_application_are_true" value="checked" class="form-control form-control-lg checkbox_custom required" checked="checked"> I declare to the best of my knowledge that all statements made in this application are true.</p>
            <div class="invalid-tooltip">Please Check if you agree</div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="First_and_last_name_of_Guardian_1" class="form_label">First and Last Name (Guardian 1)</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="First_and_last_name_of_Guardian_1" class="form-control form-control-lg required" id="First_and_last_name_of_Guardian_1" placeholder="Enter Name Here">
                  <div class="invalid-tooltip">
                    Please Enter Name Here
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="First_and_last_name_of_Guardian_2" class="form_label">First and Last Name (Guardian 2)</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="First_and_last_name_of_Guardian_2" class="form-control form-control-lg" id="First_and_last_name_of_Guardian_2" placeholder="Enter Name Here">
                  <div class="invalid-tooltip"></div>
                </div>
              </div>
			  </div>

        <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="Date_signed_by_Guardian_1" class="form_label">Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" name="Date_signed_by_Guardian_1" class="form-control form-control-lg" value="<?php echo date('F d, Y'); ?>"readonly id="Date_signed_by_Guardian_1" >
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="Date_signed_by_Guardian_2" class="form_label">Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" name="Date_signed_by_Guardian_2" class="form-control form-control-lg" value="<?php echo date('F d, Y'); ?>"readonly id="Date_signed_by_Guardian_2" >
                    <div class="invalid-tooltip"></div>
                  </div>
                </div>
					</div>

    <!-- ----------------------------End------------------------------------------------------------------------- -->
            <?php if(empty($payments)): ?>
							<?php if(DONATION): ?>
							<div class="form-row">
								<div class="col-sm-12">
										<div class="btn-group-toggle" data-toggle="buttons">
                      <?php if (!empty($donation_amounts)): ?>
                      <?php foreach ($donation_amounts as $amount): ?>
                        <label class="btn btn-lg btn-outline-secondary mb-1">
                          <input type="radio" name="payment" autocomplete="off" value="<?=$amount;?>" /> $<?=$amount;?>
                        </label>
                      <?php endforeach; ?>
                        <label class="btn btn-lg btn-outline-secondary mb-1">
  												<input type="radio" name="payment" autocomplete="off" value="Other" /> Custom Amount
  											</label>
                      <?php endif; ?>
										</div>
								</div>
							</div>
						<?php endif; ?>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<label for="Amount" class="form_label">Amount</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="AmountPrepend"><i class="fas fa-dollar-sign"></i></span>
										</div>
										<input type="number" step="0.01" min="200" max="200" value="" name="Amount" class="form-control form-control-lg required" id="Amount" placeholder="200" aria-describedby="AmountPrepend">
										<div class="invalid-tooltip">
											Please provide a valid amount
										</div>
									</div>
								</div>
								<?php if(!DONATION): ?>
                  <div class="col-md-6 mb-3">
                    <label for="Payment_For" class="form_label">Payment For</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="Payment_ForPrepend"><i class="fas fa-edit"></i></span>
                      </div>
                      <input type="text" name="Payment_For" class="form-control form-control-lg required" id="Payment_For" placeholder="Enter payment details" value="APPLICATION: ONE-TIME FAMILY FEE" aria-describedby="Payment_ForPrepend">
                      <div class="invalid-tooltip">
                        Please enter payment details
                      </div>
                    </div>
                  </div>

								<?php endif; ?>
							</div>
							<?php if(DONATION && RECURRING): ?>
							<div class="form-row">
								<div class="col-sm-12 mb-3">
									<div class="custom-control custom-control-lg custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" name="Recurring" id="Recurring" value="true">
										<label class="custom-control-label" for="Recurring">Make this transaction </label>
									</div>
                  <select name="Recurring_Frequency" disabled class="custom-select custom-control-inline col-sm-4 col-md-3 col-lg-2" id="Recurring_Frequency">
                    <option value="Day">Daily</option>
                    <option value="Week">Weekly</option>
                    <option selected value="Month">Monthly</option>
                    <option value="Year">Yearly</option>
                  </select>
								</div>
							</div>
						<?php endif; ?>
            <?php else: ?>
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="Payment_For">Payment</label>
                    <div class="input-group">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text" id="Payment_ForPrepend"><i class="fas fa-money-bill-alt"></i></span>
                      </div> -->
                      <select class="custom-select form-control-lg required" name="Payment_For">
                        <option value="" selected disabled hidden>Select Payment</option>
                        <?php foreach ($payments as $key => $value): ?>
                          <?php if ($value==''): ?>
                            <option value="<?= $key; ?>" data-amount="<?= $value; ?>"><?= $key; ?></option>
                          <?php elseif(is_array($value)): ?>
                              <optgroup label="<?= $key; ?>">
                            <?php foreach ($value as $key2 => $value2): ?>
                              <?php if ($value2==''): ?>
                                <option value="<?= $key2; ?>" data-amount="<?= $value2; ?>"><?= $key2; ?></option>
                              <?php elseif(strpos($value2, '|') !== false): ?>
                                <?php $minmax2 = explode('|', $value2); ?>
                                <option value="<?= $key2; ?> [$<?= number_format((float)$minmax2[0], 2, '.', ''); ?> - $<?= number_format((float)$minmax2[1], 2, '.', ''); ?>]" data-amount="<?= $value2; ?>"><?= $key2; ?> [$<?= number_format((float)$minmax2[0], 2, '.', ''); ?> - $<?= number_format((float)$minmax2[1], 2, '.', ''); ?>]</option>
                              <?php else: ?>
                                <option value="<?= $key2; ?> [$<?= number_format((float)$value2, 2, '.', ''); ?>]" data-amount="<?= number_format((float)$value2, 2, '.', ''); ?>"><?= $key2; ?> [$<?= number_format((float)$value2, 2, '.', ''); ?>]</option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                            </optgroup>
                          <?php elseif(strpos($value, '|') !== false): ?>
                            <?php $minmax = explode('|', $value); ?>
                            <option value="<?= $key; ?> [$<?= number_format((float)$minmax[0], 2, '.', ''); ?> - $<?= number_format((float)$minmax[1], 2, '.', ''); ?>]" data-amount="<?= $value; ?>"><?= $key; ?> [$<?= number_format((float)$minmax[0], 2, '.', ''); ?> - $<?= number_format((float)$minmax[1], 2, '.', ''); ?>]</option>
                          <?php else: ?>
                            <option value="<?= $key; ?> [$<?= number_format((float)$value, 2, '.', ''); ?>]" data-amount="<?= number_format((float)$value, 2, '.', ''); ?>"><?= $key; ?> [$<?= number_format((float)$value, 2, '.', ''); ?>]</option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                      <!-- <input type="text" name="Payment_For" class="form-control form-control-lg required" id="Payment_For" placeholder="Enter payment details" aria-describedby="Payment_ForPrepend"> -->
                      <div class="invalid-tooltip">
                        Please select a payment option
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="Amount">Amount <i id="amounttooltip" class="fas fa-question-circle" data-toggle="tooltip" title="Enter amount here." style="display:none;"></i></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="AmountPrepend"><i class="fas fa-dollar-sign"></i></span>
                      </div>
                      <input type="number" step="0.01" min="0.01" name="Amount" class="form-control form-control-lg required" id="Amount" placeholder="0.00" aria-describedby="AmountPrepend" readonly />
                      <div class="invalid-tooltip">
                        Please provide a valid amount
                      </div>
                    </div>
                  </div>
              </div>
          <?php endif; ?>
            <hr>
            <!-- <div class="form-row">
  								<div class="col-sm-12">
  									<legend>Personal Information</legend>
  								</div>
  							</div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="First_Name">Full Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" name="First_Name" class="form-control form-control-lg required" id="First_Name" placeholder="First Name">
                      <input type="text" name="Last_Name" class="form-control form-control-lg required" id="Last_Name" placeholder="Last Name">
                      <div class="invalid-tooltip">
                        Please enter your name
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="Email">Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id=""><i class="fas fa-envelope"></i></span>
                      </div>
                      <input type="email" name="Email" class="form-control form-control-lg required" id="Email" placeholder="Enter your email address">
                      <div class="invalid-tooltip">
                        Please enter a valid email address
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="Phone">Phone Number</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="tel" name="Phone" class="form-control form-control-lg" id="Phone" placeholder="Enter your phone number (optional)">
                      <div class="invalid-tooltip"></div>
                    </div>
                  </div>
								 </div>
                 <div class="form-row">
                   <div class="col-md-12 mb-3">
                     <label for="Additional_Information">Additional Information (optional)</label>
                     <div class="input-group">
                       <div class="input-group-prepend">
                         <span class="input-group-text" id=""><i class="fas fa-sticky-note"></i></span>
                       </div>
                       <textarea name="Additional_Information" class="form-control form-control-lg" id="Additional_Information" placeholder="Enter any additional information" rows="3"></textarea>
                       <div class="invalid-tooltip">

                       </div>
                     </div>
                   </div>
                 </div> -->
						<hr/>
                  <div class="form-row">
                     <div class="col-md-12 mb-3">
                         <div id="form_recaptcha" class="required"></div>
                         <!-- <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="== xxxxxx =="></div> -->
                     </div>
                  </div>
                  <hr/>
                  <?php if(TEST_EMAIL){ ?>
                     <!-- <div>hello</div> -->
                  <?php }else{ ?>
							<div class="form-row" <?php	if($gcount == 1){echo 'hidden';} ?>>
								<div class="col-sm-12">
									<legend>Payment Gateway</legend>
								</div>
							</div>

							<?php	if($gcount == 0): ?>
								<div class="alert alert-dismissible alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="fas fa-exclamation-triangle"></i> </strong> No payment gateway(s) enabled</div>
							<?php endif; ?>
							<div class="form-row" <?php	if($gcount == 1){echo 'hidden';} ?>>
								<div class="col-sm-12 mb-3">
										<div class="btn-group-toggle payment-gateway" data-toggle="buttons">
											<?php if ($gateways['paypal']): ?>
												<label class="btn btn-lg btn-outline-primary mb-1">
													<input type="radio" name="gateway" autocomplete="off" value="paypal" <?= (($gcount == 1) && $gateways['paypal'])?'checked':''; ?> />
													<img src="payment-assets/img/paypal.png" alt="PayPal">
												</label>
											<?php endif; ?>
											<?php if ($gateways['authorize']): ?>
											<label class="btn btn-lg btn-outline-primary mb-1">
												<input type="radio" name="gateway" autocomplete="off" value="authorize" <?= (($gcount == 1) && $gateways['authorize'])?'checked':''; ?> />
												<img src="payment-assets/img/authorize.png" alt="Authorize.Net">
											</label>
											<?php endif; ?>
											<?php if ($gateways['stripe']): ?>
											<label class="btn btn-lg btn-outline-primary mb-1">
												<input type="radio" name="gateway" autocomplete="off" value="stripe" <?= (($gcount == 1) && $gateways['stripe'])?'checked':''; ?> />
												<img src="payment-assets/img/stripe.png" alt="Stripe">
											</label>
											<?php endif; ?>
											<?php if ($gateways['payeezy']): ?>
											<label class="btn btn-lg btn-outline-primary mb-1">
												<input type="radio" name="gateway" autocomplete="off" value="payeezy" <?= (($gcount == 1) && $gateways['payeezy'])?'checked':''; ?> />
												<img src="payment-assets/img/payeezy.png" alt="Payeezy">
											</label>
											<?php endif; ?>
                      <?php if ($gateways['square']): ?>
                      <label class="btn btn-lg btn-outline-primary mb-1">
                        <input type="radio" name="gateway" autocomplete="off" value="square" <?= (($gcount == 1) && $gateways['square'])?'checked':''; ?> />
                        <img src="payment-assets/img/square.png" alt="Square">
                      </label>
                      <?php endif; ?>
										</div>
								</div>
							</div>
							<div id="creditcard">
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-row">
											<div class="col-md-12 text-left mb-3">
												<div class="card-wrapper mb-3"></div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-12 mb-3">
												<label for="Card_Number">Card Number <i class="fas fa-question-circle" data-toggle="tooltip" title="The (typically) 16 digits on the front of your credit card."></i></label>
												<div class="input-group">
													<div class="input-group-prepend">
												    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
												  </div>
													<input type="text" name="number" class="form-control form-control-lg required" id="Card_Number" placeholder="•••• •••• •••• ••••">
													<input type="hidden" name="type">
													<div class="invalid-tooltip">
														Please enter your card number.
													</div>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-12 mb-3">
												<label for="Card_FName">Name on Card <i class="fas fa-question-circle" data-toggle="tooltip" title="The name printed on the front of your credit card."></i></label>
												<div class="input-group">
												  <div class="input-group-prepend">
												    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
												  </div>
												  <input type="text" name="fname" class="form-control form-control-lg required" id="Card_FName" placeholder="First Name">
												  <input type="text" name="lname" class="form-control form-control-lg required" id="Card_LName" placeholder="Last Name">
													<div class="invalid-tooltip">
														Please enter your name.
													</div>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6 mb-3">
												<label for="Card_Expiry_Date">Expiry Date <i class="fas fa-question-circle" data-toggle="tooltip" title="The date your credit card expires, typically on the front of the card."></i></label>
												<div class="input-group">
													<div class="input-group-prepend">
												    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
												  </div>
													<input type="text" name="expiry" class="form-control form-control-lg required" id="Card_Expiry_Date" placeholder="MM / YYYY">
													<div class="invalid-tooltip">
														Please enter your card expiry date.
													</div>
												</div>
											</div>
											<div class="col-md-6 mb-3">
												<label for="Card_Security_Code">Security Code <i class="fas fa-question-circle" data-toggle="tooltip" title="The 3 digit (back) or 4 digit (front) value on your card."></i></label>
												<div class="input-group">
													<div class="input-group-prepend">
												    <span class="input-group-text" id=""><i class="fas fa-lock"></i></span>
												  </div>
													<input type="text" name="cvc" class="form-control form-control-lg required" id="Card_Security_Code" placeholder="CVV/CVC">
													<div class="invalid-tooltip">
														Please enter your card security code (CVV/CVC).
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

              <div id="squareform" style="display:none;">
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="Card_Number">Card Number <i class="fas fa-question-circle" data-toggle="tooltip" title="The (typically) 16 digits on the front of your credit card."></i></label>
                      <div id="sq-card-number"></div>
                    </div>
                </div>
                <div class="form-row">
                  <div class="col-md-3 mb-3">
                    <label for="Card_Security_Code">Security Code <i class="fas fa-question-circle" data-toggle="tooltip" title="The 3 digit (back) or 4 digit (front) value on your card."></i></label>
                      <div id="sq-cvv"></div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="Card_Expiry_Date">Expiry Date <i class="fas fa-question-circle" data-toggle="tooltip" title="The date your credit card expires, typically on the front of the card."></i></label>
                      <div id="sq-expiration-date"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="Postal_Code">Postal Code <i class="fas fa-question-circle" data-toggle="tooltip" title="Enter your postal code."></i></label>
                      <div id="sq-postal-code"></div>
                    </div>
                </div>
              </div>

<?php } ?>
								<div id="btn-row" class="form-row">
                                           <div class="col-md-4 col-sm-6">
                                             <div class="form-group">
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <span class="input-group-text" id="AmountPrepend"><b>Total:</b></span>
                                                 </div>
                                                 <input type="text" class="form-control form-control-lg text-right amount" value="$0.00" style="font-weight:bold;" disabled>
                                                 <div class="input-group-append recurring" style="display:none;">
                                                   <span class="input-group-text" id="recurringfreq"></span>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group">

                                  <div id="paypal-button-container" hidden></div>
                                  <?php if(TEST_EMAIL){ ?>
                                     <button id="btn-submit-id" class="btn btn-lg btn-primary btn-lg btn-submit" type="submit" name="method"><i class="fas fa-envelope"></i> Send Test Email</button>
                                 <?php }else{ ?>
                                   <button id="btn-submit-id" class="btn btn-lg btn-primary btn-lg btn-submit" type="submit" name="method"><i class="fas fa-lock"></i> <?=$btn_text;?> Now</button>
                                <?php } ?>
                              </div>
									</div>
								</div>
              </div>


          <input type="hidden" id="card-nonce" name="nonce">
				</fieldset>
			</form>
		</div>

    <?php if ($gateways['paypal']): ?>
      <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <?php endif; ?>
		<script src="payment-assets/js/jquery-3.3.1.min.js"></script>
    <?php if ($gateways['authorize'] || $gateways['payeezy']): ?>
		    <script src="payment-assets/js/jquery.card.js"></script>
    <?php endif; ?>
		<script src="payment-assets/js/popper.min.js"></script>
		<script src="payment-assets/js/bootstrap.min.js"></script>
    <?php if ($gateways['stripe']): ?>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <?php endif; ?>
    <?php if ($gateways['square']): ?>
    <script src="<?= (TEST_MODE)?"https://js.squareupsandbox.com/v2/paymentform":"https://js.squareup.com/v2/paymentform";?>"></script>
    <?php endif; ?>
		<script type="text/javascript">
			$(document).ready(function(){

         $('#form_recaptcha .recaptcha-checkbox-checkmark').addClass('required');

        var amount = 0;

        $('[data-toggle="tooltip"]').tooltip();

        <?php if(!empty($payments)): ?>
          $('select[name="Payment_For"]').on('change', function(){
            var amt = $(this).find('option:selected').data('amount');
            $('#amounttooltip').attr('data-original-title','Enter amount here').hide();
            $('input[name="Amount"]').attr('min','0.01').removeAttr('max');
            if(amt==''){
              $('#Amount').prop('readonly', false);
              $('#amounttooltip').show();
              setTimeout(function(){ $('input[name="Amount"]').focus().select(); }, 0);
            }else if(amt.indexOf('|') != -1){
              $('#Amount').prop('readonly', false);
              var minmax = amt.split('|');
              $('#amounttooltip').attr('data-original-title','Enter amount between $'+minmax[0]+' and $'+minmax[1]).show();
              $('input[name="Amount"]').attr('min',minmax[0]).attr('max',minmax[1]);
              setTimeout(function(){ $('input[name="Amount"]').focus().select(); }, 0);
            }else {
              $('#Amount').prop('readonly', true);
            }
            setamount(amt);
          });
        <?php endif; ?>
        <?php if ($gateways['authorize'] || $gateways['payeezy']): ?>
        document.getElementsByName('number')[0].addEventListener('payment.cardType', function(e) {
          var card_type;
          switch (e.detail) {
            case 'amex':
              card_type = 'A';
              break;
            case 'mastercard':
              card_type = 'M';
              break;
            case 'visa':
              card_type = 'V';
              break;
            case 'discover':
              card_type = 'D';
              break;
            default:
              card_type = '';
          }
          $('input[name="type"]').val(card_type);
        });
        $('#creditcard input').prop('disabled',true);
				$('form').card({
          width: 320,
					form: 'form',
					container: '.card-wrapper',
					formSelectors: {
					   nameInput: 'input[name="fname"], input[name="lname"]'
					},
					placeholders: {
							number: '•••• •••• •••• ••••',
							name: 'Name on Card',
							expiry: '••/••••',
							cvc: '•••'
					}
					});
        <?php endif; ?>
        <?php if ($gateways['square']): ?>
        var paymentForm = new SqPaymentForm({
          applicationId: "<?= SQUARE_APPLICATION_ID; ?>",
          locationId: "<?= SQUARE_LOCATION_ID; ?>",
          inputClass: 'sq-input',
          autoBuild: false,
          inputStyles: [{
            fontSize: '18px',
            fontFamily: 'Arial',
            padding: '15px',
            color: '#373F4A',
            lineHeight: '24px',
            placeholderColor: '#BDBFBF'
          }],

          cardNumber: {
            elementId: 'sq-card-number',
            placeholder: '•••• •••• •••• ••••'
          },
          cvv: {
            elementId: 'sq-cvv',
            placeholder: 'CVV'
          },
          expirationDate: {
            elementId: 'sq-expiration-date',
            placeholder: 'MM/YY'
          },
          postalCode: {
            elementId: 'sq-postal-code'
          },
          callbacks: {
            cardNonceResponseReceived: function(errors, nonce, cardData, billingContact, shippingContact) {
              if (errors) {
                // Log errors from nonce generation to the Javascript console
                var errorlist = '<b>Error(s):</b><br>';
                errors.forEach(function(error) {
                  errorlist += error.message+'<br>';
                });
                $('#alert').removeClass().attr('hidden', false).addClass('alert alert-danger').show();
                $('#alert p').html('<b><i class="fas fa-exclamation-triangle"></i></b> '+errorlist);

                return;
              }
              $('#paymentform').prepend('<input type="hidden" name="square_token" value="'+nonce+'" />');
              getajax();
              $('input[name="square_token"]').remove();

            },
            paymentFormLoaded: function() {

            }
          }
        });
        function squarehandler() {
          paymentForm.requestCardNonce();
        }
        <?php endif; ?>
        <?php if(TEST_EMAIL): ?>
            	$('#btn-row').fadeIn();
       <?php endif; ?>
				<?php	if($gcount == 1): ?>
					setgateway('<?=$gatewayname[0];?>');
				<?php	endif; ?>
        <?php	if($gcount > 1): ?>
				$('input[name="gateway"]').on('change',function(){
					var gateway = $(this).val();
					setgateway(gateway);
				});
        <?php	endif; ?>
        function setgateway(gateway){
					if(gateway=='paypal'){
            $('#paypal-button-container').prop('hidden',false);
            $('#squareform').fadeOut();
            $('.btn-submit').hide();
						$('#creditcard').fadeOut();
						$('#creditcard input').prop('disabled',true);
					}else if(gateway=='authorize' || gateway=='payeezy'){
            $('#squareform').fadeOut();
            $('#paypal-button-container').prop('hidden',true);
            $('.btn-submit').show();
						$('#creditcard').fadeIn();
						$('#creditcard input').prop('disabled',false);
					}else if(gateway=='stripe'){
            $('#squareform').fadeOut();
            $('#paypal-button-container').prop('hidden',true);
            $('.btn-submit').show();
						$('#creditcard').fadeOut();
						$('#creditcard input').prop('disabled',true);
          }else if(gateway=='square'){
            $('#paypal-button-container').prop('hidden',true);
            $('#squareform').fadeIn();
            $('.btn-submit').show();
            $('#creditcard').fadeOut();
            $('#creditcard input').prop('disabled',true);
            if(!$('.sq-input')[0]){
              paymentForm.build();
            }
          }else{
            $('#paypal-button-container').prop('hidden',true);
            $('#squareform').fadeOut();
            $('.btn-submit').show();
						$('#creditcard').fadeOut();
						$('#creditcard input').prop('disabled',true);
					}
					$('.btn-submit').val(gateway);
					$('#btn-row').fadeIn();
				}
        <?php if(DONATION && RECURRING): ?>
        $('input[name="Recurring"]').on('change',function(){
					if($(this).is(':checked')){
              $('.recurring').show();
              $('#recurringfreq').html('<b>'+$('select[name="Recurring_Frequency"]').find('option:selected').text()+'</b>');
              $('select[name="Recurring_Frequency"]').prop('disabled',false);
          }else {
            $('select[name="Recurring_Frequency"]').prop('disabled',true);
            $('.recurring').hide();
          }
				});
        $('select[name="Recurring_Frequency"]').on('change',function(){
          $('#recurringfreq').html('<b>'+$(this).find('option:selected').text()+'</b>');
				});
        <?php endif; ?>

        <?php if(DONATION && !empty($donation_amounts)): ?>
  				$('input[name="payment"]').on('change', function(){
  					var amount = $('input[name="payment"]:checked').val();
  					if(amount!='Other'){
              setamount(amount);
  					}else {
  						setTimeout(function(){ $('input[name="Amount"]').focus().select(); }, 0);
  					}
  				});
          <?php endif; ?>

				$('input[name="Amount"]').on('change', function(){
					// if($(this).val()){
						setamount($(this).val());
						<?php if(DONATION): ?>
						$('input[name="payment"][value="Other"]').trigger('click');
						<?php endif; ?>
					// }
				});

        function setamount(num){
          if(num=='')
            amount = 0;
          else if(num.indexOf("|") >= 0)
            amount = num.split('|')[0];
          else
            amount = num;
          $('input[name="Amount"]').val(parseFloat(amount).toFixed(2));
          <?php if(!TEST_EMAIL): ?>
             $('.btn-submit').html('<i class="fas fa-lock"></i> <?=$btn_text; ?> $'+amount);
         <?php endif; ?>
             $('.amount').val('$'+parseFloat(amount).toFixed(2));

        }

        function showsuccess(trans){
          $('#coverpage').html('<div class="successpage col-md-12 text-center"><div class="mt-4"><i class="fas fa-check-circle fa-9x text-success" ></i><h2>Your transaction with the amount of $'+amount+' was completed successfully</h2><?php if(!TEST_EMAIL): ?><h3 class="mb-5">Transaction ID: <b>'+trans+'</b></h3><?php endif; ?><p><a href="" class="btn btn-primary btn-lg">Go Back</a></p></div></div>');
          $('#coverpage').fadeIn();
        }

        function getajax(){
          var buttontext = $('.btn-submit').html();
					$('.btn-submit').html('Please Wait <i class="fas fa-spinner fa-spin"></i>').prop('disabled', true);
          var formdata = $('#paymentform').serialize();
          $.ajax({
            type: "POST",
            url: "<?php (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>ajax-payment.php",
            data: formdata,
            success: function(result){
              $('.btn-submit').html(buttontext).prop('disabled', false);
              $('html,body').animate({scrollTop:0},500);
							if(is_json(result)){
                var obj = JSON.parse(result);
                $('.required').attr('required', true);
                $('#paymentform').addClass('was-validated');
                $('#alert').removeClass().attr('hidden', false).addClass('alert alert-'+obj.status);
					$('#alert p').html(obj.response);
					if(obj.link){
                        getlink(obj.link);
                    }
                if(obj.status == 'success'){
                  showsuccess(obj.link);
                }
              }else {
                $('#alert').removeClass().attr('hidden', false).addClass('alert alert-warning');
                $('#alert p').html(result);
              }
			    },
            error: function(xhr){
              $('.btn-submit').html(buttontext).prop('disabled', false);
              $('html,body').animate({scrollTop:0},500);
              $('#alert').removeClass().attr('hidden', false).addClass('alert alert-danger');
              $('#alert p').html('<b>Error: </b> No response from the server.');
            }
          });
        }

        function getlink(link){
          if($('.btn-submit').val() == 'stripe' && link == 'token'){
              stripehandler();
          }else if ($('.btn-submit').val() == 'square' && link == 'token') {
            squarehandler();
          }
        }
        $('#paymentform').on('submit', function(e){
    	    e.preventDefault();
            getajax();
    	});

        function is_json(variable){
          var IS_JSON = true;
           try
           {
              var obj = JSON.parse(variable);
           }
           catch(err)
           {
              IS_JSON = false;
           }
           return IS_JSON;
        }

        function getFormData($form){
          var unindexed_array = $form.serializeArray();
          var indexed_array = {};

          $.map(unindexed_array, function(n, i){
              indexed_array[n['name']] = n['value'];
          });

          return indexed_array;
        }


    <?php if ($gateways['paypal']): ?>
        paypal.Button.render({
            env: '<?= (TEST_MODE)?'sandbox':'production' ?>',
            commit: true,
            style: {
              // label: 'pay',
              size:  'responsive', // small | medium | large | responsive
              shape: 'rect',   // pill | rect
              color: 'gold',   // gold | blue | silver | black
              layout: 'vertical',
              // fundingicons: 'true'
            },
            funding: {
              allowed: [ paypal.FUNDING.CARD  ],
              disallowed: [ paypal.FUNDING.CREDIT ]
            },
            payment: function(data, actions) {
              // return actions;
                // Set up a url on your server to create the payment
                var CREATE_URL = "<?php (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>ajax-payment.php?paypal=direct";
                // Make a call to your server to set up the payment
                 var formdata = getFormData($('#paymentform'));
                   return paypal.request({method:'post',url:CREATE_URL, data: formdata}).then(function(obj) {
                     $('html,body').animate({scrollTop:0},500);
      							if(obj.status!= undefined){
                      if(obj){
        								$('#alert').removeClass().attr('hidden', false).addClass('alert alert-'+obj.status);
        								$('#alert p').html(obj.response);
        								if(obj.validate){
        									$('.required').attr('required', true);
        									$('#paymentform').addClass('was-validated');
        								}
        								if(obj.link){
        									return obj.link;
        								}
                        try{
                          return false
                        }catch(err){
                          console.log(err);
                        }

        							}
                    }else {
                      $('#alert').removeClass().attr('hidden', false).addClass('alert alert-warning');
                      $('#alert p').html(obj);
                    }
                });
            },
            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {
                // Set up a url on your server to execute the payment
                var EXECUTE_URL = "<?php (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>ajax-payment.php?paypal=return";
                // Set up the data you need to pass to your server
                var data = {
                    paymentID: data.paymentToken,
                    payerID: data.payerID,
                    gateway: 'paypal'
                };
                // Make a call to your server to execute the payment
                return paypal.request.post(EXECUTE_URL, data)
                    .then(function (obj) {
                      $('html,body').animate({scrollTop:0},500);
                         if(obj.status!= undefined){
                           if(obj){
                             $('#alert').removeClass().attr('hidden', false).addClass('alert alert-'+obj.status).show();
                             $('#alert p').html(obj.response);
                             if(obj.validate){
                               $('.required').attr('required', true);
                               $('#paymentform').addClass('was-validated');
                             }
                             if(obj.status == 'success'){
                               showsuccess(obj.link);
                             }
                             if(obj.link){
                               return obj.link;
                             }
                             return false;
                           }
                         }else {
                           $('#alert').removeClass().attr('hidden', false).addClass('alert alert-warning').show();
                           $('#alert p').html(obj);
                         }
                    });
            },
            onCancel: function(){
              $('#alert').removeClass().attr('hidden', false).addClass('alert alert-warning').show();
              $('#alert p').html('<b><i class="fas fa-exclamation-triangle"></i></b> Payment has been cancelled.');
            }
        }, '#paypal-button-container');
    <?php endif; ?>


    <?php if ($gateways['stripe']): ?>
    var token_triggered = false;
    var handler = StripeCheckout.configure({
      key: '<?= STRIPE_PUBLISHABLE_KEY; ?>',
      // image: 'payment-assets/img/stripe.png',
      token: function(token, args) {
        token_triggered = token.id;
        $('#paymentform').prepend('<input type="hidden" name="stripe_token" value="'+token_triggered+'" />');
        getajax();
        $('input[name="stripe_token"]').remove();
      },
      closed: function() {
        if (token_triggered) {
          $('#alert').removeClass().attr('hidden', false).addClass('alert alert-info').show();
          $('#alert p').html('<b><i class="fas fa-spinner fa-spin"></i></b> Please Wait...');
         } else {
           $('#alert').removeClass().attr('hidden', false).addClass('alert alert-info').show();
           $('#alert p').html('<b><i class="fas fa-exclamation-triangle"></i></b> Payment has been cancelled.');
         }
       }
    });

    $(window).on('popstate', function() {
      handler.close();
    });

    function stripehandler(){
      handler.open({
        name: '<?= COMPANY_NAME; ?>',
        description: '<?= FORM_NAME; ?>',
        amount: amount * 100
      });
    }
      <?php endif; ?>
      $('#coverpage').fadeOut();
});

		</script>
      <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	</body>
</html>



<?php
   include('includes/header.php');
?>

<script>
// JavaScript validation - server-side validation is ALSO necessary
window.onload = function() {
  var recaptcha = document.forms.namedItem("contactForm")["g-recaptcha-response"];
  recaptcha.required = true;
  recaptcha.oninvalid = function(e) {
    // do something
    alert("Please indicate that you are not a robot.");
  }
}
</script>

<!-- Full Width Image Header with Logo -->
<!-- Image backgrounds are set within the full-width-pics.css file. -->
<header class="image-bg-fluid-height">
   <h1>CONTACT</h1>
</header>
<!-- Page Content -->
<?php
   if (isset($_POST['Submit'])) {
   	$name = $_POST['name'];
   	$company = $_POST['company'];
   	$phone = $_POST['phone'];
   	$email = $_POST['email'];
   	$address = $_POST['address'];
   	$city = $_POST['city'];
   	$state = $_POST['state'];
   	$zip = $_POST['zip'];
   	$country = $_POST['country'];
   	$comments = $_POST['comments'];

           if(!empty($_POST['interests'])) {
               foreach($_POST['interests'] as $check) {
                   $interests[] = $check;
                   }
           }

   	$vreason = "<p>The following errors occured:</p>
   		<ul>";

   	if ($name == "") {
   		$vname = false;
   		$vreason .= '<li>Please fill in the <strong>Name</strong> field</li>';
   	} else {
   		$vname = true;
   	}
   	if ($email == "") {
   		$vemail = false;
   		$vreason .= '<li>Please fill in the <strong>Email</strong> field</li>';
   	} else {
   		$vemail = true;
   	}
   	if ($company == "") {
   		$vcompany = false;
   		$vreason .= '<li>Please fill in the <strong>Company</strong> field</li>';
   	} else {
   		$vcompany = true;
   	}
    if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
        echo '<h3>Please check the the captcha form.</h3>';
        exit;
    }
    $secretKey = "6LfViQgUAAAAAFSMGqV-6BCDQEU4-EOjbr-0rMP6";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
        echo '<h3>Thank you for spamming.  Have a spammy day.</h3>';
    } else {
        /*echo '<h3>Thank you for your inquiry.</h3>';*/
    }

   $headers = 'From: noreply@ahclogisticsllc.com' . "\r\n" .
   'Reply-To: noreply@ahclogisticsllc.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
   $emailmessage = "AHC Logistics Contact Form Submission\r
   Name: ".$name."\r
   Email: ".$email."\r
   Company: ".$company."\r
   Phone: ".$phone."\r
   Address: ".$address."\r
   City : ".$city."\r
   State: ".$state."\r
   Zip  : ".$zip."\r
   Country: ".$country."\r
   Interested In: " . implode( ", ",$interests ) . "\r
   Comments: ".$comments;"\r
   ";
   if ($vname !== false && $vemail !== false && $vcompany !== false && $vcaptcha !== false) {
     mail ("mike@levymgi.com", "AHC Logistics RFQ Form Submission", $emailmessage, $headers);
     mail ("amanda@levymgi.com", "AHC Logistics RFQ Form Submission", $emailmessage, $headers);
     mail ("fpidro@ahclogistics.com", "AHC Logistics RFQ Form Submission", $emailmessage, $headers);
     mail ("davelevy@levymgi.com", "AHC Logistics RFQ Form Submission", $emailmessage, $headers);
   	$confirmation = "<p style=\"font: bold 1.0em/1.0 Helvetica, Arial, sans-serif; color:#11568d; margin: 1em 0; \">Thank you. We will respond shortly.</p>";
    //$confirmation = $emailmessage;
   } else {
   	$confirmation = $vreason ."</ul>";
   }
   } else {
   	$confirmation ="";
   	$displayform = true;
   }

   ?>
<div class="container-fluid">
   <div class="row">
      <div class="container">
         <!-- Features Section -->
         <div class="row">
              <div class="col-xs-12">
                <?php echo $confirmation; ?>
                <h2>A Valuable Partner That Knows Your Markets</h2>
              </div>

               <div class="col-md-7">
                  <p>At AHC Logistics, we specialize in developing customized 3PL, brokerage and consulting solutions for customers in the steel manufacturing, metals service centers, building materials manufacturing and minerals production sectors.</p>
                  <p>For additional information about our capabilities, tell us briefly about your specific requirements.</p>
                  <p><em>Required fields marked*</em></p>

                  <form class="form" id="contactForm" method="post" action="contact.php">
                     <div class='warning'></div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="name">Name <sup>*</sup></label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="email">Email <sup>*</sup></label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" class="form-control" placeholder="Email" name="email" required>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="title">Title</label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                              <input type="text" class="form-control" placeholder="Job Title" name="title">
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="company">Company <sup>*</sup></label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                              <input type="text" class="form-control" placeholder="Company" name="company" required>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="phone">Phone</label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                              <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="address">Address</label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                              <input type="text" class="form-control" placeholder="Address" name="address">
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="city">City</label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                              <input type="text" class="form-control" placeholder="City" name="city">
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="state">State</label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group select-width">
                              <select class="form-control select-width" name="state">
                                 <option value="0">Select State</option>
                                 <option value="AL">Alabama</option>
                                 <option value="AK">Alaska</option>
                                 <option value="AZ">Arizona</option>
                                 <option value="AR">Arkansas</option>
                                 <option value="CA">California</option>
                                 <option value="CO">Colorado</option>
                                 <option value="CT">Connecticut</option>
                                 <option value="DE">Delaware</option>
                                 <option value="DC">District Of Columbia</option>
                                 <option value="FL">Florida</option>
                                 <option value="GA">Georgia</option>
                                 <option value="HI">Hawaii</option>
                                 <option value="ID">Idaho</option>
                                 <option value="IL">Illinois</option>
                                 <option value="IN">Indiana</option>
                                 <option value="IA">Iowa</option>
                                 <option value="KS">Kansas</option>
                                 <option value="KY">Kentucky</option>
                                 <option value="LA">Louisiana</option>
                                 <option value="ME">Maine</option>
                                 <option value="MD">Maryland</option>
                                 <option value="MA">Massachusetts</option>
                                 <option value="MI">Michigan</option>
                                 <option value="MN">Minnesota</option>
                                 <option value="MS">Mississippi</option>
                                 <option value="MO">Missouri</option>
                                 <option value="MT">Montana</option>
                                 <option value="NE">Nebraska</option>
                                 <option value="NV">Nevada</option>
                                 <option value="NH">New Hampshire</option>
                                 <option value="NJ">New Jersey</option>
                                 <option value="NM">New Mexico</option>
                                 <option value="NY">New York</option>
                                 <option value="NC">North Carolina</option>
                                 <option value="ND">North Dakota</option>
                                 <option value="OH">Ohio</option>
                                 <option value="OK">Oklahoma</option>
                                 <option value="OR">Oregon</option>
                                 <option value="PA">Pennsylvania</option>
                                 <option value="RI">Rhode Island</option>
                                 <option value="SC">South Carolina</option>
                                 <option value="SD">South Dakota</option>
                                 <option value="TN">Tennessee</option>
                                 <option value="TX">Texas</option>
                                 <option value="UT">Utah</option>
                                 <option value="VT">Vermont</option>
                                 <option value="VA">Virginia</option>
                                 <option value="WA">Washington</option>
                                 <option value="WV">West Virginia</option>
                                 <option value="WI">Wisconsin</option>
                                 <option value="WY">Wyoming</option>
                              </select>
                           </div>
                        </div>
                     </div>
                 <div class="">
                        <div class="col-lg-3">
                           <label for="name">Country</label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group select-width">
                           <select class="form-control select-width" name="country">
                                 <option value="" selected="selected">Select Country</option>
                                 <option selected="selected" value="United States">United States</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="American Samoa">American Samoa</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Anguilla">Anguilla</option>
                                 <option value="Antarctica">Antarctica</option>
                                 <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Aruba">Aruba</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bermuda">Bermuda</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Bouvet Island">Bouvet Island</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                 <option value="Brunei Darussalam">Brunei Darussalam</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Cayman Islands">Cayman Islands</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Christmas Island">Christmas Island</option>
                                 <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo">Congo</option>
                                 <option value="Cook Islands">Cook Islands</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Cote D'ivoire">Cote D'ivoire</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                 <option value="Faroe Islands">Faroe Islands</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="French Guiana">French Guiana</option>
                                 <option value="French Polynesia">French Polynesia</option>
                                 <option value="French Southern Territories">French Southern Territories</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Gibraltar">Gibraltar</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Greenland">Greenland</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guadeloupe">Guadeloupe</option>
                                 <option value="Guam">Guam</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guinea-bissau">Guinea-bissau</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hong Kong">Hong Kong</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="India">India</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea, Republic of">Korea, Republic of</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Macao">Macao</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Martinique">Martinique</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mayotte">Mayotte</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                 <option value="Moldova, Republic of">Moldova, Republic of</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montserrat">Montserrat</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Namibia">Namibia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="Netherlands Antilles">Netherlands Antilles</option>
                                 <option value="New Caledonia">New Caledonia</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="Niue">Niue</option>
                                 <option value="Norfolk Island">Norfolk Island</option>
                                 <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau">Palau</option>
                                 <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Pitcairn">Pitcairn</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Puerto Rico">Puerto Rico</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Reunion">Reunion</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russian Federation">Russian Federation</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="Saint Helena">Saint Helena</option>
                                 <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                 <option value="Saint Lucia">Saint Lucia</option>
                                 <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                 <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                 <option value="Swaziland">Swaziland</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                 <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Timor-leste">Timor-leste</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tokelau">Tokelau</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="United States">United States</option>
                                 <option value="Uruguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Viet Nam">Viet Nam</option>
                                 <option value="Virgin Islands, British">Virgin Islands, British</option>
                                 <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                 <option value="Wallis and Futuna">Wallis and Futuna</option>
                                 <option value="Western Sahara">Western Sahara</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                           <label for="zip" style="white-space: nowrap;">Zip/Postal Code*&nbsp;&nbsp;</label>
                        </div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                              <input type="text" class="form-control" placeholder="Zip / Postal Code" name="zip" required>
                           </div>
                        </div>
                     </div>
                     <br><br><p>&nbsp;</p>
                     <div class="">

                           <label for="zip">I'd like more information about </label>
                           <br>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-9">
                           <div class="input-group">
                              <br />
                              <input type="checkbox" name="interests[]" value="3PL"> 3PL<br />
                              <input type="checkbox" name="interests[]" value="Brokerage"> Brokerage<br />
                              <input type="checkbox" name="interests[]" value="Consulting"> Consulting<br />
                           </div>
                        </div>
                     </div>
                     <br style="clear:both">
                      <br style="clear:both">
                       <br style="clear:both">
                     <div class="">
                        <div class="col-lg-3">
                           <label for="comments">Comments</label>
                        </div>
                        <div class="col-lg-7">
                           <div class="input-group">
                              <textarea class="form-control" rows="8" cols="100" name="comments"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-7">
                           <!--<div class="input-group">
                              <?php
                                 /*echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; */
                                 ?>
                              <input type="text" class="form-control" placeholder="Captcha" name="captcha">
                           </div>-->

                           <!-- Google reCAPTCHA -->
                           <div class="g-recaptcha" data-sitekey="6LfViQgUAAAAAALnZYywDIAzvgvv727az_V63ghq"></div>
                           <!-- END Google reCAPTCHA -->
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3">
                           <input type="hidden" name="Submit" value="true" />
                           <input type='submit' class="btn btn-primary center" value='Submit' /><br /><br />
                        </div>
                        <div class="col-lg-3"></div>
                     </div>
                  </form>
               </div>
               <div class="col-md-5">
                  <div class="panel panel-default">
                     <div class="panel-heading">

                        <h4>AHC Logistics</h4>
                     </div>
                     <div class="contact-info">

                        2605 Nicholson Road<br>
					              Suite 5200<br>
                        Sewickley, PA 15143<br>
                        Phone: <strong>412-489-0011</strong> <br> Fax: <strong>412-489-0007</strong>
                        <hr />
                        Frank Pidro, Jr.<br />
                        Chief Operating Officer<br />
                        Office: <strong>412.324.0110</strong><br />
                        Cell: <strong>724.470.8429</strong><br />
                        <p style="font-size:13px"><a href="mailto:fpidro@ahclogistics.com?subject=Questions%2FComments">fpidro@ahclogistics.com</a></p>
                    </div>
                  </div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3028.852159660431!2d-80.10295588459253!3d40.61108537934297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883461fefb1d8d47%3A0x903f96fa874947ba!2sArrow+Material+Services!5e0!3m2!1sen!2sus!4v1449241700730" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                  <div>
                  </div>
               </div>
         </div>
      </div>
   </div>
</div>
<?php include('includes/footer.php'); ?>

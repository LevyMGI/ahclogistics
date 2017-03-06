<?php include "includes/header.php" ?>
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
<?php
   //simple captcha imple
   //session_start();


   if (isset($_POST['Submit'])) {
   	$name = $_POST['name'];
   	$company = $_POST['company'];
   	$phone = $_POST['phone'];
   	$email = $_POST['email'];
    $services_other = $_POST['services_other'];
    $category_other = $_POST['category_other'];

     if(!empty($_POST['services'])) {
         foreach($_POST['services'] as $check) {
             $services[] = $check;
             }
     }
     if(!empty($_POST['category'])) {
         foreach($_POST['category'] as $check) {
             $category[] = $check;
             }
     }
     if(!empty($_POST['time'])) {
         foreach($_POST['time'] as $check) {
             $time[] = $check;
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
        echo '<h1>Please check the the captcha form.</h1>';
        exit;
    }
    $secretKey = "6LfViQgUAAAAAFSMGqV-6BCDQEU4-EOjbr-0rMP6";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
        echo '<h1>Thank you for spamming.  Have a spammy day.</h1>';
    } else {
        //echo '<h2>Thanks for posting comment.</h2>';
    }

   $headers = 'From: noreply@ahclogisticsllc.com' . "\r\n" .
   'Reply-To: noreply@ahclogisticsllc.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
   $emailmessage = "AHC Logistics RFQ Form Submission\r
   Name: ".$name."\r
   Company: ".$company."\r
   Phone: ".$phone."\r
   Email: ".$email."\r
   Services need assistance with: " . implode( ", ",$services ) .  $services_other . "\r
   Categories best describing business: " . implode( ", ",$category ) .  $category_other . "\r
   Interested In: " . implode( ", ",$time )."\r
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

<!-- Upper hero and header -->
<div class="upper-background">
  <div class="hero-slider">
    <div class="hero-slide" id="hero1">
      <img src="img/3pl-hero.png" class="img-responsive" />
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 class="interior-header">RFQ</h1>
      </div>
    </div>
  </div>
</div>
<!-- end -->



<div class="container">
  <!-- Upper content -->
  <div class="row">
    <div class="col-xs-12">
      <h2>Ready to Help You Succeed</h2>
      <p>Please take a minute to answer these questions about your 3PL needs and related services.</p>
      <?php echo $confirmation; ?>
    </div>
  </div>
</div>
<!-- End upper content, begin lower repeating content -->
<div class="interior-rule">

</div>
<form class="form" id="contactForm" method="post" action="rfq.php">
  <div class='warning'></div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4">
         <label for="zip">For which types of services do you need assistance from AHC Logistics?</label>
          <div class="input-group">
             <input type="checkbox" name="services[]" value="3PL"> 3PL<br />
             <input type="checkbox" name="services[]" value="Brokerage"> Brokerage<br />
             <input type="checkbox" name="services[]" value="Consulting"> Consulting<br />
             <input type="checkbox" name="services[]" value="Other"> Other <input type="text" name="services_other" /><br />
             <br />
          </div>
      </div>
      <div class="col-xs-12 col-md-4">
        <label for="zip">Which category best describes your business?</label>
        <div class="input-group">
           <input type="checkbox" name="category[]" value="Steel Manufacturer"> Steel Manufacturer<br />
           <input type="checkbox" name="category[]" value="Metals Service Center"> Metals Service Center<br />
           <input type="checkbox" name="category[]" value="Building Materials Manufacturer"> Building Materials Manufacturer<br />
           <input type="checkbox" name="category[]" value="Minerals Producer"> Minerals Producer<br />
           <input type="checkbox" name="category[]" value="Other"> Other <input type="text" name="category_other" /><br />
           <br />
        </div>
      </div>
      <div class="col-xs-12 col-md-4">
        <label for="zip">How long have you been using your current provider of 3PL services?</label>
        <div class="input-group">
           <input type="checkbox" name="time[]" value="More than 5 years"> More than 5 years<br />
           <input type="checkbox" name="time[]" value="3-5 Years"> 3-5 Years<br />
           <input type="checkbox" name="time[]" value="1-3 Years"> 1-3 Years<br />
           <input type="checkbox" name="time[]" value="Less Than 1 Year"> Less than 1 year<br />
           <input type="checkbox" name="time[]" value="I’ve never worked with a 3PL company"> I’ve never worked with a 3PL company <br />
           <br />
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-3">
         <label for="name">Name <sup>*</sup></label>
      </div>
      <div class="col-xs-9">
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Your Name" name="name" required>
         </div>
      </div>
      <div class="col-xs-3">
         <label for="company">Company <sup>*</sup></label>
      </div>
      <div class="col-xs-9">
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
            <input type="text" class="form-control" placeholder="Company" name="company" required>
         </div>
      </div>
      <div class="col-xs-3">
         <label for="phone">Phone</label>
      </div>
      <div class="col-xs-9">
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" class="form-control" placeholder="Phone Number" name="phone">
         </div>
      </div>
      <div class="col-xs-3">
         <label for="email">Email <sup>*</sup></label>
      </div>
      <div class="col-xs-9">
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" placeholder="Email" name="email" required>
         </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
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
      <div class="col-lg-3"></div>
      <div class="col-lg-3">
         <br />
         <input type="hidden" name="Submit" value="true" />
         <input type='submit' class="btn btn-primary center" value='Submit' /><br /><br />
      </div>
    </div>
  </div>
</form>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="section-header">INDUSTRIES</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-3">
      <h2>Metals<br /> Service Centers</h2>
      <img src="img/industry-1.png" class="img-responsive" />
      <p class="blue-text">Adding Value to Value-Added Products</p>
      <p class="subtext">In today’s JIT manufacturing world, it’s essential to have a reliable partner for shipping coils, sheet, plate and strip to meet your customers’ unforgiving production schedules.</p>
      <a href="metals.php" class="learn-more">LEARN MORE</a>
    </div>
    <div class="col-xs-12 col-md-3">
      <h2>Steel<br /> Manufacturing</h2>
      <img src="img/industry-2.png" class="img-responsive" />
      <p class="blue-text">Strengthening Your Value<br /> to Customers</p>
      <p class="subtext">When you need plate, sheet, coil or special shapes moved by rail, truck or barge, depend on us.</p>
      <a href="steel.php" class="learn-more">LEARN MORE</a>
    </div>
    <div class="col-xs-12 col-md-3">
      <h2>Building Materials<br /> Manufacturers</h2>
      <img src="img/industry-3.png" class="img-responsive" />
      <p class="blue-text">The Foundation of Excellent Customer Relations</p>
      <p class="subtext">When product has to go to a jobsite or distributor, we have the ability to get everything from two-by-fours to drywall sheets to shingles wherever they need to be, whenever they need to be there.</p>
      <a href="building.php" class="learn-more">LEARN MORE</a>
    </div>
    <div class="col-xs-12 col-md-3">
      <h2>Minerals<br /> Producers</h2>
      <img src="img/industry-4.png" class="img-responsive" />
      <p class="blue-text">The Elements of Effective 3PL</p>
      <p class="subtext">When you need industrial minerals and other bulk commodities transported safely, quickly and cost-effectively, depend on us to move.</p>
      <a href="minerals.php" class="learn-more">LEARN MORE</a>
    </div>
  </div>
</div>
<?php include "includes/footer.php" ?>

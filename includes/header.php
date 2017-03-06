<!DOCTYPE html>
<?php $page = basename($_SERVER['PHP_SELF']); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>AHC Logistics LLC</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/mobilenav.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <!-- for mobile nav -->
  <div id="page-content">
  <!-- Header -->
  <div class="header">

  <!-- Nav -->
  <div class="nav">
    <!-- Mobile nav implementation -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="slide-nav">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="navbar-brand" href="#">Menu</a>
          <a class="mobile-backtotop">Back to Top<img src="img/up.png"></a>
        </div>
        <div id="slidemenu">
          <ul class="nav navbar-nav">
            <li><a class="toggle" href="index.php">Home</a></li>
            <li><a class="toggle" href="about.php">About</a></li>
            <li><a class="toggle" href="3pl.php">3PL</a></li>
            <li><a class="toggle" href="brokerage.php">Brokerage</a></li>
            <li><a class="toggle" href="consulting.php">Consulting</a></li>
            <li><a class="toggle" href="steel.php">Steel Manufacturers</a></li>
            <li><a class="toggle" href="metals.php">Metals Service Centers</a></li>
            <li><a class="toggle" href="buildings.php">Building Materials</a></li>
            <li><a class="toggle" href="minerals.php">Minerals Producers</a></li>
            <li><a class="toggle" href="rfq.php">RFQ</a></li>
            <li><a class="toggle" href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="container">
      <div class="row">
        <div class="col-xs-5">
          <a href="index.php"><img src="img/ahc-logo.png" class="header-content img-responsive" /></a>
        </div>
        <div class="col-xs-7">
          <img src="img/mysterious-phantom-chain.png" class="header-content img-responsive" />
        </div>
      </div>
    </div>

    <!-- Regular nav implementation -->
    <div class="desktop-nav" id="topnavbar">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="nav-wrapper">
            <ul class="navbar">
              <li><a href="index.php">Home</a></li><p>|</p>
              <li><a href="about.php">About</a></li><p>|</p>
              <li class="services-li"><p>Services</p>
                <div class="services-subnav">
                  <ul>
                    <li><a href="3pl.php">3PL</a></li>
                    <li><a href="brokerage.php">Brokerage</a></li>
                    <li><a href="consulting.php">Consulting</a></li>
                  </ul>
                </div>
              </li><p>|</p>
              <li class="industries-li"><p>Industries</p>
                <div class="industries-subnav">
                  <ul>
                    <li><a href="steel.php">Steel Manufacturers</a></li>
                    <li><a href="metals.php">Metals Service Centers</a></li>
                    <li><a href="building.php">Building Materials</a></li>
                    <li><a href="minerals.php">Minerals Producers</a></li>
                  </ul>
                </div>
              </li><p>|</p>
              <li><a href="rfq.php">RFQ</a></li><p>|</p>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

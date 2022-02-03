<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");
session_start();
$logout = $_GET['logout'];
if($logout==1){
    //echo "before :".$_SESSION['id'];
    $_SESSION['id']=0;
    session_destroy();
}


$id = $_SESSION['id'];
$username = array_shift(mysqli_fetch_array(mysqli_query($conn, "SELECT username FROM `User` WHERE `id`='$id'")));

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>DD2DD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .nav-user-info {
    background-color: #5969ff;
    line-height: 1.4;
    padding: 12px;
    color: #fff;
    font-size: 13px;
    border-radius: 2px 2px 0 0
    }
.nav-user-dropdown {}

.nav-user-dropdown .dropdown-item {
    display: block;
    width: 100%;
    padding: 12px 22px 15px;
    clear: both;
    font-weight: 400;
    color: #686972;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    font-size: 13px;
    line-height: 0.4
}

.nav-user-dropdown .dropdown-item:hover {
    background-color: #f7f7fb
}
}
      
  </style>
  
</head>

<body>
  <nav class="navbar" style="background-color:lightblue;color:white;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar" style="background-color:yellow;"></span>
          <span class="icon-bar" style="background-color:yellow;"></span>
          <span class="icon-bar" style="background-color:yellow;"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="logo.PNG" alt="logo" style="width:100%;height:30px;"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#">Our Services</a></li>
          <li><a href="#">User Guide</a></li>
          <?php 
         // if ($_SESSION['priv'] == 'admin') { 
            
          // }
          ?>
          <li><a href="admin/adminPage.php">Admin Page</a></li>
          <li><a href="#">About Us</a></li>
          <form class="navbar-form navbar-left" action="track.php">
            <div class="form-group">
              <input type="text" size="50" class="form-control" placeholder="Package Id">
            </div>
            <button type="submit" class="btn btn-danger">Track
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </form>


        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="user_Registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
           <?php 
          if ($_SESSION['id'] != 0 || $_SESSION['id'] != null) { ?>
            <li class="nav-item dropdown nav-user"> <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://img.icons8.com/dusk/100/000000/user-female-circle.png" alt="" width=30px;></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name"><?php echo $username ?></h5>
                        </div>
                        <a class="dropdown-item" onclick="location.href='account_detail.php?id=<?php echo $id; ?>';"><i class="fa fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="newpassword.php"><i class="fa fa-cog mr-2"></i>Change Password</a> 
                        <a class="dropdown-item" href="index.php?logout=1"><i class="fa fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
          <?php }
          else{
          ?>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>


  <center>
    <div class="container" style="width:80%;height:20%;">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="images/logo.PNG" alt="logo" style="width:100%;height:250px;">
          </div>

          <div class="item">
            <img src="images/flow.PNG" alt="flow" style="width:100%;height:250px;">
          </div>
          <div class="item">
            <img src="images/route.jpg" alt="flow" style="width:100%;height:250px;">
          </div>
          <div class="item">
            <img src="images/route.jpg" alt="flow" style="width:100%;height:250px;">
          </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <br><br>
    <img hidden id="loading" src="/loading.gif">


    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <p><a href="requestQuote.php" onclick=load();><button type="button" class="btn btn-primary btn-block btn-lg"><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;&nbsp;Request a Quote</button></a></p>
        </div>

        <div class="col-sm-3">
          <p><a href="booking.php" onclick=load();><button type="button" class="btn btn-success btn-block btn-lg"><i class="fa fa-cc-visa"></i>&nbsp;&nbsp;&nbsp;&nbsp;Book & Pay</button></a></p>
        </div>

        <div class="col-sm-3">
          <p><a href="" onclick=load();><button type="button" class="btn btn-warning btn-block btn-lg"><i class="fa fa-handshake-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;Partner With Us</button></a></p>
        </div>

        <div class="col-sm-3">
          <p><a href="" onclick=load();><button type="button" class="btn btn-info btn-block btn-lg"><i class="fa fa-address-book-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;Profile</button></a></p>
        </div>

      </div>
    </div>
    

  </center>
</body>


</html>

<script>
  function load() {
    document.getElementById('loading').hidden = false;
  }
</script>


<?php

// IP address 
$userIP =  $_SERVER['REMOTE_ADDR'];;

// API end URL 
$apiURL = 'https://freegeoip.app/json/' . $userIP;

// Create a new cURL resource with URL 
$ch = curl_init($apiURL);

// Return response instead of outputting 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute API request 
$apiResponse = curl_exec($ch);

// Close cURL resource 
curl_close($ch);

// Retrieve IP data from API response 
$ipData = json_decode($apiResponse, true);

if (!empty($ipData)) {
  $country_code = $ipData['country_code'];
  $country_name = $ipData['country_name'];
  $region_code = $ipData['region_code'];
  $region_name = $ipData['region_name'];
  $city = $ipData['city'];
  $zip_code = $ipData['zip_code'];
  $latitude = $ipData['latitude'];
  $longitude = $ipData['longitude'];
  $time_zone = $ipData['time_zone'];

  //echo 'Country Name: '.$country_name.'<br/>'; 
  //echo 'Country Code: '.$country_code.'<br/>'; 
  //echo 'Region Code: '.$region_code.'<br/>'; 
  //echo 'Region Name: '.$region_name.'<br/>'; 
  //echo 'City: '.$city.'<br/>'; 
  //echo 'Pincode: '.$zip_code.'<br/>'; 
  //echo 'Latitude: '.$latitude.'<br/>'; 
  //echo 'Longitude: '.$longitude.'<br/>'; 
  //echo 'Time Zone: '.$time_zone; 
} else {
  echo 'IP data is not found!';
}


?>
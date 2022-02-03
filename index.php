<?php 
//Databse Connection file
$rootpath = dirname(__DIR__,1);
include($rootpath.'/db/db_dd2dd.php');
date_default_timezone_set("Asia/Kolkata");

session_start();
$logout = $_GET['logout'];
if ($logout == 1) {
    //echo "before :".$_SESSION['id'];
    $_SESSION['id'] = 0;
    session_destroy();
}


$id = $_SESSION['id'];
$username = array_shift(mysqli_fetch_array(mysqli_query($conn, "SELECT username FROM `User` WHERE `id`='$id'")));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>DD2DD Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function myFunction(val) {
            
            document.getElementById('track').placeholder= val;
        }
    </script>
    <style>
        body {
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
            color: #818181;
        }

        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #303030;
            font-weight: 600;
            margin-bottom: 30px;

        }

        h4 {
            font-size: 19px;
            line-height: 1.375em;
            color: #303030;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .values4 {
            text-align: center;
            border-radius: 10px 10px 10px 10px;
            border: 1.5px;
            border-color: red;
            border-style: solid;
            background-color: #f4511e;

        }

        .jumbotron {
            background-color: #CEE5D0;
            color: #fff;
            padding: 100px 25px;
            font-family: Montserrat, sans-serif;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .bg-grey {
            background-color: #f6f6f6;
        }

        .bg-green {
            background-color: #CEE5D0;
        }

        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }

        .logo {
            color: green;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .carousel-control.right,
        .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }

        .carousel-indicators li {
            border-color: #f4511e;
        }

        .carousel-indicators li.active {
            background-color: #f4511e;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel {
            border: 1px solid #f4511e;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid #f4511e;
            background-color: #fff !important;
            color: #f4511e;
        }

        .panel-heading {
            color: #fff !important;
            background-color: #f4511e !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel-footer h3 {
            font-size: 25px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #f4511e;
            color: #fff;
        }

        .navbar {
            margin-bottom: 0;
            background-color: #f4511e;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }

        .navbar li a,
        .navbar .navbar-brand {
            color: #fff !important;
        }

        .navbar-nav li a:hover,
        .navbar-nav li.active a {
            color: #f4511e !important;
            background-color: #fff !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }

        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: #f4511e;
        }

        .slideanim {
            visibility: hidden;
        }

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }

        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }

            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }

        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }

            .btn-lg {
                width: 100%;
                margin-bottom: 35px;
            }
        }

        @media screen and (max-width: 480px) {
            .logo {
                font-size: 150px;
            }
        }

        .nav-user-info {
            background-color: #f4511e;
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
            color: black;
            text-align: inherit;
            white-space: nowrap;
            background-color: #aa511e;
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

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#myPage"><img src="images/logo.PNG" alt="logo" style="width:100%;height:30px;"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-left">
                    <!--<li><a href="#track">TRACK</a></li>-->
                    <li><a href="dfccil_service/dfccil_service1.php">DFCCIL SERVICES</a></li>
                    <li><a href="customer/customer.php">CUSTOMER</a></li>
                     <li><a href="admin/adminPage.php">ADMIN</a></li>
                     
                     <li><a href="testfolder/t_test.php">Testing</a></li>
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
                                <a class="dropdown-item" href="/DD2DD/admin/rating.php"><i class="fa fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    <?php } else {
                    ?>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
   
   
        <script>
            $(document).ready(function() {
                // Add smooth scrolling to all links in navbar + footer link
                $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 900, function() {

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });

                $(window).scroll(function() {
                    $(".slideanim").each(function() {
                        var pos = $(this).offset().top;

                        var winTop = $(window).scrollTop();
                        if (pos < winTop + 600) {
                            $(this).addClass("slide");
                        }
                    });
                });
            })
        </script>

</body>

</html>
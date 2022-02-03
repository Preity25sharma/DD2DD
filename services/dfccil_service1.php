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
    <!-- Theme Made By www.w3schools.com -->
    <title>DFCCIL Services</title>
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
                <a class="navbar-brand" href="/DD2DD/index.php"><img src="/DD2DD/images/logo.PNG" alt="logo" style="width:100%;height:30px;"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-left">
                    <!--<li><a href="#track">TRACK</a></li>-->
                   
                    <li><a href="#services">DFCCIL SERVICES</a></li>
                    <li><a href="#about">ABOUT US</a></li>
                    <li><a href="#portfolio">PORTFOLIO</a></li>
                    <li><a href="#contact">CONTACT</a></li>
              
                </ul>
               
            </div>
        </div>
    </nav>
    <br><br>
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
                    <img src="/DD2DD/images/logo.PNG" alt="logo" style="width:100%;height:250px;">
                </div>

                <div class="item">
                    <img src="/DD2DDimages/flow.PNG" alt="flow" style="width:100%;height:250px;">
                </div>
                <div class="item">
                    <img src="/DD2DDimages/route.jpg" alt="flow" style="width:100%;height:250px;">
                </div>
                <div class="item">
                    <img src="/DD2DDimages/route.jpg" alt="flow" style="width:100%;height:250px;">
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


    </div <br><br><br>
    <!-- Container (Services Section) -->
    <div id="services" class="container-fluid text-center bg-grey">
        <div class="row">
            <div class="col-sm-4">
                <span><iframe frameborder="0" scrolling="no" width="300" height="300" src="/DD2DD/images/newgo.gif" name="imgbox" id="imgbox">
                        <p>iframes are not supported by your browser.</p>
                    </iframe></span>
            </div>
            <div class="col-sm-8">
                <h2>OUR SERVICES</h2>

                <ul class="fa-ul" style="text-align:left">
                    <li><i class="fa-li fa fa-check-square"></i>Door to Door pickup and drop service</li>
                    <li><i class="fa-li fa fa-check-square"></i>Packaging</li>
                    <li><i class="fa-li fa fa-check-square"></i>Storage, warehousing and material handling</li>
                    <li><i class="fa-li fa fa-check-square"></i>Transportation management – inbound and outbound</li>
                    <li><i class="fa-li fa fa-check-square"></i>Track your request</li>
                    <li><i class="fa-li fa fa-check-square"></i>Track your consignment</li>
                </ul>
            </div>
        </div>
    </div>
    <<!-- Container (About Section) -->
        <div id="about" class="container-fluid">

            <div class="row">
                <div class="col-sm-8">
                    <h2>About Us</h2><br>
                    <h4>Genesis of DFCCIL

                        The Indian Railways' quadrilateral linking the four metropolitan cities of Delhi, Mumbai, Chennai and Howrah, commonly known as the Golden Quadrilateral ; and its two diagonals (Delhi-Chennai and Mumbai-Howrah), adding up to a total route length of 10,122 km comprising of 16% of the route carried more than 52% of the passenger traffic and 58% of revenue earning freight traffic of IR. The existing trunk routes of Howrah-Delhi on the Eastern Corridor and Mumbai-Delhi on the Western Corridor were highly saturated, line capacity utilization varying between 115% to 150%. Railways lost the share in freight traffic from 83% in 1950-51 to 35% in 2011-12</h4>

                    <p>Thegrowth of Indian economy has created demand for additional capacity of rail freight transportation, and this is likely to grow further in the future. This burgeoning demand led to the conception of the dedicated freight corridors along the Eastern and Western Routes. Minister for Railways, made this historic announcement on the floor of the House in the Parliament while presenting the Railway Budget for 2005-06.
                        In April 2005, the Project was discussed at the Japan-India Summit Meeting. It was included in the declaration of co-operation signed between the Hon'ble Prime Ministers of India and Japan for a feasibility study and possible funding of the dedicated rail freight corridors by Japanese Government. The feasibility study report was submitted to Ministry of Railways in October 2007.
                        In the meanwhile, Ministry of Railways initiated action to establish a Special Purpose Vehicle for construction, operation and maintenance of the dedicated freight corridors. This led to the establishment of "Dedicated Freight Corridor Corporation of India Limited (DFCC)", to undertake planning & development, mobilization of financial resources and construction, maintenance and operation of the dedicated freight corridors. DFCC was incorporated as a company under the Companies Act 1956 on 30th October 2006.</h4><br>
                    </p>
                    <br><button class="btn btn-default btn-lg">Get in Touch</button>
                </div>
                <div class="col-sm-4">
                    <span><img src="/DD2DD/images/dfcciloff.png" width=300px height=200px /></span>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-green">
            <div class="row">
                <div class="col-sm-4">
                    <span class="glyphicon glyphicon-globe logo slideanim"></span>
                </div>
                <div class="col-sm-8">
                    <h2>Our Values</h2><br>
                    <h4><strong>MISSION:</strong>

                        To build a corridor with appropriate technology that enables Indian railways to regain its market share of freight transport by creating additional capacity and guaranteeing efficient, reliable, safe and cheaper options for mobility to its customers.
                        To set up Multimodal logistic parks along the DFC to provide complete transport solution to customers.
                        To support the government's initiatives toward ecological sustainability by encouraging users to adopt railways as the most environment friendly mode for their transport requirements.</h4><br>

                </div>
            </div>
        </div>



        <!-- Container (Portfolio Section) -->
        <div id="portfolio" class="container-fluid text-center bg-grey">
            <h2>Portfolio</h2><br>
            <h4>Our Pressence</h4>
            <div class="row text-center slideanim">

                <div class="col-sm-3">
                    <div class="thumbnail">
                        <img src="/DD2DD/images/edfc.jpg" alt="map" width="400" height="400">
                        <p><strong>Eastern Corridor</strong></p>
                        <p>From: To: </p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="thumbnail">
                        <img src="/DD2DD/images/dfccilmap.jpg" alt="map" width="400" height="400">
                        <p><strong>Eastern Corridor</strong></p>
                        <p>From: To: </p>
                        <p><strong>Eastern Corridor</strong></p>
                        <p>From: To: </p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="thumbnail">
                        <img src="/DD2DD/images/wdfc.jpg" alt="map" width="400" height="200">
                        <p><strong>Western Corridor</strong></p>
                    </div>
                </div>



            </div><br>

            <h2>What our customers say</h2>
            <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
                    </div>
                    <div class="item">
                        <h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
                    </div>
                    <div class="item">
                        <h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>



        <!-- Container (Contact Section) -->
        <div id="contact" class="container-fluid bg-grey">
            <h2 class="text-center">CONTACT</h2>
            <div class="row">
                <div class="col-sm-5">
                    <p>Contact us and we'll get back to you within 24 hours.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> New Delhi, US</p>
                    <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> admin@dfccil.co.in</p>
                </div>
                <div class="col-sm-7 slideanim">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <footer class="container-fluid text-center">
            <a href="#myPage" title="To Top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
            <p>DD2DD a project by <a href="https://dfccil.com/" title="Visit DFCCIL">www.dfccil.com</a></p>
        </footer>

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
<?php 
//Databse Connection file
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
date_default_timezone_set("Asia/Kolkata");
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
session_start();?>


<style>/* Only for snippet */
.double-nav .breadcrumb-dn {
  color: #fff;
}</style>

<link rel="stylesheet" href="/DD2DD/css/mdb.min.css">

<!--<link rel="stylesheet" href="/DD2DD/css/font.css">-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/DD2DD/js/bootstrap.min.js"></script>
    <script src="/DD2DD/js/jquery.min.js"></script>
    <script src="/DD2DD/js/mdm.min.js"></script>
    <script src="/DD2DD/js/popper.min.js"></script>
   
  <body class="fixed-sn cyan-skin">

    <!--Double navigation-->
    <header>
      <!-- Sidebar navigation -->
      <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">
          <!-- Logo -->
          <li>
            <div class="logo-wrapper waves-light">
              <a href="/DD2DD/testfolder/t_test.php"><img src="images/logo.PNG" class="img-fluid flex-center" style="width:65%;height:65px;"></a>
            </div>
          </li>
          <!--/. Logo -->
          <!--Social-->
          <li>
            <ul class="social">
              <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
              <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
              <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
              <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
            </ul>
          </li>
          <!--/Social-->
          <!--Search Form-->
          <li>
            <form class="search-form" role="search">
              <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
              </div>
            </form>
          </li>
          <!--/.Search Form-->
          <!-- Side navigation links -->
          <li>
            <ul class="collapsible collapsible-accordion">
              <li  class="active">
                  <a  class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i>DFCCIL SERVICES<i
                    class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul class="list-unstyled" >
                    <li><a href="?page=dfccil_service1" class="waves-effect">DFCCIL Service</a>
                    </li>
                    <li><a href="?page=dfccil_service1" class="waves-effect">About Us</a>
                    </li>
                      <li><a href="?page=dfccil_service1" class="waves-effect">Portfolio</a>
                    </li>
                     <li><a href="?page=dfccil_service1" class="waves-effect">Contact</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-hand-pointer"></i>ADMIN<i
                    class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul class="list-unstyled">
                    <li><a href="#" class="waves-effect">HUb Management</a>
                    </li>
                    <li><a href="#" class="waves-effect">Train Management</a>
                    </li>
                    <li><a href="#" class="waves-effect">Pickup/Delivery management</a>
                    </li>
                    <li><a href="#" class="waves-effect">Payment Reconcilation</a>
                    </li>
                    <li><a href="?page=rr_list" class="waves-effect">RR List</a>
                    </li>
                    <li><a href="#" class="waves-effect">  MIS Reports</a>
                    </li>
                     <li><a href="#" class="waves-effect">Customer Report</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-eye"></i>CUSTOMER<i class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul class="list-unstyled">
                    <li><a href="?page=booking" class="waves-effect">Booking Process</a>
                    </li>
                    <li><a href="?page=rr_list1" class="waves-effect">RR List</a>
                    </li>
                    <li><a href="?page=total_booking" class="waves-effect">Pickup/Delivery Status</a>
                    </li>
                    
                    <li><a href="#" class="waves-effect">Customer Support</a>
                    </li>
                   
                  </ul>
                </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-envelope"></i>MIS REPORT<i class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul class="list-unstyled">
                     
                    <li><a  href="?page=hub_report"  class="waves-effect">Hub Detailed Report</a>
                    </li>
                    <li><a href="?page=unloading_summary" class="waves-effect">Unloading Summary Report</a>
                    </li>
                    <li><a href="?page=feedbackreport" class="waves-effect">Feedback Report</a>
                    </li>
                    <li><a  href="?page=complaint_report"  class="waves-effect">Complaint Report</a>
                    </li>
                    <li><a href="?page=rating_report" class="waves-effect">Rating Report</a>
                    </li>
                    <li><a href="?page=pod_report" class="waves-effect">Proof of Delivery Report</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
      </div>
      <!--/. Sidebar navigation -->
      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
          <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
       
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item">
            <a href="?page=user_Registration"  class="nav-link"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Sign Up</span></a>
          </li>
          <li class="nav-item">
            <a href="?page=login"  class="nav-link"><i class="fas fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Log In</span></a>
          </li>
       
          <!-- 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
             ACCOUNT
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">SIGN IN</a>
              <a class="dropdown-item" href="#">SIGN UP</a>
             
            </div>
          </li>
          -->
        </ul>
      </nav>
      <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

    <!--Main layout-->
    <main>

      <div class="container-fluid text-center">

        <!--Card-->
        <div class="card card-cascade wider reverse my-4 pb-6">

          <!--Card image-->
          <div class="view view-cascade overlay wow fadeIn">
        
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--/Card image-->
 
          <!--Card content-->
          <div class="card-body card-body-cascade text-center wow fadeIn" data-wow-delay="0.2s">
            <!--Title-->
          
           
            <p class="card-text">
            </p>

            <a href="?page=tracking" class="btn btn-primary btn-lg">Track Consignment</a>
             <a href="?page=feedback"  class="btn btn-secondary btn-lg">Feedback</a>
           
             <a href="?page=complaint"  class="btn btn-default btn-lg">Complaint</a>
             <a href="#" class="btn btn-danger btn-lg">Rating</a>
            
          </div>
          <!--/.Card content-->

        </div>
        <!--/.Card-->

      </div>

    </main>
    <!--/Main layout-->

     <h3></h3>
                <?php include ($page.'.php'); ?>
            </div>

  </body>
  
  <script>$(document).ready(() => {
  // SideNav Initialization
  $(".button-collapse").sideNav();

  new WOW().init();
});</script>

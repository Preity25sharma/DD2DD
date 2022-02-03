<?php
$rootpath = dirname(__DIR__);
include('../db/db_dd2dd.php');
date_default_timezone_set("Asia/Kolkata");
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
session_start();?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Admin</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style4.css">
    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="../index.php"><img src="../images/logo.PNG" alt="logo" style="width:80%;height:50px;"></a>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Booking Process
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                             <li>
                                <a href="?page=responsive">Flow of Booking Process</a>
                            </li>
                            
                            <li>
                               <a href="?page=register">Register</a>
                            </li>
                            <li>
                                <a href="?page=requestQuote">Request a Quote</a>
                            </li>
                            <li>
                                <a href="?page=booking">Actual Booking Step wise</a>
                            </li>
                           
                            </ul>
                    </li>
                     <li>
                    <a href="?page=rr_list"><i class="glyphicon glyphicon-credit-card"></i>RR List</a>
                </li>
                    <li>
                        
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-road"></i>
                            Pickup/Delivery
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                             
                            <li>
                            <a href="?page=total_booking">Total Booking</a>
                        </li>
                        
                        </ul>
                    </li>
                   
           
                 
              
                <li>
                    
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i>Customer Support</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                          <li>
                    <a href="?page=tracking">Consignment Tracking</a>
                </li>
                        <li>
                            <a href="?page=pod_report">Proof of Delivery (POD)</a>
                        </li>
                        
                        <li>
                            <a href="?page=complaint">Complaints/Grievance</a>
                        </li>
                         <li>
                            <a href="?page=feedback">Feedback</a>
                        </li>
                          <li>
                            <a href="?page=#">Rating</a>
                        </li>
                    </ul>
                </li>   

                <ul class="list-unstyled CTAs">
                <li>
                    <a href="../index.php" class="article">Back</a>
                </li>
            </ul>
            </nav>
           
                <h3></h3>
                <?php include ($page.'.php'); ?>
            </div>
            
        </div>

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>

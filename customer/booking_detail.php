<?php 
$rootpath = dirname(__DIR__,1);
include($rootpath.'/db/db_dd2dd.php');
date_default_timezone_set("Asia/Kolkata");
 $bookingId= $_GET['Id'];
//echo $bookingId;

$sql= "SELECT * FROM `HubTracker` WHERE `bookingId`='$bookingId';";
//echo $trackId;
//echo $sql;
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result)) {
    

?>
<!DOCTYPE html>
<html lang="en">
<center>
 <head>
   
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tracking</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/DD2DD/css/tracker.css">
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<br><div class="row">
              <div>
                     &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success" onclick="history.go(-1)">Back</button></a>
                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="location.href='index.php';">Home</button>
                </div>
            </div>
</head>
<body>
<div class="container">
    <article class="card">
        
        <header class="card-header"> View package Detail </header>
        <div class="card-body">
            <h6>Booking Id: <?php echo $row['bookingId'] ?></h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>19 Jan 2022 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> DD2DD, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked Up</div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Booking confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by DD2DD agent</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-motorcycle"></i> </span> <span class="text"> On the way to hub </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-home"></i> </span> <span class="text"> In hub at src </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">In transit from hub </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-train"></i> </span> <span class="text"> On train </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way to hub </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-home"></i> </span> <span class="text"> In hub at dest </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">With delivery agent</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
            </div>
            <hr>
            
            <hr> <a href="/DD2DD/customer/customer.php?page=total_booking" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back </a>
        </div>
        <?php } ?>
    </article>
</div>
</body>
</html>
 
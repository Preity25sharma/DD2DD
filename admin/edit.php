<?php 
//Databse Connection file
$rootpath = dirname(__DIR__,1);
include($rootpath.'/db/db_dd2dd.php');
date_default_timezone_set("Asia/Kolkata");

$book_sql = "SELECT `booking_id` FROM `Booking`";
$res_book = mysqli_query($conn, $book_sql);

$eid=$_GET['editid'];
$ret=mysqli_query($conn,"SELECT * FROM `HubTracker` WHERE `Sl`='$eid'");

if(isset($_POST['submit']))
  {
    //getting the post values
    $bookingId=$_POST['bookingId'];
    $rfid=$_POST['rfid'];
    $date=$_POST['date'];
    $status = $_POST['status'];

    //Query for data updation
    $sql = "UPDATE `HubTracker` SET `bookingId`=$bookingId,`trackingId`=$rfid,`date`='$date',`status`='$status' WHERE Sl='$eid'";
    echo $sql;
     $query=mysqli_query($conn,$sql );
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Edit Hub Tracker</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    function cancel(){
        console.log("here");
        window.location="/DD2DD/admin/adminPage.php?page=index";
    }
</script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
    <form  method="POST">
		<h2>Update Data</h2>
		<p class="hint-text">Fill below form.</p>
        <div class="form-group">
            <select class="form-control" name="bookingId" id="bookingId">
            <?php while ($bookId = mysqli_fetch_assoc($res_book)) { ?>
                <option <?php
                            if (isset($_POST['bookingId'])) {
                                if ($_POST['bookingId'] == $bookId['booking_id']) {
                                    echo "selected";
                                }
                            } ?> value="<?php echo $bookId['booking_id']; ?>"><?php echo $bookId['booking_id']; ?></option>
                
   <?php } ?>
			    
		</div>
			
        <div class="form-group">
        	<input type="text" class="form-control" name="rfid" placeholder="Tracking Id" required="true">
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control" name="status" placeholder="Status" required="true">
        </div>
		
		<div class="form-group">
            <input type="date" class="form-control" name="date" placeholder="Date" required="true">
        </div>        
      
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
            <input type="button" onclick="cancel()" class="btn btn-danger btn-lg btn-block" value="Cancel">
        </div>
    </form>
	
</div>
</body>
</html>
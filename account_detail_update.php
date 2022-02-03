<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");
$id=$_GET['id'];
//echo $_GET['id'];
 if (isset($_POST['submit'])) {
   
    $mobile=$_POST['mobile'];
       $email=$_POST['email'];
        $username=$_POST['username'];
         $register_type=$_POST['register_type'];
      
      $sql = "UPDATE `User` SET `username`='$username' , `email`='$email' , `mobile`='$mobile', `register_type`='$register_type' WHERE `id`='$id'";
        $result= $conn->query($sql);
     //echo  $sql;

?><script>alert("Successfully Update");
 window.location = "index.php";
 </script><?php 

}                   
?>

<!DOCTYPE html>
<html lang="en">
<center>
 <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Registration Form</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/login.css">
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<?php
                                        $user_sql = "SELECT *
                                    FROM 
                                 `User` 
                                                             WHERE id='$id' ";
                            $result = mysqli_query($conn, $user_sql);
                           //echo $user_sql;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
 <div class="row">
              <div>
                     <button type="button" class="btn btn-success" onclick="history.go(-1)">Back</button></a>
                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="location.href='index.php';">Home</button>
                </div>
        <center>      
                <div class="text-center">
                  <img src="images/logo.png" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Account Detail</h4>
                </div>

               <form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div><input name="username" value="<?php echo $row['username']; ?>" >
      
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
       <input  name="email" value="<?php echo $row['email']; ?>" >
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<input  name="mobile" value="<?php echo $row['mobile']; ?>"  type="tel">
    	
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		 <input name="register_type"  value="<?php echo $row['register_type']; ?>" >
	</div> <!-- form-group end.// -->
        <div class="text-center pt-1 mb-5 pb-1">
                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit" type="submit">Update</button>
                        
                      </div>
   
</form>


              </div>
            </div>
           
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
 <?php
} ?>
</html>


      

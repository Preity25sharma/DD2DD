<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");


if (isset($_POST['submit'])) {
    //echo $_POST['name'];
    $username = $_POST['name'];
     
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $register_type= $_POST['register_type'];
    
  
           
    $sql = "INSERT INTO `User`(`username`, `email`, `mobile`, `register_type`,  `password`) VALUES ('$username', '$email', '$mobile', '$register_type', '$password') ";
    
   $result = mysqli_query($conn, $sql);
   if ($result){
            ?><script>alert("Successfully Registred!");
            window.location = "index.php";
           </script><?php
            
        }
        else{
            ?><script>alert("Something Missing !");</script><?php
        }
    
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
              
           
            </div>
                <div class="text-center">
                  <img src="images/logo.png" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Register With Us</h4>
                </div>

               <form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input required name="name" class="form-control" placeholder="Full name"  type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input required name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
	
    	<input required name="mobile" class="form-control" placeholder="Phone number" type="tel">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select  class="form-control" type="text" name="register_type" required>
			<option value=""> Register as</option>
			<option value="Customer">Customer</option>
		    <option value="Service provider">Service provider</option>
		</select>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input required class="form-control" placeholder="Create password" type="password"    id="password" name="password"  >
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input required class="form-control" placeholder="Confirm_password"  id="confirm_password"     onkeyup='check();'  type="password" >
         <span id='message'></span>
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account  </button><br>
        <input type="button" hidden id="btnSubmit" value="confirm password"  />
         
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>  
     <p class="text-center">Register as Admin <a href="admin_register.php">Register</a> </p>    
    
</form>


              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-top gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <iframe frameborder="0" scrolling="no" width="350" height="200"
                   src="images/newgo.gif" name="imgbox" id="imgbox">
                    <p>iframes are not supported by your browser.</p>
                </iframe>
                <h4 class="mb-4">Our Services</h4>
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
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>

<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
      

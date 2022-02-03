<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');

date_default_timezone_set("Asia/Kolkata");
if (isset($_POST['submit'])) {
   
    $mobile=$_POST['mobile'];
       $email=$_POST['email'];
        $newpass=$_POST['newpass'];
        $newpin=password_hash($_POST['newpass'], PASSWORD_DEFAULT);
        // echo  $newpin; 
      $sql = "UPDATE `User` SET `password`='$newpin' WHERE `email`='$email' AND `mobile`='$mobile' ";
        $result= $conn->query($sql);
    // echo  $sql;
?><script>alert("Password Successfully Changed");</script><?php 

} ?>

<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <title>Reset Password</title>
  
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	            <link rel="stylesheet" type="text/css" href="css\login.css">
<br>
<div class="row">
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
	        <div class="d-flex justify-content-center h-100">
		        <div class="card">
			        <div class="card-header">
				        
                  <h4>  <img src="images/logo.png" style="width: 60px;" alt="logo">Password Reset</h4>
			        </div>
			         <div class="card-body">
				        <form method="post">
					        <div class="input-group form-group">
						      
       
            </div>
              
               <form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    
		 </div>
      
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input type="text" name="email" class="form-control" placeholder="Email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
	 <input type="text" name="mobile" class="form-control" placeholder="Mobile">
    	
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
			<input type="text" class="form-control" placeholder="New Password" name="newpass">
	</div> <!-- form-group end.// -->
        <div class="text-center ">
                         
                        <button type="button" name="submit" value="Confirm" class="btn btn-warning" >Confirm</button>
                       
                        
                      </div>
    
</form>
</center>

              </div>
            </div>
           
           
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>


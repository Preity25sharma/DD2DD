<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");
$id=$_GET['id'];
//echo $_GET['id'];
                    
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
        <div class="container">
	        <div class="d-flex justify-content-center h-100">
		        <div class="card">
			        <div class="card-header">
				        
                  <h4>  <img src="images/logo.png" style="width: 60px;" alt="logo"> Account Detail</h4>
			        </div>
			         <div class="card-body">
				        <form method="post">
					        <div class="input-group form-group">
						      
       
            </div>
              
               <form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div><input disabled value="<?php echo $row['username']; ?>" >
      
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
       <input disabled value="<?php echo $row['email']; ?>" >
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<input disabled value="<?php echo $row['mobile']; ?>"  type="tel">
    	
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		 <input disabled value="<?php echo $row['register_type']; ?>" >
	</div> <!-- form-group end.// -->
        <div class="text-center ">
                          <button type="button" class="btn btn-warning" ><a href="account_detail_update.php?id=<?php echo $id; ?>">Edit</a></button>
                       
                        <button type="button" class="btn btn-warning" ><a href="index.php">Close</a></button>
                       
                        
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
 <?php
} ?>
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
      


<?php


if (isset($_POST['submit'])) {
    //echo $_POST['name'];
    $name= $_POST['name'];
     $_replyto= $_POST['_replyto'];
     $telephone= $_POST['telephone'];
      $complaint= $_POST['complaint'];
  //echo $alias;
    $sql = "INSERT INTO `complaint`( `name`, `_replyto`, `telephone`, `complaint`) VALUES ('$name', '$_replyto', '$telephone', '$complaint') ";
   // echo $sql;
   $result = mysqli_query($conn, $sql);
   if ($result){
            ?><script>alert("success...!");
            window.location = "/DD2DD/admin/adminPage.php";
           </script><?php
            
        }
        else{
            ?><script>alert("Something Missing !");</script><?php
        }
    
}

                    
?>

<script>
    function cancel(){
        console.log("here");
        window.location="/DD2DD/customer/customer.php";
    }
    
</script>
<style>
body {
	color: #fff;
	
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

<div class="signup-form">
    <form  method="POST">
		
	<center><h2>Complaint Form</h2></center>	
		<p class="hint-text">Fill below form.</p>
       
			
        <div class="form-group">
        	<input type="text" class="form-control" name="name" placeholder="Name..." required="true">
        </div>
        
        <div class="form-group">
            <input type="email" id="email" class="form-control" name="_replyto" placeholder="email.." required="true"> 
        </div>
         <div class="form-group">
            <input type="varchar" id="email" class="form-control" name="telephone" placeholder="Ph No..." required="true"> 
        </div>
         
		
		<div class="form-group">
           <textarea id="subject" name="complaint" class="form-control" placeholder="Write your complaint.." style="height:100px"></textarea>  
            <input type="hidden" name="_subject" id="email-subject" value="Complaint Form Submission">
        </div>        
      
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">File Complaint</button>
            <input type="button" onclick="cancel()" class="btn btn-danger btn-lg btn-block" value="Cancel">
        </div>
    </form>

</body>

  
</form>


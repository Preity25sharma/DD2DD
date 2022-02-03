<?php
$rootpath = dirname(__DIR__);
include('../db/db_dfis.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");

if (isset($_POST['submit'])) {?>

<?php 
    $srcLoc = $_POST['src'];
    $destLoc = $_POST['dest'];
    
    $src_sql = "SELECT * FROM `ref_stn_cordinate` WHERE `stn`= '$srcLoc'";
    $res_src = mysqli_query($conn, $src_sql);
    $rowSrc = mysqli_fetch_assoc($res_src);
    $lat1 = $rowSrc['lat'];
    $lng1 = $rowSrc['lng'];
    
    
   $dest_sql = "SELECT * FROM `ref_stn_cordinate` WHERE `stn`= '$destLoc'";
   $res_dest = mysqli_query($conn, $dest_sql);
   $rowDest = mysqli_fetch_assoc($res_dest);
   $lat2 = $rowDest['lat'];
   $lng2 = $rowDest['lng'];
   
   
    $theta = $lng1 - $lng2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $distance = $dist * 60 * 1.1515 * 1.609344;
	echo $distance;
	

	
    ?>
   
<?php   
}
?>

<!DOCTYPE html>
<html lang="en">
<center>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Request a Quote Form</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/tracker.css">
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<!--put your map api javascript url with key here-->
        <script src="https://apis.mapmyindia.com/advancedmaps/v1/b7c0a06a29bfa826f90ef2b569d2cfff/map_load?v=1.2"></script>
        <br>
        
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
                 
                <div class="text-left">
                  <img src="images/logo.png" style="width: 80px;" alt="logo">
                  <h5 class="mt-1 mb-5 pb-1">Request A Quote</h4>
                </div>

                <form method="post">
                  
                  <div class="form-outline mb-4 text-left">
                     <label style="width:190px" for="source">Source Location</label>
                     
                     <input  type="text" id="src" name="src"   class="search-outer form-control as-input" placeholder="Search source location"  spellcheck="false">
                     <input  class="form-control" id="srceLoc" name="srceLoc" type="hidden">                        
                  </div>

                  <div class="form-outline mb-4 text-left">
                     <label style="width:190px" for="destination">Destination Location</label>
                     
                    <input  type="text" id="dest" name="dest"  class="search-outer form-control as-input" placeholder="Search destination location"  spellcheck="false">
                   	<input  class="form-control" id="desteLoc" name="desteLoc" type="hidden" >
                  </div>
                  <div class="form-outline mb-4 text-left">
                     <label style="width:80px" for="category">Category</label>
                     <select style="width:200px" name="type">
			            <option selected="">Select</option>
			            <option>Small package</option>
			            <option>Medium </option>
			            <option>Large</option>
		            </select>
                    
                  </div>
                  <div class="form-outline mb-4 text-left">
                     <label style="width:90px" for="destination">Weight</label>
                   	<input  style="width:200px" id="weight" name="weight" type="text" placeholder="Approx. weight in kg">
                  </div>
                  
                  <div class="form-outline mb-4 text-left">
		              <label style="width:60px" for="size">Size</label>
                      	<input name="length" style="max-width:60px" placeholder="L cm" type="text">
                      	<label style="width:10px" >X</label>
                      	<input name="width" style="max-width:60px" placeholder="W cm" type="text">
                      	<label style="width:10px" >X</label>
                      	<input name="height" style="max-width:60px" placeholder="H cm" type="text">
                        
                  </div>
                  
                  <div class="form-outline mb-4 text-left">
                      <label style="width:150px" for="packaging">Need Packaging</label>
                      <input class="form-check-input" type="radio" name="packaging" id="pack_y" value="yes">
                      <label class="form-check-label" for="pack_y">
                       Yes
                      </label>
                      
                      <label style="width:50px" for="packaging"></label>
                      <input class="form-check-input" type="radio" name="packaging" id="pack_n" value="no" checked>
                      <label class="form-check-label" for="pack_n" >
                       No
                      </label>
                  </div>
         
                  <div class="form-group">
                    <button type="submit" name="submit"  class="btn btn-primary btn-block"> Get Quote  </button>
                  </div>

                </form>
 </div>
              </div>
            
            <div id="src" class="col-lg-6 d-flex align-items-top gradient-custom-2" >
             <?php include('maps/mapApi.php');?>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>


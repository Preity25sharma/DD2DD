<?php
$rootpath = dirname(__DIR__);
include('../db/db_dd2dd.php');
?>


<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 18px;
  padding-bottom: 18px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
    white-space: nowrap;
}
</style>
</head>
<br>
<br>
<center>
<body>


 
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
                                
<table id="customers" >
    <tr><td colspan="4" style="color:blue; text-align:center; font-size:18px;">Unloading Summary Report</td></tr>
  <tr>
      <th>SN</th>
    <th>Booking ID</th>
    
    <th>Destination</th>
    <th>Date & Time of Delivery</th>
  </tr>
   <?php
                
$i = 1;

 $user_sql = "SELECT *,
  DATE_FORMAT(DATE_ADD(wh2_out,INTERVAl 750 MINUTE ),'%d-%m-%Y %H-%s') wh2_out
  FROM `track_rfid` where wh2_out!='NULL' ";

    $result = mysqli_query($conn, $user_sql);
  
    while ($row= mysqli_fetch_array($result)) {
       $bookingId= $row['bookingId']; 
    $user_sql1 = "SELECT *  FROM `Request_Quote` WHERE bookingId='$bookingId' ";
    $result1 = mysqli_query($conn, $user_sql1);
  
   $row1= mysqli_fetch_array($result1);
  
?> 
  <tr  style="text-align:center;">
      <td ><?php echo $i; ?></td>  
    
    <td><?php echo $row['bookingId']; ?></td>
    <td><?php echo $row1['dest_loc']; ?></td>
    <td><?php echo $row['wh2_out']; ?></td>
  </tr>
  <?php 
$i+= 1;

}  ?>
</table>
  </div>
              </div>
            
            
        </div>
      </div>
    </div>
  </div> 
        
</body>
</center>
</html>



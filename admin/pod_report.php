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
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
  white-space: nowrap;
}
</style>
</head>
<center>
<body>

<center><h1>POD Report</h1></center>

<table id="customers">
  <tr>
      <th>SN</th>
    <th>Booking id</th>
    <th>Date & Time</th>
    <th>View POD</th>
    
  </tr>
   <?php
                
$i = 1;
 $user_sql = "SELECT *  ,
 DATE_FORMAT(DATE_ADD(wh2_out,INTERVAl 750 MINUTE ),'%d-%m-%Y %H-%s') wh2_out
 FROM `track_rfid` WHERE wh2_out!='NULL'";
 
    $result = mysqli_query($conn, $user_sql);
  
    while ($row= mysqli_fetch_array($result)) {
         $bookingId= $row5['bookingId'];
   $link2="/DD2DD/admin/pod.php?Id=".$bookingId;
  
?> 
  <tr style=" text-align:center; font-size:15px; white-space: nowrap;">
      <td ><?php echo $i; ?></td>  
    <td><?php echo $row['bookingId']; ?></td>
    <td><?php echo $row['wh2_out']; ?></td>
      <td><a style= "color:blue;" onclick="window.open('<?php echo $link2;?>','popup','width=1500,height=1500'); return false;">View </a></td>
     
  </tr>
  <?php 
$i+= 1;

}  ?>
</table>

</body>
</center>
</html>



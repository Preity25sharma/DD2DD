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

<center><h1>Complaint Report</h1></center>

<table id="customers">
  <tr>
      <th>SN</th>
    <th>Name</th>
    <th>Email Id</th>
    <th>Mobile No</th>
    <th>Complaint Detail</th>
  </tr>
   <?php
                
$i = 1;
 $user_sql = "SELECT *  FROM `complaint` ";
 
    $result = mysqli_query($conn, $user_sql);
  
    while ($row= mysqli_fetch_array($result)) {
   
  
?> 
  <tr style=" text-align:center; font-size:15px; white-space: nowrap;">
      <td ><?php echo $i; ?></td>  
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['_replyto']; ?></td>
    <td><?php echo $row['telephone']; ?></td>
     <td><?php echo $row['complaint']; ?></td>
  </tr>
  <?php 
$i+= 1;

}  ?>
</table>

</body>
</center>
</html>



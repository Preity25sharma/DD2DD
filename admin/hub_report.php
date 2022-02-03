<?php
$rootpath = dirname(__DIR__);
include('../db/db_dd2dd.php');
 $currentdate = date("d-m-Y");


$user_sql2 = "SELECT  COUNT(`bookingId`) as b2 FROM `track_rfid`  WHERE   `wh1_out`IS NULL ";
$result2 = mysqli_query($conn, $user_sql2);

$row2 = mysqli_fetch_array($result2);
    
                                $link2="/DD2DD/admin/h_str_view.php";
                                //echo  $link2; 
     
     
     $user_sql3 = "SELECT  COUNT(`bookingId`) as b3 FROM `track_rfid` WHERE   `wh1_out` LIKE '%$currentdate%' ";
//echo $user_sql5;
$result3 = mysqli_query($conn, $user_sql3);

$row3 = mysqli_fetch_array($result3);
 
                                $link3="/DD2DD/admin/hub_loading_view.php";
                                //echo  $link2;                            
                                
                                
                                
                                
$user_sql4 = "SELECT COUNT(`bookingId`)  as b4 FROM `track_rfid` WHERE   `stn1_in` LIKE '%$currentdate%'  ";
$result4 = mysqli_query($conn, $user_sql4);

$row4= mysqli_fetch_array($result4);

    
                                $link4="/DD2DD/admin/hub_un_view.php";
                                //echo  $link2; 
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
    <tr><td colspan="4" style="color:blue; text-align:center; font-size:18px;">Hub Detailed Report [<?php echo  $currentdate;?>]</td></tr>
  <tr>
     
    <th>Total Packet store in Hub</th>
   
    <th>Total Packet Load</th>
     
    <th>Total Packet UnLoad</th>
   
  </tr>
  


  <tr  style="text-align:center;">
      
    
   <td > <a style= "color:blue;" onclick="window.open('<?php echo $link2;?>','popup','width=1500,height=1500'); return false;"><?php  echo $row2['b2'] ; ?></a></td>  
  <td > <a style= "color:blue;" onclick="window.open('<?php echo $link3;?>','popup','width=1500,height=1500'); return false;"><?php  echo $row3['b3'] ;  ?></a></td> 
    <td > <a style= "color:blue;" onclick="window.open('<?php echo $link4;?>','popup','width=1500,height=1500'); return false;"><?php  echo $row4['b4'] ;  ?></a></td> 
  </tr>
 
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






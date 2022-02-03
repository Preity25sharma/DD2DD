<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");
 $currentdate = date("Y-m-d");
 $train_id=$_GET['train_id'];
// echo $train_id;
?>


<html>

<head>
    <center>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
  <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="/path/to/cdn/jquery.slim.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>
           Parcel Detail
            </title>
          <br>
            <h3 style="color:green;">Packet Detail</h3></center>
            <div class="row">
                 <div>
                     &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success" onclick="history.go(-1);">Back</button></a>
                </div>
                <div align="left">
                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="location.href='index.php';">Home</button>
                </div>
                <div align="left">
               &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning" ><a href="javascript:void(0);" onclick="printPageArea('printableArea')">Print</a></button></div>
            </div>
            </div>
            </head><br>

<center>
<body>

                                                    

<center>
<form action="?" method="post" enctype="multipart/form-data">
      <div id="printableArea">
        <table style="font-size:15px; width:45%; text-align:center; white-space: nowrap;" border="1" cellspacing="0">

     
      <tr><th  style="background-color:pink; font-size:17px; font-weight:bold; text-align:center; color:black;" colspan="11">Packet Detail</th></tr>        
                       <tr>
                        
                       <th style="text-align:center; width:5%;">SN</th>
                        <th style="text-align:center; width:5% ;">RFID No</th>
                        <th style="text-align:center; width:5% ;">Request No</th>
                       
                      
                           <th style="text-align:center; width:8% ;">Source Location</th>
                             <th style="text-align:center; width:8% ;">Delivery Location</th>
                               <th style="text-align:center; width:8% ;">item_type</th>
                              
                                 <th style="text-align:center; width:8% ;">item_weight</th>
                                  <th style="text-align:center; width:8% ;">item_dim</th>
                                    <th style="text-align:center; width:8% ;">WH1_in</th>
                                      <th style="text-align:center; width:8% ;">WH1_out</th>
                                        <th style="text-align:center; width:8% ;">Stn1_in</th>
                                 
                     
                                </tr>
                                  <?php
$i = 1;
 $user_sql = "SELECT * FROM `track_rfid` WHERE `train_id`='$train_id' AND `stn1_in`!='NULL'";
 
    $result = mysqli_query($conn, $user_sql);
 // echo $user_sql;
    while ($row= mysqli_fetch_array($result)) {
    $req_id= $row['req_id'];
    //echo  $req_id;
$user_sql5 = "SELECT *  FROM `Request_Quote` WHERE  `req_id`='$req_id' ";
$result5 = mysqli_query($conn, $user_sql5);
//echo $user_sql5;
while ($row5 = mysqli_fetch_array($result5)) {
   
  
    
  
?> 
                                <tr>
                        <td ><?php echo $i; ?></td>    
                        <td><?php echo $row['rfid'] ?></td>
                        <td><?php echo $row['req_id'] ?></td>
                        
                          <td><?php echo $row5['src_loc'] ?></td>
                         <td><?php echo $row5['dest_loc'] ?></td>
                         <td><?php echo $row5['item_type'] ?></td>
                         <td><?php echo $row5['item_weight'] ?></td>
                         <td><?php echo $row5['item_dim'] ?></td>
                           <td><?php echo $row['wh1_in'] ?></td>
                             <td><?php echo $row['wh1_out'] ?></td>
                               <td><?php echo $row['stn1_in'] ?></td>
                        
                   </tr>
                    <?php
    $i+= 1;
}
}
?>
                 </table>
                 </div>

                      <br>
                    
               
                <div align="center">
                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger" onclick="location.href='movement.php';">Close</button>
                </div>
                                
</center>
</form>
</body>
    </html>
 
<script>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=2400,height=2000');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
</script>
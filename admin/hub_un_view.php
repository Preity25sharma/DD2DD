<?php
$rootpath = dirname(__DIR__);
include('../db/db_dd2dd.php');
?>





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
                                   $currentdate = date("Y-m-d");
$i = 1;
 $user_sql = "SELECT *  FROM `track_rfid` WHERE   `stn1_in` LIKE '%$currentdate%'  ORDER BY wh1_in ASC , wh1_out ASC ,stn1_in ASC ";
 
    $result = mysqli_query($conn, $user_sql);
  
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

                   
                                
</center>
</form>
</body>
   
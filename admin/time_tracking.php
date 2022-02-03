
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                  
<form action="?" method="post" enctype="multipart/form-data">
      
        <table style="font-size:15px;  text-align:center; white-space: nowrap;" border="1" cellspacing="0">

     
      <tr><th  style="background-color:pink; font-size:17px; font-weight:bold; text-align:center; color:black;" colspan="11">Update Time Details</th></tr>        
                       <tr>
                        
                       <th style="text-align:center; width:5%;">SN</th>
                        <th style="text-align:center; width:5% ;">RFID No</th>
                        <th style="text-align:center; width:5% ;">Request No</th>
                       
                        <th style="text-align:center; width:8% ;">WH1 IN</th>
                        <th style="text-align:center; width:8% ;">WH1 Out</th>
                         <th style="text-align:center; width:8% ;">stn1 IN</th>
                        <th style="text-align:center; width:8% ;">stn1 Out</th>
                         <th style="text-align:center; width:8% ;">stn2 IN</th>
                        <th style="text-align:center; width:8% ;">stn2 Out</th>
                         <th style="text-align:center; width:8% ;">WH2 IN</th>
                        <th style="text-align:center; width:8% ;">WH2 Out</th>
                       
                                </tr>
                                  <?php
$i = 1;
$user_sql5 = "SELECT * FROM `track_rfid`  ";
$result5 = mysqli_query($conn, $user_sql5);
 
while ($row5 = mysqli_fetch_array($result5)) {
    $bookingId= $row5['bookingId'];
  
                                $link2="/DD2DD/hub/rfid_update_time.php?Id=".$bookingId;
                             
                               
?> 
                                <tr>
                        <td ><?php echo $i; ?></td>    
                        <td><?php echo $row5['rfid'] ?></td>
                        <td><a style= "color:blue;" onclick="window.open('<?php echo $link2;?>','popup','width=1500,height=1500'); return false;"><?php echo $row5['bookingId'] ?></a></td>
                         <td><?php echo $row5['wh1_in'] ?></td>
                          <td><?php echo $row5['wh1_out'] ?></td>
                           <td><?php echo $row5['stn1_in'] ?></td>
                            <td><?php echo $row5['stn1_out'] ?></td>
                             <td><?php echo $row5['stn2_in'] ?></td>
                              <td><?php echo $row5['stn2_out'] ?></td>
                               <td><?php echo $row5['wh2_in'] ?></td>
                                <td><?php echo $row5['wh2_out'] ?></td>
                        
                   </tr>
                    <?php
    $i+= 1;
}
?>
                 </table>
             </div>
              </div>
            
            
        </div>
      </div>
    </div>
  </div> 
                 
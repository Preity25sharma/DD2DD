
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                  
<form action="?" method="post" enctype="multipart/form-data">
    
        <table style="font-size:15px; width:50%; text-align:center; white-space: nowrap;" border="1" cellspacing="0">

     
      <tr><th  style="background-color:pink; font-size:17px; font-weight:bold; text-align:center; color:black;" colspan="11">Total Booking</th></tr>        
                       <tr>
                        
                       <th style="text-align:center; width:5%;">SN</th>
                       <th style="text-align:center; width:5% ;">Booking ID</th>
                       <th style="text-align:center; width:5% ;">Booking Date</th>
                       <th style="text-align:center; width:5% ;">View Detail</th>
                       
                        
                       
                                </tr>
                                  <?php
$i = 1;
$user_sql5 = "SELECT * FROM `track_rfid`  ";
$result5 = mysqli_query($conn, $user_sql5);
 //echo $user_sql5;
while ($row5 = mysqli_fetch_array($result5)) {
    $bookingId= $row5['bookingId'];
    //echo $req_id;
                                $link2="/DD2DD/customer/booking_detail.php?Id=".$bookingId;
                                //echo  $link2;
                               
?> 
                                <tr>
                        <td ><?php echo $i; ?></td>    
                        <td ><?php echo $row5['bookingId'] ?></td> 
                        <td ><?php echo $row5[''] ?></td> 
                        <td><a style= "color:blue;" onclick="window.open('<?php echo $link2;?>','popup','width=1500,height=1500'); return false;">View</a></td>
                        
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
        
                 
<?php


if (isset($_POST['submit'])) {
    //echo $_POST['name'];
    $req_id= $_POST['req_id'];
     $rfid= $_POST['rfid'];
     $wh1_in= $_POST['wh1_in'];
  
    $sql = "INSERT INTO `track_rfid`(`req_id`, `rfid`, `wh1_in`) VALUES ('$req_id', '$rfid', '$wh1_in') ";
    //echo $sql;
   $result = mysqli_query($conn, $sql);
   if ($result){
            ?><script>alert("Successfully Registred!");
            window.location = "/DD2DD/admin/adminPage.php";
           </script><?php
            
        }
        else{
            ?><script>alert("Something Missing !");</script><?php
        }
    
}

                    
?>

<div class="text-left" >
                    
                  <h5 class="mt-1 mb-5 pb-1">RFID Tagging</h4>
                </div>

                <form method="post">
                  
                  <div class=" mb-4 text-left">
                     <label style="width:190px" for="source">Request No</label>
                     
                     <input  type="text" id="autocomplete" name="req_id"   class="search-outer  as-input" placeholder="Request No"  spellcheck="false">
                                          
                  </div>

                  <div class=" mb-4 text-left">
                     <label style="width:190px" for="destination">RFID Tag No</label>
                     
                    <input  type="text" id="autocomplete1" name="rfid"  class="search-outer as-input" placeholder="RFID Tag No"  spellcheck="false">
                   	
                  </div>
                  <div class=" mb-4 text-left">
                     <label style="width:190px" for="destination">Entry Date & Time in WH1</label>
                     
                    <input  type="datetime-local" id="autocomplete1" name="wh1_in"  class="search-outer as-input" placeholder="RFID Tag No"  spellcheck="false">
                   
                  </div>
                 
                  
                  <div>
                    <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
                  </div>

                </form>
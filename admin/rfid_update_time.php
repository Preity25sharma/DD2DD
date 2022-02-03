<?php 
//Databse Connection file
$rootpath = dirname(__DIR__,1);
include($rootpath.'/db/db_dd2dd.php');
date_default_timezone_set("Asia/Kolkata");
?>
<script>
    function cancel(){
        console.log("here");
        window.location="/DD2DD/hub/time_tracking.php";
    }
    
</script>
    
        <form method="POST">
            <p>
                Enter Request Id : 
                <input name="req_id" type="varchar"   <?php  if(isset($_GET['Id'])){echo "value=".$_GET['Id'];} ?> >
                <input type="submit" name="find" value="Find">
            </p>
       
    </center>
   
    <?php
        if(isset($_POST['find'])){
            $req_id=$_POST['req_id'];
            //echo $req_id;
            $sql5="
                SELECT
                    *
                FROM
                    `track_rfid`
                WHERE
                    `req_id`='$req_id'
                            ";
                         // echo $sql5;  
            $result5 = $conn->query($sql5);
            $row5=mysqli_fetch_assoc($result5);
            echo $row5['rfid'];
           
            
        ?>
        
        <table style="text-align:center;width:100%;" border="1">
            <thead style="background-color:pink;" >
                <th>Request Id</th>
                 <th>RFID No</th>
                <th style="text-align:center; width:8% ;">WH1 IN</th>
                        <th style="text-align:center; width:8% ;">WH1 Out</th>
                         <th style="text-align:center; width:8% ;">stn1 IN</th>
                        <th style="text-align:center; width:8% ;">stn1 Out</th>
                         <th style="text-align:center; width:8% ;">stn2 IN</th>
                        <th style="text-align:center; width:8% ;">stn2 Out</th>
                         <th style="text-align:center; width:8% ;">WH2 IN</th>
                        <th style="text-align:center; width:8% ;">WH2 Out</th>
            </thead>
            <tbody>
                <tr>
                  
                  <td ><input value="<?php echo $row5['rfid']; ?>"  name="rfid" type="varchar"> 
                       
                       
                        </td>
                        <td> <input  value="<?php echo $row5['req_id']; ?>" name="req_id"  type="varchar"> </td>
                        <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['wh1_in'])); ?>" name="wh1_in" type="datetime-local"> </td>
                         <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['wh1_out'])); ?>"  name="wh1_out" type="datetime-local"> </td>
                          <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['stn1_in'])); ?>"  name="stn1_in" type="datetime-local"> </td>
                           <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['stn1_out'])); ?>"  name="stn1_out" type="datetime-local"> </td>
                            <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['stn2_in'])); ?>" name="stn2_in" type="datetime-local"> </td>
                             <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['stn2_out'])); ?>" name="stn2_out" type="datetime-local"> </td>
                              <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['wh2_in'])); ?>"  name="wh2_in" type="datetime-local"> </td>
                               <td><input value="<?php echo date('Y-m-d\TH:i', strtotime($row5['wh2_out'])); ?>"  name="wh2_out" type="datetime-local"> 
                               
                               </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <center>
         <input type="submit" name="update" value="UPDATE"><br><br>
        	<div class="form-group">
         
            <input type="button" onclick="cancel()" class="btn btn-danger btn-lg btn-block" value="Cancel">
        </div>
        </center>
        </form>


        <?php
        }
        if(isset($_POST['update'])){
            
            $req_id = $_POST['req_id'];
        
        $rfid = $_POST['rfid'];
        $wh1_in=$_POST['wh1_in'];
           $wh1_out=$_POST['wh1_out'];
            $stn1_in=$_POST['stn1_in'];
             $stn1_out=$_POST['stn1_out'];
              $stn2_in=$_POST['stn2_in'];
               $stn2_out=$_POST['stn2_out'];
                $wh2_in=$_POST['wh2_in'];
                $wh2_out=$_POST['wh2_out'];
               
         
        $sql_u="UPDATE 
                        `track_rfid` 
                    SET 
                        
                         `wh1_in`='$wh1_in',
                             `wh1_out`='$wh1_out',
                             `stn1_in`='$stn1_in',
                             
                             `stn1_out`='$stn1_out',
                              `stn2_in`='$stn2_in',
                               `stn2_out`='$stn2_out',
                                 `wh2_in`='$wh2_in',
                             `wh2_out`='$wh2_out'
                    WHERE 
                        `req_id`='$req_id' 
                "  ;  
               
                
         $result_u = $conn->query($sql_u);
         
        if($result_u){
            ?><script>alert("Success !");
            
            window.location = "adminPage.php?page=time_tracking";
            </script><?php
        }
        else{
             ?><script>alert("Something wrong !");</script><?php
           // echo $sql_u;
        }
    }
        
?>

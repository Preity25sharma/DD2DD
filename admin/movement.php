<?php
  
    include("../db.php");
    $Corridor="WDFC";
    $Directn="UP";
    date_default_timezone_set("Asia/Kolkata");
    $Date=date("Y-m-d");
?>

    <body>
         <center>
            <form method="post">
               
                <input type="radio" 
                        name="Corridor" 
                        value="WDFC" 
                        onclick="submit()" 
                        <?php
                            if(isset($_POST['Corridor'])){
                                if($_POST['Corridor']=="WDFC"){
                                    echo "checked";
                                }
                            } 
                        ?> 
                >
                WDFC | 
                <input  type="radio" 
                        name="Directn" 
                        value="UP" 
                        onclick="submit()"
                        <?php
                            if(isset($_POST['Directn'])){
                                if($_POST['Directn']=="UP"){
                                    echo "checked";
                                }
                            }
                            else{
                                if(!isset($_POST['Directn'])){
                                    echo "checked";
                                }
                            } 
                        ?> 
                >UP
                <input type="radio" 
                        name="Directn" 
                        value="DN" 
                        onclick="submit()" 
                        <?php
                            if(isset($_POST['Directn'])){
                                if($_POST['Directn']=="DN"){
                                    echo "checked";
                                }
                            } 
                        ?> 
                >DN |
                <input type="date"
                       name="Date"  
                       <?php 
                            if(isset($Date)){?>
                                value="<?php echo date_format(date_create($_POST['Date']),"Y-m-d");?>"<?php
                            }
                            else{?>
                                value="<?php echo date("Y-m-d");?>"<?php
                            }
                        ?>  
                       onchange="submit()"
                >
                
                <input type="submit" name="submit" value="Click Here">
            </form>
        </center>
          
           <?php
                if(isset($_POST['submit'])) {
                    ?>
                        <div class="tableFixHead">    
            <table style="width:100%; margin-left: auto; margin-right: auto; text-align: center;" border="1">
      
        <thead>
           
            <tr style="height: 40px; background-color: yellow; text-align: center;">
                <th> Sl </th>
                <th>Train ID</th>
                <th colspan="2">Loco</th>
                <th>Booking ID</th>
                <th>Tracking ID</th>
                 <th>Total Parcel loaded</th>
                <th>WH1 Dep</th>
                <?php
                    $stn_list=array();
                    if(isset($_POST['Corridor'])){
                        $Corridor=$_POST['Corridor'];
                        
                    }
                    if(isset($_POST['Directn'])){
                        $Directn=$_POST['Directn'];
                    }
                    if(isset($_POST['Date'])){
                        $Date=date_format(date_create($_POST['Date']),"Y-m-d");
                    }
                    $sql="SELECT 
                                Stn_code,
                                Kms
                                FROM `ref_Stnmaster`
                                WHERE `Corridor`='$Corridor' 
                                    AND status='active'
                                ORDER BY $Directn ASC";
                               
                    $result = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_assoc($result)) {
                        array_push($stn_list,$row['Stn_code']);
                        ?><th><a><?php echo $row['Stn_code'];?></a><br><a style='color:green;'><?php echo round($row['Kms'],1);?></a></th><?php
                    }
                ?>
                <th>Wh2 Arrival</th>
                
                  
               
            </tr>
            
        </thead>
        <tbody>
             <?php
             $rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");
                $sl=1;
                $sql=" SELECT  *,  Count(`req_id`) as num,
                            DATE_FORMAT(`wh1_out`, '%H:%i') as wh,
                            DATE_FORMAT(`stn2_out`, '%H:%i') as stnout
                            FROM track_rfid 

                        
                        WHERE
                                corridor='$Corridor'
                            AND
                                Directn='$Directn' 
                                AND `stn1_in`!='NULL'
                            AND
                                (
                                        DATE(`wh1_out`) LIKE '%$Date%' 
                                   
                                            AND (
                                                    DATE(`stn2_out`) IS NULL 
                                                OR 
                                                    DATE(`stn2_out`) LIKE '%$Date%' 
                                                )
                                        )
                                
                       
                             group by `train_id`
                    ";
               
                //echo $sql;
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)) {
                       $req_id= $row['req_id'];
                 $train_id= $row['train_id'];
                  
                // echo $train_id;
            $user_sql5 = "SELECT *  FROM `Request_Quote` WHERE  `req_id`='$req_id' ";
            $result5 = mysqli_query($conn, $user_sql5);
            //echo $user_sql5;
            while ($row5 = mysqli_fetch_array($result5)) {
                 $src_loc= $row5['src_loc'];
                     $dest_loc= $row5['dest_loc'];
                        ?>
          
  <tr>
                        <td ><?php echo $sl; ?></td> 
                          <td><a href=<?php echo "/DD2DD/trackview.php?train_id=$train_id"; ?>><?php echo $row['num']; ?></a></td>
                        <td><?php echo $row['train_id'] ?></td>
                        <td></td>
                       <td></td>
                       
                          <td><?php echo $row5['src_loc'] ?> - <?php echo $row5['dest_loc'] ?></td>
                         
                          <td><?php echo $row['wh'] ?></td>
                      <?php
                             include("../db.php"); 
                            
                            foreach( $stn_list as $value2){
                                $sql3="SELECT 
                                            DATE_FORMAT(`ArrDateTime`, '%H:%i') AS 'A', 
                                            DATE_FORMAT(`DepDateTime`, '%H:%i') AS 'T' 
                                        FROM trainpassing 
                                        WHERE 	TrainId='$train_id'
                                        AND   `Stn`='$value2'  ;";
                                $result3 = mysqli_query($conn, $sql3);
                                $row3=mysqli_fetch_assoc($result3);
                               
                              // echo $sql3;
                                         ?><td style="height: 25px;  text-align: center; "><?php echo $row3['A']."<br>".$row3['T'];?></td><?php
                                         
                            }
                            
                       ?>
                              <td><?php echo $row['stnout'] ?></td>    
                                
                        
                   </tr>
                    <?php
    $sl+= 1;

}
}
?>
        </tbody>
        
    </table>
        </div>
                    <?php
                }
    
                ?>
              

    </body>

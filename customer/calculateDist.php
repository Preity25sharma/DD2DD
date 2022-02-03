<?php
$rootpath = dirname(__DIR__,1);
include($rootpath.'/db/db_dd2dd.php');
include('session/usercheck.php');
//echo "Welcome " . $userName;
date_default_timezone_set("Asia/Kolkata");
$reqId = $_GET['req'];
$srcEloc=$_GET['src'];

$sql_hub = "SELECT `hub_id`, `hubName`, `hubEloc`, `hubArea` FROM `Hub_Details`";
$sql_quote = "SELECT  `req_id`, `src_loc`, `dest_loc`, `src_eloc`, `dest_eloc`, `item_type`, `item_weight`, `item_dim`, `pakaging_flg` FROM `Request_Quote` WHERE `req_id`='$reqId'";
//echo $sql_quote ;
$res_hub = mysqli_query($conn, $sql_hub);
$res_quote = mysqli_query($conn, $sql_quote);
$quote = mysqli_fetch_array($res_quote);
$paymentId = rand();
$paymentType = 'card';
$status = 'success';

if (isset($_POST['submit'])) {
    $booking_id = $quote['req_id'];
    $srcLoc = $quote['src_loc'];
    $destLoc = $quote['dest_loc'];
    $srcEloc = $quote['src_eloc'];
    $destEloc = $quote['dest_eloc'];
    $itemType = $quote['item_type'];
    $itemWeight = $quote['item_weight'];
    $itemDim = $quote['item_dim'];
    $packageFlg = $quote['packaging_flg'];
    
    $sql_in = "INSERT INTO `Booking`( `user_id`, `booking_id`, `src_loc`, `dest_loc`, `src_eloc`, `dest_eloc`, `item_type`, `item_weight`, `item_dim`, `pakaging_flg`) VALUES 
($userId,$booking_id,'$srcLoc','$destLoc','$srcEloc','$destEloc','$itemType',$itemWeight,'$itemDim','$packageFlg')";
$result = mysqli_query($conn, $sql_in); 
    $sql = "INSERT INTO `Payment`(`booking_id`, `payment_id`, `paymentType`, `paymentStatus`) VALUES ('$booking_id','$paymentId','$paymentType','$status')";
    
    $res = mysqli_query($conn, $sql);
    
 ?>   
    <script>
        // window.location = 'pymnt_gtwy.php?book=' + "<?php echo $reqId; ?>";
        window.open('https://rzp.io/l/HWunoqu', '_blank');
    </script>

<?php }

?>

<!DOCTYPE html>
<html lang="en">
<center>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Request a Quote Form</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/login.css">
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <!--put your map api javascript url with key here-->
        <script src="https://apis.mapmyindia.com/advancedmaps/v1/b7c0a06a29bfa826f90ef2b569d2cfff/map_load?v=1.2"></script>
        <div class="row">
            <div>
                &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success" onclick="history.go(-1)">Back</button>
            </div>
           
        </div>
    </head>
<center>
    <body>

        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-5 mx-md-4">
                                        <div class="text-left">
                                            <img src="/DD2DD/images/logo.png" style="width: 80px;" alt="logo">
                                            <h4 class="mt-1 mb-5 pb-1">Select An Option</h4>
                                            <h5 class="mt-1 mb-5 pb-1">Step-2 [Book Now]</h5>
                                        </div>
                                        <form method="post" action="">
                                            <div class="form-group">
                                              
                                               
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($res_hub)) {
                                                    
                                                    $dest = $row['hubEloc'];
                                                ?>
                                                   
                                                     <div id="<?php echo 'message'.$i; ?>" name="message" style='font-size:18px'>Showing distance & duration from source location</div>
                                                     <div id="result" name="result" style='font-size:18px'></div>
                                                    <input type="hidden" id="src" value=<?php echo $srcEloc; ?> />
                                                    <input type="hidden" id="<?php echo 'dest'.$i; ?>" value=<?php echo $dest; ?> />

                                                <?php $i++; ?>
                                                <button type="submit" name="submit" class="btn btn-primary btn-block">Book Now</button>
                                               <?php } ?>
                                            

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="src" class="col-lg-6 d-flex align-items-top gradient-custom-2">
                                    <div class="row mt-4">
                                        <input id="srcEloc" type="hidden" value=<?php echo $quote['src_eloc']; ?> 
                                    <div class="col">
                                        <input id="destEloc" type="hidden" value=<?php echo $quote['dest_eloc']; ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
        </section>
    </body>
    </center>
    <script>
        var latitudeArr = [];
        var longitudeArr = [];
        
        for(i=1;i<=5;i++){
           var src = document.getElementById('srcEloc').value;
           var dest = document.getElementById('dest'+i).value;
           call_distance_api(src, dest,i);
        }
        

        function call_distance_api(srceLoc, desteLoc,val) {
            console.log("call_distance_api"+val);
            console.log("src"+srceLoc);
            console.log("dest"+desteLoc);
            var dist_api_url_with_param = "https://apis.mapmyindia.com/advancedmaps/v1/b7c0a06a29bfa826f90ef2b569d2cfff/distance_matrix/driving/" + srceLoc + ";" + desteLoc;
            console.log(dist_api_url_with_param);
            var encode = btoa(dist_api_url_with_param);
            getUrlResult(encode,val);


        }

        var result = "";
        /*function to get Json response from the url*/
        function getUrlResult(api_url,val) {
            console.log("api_url"+val);
            $.ajax({
                type: "POST",
                dataType: 'text',
                url: "getDistance.php",
                async: false,
                data: {
                    url: JSON.stringify(api_url),
                },
                success: function(result) {
                    var resdata = JSON.parse(result);

                    if (resdata.status == 'success') {
                        var jsondata = JSON.parse(resdata.data);
                        if (jsondata.responseCode == 200) {
                            distance_api_result(jsondata.results,val);
                        } else {
                            var res = 'Something went wrong in the response';
                            document.getElementById('result').innerHTML = res;

                        }
                    } else {
                        var error_response = "No Response from API Server. kindly check the keys or request server url"
                        document.getElementById('result').innerHTML = error_response + '</ul></div>'; /***put response result in div****/
                    }

                }
            });
        }

        function distance_api_result(data,val) {
            console.log("distance_api_result"+val);
            var result = "";
            for (var i = 1; i < data.distances[0].length; i++) {
                var duration = data.durations[0][i];
                var distance = data.distances[0][i];
                /*****convert hrs & min********/
                var hours = Math.floor(duration / 3600);
                duration %= 3600;
                var minutes = Math.floor(duration / 60);
                var total_time = (hours >= 1 ? hours + " hrs " : '') + (minutes >= 1 ? minutes + " mins " : '');
                /**************/
                var dist = (distance / 1000).toFixed(1);
                var length = dist + " km";


                result += "<div><span style='padding-right:18px;'>Duration</span>: " + total_time + "</div>";
                result += "<div ><span style='padding-right:18px;'>Distance</span>: " + length + "</div>";
                result += "<div ><span style='padding-right:18px'>Estimated Charges</span>: " + '&#8377;' +2*dist+ "</div>";



            }
            
            if(val==1){
            document.getElementById('message'+1).innerHTML = result;
            }
            if(val==2){
            document.getElementById('message'+2).innerHTML = result;
            }
            if(val==3){
            document.getElementById('message'+3).innerHTML = result;
            }
            if(val==4){
            document.getElementById('message'+4).innerHTML = result;
            }
            if(val==5){
            document.getElementById('message'+5).innerHTML = result;
            }
        }
    </script>

</html>
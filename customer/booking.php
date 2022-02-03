<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
include('session/usercheck.php');
date_default_timezone_set("Asia/Kolkata");

if (isset($_POST['submit'])) {?>

<?php 
    $srcLoc = $_POST['autocomplete'];
    $destLoc = $_POST['autocomplete1'];
    $srcEloc = $_POST['srceLoc'];
    $destEloc = $_POST['desteLoc'];
    $itemType = $_POST['type'];
    $itemWeight = $_POST['weight'];
    $l = $_POST['length'];
    $b = $_POST['width'];
    $h = $_POST['height'];
    $itemDim = $l."x".$b."x".$h;
    $packFlg = $_POST['packaging'];
    $reqId = rand();
    $sql = "INSERT INTO `Request_Quote`(`req_id`, `src_loc`, `dest_loc`, `src_eloc`, `dest_eloc`, `item_type`, `item_weight`, `item_dim`, `pakaging_flg`) VALUES
                                       ('$reqId','$srcLoc','$destLoc','$srcEloc','$destEloc','$itemType','$itemWeight','$itemDim','$packFlg')";
    echo $sql;
    $result = mysqli_query($conn, $sql);?>
    <script>
    window.location = 'calculateDist.php?req=' + "<?php echo $reqId; ?>";
    </script>
<?php   
}
?>


  <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                
                                <div class="text-center">
                                    <img src="../images/logo.png" style="width: 100px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Fill Booking Details</h4>
                    <h5 class="mt-1 mb-5 pb-1">Step 1 [Request a Quote]</h5>
                </div>

                <form method="post">
                  
                  <div class="form-outline mb-4 text-left">
                     <label style="width:190px" for="source">Source Location</label>
                     
                     <input  type="text" id="autocomplete" name="autocomplete"   class="search-outer form-control as-input" placeholder="Search source location"  spellcheck="false">
                     <input  class="form-control" id="srceLoc" name="srceLoc" type="hidden">                        
                  </div>

                  <div class="form-outline mb-4 text-left">
                     <label style="width:190px" for="destination">Destination Location</label>
                     
                    <input  type="text" id="autocomplete1" name="autocomplete1"  class="search-outer form-control as-input" placeholder="Search destination location"  spellcheck="false">
                   	<input  class="form-control" id="desteLoc" name="desteLoc" type="hidden" >
                  </div>
                  <div class="form-outline mb-4 text-left">
                     <label style="width:80px" for="category">Category</label>
                     <select style="width:200px" name="type">
			            <option selected="">Select</option>
			            <option>Small package</option>
			            <option>Medium </option>
			            <option>Large</option>
		            </select>
                    
                  </div>
                  <div class="form-outline mb-4 text-left">
                     <label style="width:90px" for="destination">Weight</label>
                   	<input  style="width:200px" id="weight" name="weight" type="text" placeholder="Approx. weight in kg">
                  </div>
                  
                  <div class="form-outline mb-4 text-left">
		              <label style="width:60px" for="size">Size</label>
                      	<input name="length" style="max-width:60px" placeholder="L cm" type="text">
                      	<label style="width:10px" >X</label>
                      	<input name="width" style="max-width:60px" placeholder="W cm" type="text">
                      	<label style="width:10px" >X</label>
                      	<input name="height" style="max-width:60px" placeholder="H cm" type="text">
                        
                  </div>
                  
                  <div class="form-outline mb-4 text-left">
                      <label style="width:150px" for="packaging">Need Packaging</label>
                      <input class="form-check-input" type="radio" name="packaging" id="pack_y" value="yes">
                   <label class="form-check-label" for="pack_y">
                                    <br>    Yes
                      </label>
                      
                      <label style="width:50px" for="packaging"></label>
                      <input class="form-check-input" type="radio" name="packaging" id="pack_n" value="no" checked>
                      <label class="form-check-label" for="pack_n" >
                       No
                      </label>
                  </div>
         
                  <div class="form-group">
                    <button type="submit" name="submit" onclick="get_geocode_result()" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"> Confirm  </button>
                  </div>

                </form>
 </div>
              </div>
            
            <div id="src" class="col-lg-6 d-flex align-items-top gradient-custom-2" >
             <?php include('../maps/mapApi.php');?>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<script type="text/javascript">
    /*function to get geocode result from the url*/
        function get_geocode_result() {
            console.log("in get_geocode_result");
            var src_id = document.getElementById('autocomplete');
            var dest_id = document.getElementById('autocomplete1');
            //var itemCount = parseInt(document.getElementById('itemcount').value);
            var itemCount = 2;
            var srcaddress = src_id.value;
            var destaddress = dest_id.value;
            getUrlResult(srcaddress, itemCount,'src'); /*get JSON resp*/
            getUrlResult(destaddress, itemCount,'dest'); /*get JSON resp*/
        }
        
        /*function to get Json response from the url*/
        function getUrlResult(address, itemCount,loc) {
            console.log("address");
            $.ajax({
                type: "GET",
                dataType: 'text',
                url: "getResponseGeoCode.php",
                async: false,
                data: {
                    address: address,
                    itemCount: itemCount
                },
                success: function (result) {
                    if (result !== undefined) {
                        var resdata = JSON.parse(result);
                        var copResults;
                        if (resdata.status === 'success') {
                            var jsondata = JSON.parse(resdata.data);
                            copResults = jsondata.copResults;
                            if (!Array.isArray(copResults)) {
                                copResults = Array.from(Object.keys(jsondata), k => jsondata[k])
                            }
                            if (copResults.length > 0) {
                                console.log(copResults[0].eLoc);
                                if(loc=='src')
                                document.getElementById('srceLoc').value=copResults[0].eLoc;
                                if(loc=='dest')
                               document.getElementById('desteLoc').value=copResults[0].eLoc;
                               
                            }
                        } 
                    } 
                }
            });
        }
    
</script>



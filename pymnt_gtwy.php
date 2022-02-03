<?php
$rootpath = dirname(__DIR__);
include('db/db_dd2dd.php');
//include($rootpath . "session_mgmt/usercheck.php");
date_default_timezone_set("Asia/Kolkata");
$bookId = $_GET['book'];
$sql_quote = "SELECT  `req_id`, `src_loc`, `dest_loc`, `src_eloc`, `dest_eloc`, `item_type`, `item_weight`, `item_dim`, `pakaging_flg` FROM `Request_Quote` WHERE `req_id`='$bookId'";
//echo $sql_quote;
$result = mysqli_query($conn, $sql);
$res_quote = mysqli_query($conn, $sql_quote);
$quote = mysqli_fetch_array($res_quote);
 
if (isset($_POST['pay'])) {?>

<script>
    alert("Payment Successful!");
    window.location = 'https://rzp.io/l/HWunoqu';
</script>

<?php } ?>
<!DOCTYPE html>
<html lang="en">
<center>
 <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Payment Gateway</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/pymnt_gtwy.css">
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<body>
<div class="row">
              <div>
                     &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success" onclick="history.go(-1)">Back</button>
                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="location.href='index.php';">Home</button>
                </div>
            </div>

<div class="container bg-light d-md-flex align-items-center">
    <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
        <div class="d-flex flex-column mb-4"> <span class="far fa-file-alt text"><span class="ps-2">BOOKING ID:</span></span> <span class="ps-3"><?php echo $bookId; ?></span> </div>
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between text"> <span class="">Amount</span> <span class="fas fa-rupee-sign"><span class="ps-1">250</span></span> </div>
            <div class="d-flex align-items-center justify-content-between text"> <span class="">GST(18%)</span> <span class="fas fa-rupee-sign"><span class="ps-1">45</span></span> </div>
            <div class="border-bottom mb-4"></div>
            <div class="d-flex align-items-center justify-content-between text mb-4"> <span>Total</span> <span class="fas fa-rupee-sign"><span class="ps-1">295</span></span> </div>
            <div class="border-bottom mb-4"></div>
            
            
                     <div class="row justify-content-left">
                    <div class="flex-sm-col text-left col">
                            <p class="mb-1">From: </p>
                        </div>
                        <div class="flex-sm-col col-auto">
                            <p class="mb-1"><?php echo $quote['src_loc']; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-left">
                        <div class="flex-sm-col text-left col">
                            <p class="mb-1">To: </p>
                        </div>
                        <div class="flex-sm-col col-auto">
                            <p class="mb-1"><?php echo $quote['dest_loc']; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-left">
                        <div class="flex-sm-col text-left col">
                            <p class="mb-1">Category</p>
                        </div>
                        <div class="flex-sm-col col-auto">
                            <p class="mb-1"><?php echo $quote['item_type']; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-left">
                        <div class="flex-sm-col text-left col">
                            <p class="mb-1">Weight</p>
                        </div>
                        <div class="flex-sm-col col-auto">
                            <p class="mb-1"><?php echo $quote['item_weight']; ?>Kg</p>
                        </div>
                    </div>
        </div>
            <div class="d-flex align-items-center justify-content-between text mt-5">
                <div class="d-flex flex-column text"> <span>Customer Support:</span> <span>online chat 24/7</span> </div>
                <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
            </div>
        </div>
        
        
    <div class="card box2 shadow-sm">
        <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span class="h5 fw-bold m-0">Payment methods</span>
            <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div>
        </div>
        <ul class="nav nav-tabs mb-3 px-md-4 px-2">
            <li class="nav-item"> <a class="nav-link px-2 active" aria-current="page" href="pymnt_gtwy.php">Credit Card</a> </li>
            <li class="nav-item"> <a class="nav-link px-2" href="pymnt_debit.php">Debit Card</a> </li>
            <li class="nav-item"> <a class="nav-link px-2" href="upi_pymnt.php">UPI </a> </li>
            <li class="nav-item ms-auto"> <a class="nav-link px-2" href="#">+ More</a> </li>
        </ul>
        
        <br><br>
        <form method="post">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4">
                      <div class="inputWithIcon"><input required name="name" class="form-control" placeholder="Enter Card No"  type="text"><span class=""> <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt=""></span> </div> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column ps-md-5  px-4 mb-4">
                        <div class="inputWithIcon"> <input type="varchar" class="form-control" placeholder="Expiry Date" ></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column pe-md-5  px-4 mb-4">
                        <div class="inputWithIcon"> <input type="password" class="form-control" placeholder="CVV"><span class="fas fa-lock"></span></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4">
                        <div class="inputWithIcon"> <input class="form-control" type="text" placeholder="Card holder Name"><span class="far fa-user"></span> </div>
                    </div>
                </div>
                <div class="col-12 px-md-5 px-4 mt-3">
                    <input type ="submit"  name="pay" value="Pay" class="btn btn-primary w-100">
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
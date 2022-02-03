
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
<br><div class="row">
              <div>
                     &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success" onclick="history.go(-1)">Back</button></a>
                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="location.href='index.php';">Home</button>
                </div>
              
           
            </div>
</head>
<body>



<div class="container bg-light d-md-flex align-items-center">
    <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
         <div class="fw-bolder mb-4"><span class="fas fa-rupee-sign"></span><span class="ps-1">250</span></div>
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between text"> <span class="">GST(18%)</span> <span class="fas fa-rupee-sign"><span class="ps-1">45</span></span> </div>
            <div class="d-flex align-items-center justify-content-between text mb-4"> <span>Total</span> <span class="fas fa-rupee-sign"><span class="ps-1">295</span></span> </div>
            <div class="border-bottom mb-4"></div>
            <div class="d-flex flex-column mb-4"> <span class="far fa-file-alt text"><span class="ps-2">Invoice ID:</span></span> <span class="ps-3">SN8478042099</span> </div>
          
            <div class="d-flex align-items-center justify-content-between text mt-5">
                <div class="d-flex flex-column text"> <span>Customer Support:</span> <span>online chat 24/7</span> </div>
                <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
            </div>
        </div>
    </div>
    <div class="card box2 shadow-sm">
        <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span class="h5 fw-bold m-0">Payment methods</span>
            <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div>
        </div>
        <ul class="nav nav-tabs mb-3 px-md-4 px-2">
            <li class="nav-item"> <a class="nav-link px-2 "  href="pymnt_gtwy.php">Credit Card</a> </li>
            <li class="nav-item"> <a class="nav-link px-2" href="pymnt_debit.php">Debit Card</a> </li>
            <li class="nav-item"> <a class="nav-link px-2 active" aria-current="page" href="upi_pymnt.php">UPI </a> </li>
            <li class="nav-item ms-auto"> <a class="nav-link px-2" href="#">+ More</a> </li>
        </ul>
        <br><br>
        <form action="">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4">
                        <div class="inputWithIcon"> <input class="form-control" placeholder="Beneficiary UPI ID" type="text" ></div>
                    </div>
                </div>
               
                <div class="col-12 px-md-5 px-4 mt-3">
                    <div class="btn btn-primary w-100">Verify</div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
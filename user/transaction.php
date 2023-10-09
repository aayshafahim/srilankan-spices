<?php
session_start();
include '..\includes\bootstrap.php';
include '..\includes\dbconnect.php';

if(!isset($_SESSION['details'])) {
    exit;
}



        ?>
 <html>
 <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
h6,h5{
    font-weight: bold;
}
</style>
 </head>
<body>

        <section class="vh-90 pt-5" style="font-family: Canela,serif;">
  <div class="container py-5 h-90">
    <div class="row d-flex justify-content-center align-items-center h-90">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="..\images\package.jpg"
                alt="spices" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="../phpmailer/summary.php" >
                        <div class='alert alert-success text-center'>Order Placed Successfully !</div>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0"><img style="width:100px" src="..\images\logo.png"></span>
                    <h5 style="color:#8D2F01;">&nbsp&nbsp&nbspOrder Summary</h5>
           
                  </div>
                    <br>

                  <h6>Order Name:- <?php echo $_SESSION['details']['name']; ?></h6>
                  <h6>Email:-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp<?php echo $_SESSION['details']['email']; ?></h6>
                  <h6>Contact No:-&nbsp&nbsp <?php echo $_SESSION['details']['phone']; ?></h6>
                  <h6>Address:- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $_SESSION['details']['name']; ?>,<?php echo $_SESSION['details']['add1']; ?>,<?php echo $_SESSION['details']['add2']; ?>,<?php echo $_SESSION['details']['add3']; ?></h6>
                  <h6>Total Bill:-&nbsp&nbsp&nbsp &nbsp&nbsp<?php echo $_SESSION['details']['tot']; ?>&nbspLKR</h6>
                  <h6>Products:-&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<?php echo $_SESSION['details']['products']; ?>&nbsp</h6>
                  <h6>Date:-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<?php echo date("Y-m-d"); ?>&nbsp</h6>
                  <h6>Time:-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<?php echo date("h:i:sa");?></h6>

                  <br>
                  <br>


                  <input type="hidden" name="name" value="<?php echo $_SESSION['details']['name']; ?>">
                  <input type="hidden" name="email" value="<?php echo $_SESSION['details']['email']; ?>">
                  <input type="hidden" name="phone" value="<?php echo $_SESSION['details']['phone']; ?>">
                  <input type="hidden" name="address" value="<?php echo $_SESSION['details']['add1']; ?>,<?php echo $_SESSION['details']['add2']; ?>,<?php echo $_SESSION['details']['add3']; ?>">
                  <input type="hidden" name="tot" value="<?php echo $_SESSION['details']['tot']; ?>LKR">
                  <input type="hidden" name="time" value="<?php echo date("h:i:sa"); ?>">
                  <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
                  <input type="hidden" name="items" value="<?php echo $_SESSION['details']['products']; ?>">

                  
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-md btn-block" type="submit" name="sendmsg">Continue Shopping</button>
                  </div>
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
        <?php
    



?>
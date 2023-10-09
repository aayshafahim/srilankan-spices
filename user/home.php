<?php
session_start();
include 'navbar.php';

$username=$_SESSION['username'];


?>
<html>
<head>
<style>

.fixedbg{

  background-image: url("../images/bg.jpg");
  min-height: 700px;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.scard {
    margin-right: auto;
    margin-left: auto;
    width: 450px;
    box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
    height: 230px;
    border-radius: 5px;
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.2);
    padding: 10px;
    text-align: center;
    opacity: 0.9;
}

</style>
</head>
<body >

<div class="fixedbg" style="font-family: Canela,serif;">



<br><br><br><br><br><br><br><br><br>
<div class="d-flex justify-content-center">
	<div class="border-danger bg-danger card scard ">
		<div class="card-body text-dark">
			<h5 class="card-title"  style="color:white;font-size:40;font-weight:bold">Hi! <?php echo $username ?></h5><br>
			<button onclick="window.location='shop.php';" style="color:red;" type="button" class="btn btn-light">Shop Hot & Spicy</button>
		</div>
	</div>
</div>
</div>
<div style="background-color:#627261;padding:30px" >
<center>
<div class="container " >
  <div class="row" style="font-family: Canela,serif;">
    <div class="col">
		<img style="width:45px" src="..\images\100-percent.png">
		<h5 style="color:white;font-weight:bold;font-size:px;">100% Local Spices</h5>
    </div>
    <div class="col">
		<img style="width:45px" src="..\images\delivery.png">
		<h5 style="color:white;font-weight:bold">Spices straight to your door</h5>
    </div>
    <div class="col">
		<img style="width:45px" src="..\images\satisfaction.png">
		<h5 style="color:white;font-weight:bold">100% Satisfaction Guarantee</h5>
    </div>
  </div>
</div>
</center>
</div>
<br><br><br>

<div>
<center>
<h1 style="color:#5C6F46"><b>What we Stand for</b></h1>
<h4 style="color:#5C6F46">Our reputation of authenticity stems from our passion to deliver the best.</h4>
<br><br><br>





</body>
</html>
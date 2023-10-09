<?php
include '..\includes\bootstrap.php'; 
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>
	<style>


.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
  margin-left:250px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
	
</head>


<body>

<div id="mySidenav" class="sidenav ">
  <a href="#"><img style="width:45%;" src="images\logo.png"></a><br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="nav-link active" href="#">Dashboard</a>
  <a href="product_manage.php">Manage Products</a>
  <a href="card_manage.php">Manage Cards</a>
  <a href="guest_transaction_manage.php">Guest Transaction</a>
  <a href="admin_manage.php">Manage Admins</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <a href="admin_logout.php">Hi ,<?php echo $_SESSION['username']; ?><br>Log Out</a>
</div>

<div id="main">
  <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; OPEN</span><br>
  
  <?php include 'admin_dashboard.php'; ?>
	<div class="container mt-3" >
        <h2 class="display-6">Dashboard</h2>
        <div class="row mt-3" >
            <div class="col-md-3">
                <div class="card border-warning" >
                    <div class="card-header" style="font-weight:bold">
                        Total Admins
                    </div>
                    <div class="card-body" >
                        <h4 style="text-align:center" ><?php echo $all_admins; ?></h4>
						<a href="admin_manage.php" class="btn btn-outline-primary">More Info</a>
                    </div>
                </div>
            </div>
            
			
			
            <div class="col-md-3">
                <div class="card border-warning">
                    <div class="card-header" style="font-weight:bold">
                        Total Users
                    </div>
                    <div class="card-body">
                        <h4><?php echo $total_customers; ?></h4>
                        <a href="admin_manage.php" class="btn btn-outline-primary">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning">
                    <div class="card-header" style="font-weight:bold">
                        Total Products
                    </div>
                    <div class="card-body">
                        <h4><?php echo $total_products; ?></h4>
						<a href="product_manage.php" class="btn btn-outline-primary">More Info</a>
                    </div>
                </div>
            </div>
			<div class="col-md-3">
                <div class="card border-warning">
                    <div class="card-header" style="font-weight:bold">
                        Total Suppliers
                    </div>
                    <div class="card-body">
                        <h4><?php echo $total_suppliers; ?></h4>
                        <a href="product_manage.php" class="btn btn-outline-primary">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>

















<body>
<br><br>
    
	
	
	
	
	
	
	
	
	
	
	
	
   
</body>
</html>
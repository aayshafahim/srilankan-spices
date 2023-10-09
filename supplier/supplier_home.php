<?php
session_start();
include '..\includes\bootstrap.php';
include '..\includes\dbconnect.php';


if(!isset($_SESSION['email'])) {
    header("Location: supplier_login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Product Manage</title>
	<style>


.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #627261;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: white;
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

.pad{
	padding-left:10px;
}

.fixedbg{

  background-image: url("https://cdn.shopify.com/s/files/1/0148/1945/9126/t/673/assets/bg-pattern.svg");
  min-height: 110px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}
</style>
	<script>
		
	</script>

	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>

<div id="mySidenav" class="sidenav ">
  <a href="#"><img style="width:45%;" src="images\suplogo.png"></a><br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Manage Product</a>
  <a href="supplier_card.php">Manage Card</a>
  <a href="#">Chat Box</a>
  <a href="supplier_guest_transaction.php">Guest Transactions</a>
  <a style="color: #8D2F01;" href="supplier_logout.php"><br>Log Out</a>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
</div>

<div id="main">
	<div class="fixedbg">
  <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; OPEN</span><br><br><br>
  
  <h2 style="color: #3D4047;">PRODUCT MANAGEMENT PANAL</h2><br>
  <br><br><br>
  		</div>


<?php

$email = $_SESSION['email'];

// Retrieve data from the database
	$sql = "SELECT * FROM product_details where sup_email = '$email'";    
      $result = mysqli_query($conn, $sql);



// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
	<thead>
    <tr>
      <th>#</th>      
      <th>Product Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Preview</th>
      <th>Availability</th>
      <th>Tools</th>
    </tr>
  </thead>
  <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
      	
 echo "<tr>
      <th>".$row['id']."</th>
      <td>".$row['name']."</td>
      <td>".$row['description']."</td>
      <td>".$row['price']."</td>
      <td><img style='width:80px' src='../admin/".$row['photo']."'></td>
      <td>".$row['availability']."</td>
      <td><form method='post'><input type='hidden' name='id' value='".$row['id']."'>
			<button class='btn btn-outline-primary px-4' type='submit' name='edit' value='Edit'>Edit</button>
			<button class='btn btn-outline-danger px-2' type='submit' name='delete' value='Delete'>Remove</button></form></td>
     
    </tr>";
	}
	
	echo"	</tbody>
			</table>";
} else {
	
    echo "No Products found.";
}

if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$_SESSION['id'] = $id;
		echo"<script>
    	window.location = 'supplier_product_edit.php';
		</script>";
		ob_end_flush();
        exit;
}
  
 if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$_SESSION['id'] = $id;
       echo " <script>
    window.location = 'supplier_product_delete.php';
</script>";
        exit;
} 

		
  

mysqli_close($conn);


?>
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
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
  <a href="supplier_home.php">Manage Product</a>
  <a href="supplier_card.php">Manage Card</a>
  <a href="#">Chat Box</a>
  <a href="#">Guest Transactions</a>
  <a style="color: #8D2F01;" href="supplier_logout.php"><br>Log Out</a>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
</div>

<div id="main">
	<div class="fixedbg">
  <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; OPEN</span><br><br><br>
  
  <h2 style="color: #3D4047;">GUEST TRANSACTION MANAGEMENT PANAL</h2><br>
  <br><br><br>
  		</div>


<?php

  $email = $_SESSION['email'];
  // Retrieve data from the database
  $sql = "SELECT * FROM guest_transaction where sup_emails like '%$email%' ";
  $result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
  <thead>
    <tr>
      <th>#</th>      
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>ZipCode</th>
      <th>Total Price</th>
      <th>Products</th>

    </tr>
  </thead>
  <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        
 echo "<tr>
      <th>".$row['id']."</th>
      <td>".$row['fname']."</td>
      <td>".$row['email']."</td>
      <td>".$row['phone']."</td>
      <td>".$row['address']."</td>
      <td>".$row['zipcode']."</td>
      <td>".$row['totalprice']."</td>
      <td>".$row['products']."</td>
      
     
    </tr>";
  }
  
  echo" </tbody>
      </table>";
} else {
  
    echo "No admins found.";
}

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $_SESSION['id'] = $id;
        header("Location: admin_edit.php");
        exit;
}
  
 if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $_SESSION['id'] = $id;
        header("Location: admin_delete.php");
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
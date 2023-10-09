<?php

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit;
}

include '..\includes\dbconnect.php';
include '..\includes\bootstrap.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Manage</title>
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

.pad{
	padding-left:10px;
}
</style>
	
</head>


<body>

<div id="mySidenav" class="sidenav ">
  <a href="#"><img style="width:45%;" src="images\logo.png"></a><br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="nav-link" href="admin_panel.php">Dash Board</a>
  <a href="product_manage.php">Manage Products</a>
  <a href="card_manage.php">Manage Cards</a>
  <a href="guest_transaction_manage.php">Guest Transaction</a>
  <a href="admin_manage.php">Manage Admins</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <a href="admin_logout.php">Hi ,<?php echo $_SESSION['username']; ?><br>Log Out</a>
</div>

<div id="main">
  <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; OPEN</span><br><br><br>
  
  <h2>ADMIN MANAGEMENT PANAL</h2><br>
  <button class="btn btn-secondary" onclick="location.href='admin_add.php'">New Admin</button><br><br>
  
  <?php
	// Retrieve data from the database
	$sql = "SELECT * FROM admin_details";
	$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
	<thead>
    <tr>
      <th>#</th>      
      <th>Username</th>
      <th>Email</th>
      <th>Tools</th>
    </tr>
  </thead>
  <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
      	
 echo "<tr>
      <th>".$row['id']."</th>
      <td>".$row['username']."</td>
      <td>".$row['email']."</td>
      <td><form method='post'><input type='hidden' name='id' value='".$row['id']."'>
			<button class='btn btn-outline-primary px-4' type='submit' name='edit' value='Edit'>Edit</button>
			<button class='btn btn-outline-danger px-2' type='submit' name='delete' value='Delete'>Remove</button></form></td>
     
    </tr>";
	}
	
	echo"	</tbody>
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
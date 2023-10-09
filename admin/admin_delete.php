<?php

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: admin_manage.php");
    exit;
}
$id=$_SESSION['id'];
 
 include '..\includes\dbconnect.php';
 include '..\includes\bootstrap.php';
 
 $sql = "SELECT * FROM admin_details WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
echo"	
<div style='max-width:500px;margin:auto'>
<br><br><br><br><br><br>
	<h1 class='display-6 text-center'>REMOVE ADMIN</h1>
	<br><br>
	<form method='POST' class='px-5'>	
	<div class='mb-3' >
    <label class='form-label'><b>User Name</b></label>
    <input value='".$row['username']."' type='text' class='form-control' name='username' required disabled>    
	</div>
	<div class='mb-3'>
    <label class='form-label'><b>Email</b></label>
    <input value='".$row['email']."' type='text' class='form-control' name='email' required disabled>
	</div>
	<div class='pt-3'>
    <button style='width:49.2%;' type='submit' class='btn btn-outline-danger' name='delete'  >Remove</button>
	<button style='width:49.2%;' type='submit' class='btn btn-outline-success' name='cancel'  >Cancel</button>
	</div>
	
	</form>
</div>";

if(isset($_POST['cancel'])){
	header("Location: admin_manage.php");
    exit;
}

if(isset($_POST['delete'])){
	
	$sql = "DELETE FROM admin_details WHERE id=$id;";
	if (mysqli_query($conn, $sql)) {
				
				echo '<div class="alert alert-success text-center">User Removed successfully.</div>';				
				header("Refresh: 1;url=admin_manage.php");
				exit;
			
        
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}

?>
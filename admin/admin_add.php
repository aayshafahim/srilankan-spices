<?php 
include '..\includes\dbconnect.php';
 include '..\includes\bootstrap.php';
 ?>
<div style="max-width:500px;margin:auto"><br><br><br><br><br><br>
<h2 class="display-6 text-center"><b>Register Admin</b></h2>
	<br><br>
	<form method="POST" class="px-5">
	
	
  <div class="mb-3" >
    <label class="form-label"><b>User Name</b></label>
    <input type="text" class="form-control" name="username" required>    
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Email</b></label>
    <input type="text" class="form-control" name="email" required>
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Password</b></label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <div class="pt-3">
    <button style="width:49.2%;" type="submit" class="btn btn-outline-primary" name="register"  >Register</button>
	<button onclick="location.href='admin_manage.php'" style="width:49.2%;" type="submit" class="btn btn-outline-danger" name="cancel"  >Cancel</button>
  </div>
</form>
</div>

<?php
	if(isset($_POST['register'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "INSERT INTO admin_details (username, password, email) VALUES ('$username', '$password', '$email');";
	if (mysqli_query($conn, $sql)) {
				
				echo '<div class="alert alert-success text-center">Admin Registered successfully.</div>';				
				header("Refresh: 1;url=admin_manage.php");
				exit;
			
        
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
	
}


?>
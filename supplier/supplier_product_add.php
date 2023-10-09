<?php 
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: supplier_home.php");
    exit;
}

$email = $_SESSION['email'];
include '..\includes\dbconnect.php';
 include '..\includes\bootstrap.php';
 ?>
<div style="max-width:500px;margin:auto"><br><br><br><br><br><br>
<h2 class="display-6 text-center"><b>Register Product</b></h2>
	<br><br>
	<form method="POST" class="px-5" enctype="multipart/form-data">
	
	
  <div class="mb-3" >
    <label class="form-label"><b>Product Name</b></label>
    <input type="text" class="form-control" name="prname" required>    
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Description</b></label>
    <textarea class="form-control" name="prdescription" rows="3" required></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Price</b></label>
    <input type="number" class="form-control" name="price" required>
  </div>
  <div class="mb-3">
  <label class="form-label"><b>Product Availability</b></label><br>
    <input type="radio" class="btn-check" name="availability" value="YES" id="success-outlined" autocomplete="off">
	<label style="width:49.2%;" class="btn btn-outline-success" for="success-outlined">Available</label>
	<input type="radio" class="btn-check" name="availability" value="NO" id="danger-outlined" autocomplete="off">
	<label style="width:49.2%;" class="btn btn-outline-danger" for="danger-outlined">Not Available</label>
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Upload Picture</b></label>
    <input type="file" class="form-control" name="uploadfile" accept="image/*" required>
  </div>  
  <div class="pt-3">
    <button style="width:49.2%;" type="submit" class="btn btn-outline-primary" name="addproduct"  >Add Product</button>
	<button onclick="location.href='supplier_home.php'" style="width:49.2%;" type="submit" class="btn btn-outline-danger" name="cancel"  >Cancel</button>
  </div>
</form>
</div>

<?php
	if(isset($_POST['addproduct'])){
	$name = $_POST['prname'];
	$description = $_POST['prdescription'];
	$price = $_POST['price'];
	$availability = $_POST['availability'];
	
	$target_dir = "uploads/";
	$target_loc = "../admin/uploads/";
	$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
	$target_fileloc = $target_loc . basename($_FILES["uploadfile"]["name"]);
	move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_fileloc);

	
	$sql = "INSERT INTO product_details (name, description, price, photo, availability, sup_email) VALUES ('$name', '$description', '$price', '$target_file', '$availability', '$email');";
	if (mysqli_query($conn, $sql)) {
				
				echo '<div class="alert alert-success text-center">Product Added successfully.</div>';				
				echo "<script>
    window.location = 'supplier_home.php';
</script>";
				exit;
			
        
    } else {
        echo "Error Adding Product.: " . mysqli_error($conn);
       
    }
	
}


?>
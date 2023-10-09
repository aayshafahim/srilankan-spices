<?php

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: product_manage.php");
    exit;
}
$id=$_SESSION['id'];
 
 include '..\includes\dbconnect.php';
 include '..\includes\bootstrap.php';
 
 $sql = "SELECT * FROM product_details WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
echo"	
<div style='max-width:500px;margin:auto'><br><br><br><br><br><br>
<h2 class='display-6 text-center'><b>Edit Product</b></h2>
	<br><br>
	<form method='POST' class='px-5' enctype='multipart/form-data'>
	
	
  <div class='mb-3' >
    <label class='form-label'><b>Product Name</b></label>
    <input type='text' class='form-control' name='prname' value='".$row['name']."' required>    
  </div>
  <div class='mb-3'>
    <label class='form-label'><b>Description</b></label>
    <textarea class='form-control' name='prdescription' rows='3' required>".$row['description']."</textarea>
  </div>
  <div class='mb-3'>
    <label class='form-label'><b>Price</b></label>
    <input type='number' class='form-control' name='price' value='".$row['price']."' required>
  </div>";
   

  if($row['availability']=='YES'){
	echo "
  <div class='mb-3'>
	<label class='form-label'><b>Product Availability</b></label><br>
    <input type='radio' class='btn-check' name='availability' value='YES' id='success-outlined' autocomplete='off' checked >
	<label style='width:49.2%;' class='btn btn-outline-success' for='success-outlined'>Available</label>
	<input type='radio' class='btn-check' name='availability' value='NO' id='danger-outlined' autocomplete='off'>
	<label style='width:49.2%;' class='btn btn-outline-danger' for='danger-outlined'>Not Available</label>
  </div>";
  }else 
	  echo "
  <div class='mb-3'>
  <label class='form-label'><b>Product Availability</b></label><br>
    <input type='radio' class='btn-check' name='availability' value='YES' id='success-outlined' autocomplete='off' >
	<label style='width:49.2%;' class='btn btn-outline-success' for='success-outlined'>Available</label>
	<input type='radio' class='btn-check' name='availability' value='NO' id='danger-outlined' autocomplete='off' checked>
	<label style='width:49.2%;' class='btn btn-outline-danger' for='danger-outlined'>Not Available</label>
  </div>";
  
  
  echo "
  <div class='mb-3'>
    <label class='form-label'><b>Upload Picture</b></label>
    <input type='file' class='form-control' name='uploadfile' accept='image/*'  /><span>".$row['photo']."</span>
  </div>  
  <div class='pt-3'>
    <button style='width:49.2%;' type='submit' class='btn btn-outline-warning' name='update'  >Edit</button>
	<button style='width:49.2%;' type='submit' class='btn btn-outline-danger' name='cancel'  >Cancel</button>
  </div>
</form>
</div>";

if(isset($_POST['cancel'])){
	header("Location: product_manage.php");
    exit;
}

if(isset($_POST['update'])){
	$name = $_POST['prname'];
	$description = $_POST['prdescription'];
	$price = $_POST['price'];
	$availability = $_POST['availability'];
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
	move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);


	if($target_file=='uploads/'){
				
				$sql = "UPDATE product_details SET name='$name', description='$description', price='$price', availability='$availability', photo='".$row['photo']."' WHERE id=$id";
					if (mysqli_query($conn, $sql)) {			
						echo '<div class="alert alert-success text-center">Product Edited successfully.</div>';				
						header("Refresh: 1;url=product_manage.php");
						exit;
			
        
					} else {
						echo "Error Edditing Product.: " . mysqli_error($conn);
       
					}
		
	}else{
		
				$sql = "UPDATE product_details SET name='$name', description='$description', price='$price', availability='$availability', photo='$target_file' WHERE id=$id";
					if (mysqli_query($conn, $sql)) {				
						echo '<div class="alert alert-success text-center">Product Edited successfully.</div>';				
						header("Refresh: 1;url=product_manage.php");
						exit;
			
        
					} else {
						echo "Error Edditing Product.: " . mysqli_error($conn);
       
					}
		
	}

	
	
	
}

?>
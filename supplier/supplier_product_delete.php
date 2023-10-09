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
<h2 class='display-6 text-center'><b>Remove Product</b></h2>
	<br><br>
	<form method='POST' class='px-5' enctype='multipart/form-data'>
	
	
  <div class='mb-3' >
    <label class='form-label'><b>Product Name</b></label>
    <input type='text' class='form-control' name='prname' value='".$row['name']."' disabled>    
  </div>
  <div class='mb-3'>
    <label class='form-label'><b>Description</b></label>
    <textarea class='form-control' name='prdescription' rows='3' disabled>".$row['description']."</textarea>
  </div>
  <div class='mb-3'>
    <label class='form-label'><b>Price</b></label>
    <input type='number' class='form-control' name='price' value='".$row['price']."' disabled>
  </div>";
   

  if($row['availability']=='YES'){
	echo "
			<div class='mb-3'>
				<label class='form-label'><b>Product Availability</b></label><br>
					<input type='radio' class='btn-check' name='availability' value='YES' id='success-outlined' autocomplete='off' checked disabled>
					<label style='width:49.2%;' class='btn btn-outline-success' for='success-outlined'>Available</label>
					<input type='radio' class='btn-check' name='availability' value='NO' id='danger-outlined' autocomplete='off' disabled>
					<label style='width:49.2%;' class='btn btn-outline-danger' for='danger-outlined'>Not Available</label>
			</div>";
  }else 
	echo "
			<div class='mb-3'>
				<label class='form-label'><b>Product Availability</b></label><br>
					<input type='radio' class='btn-check' name='availability' value='YES' id='success-outlined' autocomplete='off' disabled>
					<label style='width:49.2%;' class='btn btn-outline-success' for='success-outlined'>Available</label>
					<input type='radio' class='btn-check' name='availability' value='NO' id='danger-outlined' autocomplete='off' checked disabled>
					<label style='width:49.2%;' class='btn btn-outline-danger' for='danger-outlined'>Not Available</label>
			</div>";
  
  
	echo "
  <div class='mb-3'>
    <label class='form-label'><b>Upload Picture</b></label>
    <input type='file' class='form-control' name='uploadfile' disabled accept='image/*'  /><span>".$row['photo']."</span>
  </div>  
  <div class='pt-3'>
    <button style='width:49.2%;' type='submit' class='btn btn-outline-danger' name='delete'  >Remove</button>
	<button style='width:49.2%;' type='submit' class='btn btn-outline-success' name='cancel'  >Cancel</button>
  </div>
</form>
</div>";

if(isset($_POST['cancel'])){
	echo "<script>
    window.location = 'supplier_home.php';
</script>";
    exit;
}

if(isset($_POST['delete'])){
	$sql = "DELETE FROM product_details WHERE id=$id;";
	if (mysqli_query($conn, $sql)) {
				
				echo '<div class="alert alert-success text-center">Product Removed successfully.</div>';				
				echo "<script>
    window.location = 'supplier_home.php';
</script>";
				exit;
			
        
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
	
}


?>
<?php

session_start();

if(!isset($_SESSION['id'])) {
    echo "<script>
    window.location = 'supplier_card.php';
</script>";
    exit;
}
$id=$_SESSION['id'];
 
 include '..\includes\dbconnect.php';
 include '..\includes\bootstrap.php';
 
 $sql = "SELECT * FROM card_details WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
?>	
<div style="max-width:500px;margin:auto"><br><br><br><br><br><br>
<h2 class="display-6 text-center"><b>Edit Card</b></h2>
	<br><br>

<form method="POST" class="px-5" enctype="multipart/form-data">
  
  
  <div class="mb-3" >
    <label class="form-label"><b>Product Title</b></label>
    <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" required>    
  </div>
  <div class="mb-3" >
    <label class="form-label"><b>Location</b></label>
    <input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>" required>    
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Description</b></label>
    <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Price</b></label>
    <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>" required>
  </div>
   <div class="mb-3">
    <label class="form-label"><b>Discounted Price</b></label>
    <input type="number" class="form-control" name="dis_price" value="<?php echo $row['dis_price']; ?>" required>
  </div/>
  
  <div class="mb-3">
    <label class="form-label"><b>Upload Picture</b></label>
    <input type="file" class="form-control" name="uploadfile" accept="image/*" ><span><?php echo $row['photo']; ?></span>
  </div>  
  <div class="pt-3">
    <button style="width:49.2%;" type="submit" class="btn btn-outline-primary" name="cancel"  >Cancel</button>
    <button style="width:49.2%;" type="submit" class="btn btn-outline-warning" name="update"  >Update</button>
  
  </div>
</form>
</div>



<?php

if(isset($_POST['cancel'])){
	echo "<script>
    window.location = 'supplier_card.php';
</script>";
    exit;
}

if(isset($_POST['update'])){
	$title  = $_POST['title'];
  $location  = $_POST['location'];
  $des  = $_POST['description'];
  $price  = $_POST['price'];
  $dprice  = $_POST['dis_price'];
  $email = $_SESSION['email'];
  $photo = $row['photo'];
  $supemail = $row['sup_email'];

	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
	move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);


	if($target_file=='uploads/'){
				
				$sql = "UPDATE card_details SET title='$title', location='$location', description='$des', price='$price', dis_price='$dprice', photo='$photo', sup_email='$supemail' WHERE id=$id";
					if (mysqli_query($conn, $sql)) {			
						echo '<div class="alert alert-success text-center">Card Edited successfully.</div>';				
						echo "<script>
    window.location = 'supplier_card.php';
</script>";
						exit;
			
        
					} else {
						echo "Error Edditing Card.: " . mysqli_error($conn);
       
					}
		
	}else{
		
				$sql = "UPDATE card_details SET title='$title', location='$location', description='$des', price='$price', dis_price='dprice', photo='$target_file', sup_email='$supemail' WHERE id=$id";
					if (mysqli_query($conn, $sql)) {				
						echo '<div class="alert alert-success text-center">Card Edited successfully.</div>';				
						echo "<script>
    window.location = 'supplier_card.php';
</script>";
						exit;
			
        
					} else {
						echo "Error Edditing Card.: " . mysqli_error($conn);
       
					}
		
	}

	
	
	
}

?>
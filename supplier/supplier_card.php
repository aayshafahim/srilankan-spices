<?php
session_start();
include '..\includes\bootstrap.php';
include '..\includes\dbconnect.php';


if(!isset($_SESSION['email'])) {
    header("Location: supplier_login.php");
    exit;
}

?>


<?php
  if(isset($_POST['addproduct'])){
  $title  = $_POST['title'];
  $location  = $_POST['location'];
  $des  = $_POST['description'];
  $price  = $_POST['price'];
  $dprice  = $_POST['dis_price'];
  $email = $_SESSION['email'];


  
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
  move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);

  
  $sql = "INSERT INTO card_details (title, location, description, price, dis_price, photo, sup_email) VALUES ('$title', '$location', '$des', '$price', '$dprice', '$target_file', '$email');";
  if (mysqli_query($conn, $sql)) {
        
        echo '<div class="alert alert-success text-center">Product Added successfully.</div>';        
        echo "<script>
    window.location = 'supplier_card.php';
</script>";
        exit;
      
        
    } else {
        echo "Error Adding Product.: " . mysqli_error($conn);
       
    }
  
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
  <a href="#">Manage Card</a>
  <a href="#">Chat Box</a>
  <a href="supplier_guest_transaction.php">Guest Transactions</a>
  <a style="color: #8D2F01;" href="supplier_logout.php"><br>Log Out</a>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
</div>

<div id="main">
	<div class="fixedbg">
  <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; OPEN</span><br><br><br>
  <h2 style="color: #3D4047;">CARD MANAGEMENT PANAL</h2><br>
  <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Card</button>
  <br><br><br>
  		</div>




<?php
  $email = $_SESSION["email"];
  // Retrieve data from the database
  $sql = "SELECT * FROM card_details where sup_email like '%$email%' ";
  $result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    echo "<section style='background-color: #eee;'>
  <div class='container py-5'>";
    while ($row = mysqli_fetch_assoc($result)) {

      ?>
        
 <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src="<?php echo $row['photo']; ?>"
                    class="w-100" />
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5><?php echo $row['title']; ?></h5>
                 <div class="mt-1 mb-0 text-muted small">
                  <span><?php echo $row['location']; ?></span>
                </div>
                <br>
                <p class="text-area mb-4 mb-md-0"><?php echo $row['description']; ?></p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1"><?php echo $row['dis_price']; ?> LKR</h4>
                  <span class="text-danger"><s><?php echo $row['price']; ?> LKR</s></span>
                </div>
               
                <div class="d-flex flex-column mt-4">
                  <button class="btn btn-outline-primary btn-sm mt-2 disabled" type="button">
                    Contact Supplier
                  </button><form method="post">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                  <button class="btn btn-outline-warning btn-sm mt-2" type="submit" name="edit">
                    Edit
                  </button>
                  <button class="btn btn-outline-danger btn-sm mt-2" type="submit" name="delete">
                    Delete
                  </button></form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php
  }
  
  echo"   </div>
</section>";
} else {
  
    echo "No Cards found.";
}

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $_SESSION['id'] = $id;
        echo "<script>
    window.location = 'card_edit.php';
</script>";
        exit;
}
  
 if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $_SESSION['id'] = $id;
        echo "<script>
    window.location = 'card_delete.php';
</script>";
        exit;
} 
  
  
  








mysqli_close($conn);
?>













<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Card</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" class="px-5" enctype="multipart/form-data">
  
  
  <div class="mb-3" >
    <label class="form-label"><b>Product Title</b></label>
    <input type="text" class="form-control" name="title" required>    
  </div>
  <div class="mb-3" >
    <label class="form-label"><b>Location</b></label>
    <input type="text" class="form-control" name="location" required>    
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Description</b></label>
    <textarea class="form-control" name="description" rows="3" required></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label"><b>Price</b></label>
    <input type="number" class="form-control" name="price" required>
  </div>
   <div class="mb-3">
    <label class="form-label"><b>Discounted Price</b></label>
    <input type="number" class="form-control" name="dis_price" required>
  </div/>
  
  <div class="mb-3">
    <label class="form-label"><b>Upload Picture</b></label>
    <input type="file" class="form-control" name="uploadfile" accept="image/*" required>
  </div>  
  <div class="pt-3">
    <button style="width:49.2%;" type="submit" class="btn btn-outline-primary" name="addproduct"  >Add Product</button>
  
  </div>
</form>
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
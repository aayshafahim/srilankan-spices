<?php
include 'navbar.php';
include 'includes\dbconnect.php';
?>
<html>
<head>
  <style type="text/css">
    .fixedbg{

  background-image: url("https://cdn.shopify.com/s/files/1/0148/1945/9126/files/image-left-resized_1296x.png?v=1613792449");
  background-repeat: no-repeat;
  background-size: 200px;
  background-position: left bottom;
  
}
.scard {
    margin-right: auto;
    margin-left: auto;
    width: 450px;
    box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
    height: 230px;
    border-radius: 5px;
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.2);
    padding: 10px;
    text-align: center;
    opacity: 0.9;
}
.banner{

  background-image: url("images/bg4.jpg");
  min-height: 700px;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  </style>
</head>
<body>
    <div class="fixedbg"><br><br><br>
      <div class="banner" style="font-family: Canela,serif;">
        <br><br><br><br><br><br><br><br><br>
<div class="d-flex justify-content-center">
  <div class="border-danger bg-danger card scard ">
    <div class="card-body text-dark">
      <h5 class="card-title"  style="color:white;font-size:40;font-weight:bold">Register with us<br> now !</h5><br>
      <button onclick="window.location='#formm';" style="color:red;" type="button" class="btn btn-light">Register</button>
    </div>
  </div>
</div>
</div>


<br><br><br><br><br>
<section class="vh-90" >
  <div class="container py-5 h-90">
    <div class="row d-flex justify-content-center align-items-center h-90">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images\supplier.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-2 p-lg-2 px-lg-5 text-black">

                <form method="post" action="supplier_registration.php" id="formm" style="font-family: Canela,serif;">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0"><img style="width:100px" src="images\logo.png"></span>
                  </div> 

                  <h5 class="fw-normal mb-3 pb-2" style="letter-spacing: 1px;">Register as a Supplier</h5>

                  <div class="form-outline mb-1">
                    <input type="text" id="form2Example17" class="form-control form-control" name="name" required/>
                    <label class="form-label" for="form2Example17">Name</label>
                  </div>
                  <div class="form-outline mb-1">
                    <input type="text" id="form2Example17" class="form-control form-control" name="phone" required/>
                    <label class="form-label" for="form2Example17">Contact No</label>
                  </div>
                  <div class="form-outline mb-1">
                    <input type="email" id="form2Example17" class="form-control form-control" name="email" required/>
                    <label class="form-label" for="form2Example17">Email</label>
                  </div>

                  <div class="form-outline mb-1">
                    <input type="password" id="form2Example27" class="form-control form-control" name="pw" required />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-1 pt-1">
                    <button class="btn btn-dark btn-md btn-block" type="submit" name="register">Register</button>
                  </div>

                  
                  
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<?php
  if(isset($_POST['register'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['pw'];
  $contact = $_POST['phone'];

  
  $sql = "INSERT INTO supplier_details (name, email, phone, password) VALUES ('$name', '$email', '$contact', '$password');";
  if (mysqli_query($conn, $sql)) {
        
        echo "<div class='alert alert-success text-center'>Supplier Registered successfully.</div>
            <script>
            window.location = 'supplier_login.php';
            </script>

        ";       
        
        exit;
      
        
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
  
}


?>





</body>
</html>
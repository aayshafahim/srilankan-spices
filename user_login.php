<?php
include 'navbar.php';
include 'includes\dbconnect.php';


session_start();

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pw'];

   
    $query = "SELECT * FROM user_details WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $email;
        echo "
          <script>
            window.location = 'user/home.php';
          </script>";
        exit;
    } else {
        
    echo '<div class="alert alert-danger text-center">Invalid login credentials. Please try again. </div>';
    }
}


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

  </style>
</head>
<body>
    <div class="fixedbg">
<br>
<section class="vh-90" >
  <div class="container py-5 h-90">
    <div class="row d-flex justify-content-center align-items-center h-90">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images\login_image.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" style="font-family: Canela,serif;">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0"><img style="width:100px" src="images\logo.png"></span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-1" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-2">
                    <input type="text" id="form2Example17" name="email" class="form-control form-control" />
                    <label class="form-label" for="form2Example17">Email</label>
                  </div>

                  <div class="form-outline mb-2">
                    <input type="password" id="form2Example27" name="pw" class="form-control form-control" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-2">
                    <button class="btn btn-dark btn-md btn-block" name="login" type="submit">Login</button>
                  </div>

                  
                  <p style="color: #393f81;">Don't have an account? <a href="user_registration.php" style="color: #393f81;">Register here</a><br>
                 Login In as a admin? <a href="admin\admin_login.php" style="color: #393f81;">Click here</a><br>
                 Log In as a Supplier? <a href="supplier_login.php" style="color: #393f81;">Clik here</a></p>
                  
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

</body>
</html>
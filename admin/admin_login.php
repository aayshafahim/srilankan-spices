<?php 
include '..\includes\dbconnect.php';
include '..\includes\bootstrap.php';

session_start();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $query = "SELECT * FROM admin_details WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: admin_panel.php");
        exit;
    } else {
        
		echo '<div class="alert alert-danger text-center">Invalid login credentials. Please try again. </div>';
    }
}



 ?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
	
<style>
</style>
	
</head>

<body style="font-family: Canela,serif;">

<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
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
                    <span class="h1 fw-bold mb-0"><img style="width:100px" src="images\admin_logo.png"></span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your Admin account</h5>

                  <div class="form-outline mb-3">
                    <input type="text" name="username" class="form-control form-control" />
                    <label class="form-label">Username</label>
                  </div>

                  <div class="form-outline mb-3">
                    <input type="password" name="password" class="form-control form-control" />
                    <label class="form-label">Password</label>
                  </div>

                  <div class="pt-1 mb-2">
                    <button class="btn btn-dark btn-md btn-block" type="submit" name="login">Login</button>
                  </div>

                  
                  <p class="mb-2 pb-lg-1" style="color: #393f81;">Log In as a user? <a href="..\user_login.php" style="color: #393f81;">Click here</a></p>
                  
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>
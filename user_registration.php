<?php

include 'navbar.php';
include '.\includes\dbconnect.php';


?>



<!DOCTYPE html>
<html>
<head>
<title></title>
<style type="text/css">
	.fixedbg{

  background-image: url("https://cdn.shopify.com/s/files/1/0148/1945/9126/t/673/assets/bg-pattern.svg");
  min-height: 110px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}

.fixedlogo{

  background-image: url("https://cdn.shopify.com/s/files/1/0148/1945/9126/files/image-left-resized_1296x.png?v=1613792449");
  background-repeat: no-repeat;
  background-size: 200px;
  background-position: left bottom;
  background-attachment: fixed;
  
}

</style>

</head>
<body>
<div class="fixedlogo">


<div class="fixedbg">
          <br>
          <center><span style="font-family: Canela,serif;font-size: 48px;color: #627261;">
               Register Now ! 
          </span></center>
     </div>



<?php
	if(isset($_POST['register'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = $_POST['pw'];
	$email = $_POST['email'];
	$cno = $_POST['phone'];
	$address1 = $_POST['add1'];
	$address2 = $_POST['add2'];
	$zip = $_POST['zip'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	

	
	$sql = "INSERT INTO user_details (firstname, lastname, email, password, phone, address01, address02, zipcode, city, country) VALUES ('$fname', '$lname', '$email', '$password', '$cno', '$address1', '$address2','$zip' , '$city', '$country');";
	if (mysqli_query($conn, $sql)) {
				
		?>

			<form method="post" action="phpmailer/thank.php" style="background-color:white;width: 100%;height: 200%;">
				<center>
				<input type="hidden" name="email" value="<?php echo $email; ?>">
				<input type="submit" name="sendmsg" value="Continue" class="btn btn-success btn-lg">
				</center>
			</form>
			



				
				
		<?php	
        
    } else {
        echo "Error registerning user: " . mysqli_error($conn);
    }
	
}


?>






<section class="h-100 h-custom gradient-custom-2" style="font-family: Canela,serif;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-11">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;background-image: url('https://cdn.shopify.com/s/files/1/0148/1945/9126/t/673/assets/bg-pattern.svg');">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #4835d4;">General Infomation</h3>

                  

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                    <form method="post">
                      <div class="form-outline">
                        <input type="text" name="fname" id="form3Examplev2" class="form-control form-control" required />
                        <label class="form-label" for="form3Examplev2">First name</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input name="lname" type="text" id="form3Examplev3" class="form-control form-control" required />
                        <label class="form-label" for="form3Examplev3">Last name</label>
                      </div>

                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline">
                      <input name="email" type="text" id="form3Examplev4" class="form-control form-control" required/>
                      <label class="form-label" for="form3Examplev4">Email</label>
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline">
                      <input name="pw" type="text" id="form3Examplev4" class="form-control form-control" required/>
                      <label class="form-label" for="form3Examplev4">Password</label>
                    </div>
                  </div>
                  
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <input name="phone" type="text" id="form3Examplea6" class="form-control form-control" placeholder="94xxxxxxxxx" required/>
                      <label class="form-label" for="form3Examplea6">Phone</label>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-lg-6 text-white" style="background-color:#96A195;border-radius: 15px;">
                <div class="p-5">
                  <h3 class="fw-normal mb-5">Contact Details</h3>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white" >
                      <input name="add1" style="background-color:#96A195;" type="text" id="form3Examplea2" class="form-control form-control" required/>
                      <label class="form-label" for="form3Examplea2">Address Line 01</label>
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <input name="add2" style="background-color:#96A195;" type="text" id="form3Examplea3" class="form-control form-control" required/>
                      <label class="form-label" for="form3Examplea3">Address Line 02</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <input name="zip" style="background-color:#96A195;" type="text" id="form3Examplea4" class="form-control form-control" required/>
                        <label class="form-label" for="form3Examplea4">Zip Code</label>
                      </div>

                    </div>
                    <div class="col-md-7 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <input name="city" style="background-color:#96A195;" type="text" id="form3Examplea5" class="form-control form-control" required/>
                        <label class="form-label" for="form3Examplea5">City</label>
                      </div>

                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <input name="country" style="background-color:#96A195;" type="text" id="form3Examplea6" class="form-control form-control" required/>
                      <label class="form-label" for="form3Examplea6">Country</label>
                    </div>
                  </div>
                  
                  

                  

                  
                  
                  <button class="btn btn-light btn-md w-100"
                    data-mdb-ripple-color="dark" name="register" type="submit">Register</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<br><br>





</div>
</body>
</html>
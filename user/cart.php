<?php
include 'navbar.php';
include '..\includes\dbconnect.php';
session_start();

if(!isset($_SESSION['shopping_cart'])) {
    echo "
    <head>
    <style>
     <meta charset='utf-8'>
     <meta name='viewport' content='width=device-width, initial-scale=1'>
    </style>
    </head>
     <body style='font-family: Canela,serif;'>
               <br><br><br><center><h3>Sorry ! </h3><br><h4>Cart is Empty</h4></center>

     </body>
    ";
    exit;
}









?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
     
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
<section>
  <div class="container py-5 h-100" style="font-family: Canela,serif;color: #3D4047;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;background-image: url('https://cdn.shopify.com/s/files/1/0148/1945/9126/t/673/assets/bg-pattern.svg');">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="mb-0">Your Cart</h1>
                  </div>
                    <hr class="my-4">
                  <?php   

                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $products = array();
                               $emails = array();
                               $total = 0;                                 
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  

                                        $products[] = $values["item_name"]." x ".$values["item_quantity"];
                                        $emails[] = $values["seller_email"];
                                        


                     ?> 
          
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="../admin/<?php echo $values["item_image"]; ?>"
                        class="img-fluid rounded-3" alt="<?php echo $values["item_name"]; ?>">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">Item</h6>
                      <h6 class="text-black mb-0"><?php echo $values["item_name"]; ?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      x <?php echo $values["item_quantity"]; ?>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>&nbspLKR</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="shop.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="text-muted"><img src="../images/bin.png" width="32px"><i class="fas fa-times"></i></a>
                    </div>
                  </div>

                         <?php  
                               $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?> 

                  <hr class="my-4">
        
                  <div class="pt-5">
                    <h6 class="mb-0"><a href="shop.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>




                  <div class="pt-5">
                    
                  
    

<form method="post" action="cart.php">


                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class=" mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">


                    



                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items Price</h5>
                    <h5><?php echo number_format($total, 2); ?>&nbspLKR</h5>
                  </div>
                    <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">shipping</h5>
                    <h5>500&nbspLKR</h5>
                    </div>
                  

                  <div class="mb-4 pb-2">
                    <select class="select">
                      <option value="1">Standard-Delivery- 500 LKR</option>
                    </select>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5" style="color:#8D2F01;">
                    <h5 style="font-weight: bold;" class="text-uppercase">Total price</h5>
                    <h5 style="font-weight: bold;"><?php echo number_format($total+500, 2); ?>&nbspLKR</h5>
                  </div>



                  <div class="form-outline mb-3 ">
                <input type="text" id="formControlLgXM8" class="form-control"
                  placeholder="1234 5678 1234 5678" required/>
                <label class="form-label" for="formControlLgXM8">Card Number</label>
              </div>

              <div class="row mb-3">
                <div class="col-6">
                  <div class="form-outline">
                    <input type="password" id="formControlLgExpk8" class="form-control"
                      placeholder="mm/yyyy" required/>
                    <label class="form-label" for="formControlLgExpk8">Expire</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-outline">
                    <input type="password" id="formControlLgcvv8" class="form-control" placeholder="cvv" required/>
                    <label class="form-label" for="formControlLgcvv8">Cvv</label>
                  </div>
                </div>
              </div>

          

                    <button style="width:100%" type="sumbit" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark" data-bs-target="#" name="purchase" data-bs-toggle="modal">Check Out</button>



               </form>

                    <?php
                    $username=$_SESSION['username'];

                    if(isset($_POST['purchase'])){
                    
                        $sql = "SELECT * FROM user_details where email = '$username'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                              $name = $row['firstname'];
                              $email = $row['email'];
                              $phone = $row['phone'];
                              $add1 = $row['address01'];
                              $add2 = $row['address02'];
                              $add3 = $row['city'];
                              $zip = $row['zipcode'];
                            


                            }
                            } else {
  
                           echo "No details found.";
                    }


                    $sup_emails;   
                         $all_productdetails;
                         foreach ($products as $value) {
                              $all_productdetails=$all_productdetails.$value."| ";
                         }

                         foreach ($emails as $value) {
                              $sup_emails=$sup_emails.$value."| ";
                         }


                    
                    $arr_details = array(
                         'name'=> $name,
                         'email'=> $email,
                         'phone'=> $phone,
                         'add1'=> $add1,
                         'add2'=> $add2,
                         'add3'=> $add3,
                         'zip'=> $zip,
                         'products'=> $all_productdetails,
                         'tot'=> $total

                    );
                    $_SESSION['details'] = $arr_details;
                         

                    
                    
     
     $sql = "INSERT INTO user_transaction (fname, email, phone, address, total_price, products, sup_email) VALUES ('$name', '$email', '$phone','$add1,$add2,$add3','$total', '$all_productdetails', '$sup_emails');";
     if (mysqli_query($conn, $sql)) {
                    
                    echo "<div class='alert alert-success text-center'>Transaction Successfully Completed !</div>
                         <script type='text/javascript'>
                              window.location = 'transaction.php';
                         </script>

                    ";                
                    
                    exit;
               
        
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
     
}





                    ?>





                         <?php  
                          }  
                         ?>
                </div>
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
<?php

session_start();

if(!isset($_SESSION['shopping_cart'])) {
    header("Location: index.php");
    exit;
}


include 'navbar.php';
include '.\includes\dbconnect.php';





?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
     

 
  

</style>
</head>
<body>

<div class="w-75" >
<table class="table ">
  <thead >
    <tr>
      <th>#</th>      
      <th>Item Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
      <th></th>
      
    </tr>
  </thead>
  <tbody>  
                         <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>                                 
 <tr>
      <th><img style="width:80px" src="admin/<?php echo $values["item_image"]; ?>"></th>
      <td><?php echo $values["item_name"]; ?></td>
      <td><?php echo $values["item_quantity"]; ?></td>
      <td><?php echo $values["item_price"]; ?>&nbspLKR</td>
      <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>&nbspLKR</td>
      <td></td>
      <td>
          <form method="post" action="shop.php?action=delete&id=<?php echo $values["item_id"]; ?>">
               <button class="btn btn-outline-danger btn-sm px-2" type="submit" name="delete"  value="Remove">Remove</button>
          </form>
     </td>
 </tr>
                         <?php  
                               $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>                          
 <tr>
     <td style="color: #8D2F01;font-weight:bold " colspan="3" align="right">Total</td>  
     <td align="right" style="color: #8D2F01;font-weight:bold "> <?php echo number_format($total, 2); ?>&nbspLKR</td>  
     <td></td> 
     <td></td>
 </tr>
  </tbody>
                         <?php  
                          }  
                         ?> 
  </table>

</div>







<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                  </div>
                    <hr class="my-4">
                  <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  

                  

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="admin/<?php echo $values["item_image"]; ?>"
                        class="img-fluid rounded-3" alt="<?php echo $values["item_name"]; ?>">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">Item</h6>
                      <h6 class="text-black mb-0"><?php echo $values["item_name"]; ?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <?php echo $values["item_quantity"]; ?>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?php echo $values["item_price"]; ?> LKR</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><img src="images/bin.png" width="32px"><i class="fas fa-times"></i></a>
                    </div>
                  </div>

                         <?php  
                               $total = $total + ($values["item_quantity"] * $values["item_price"]);
                               $total=$total+500;  
                               }  
                          ?> 

                  <hr class="my-4">
        
                  <div class="pt-5">
                    <h6 class="mb-0"><a href="#!" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
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
                      <option value="1">Standard-Delivery- €5.00</option>
                    </select>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5><?php echo number_format($total, 2); ?>&nbspLKR</h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Register</button>
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











</body>
</html>
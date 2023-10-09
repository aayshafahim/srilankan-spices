<?php
session_start();
include 'navbar.php';
include '..\includes\dbconnect.php';



if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"],  
                     'item_image'          =>     $_POST["hidden_image"],
                     'seller_email'          =>     $_POST["hidden_email"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="shop.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"],
                'item_image'          =>     $_POST["photo"],
                'seller_email'          =>     $_POST["hidden_email"]    
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 } 



?>

 <!DOCTYPE html> 
<html>
<head>
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
     
     <div class="fixedbg">
          <br>
          <center><span style="font-family: Canela,serif;font-size: 48px;color: #627261;">
               Browse All Spices 
          </span></center>
     </div>
<div class="fixedlogo">         
          <div class="container py-5 " style="font-family: Canela,serif;">
            <center>
                
          <div class="row w-75">      
                <?php  
                $sql = "SELECT * FROM product_details ORDER BY id ASC";  
                $result = mysqli_query($conn, $sql);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                

    
      <div class="col-md-12 col-lg-3 mb-3 mb-lg-0 pb-4" >
        <div class="card border-0 " style="width: 12rem;">
          <img src="../admin/<?php echo $row["photo"]; ?>"
            class="card-img-top" alt="<?php echo $row["name"]; ?>" />
          <div class="card-body">
            <div class="d-flex justify-content-center pb-4">
              <h5 class="mb-0"><?php echo $row["name"]; ?></h5>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <h6 class="text-danger mb-0"><?php echo $row["price"]; ?> LKR</h6>
              <p style="font-size:13px;" class="text-muted mb-0">Available: <span class="fw-bold"><?php echo $row["availability"]; ?></span></p>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
                    <input type="number" name="quantity" value="1" style="width:23%;height:26px;">
                    <input style="background-color:#d24602;color:white;border:0;width:74%;height:26px;font-size:13px;" type="submit" value="ADD TO CART" name="add_to_cart" class="">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">  
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="hidden" name="hidden_image" value="<?php echo $row["photo"]; ?>">
                    <input type="hidden" name="hidden_email" value="<?php echo $row["sup_email"]; ?>">
                </form>
            </div>
          </div>
        </div>
      </div>


                <?php  
                     }  
                }  
                ?> 

    </center>
 









</div>
</body>
</html>



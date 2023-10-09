<?php
include '..\includes\dbconnect.php';
include '..\includes\bootstrap.php';


// Get number of Total admins
$query = "SELECT COUNT(*) AS all_admins FROM admin_details";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$all_admins = $row['all_admins'];

// Get number of total customers
$query = "SELECT COUNT(*) AS total_customers FROM user_details";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_customers = $row['total_customers'];

// Get number of total products
$query = "SELECT COUNT(*) AS total_products FROM product_details";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_products = $row['total_products'];

// Get number of total suppliers
$query = "SELECT COUNT(*) AS total_suppliers FROM supplier_details";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_suppliers = $row['total_suppliers'];
?>

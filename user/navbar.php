<?php
include '..\includes\bootstrap.php';
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
  body{
    color: #3D4047;
  }



</style>

</head>
<body style="font-family: Venus URW,Helvetica,sans-serif;">

<nav style="letter-spacing: 2px;" class="navbar sticky-top navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div><a class="navbar-brand" href="index.php"><img style="width:100px;" src="..\images\logo.png"></a></div>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="home.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CINNAMON</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">PEPPER</a>
        </li>
		<li class="nav-item">
          <a class="nav-link " href="#">CLOVES</a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link " href="shop.php">SHOP</a>
        </li>
		<li class="nav-item">
          <a class="nav-link " href="#">ABOUT</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SERVICES
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="supplier_registration.php">Sell Something</a></li>
            <li><a class="dropdown-item" href="#" >Find a Supplier</a></li>
          </ul>
        </li>
      </ul>	  
	  <a href="user_logout.php"><button  class="btn btn-outline-danger btn-sm mx-2">LOG OUT</button></a>
      <form class="d-flex pt-3">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-sm btn-outline-success mx-2" type="submit">SEARCH</button>
      </form>
	  <span class="navbar-text">
        <a class="px-4" href="cart.php"><img src="..\images\shopping-cart.png"></a>
      </span>
    </div>
  </div>
</nav>
<div style="width:116px;">
  
</div>
</body>
</html>


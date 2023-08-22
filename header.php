<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">


    <title>Astro E-commerce</title>
</head>
<body>


<div  id="navbar-head" >
<div class="search-bar" id="searchBar">
<div class="container">
    <input type="search" placeholder="Search" name="" id="">
    <span id="closeSearch">
        <i class="fa-solid fa-xmark" style="color: #ffffff;" ></i>
    </span>
</div>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary header-nav">

  <div class="container-fluid container">
    <a class="navbar-brand" href="index.php">ASTRO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto"> <!-- Added mx-auto class -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php#sec0">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#category">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#new-arr">New Arrivals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#featured-Products">Featured Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="products.php">All Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#about">About</a>
        </li>

      </ul>
      <div class="header-icons">
        <span id="openSearch">
            <i class="fa-solid fa-magnifying-glass" ></i>
        </span>
        <i class="fa-solid fa-user-large"></i>
        <i class="fa-solid fa-cart-shopping"></i>
      </div>
    </div>
  </div>
</nav>
</div>
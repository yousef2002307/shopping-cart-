<?php

?>
<!doctype html>
<html>

<head>

  <title>yousef</title>
  <meta charset="UTF-8" />
  <meta name="robots" description='unfollow' />
  <!--عشان تخليه ريسبونسيف ويشتغل الانترننت الاكسبلولر-->


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" href="css/icons-fonts.css"/>

  <link rel="stylesheet" href="css/style.css"/>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Antique+Soft&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
 
<style>
  
</style>
<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCuTilAfnGfkZtIx0T3qf-eOmWZ_N2LpoY"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">ShopApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $active == "home" ? "active" : ""; ?> " aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $active == "product" ? "active" : ""; ?>" href="product.php">My Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $active == "logout" ? "active" : ""; ?>" href="logout.php">Logout</a>
                    </li>
                </ul>
             
                <form class="d-flex form" style="<?php echo stripos( $_SERVER['REQUEST_URI'] ,"/home.php") ? "" : "visibility: hidden;" ?>">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success search" type="submit">Search</button>
                </form>
              
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge bg-danger"><?php echo $cartcount; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

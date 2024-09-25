<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobiTrendz</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav id="navibar" class="navbar navbar-expand-lg navbar-light sticky-top container-fluid bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="logo navbar-brand fs-1 fw-bold" href="index.php">MobiTrendz</a>
                <ul class="links navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $title=="Home"?"active":"";?>" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $title=="Shop"?"active":"";?>" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $title=="Contact"?"active":"";?>" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $title=="About"?"active":"";?>" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $title=="Orders"?"active":"";?>" href="order-history.php">Orders</a>
                    </li>
                </ul>
                <form class="d-flex justify-content-end font-bold">
                <div class="search d-flex justify-content-center align-items-center ">
                    <input class="search-input" type="search" placeholder="Search for items..." size="25" >
                    <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <div class="log-reg d-flex justify-content-center align-items-center">
                    <a class="primary-btn me-2  checkout-link" href="register.php">Register</a>
                    <a class="checkout-link  primary-btn" href="login.php">Login</a>
                </div>
                </form>

            </div>
        </div>
    </nav>

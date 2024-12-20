<?php include('DB/connection.php');

error_reporting(0);
$backtrace = debug_backtrace();
$caller_file = basename($backtrace[0]['file']);

$title_array = array(
    "index.php" => "Home",
    "contact.php" => "Contact",
    "account.php" => "My Profile",
    "checkout.php" => "Checkout",
    "cart.php" => "Cart",
    "shop.php" => "Shop",
    "login.php" => "Log in to MobiTrendz",
    "register.php" => "Register to MobiTrendz",
    "wishlist.php" => "Wishlist",
    "about.php" => "About MobiTrendz",
    "order-history.php" => "Your orders",
    "order-details.php" => "Order details",
    "order-success.php" => "Order successful",
    "forgot-password.php" => "Forgot password?",
    "otp-page.php" => "OTP page",
    "search.php" => "Shop",
    "product-details.php" => "Details"
);
$title = $title_array[$caller_file];

if (isset($_SESSION['user_id'])) {
    $query = "select count(*) as cart_total from cart_details_tbl where User_Id = " . $_SESSION['user_id'];
    $result = mysqli_query($con, $query);
    $carttotal = mysqli_fetch_assoc($result);

    $query = "select count(*) as wishlist_total from wishlist_details_tbl where User_Id = " . $_SESSION['user_id'];
    $result = mysqli_query($con, $query);
    $wishlisttotal = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
$query = "Select Name, Profile_Picture from user_details_tbl where User_Id='$_SESSION[user_id]'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $username = $row['Name'];
}
if (isset($_SESSION['user_id'])) { ?>

    <body>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light sticky-top container-fluid bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="logo navbar-brand fs-1 fw-bold" href="index.php">MobiTrendz</a>
                    <ul class="links navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title == "Home" ? "active" : ""; ?>" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title == "Shop" ? "active" : ""; ?>" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php echo $title == "Contact" ? "active" : ""; ?>" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php echo $title == "About" ? "active" : ""; ?>" href="about.php">About</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link  <?php //echo $title=="Orders"?"active":"";
                                            ?>" href="order-history.php">Orders</a>
                    </li> -->
                    </ul>

                    <form class="d-flex justify-content-end font-bold" action="search.php" onsubmit="return validateSearch();">
                        <div class="search d-flex justify-content-center align-items-center">
                            <input class="search-input" type="search" placeholder="Search for items..." size="25" id="searchBar" name="search" value="<?php echo $_GET['search']; ?>">

                            <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>

                        <div class="d-flex justify-content-between align-items-center justify-content-sm-between w-100">
                            <li class="nav-item ms-lg-auto dropdown profile-menu">
                                <!-- <i class="fa fa-user-circle"></i><a class="nav-link dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $username; ?></a> -->
                                <a class="nav-link dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/users/<?php echo $row['Profile_Picture']; ?>" alt="User Image" style="width: 45px; height: 45px; border-radius: 50%; margin-right: 10px;">
                                    <?php echo $username; ?>
                                </a>
                                <ul id="pro-drop" class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="account.php">My Profile</a></li>
                                    <li><a class="dropdown-item" href="order-history.php">Your Orders</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                                </ul>
                            </li>

                            <!-- Wishlist Icon with Product Count -->
                            <a href="wishlist.php" class="icon-link position-relative me-3">
                                <i class="fa fa-heart fs-4"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php echo $wishlisttotal['wishlist_total']; ?> <!-- Replace with dynamic count from database -->
                                </span>
                            </a>

                            <!-- Cart Icon with Product Count -->
                            <a href="cart.php" class="icon-link position-relative">
                                <i class="fa fa-shopping-cart fs-4"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php echo $carttotal['cart_total']; ?> <!-- Replace with dynamic count from database -->
                                </span>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </nav>
    <?php } else { ?>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light sticky-top container-fluid bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="logo navbar-brand fs-1 fw-bold" href="index.php">MobiTrendz</a>
                    <ul class="links navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title == "Home" ? "active" : ""; ?>" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title == "Shop" ? "active" : ""; ?>" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php echo $title == "Contact" ? "active" : ""; ?>" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php echo $title == "About" ? "active" : ""; ?>" href="about.php">About</a>
                        </li>
                        <!-- <li class="nav-item">
                    <a class="nav-link  <?php echo $title == "Orders" ? "active" : ""; ?>" href="order-history.php">Orders</a>
                </li> -->
                    </ul>
                    <!-- <form class="d-flex justify-content-end font-bold">
                <div class="search d-flex justify-content-center align-items-center">
                    <input class="search-input" type="search" placeholder="Search for items..." size="25">
                    <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div> -->

                    <form class="d-flex flex-nowrap justify-content-end" action="search.php" onsubmit="return validateSearch();">
                        <input class="search-input" type="search" placeholder="Search for items..." size="25" id="searchBar" name="search" value="<?php echo $_GET['search']; ?>">
                        <button class="primary-btn me-3 search-button" id="SearchSection3"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <a class="header-btn" href="register.php">Register</a>
                        <a class="header-btn" href="login.php">Login</a>
                    </form>
                    </form>

                </div>
            </div>
        </nav>
    <?php }
    ?>

    <?php
    if (isset($_COOKIE['success']) || isset($_COOKIE['error'])) {
        $message = isset($_COOKIE['success']) ? $_COOKIE['success'] : $_COOKIE['error'];

        echo '
        <div class="alert ' . (isset($_COOKIE['success']) ? 'alert-success' : 'alert-danger') . '" role="alert" id="myAlert">
            ' . $message . '
        </div>
        <script>
            setTimeout(()=>{
                const alert = bootstrap.Alert.getOrCreateInstance("#myAlert");
                alert.close();
            },3000);
        </script>
        ';
    }

    ?>
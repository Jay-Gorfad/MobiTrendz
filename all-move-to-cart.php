<?php

include('DB/connection.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM wishlist_details_tbl WHERE user_id = $user_id";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['Product_Id'];
        $quantity = 1;

        $cart_query = "SELECT * FROM cart_details_tbl WHERE user_id = $user_id AND product_id = $product_id";
        $cart_result = mysqli_query($con, $cart_query);

        if (mysqli_num_rows($cart_result) == 0) {
            $insert_cart_query = "INSERT INTO cart_details_tbl (user_id, product_id, quantity) 
                                  VALUES ($user_id, $product_id, $quantity)";
            mysqli_query($con, $insert_cart_query);
        }
    }

    $delete_query = "DELETE FROM wishlist_details_tbl WHERE user_id = $user_id";
    mysqli_query($con, $delete_query);
    setcookie('success', "Products moved to cart", time() + 5, "/");
    echo "<script> location.href='cart.php';</script>";
} else {
    setcookie('success', "Your wishlist is empty", time() + 5, "/");
    echo "<script> location.href='wishlist.php';</script>";
}

exit;

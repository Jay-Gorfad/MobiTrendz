<?php
include "DB/connection.php";
$product_id = $_GET["product_id"];
$user_id = $_SESSION["user_id"];

$query = "INSERT INTO cart_details_tbl(Product_Id, User_Id) VALUES ('$product_id', '$user_id')";
if (mysqli_query($con, $query)) {
    $query = "delete from wishlist_details_tbl where Product_Id=$product_id and User_Id=$user_id";
    if (mysqli_query($con, $query)) {
        echo "<script>location.replace('cart.php');</script>";
        setcookie("success", "Product moved to cart successfully!", time() + 5, "/");
    }
} else {
    mysqli_error($con);
}

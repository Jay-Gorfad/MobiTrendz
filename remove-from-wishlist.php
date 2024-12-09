<?php
    include "DB/connection.php";
    $product_id = $_GET["product_id"];
    $user_id = $_SESSION["user_id"];
    $query = "delete from wishlist_details_tbl where Product_Id=$product_id and User_Id=$user_id";
    if(mysqli_query($con,$query)){
        echo "<script>location.href = 'wishlist.php'</script>";
        exit;
    }
    else{
        mysqli_error($con);
    }

?>
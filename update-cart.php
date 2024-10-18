<?php
    include "DB/connection.php";
    $user_id = $_SESSION["user_id"];
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];
    $query = "update cart_details_tbl set Quantity=$quantity where Product_Id=$product_id and User_Id=$user_id";
    if(mysqli_query($con,$query)){
        echo "<script>location.href = 'cart.php'</script>";
        exit;
    }
    else{
        mysqli_error($con);
    }

?>
<?php
    include "../db/connection.php";
    $product_id = $_GET['product_id'];
    $query = "update product_details_tbl set is_active=0 where Product_Id=$product_id";
    $sql = mysqli_query($con,$query);
    if($sql){
        ?>
        <script>
            location.href = "products.php";
        </script>
        <?php
    }
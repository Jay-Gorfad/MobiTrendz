<?php
include "../DB/connection.php";
    $order_id = intval($_GET['order_id']);

    $deleteOrderDetailsQuery = "DELETE FROM order_details_tbl WHERE Order_Id = $order_id";
    mysqli_query($con, $deleteOrderDetailsQuery);

    $deleteOrderHeaderQuery = "DELETE FROM order_header_tbl WHERE Order_Id = $order_id";
    mysqli_query($con, $deleteOrderHeaderQuery);

    echo "<script>
        alert('Order deleted successfully!');
        location ='orders.php';
    </script>
    ";
    exit();

?>


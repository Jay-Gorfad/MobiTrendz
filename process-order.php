<?php
include('DB/connection.php');

if (isset($_GET['payment_id']) && isset($_GET['order_id']) && isset($_GET['total_amount']) && isset($_GET['uid'])) {
    $payment_id = $_GET['payment_id'];
    $order_id = $_GET['order_id'];
    $total_amount = $_GET['total_amount'];
    $uid = $_GET['uid'];

    $q2 = "SELECT * FROM user_details_tbl WHERE User_Id = '$uid'";
    $data = mysqli_query($con, $q2);

    if (mysqli_num_rows($data) > 0) {
        $user = mysqli_fetch_assoc($data);
        $offer = $_SESSION['offer_code'];
        $email = $user['Email'];
        $orderDate = date('Y-m-d H:i:s');
        $shippingCharge = $_SESSION['total-pay']['shipping_charge'];
        $total_amount = $_SESSION['total-pay']['total'];
        $discount = $_SESSION['total-pay']['discount_amount'];
        $addId = $_SESSION["addId"];


        $orderQuery = "INSERT INTO order_header_tbl 
        (User_Id, Order_Date, Order_Status, Shipping_Address_Id, Shipping_Charge, Total, Payment_Mode) 
        VALUES ('$uid', '$orderDate', 'Completed', '$addId', '$shippingCharge', '$total_amount', 'Online')";

        if (mysqli_query($con, $orderQuery)) {
            $orderId = mysqli_insert_id($con); // Get the last inserted Order ID
        } else {
            die("Error inserting order: " . mysqli_error($con));
        }

        $cartQuery = "SELECT c.Product_Id, c.Quantity, 
                         (p.Sale_Price - p.Sale_Price * p.Discount / 100) as Price 
                  FROM cart_details_tbl c
                  INNER JOIN product_details_tbl p ON c.Product_Id = p.Product_Id
                  WHERE c.User_Id = '$uid'";

        $cartResult = mysqli_query($con, $cartQuery);

        while ($cartRow = mysqli_fetch_assoc($cartResult)) {
            $productId = $cartRow['Product_Id'];
            $quantity = $cartRow['Quantity'];
            $price = $cartRow['Price'];
            $sub = $price * $quantity;
            $dis_amount = ($sub / ($total_amount - $shippingCharge)) * $discount;
            $actual_price = $sub - $dis_amount;

            $orderDetailsQuery = "INSERT INTO order_details_tbl 
            (Order_Id, Product_Id, Quantity, Price,Discount) 
            VALUES ('$orderId', '$productId', '$quantity', '$actual_price','$dis_amount')";

            if (!mysqli_query($con, $orderDetailsQuery)) {
                die("Error inserting order details: " . mysqli_error($con));
            }
            $qtyDecQuery = "update product_details_tbl set stock=stock-'$quantity' where Product_Id='$productId'";
            if (!mysqli_query($con, $qtyDecQuery)) {
                die("Error updating stock: " . mysqli_error($con));
            }
        }

        $clearCartQuery = "DELETE FROM cart_details_tbl WHERE User_Id = '$uid'";
        if (!mysqli_query($con, $clearCartQuery)) {
            die("Error clearing cart: " . mysqli_error($con));
        }
        unset($_SESSION['add_id']);
        echo "<script>
    location.href='order-success.php';</script>";
    } else {
        echo 'Cart is empty.';
    }
} else {
    echo 'Payment details are missing.';
}

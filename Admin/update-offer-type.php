<?php
    include "../DB/connection.php";
    error_reporting(0);
    $offer_id = $_POST["offer_id"];
    $offer_type = $_POST["offer_type"];
    $minimum_order = $_POST["minimum_order"];
    $offer_description= $_POST['offer_description'];
    $discount = $_POST["discount"];
    $query =  $offer_type == "3"?
        "update offer_details_tbl set Offer_Description='$offer_description', Minimum_order='$minimum_order' where Offer_Id=$offer_id":
        "update offer_details_tbl set Offer_Description='$offer_description', Discount='$discount' where Offer_Id=$offer_id";

    if(mysqli_query($con,$query)){
        echo "<script>
            alert('Offer updated successfully!');
            location.href='offers.php';
        </script>";
    }
    else{
        echo mysqli_error($con);
    }
?>
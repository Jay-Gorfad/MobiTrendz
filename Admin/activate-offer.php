<?php
include('../DB/connection.php');

$offer_id = $_GET['offer_id'];

$query = "UPDATE `offer_details_tbl` SET `active_status` = 1 WHERE `Offer_Id` = $offer_id";

if (mysqli_query($con, $query)) {
    echo "<script>location.replace('offers.php');</script>";
} else {
    $error_message = mysqli_error($con);
    echo "<script>alert('Failed to activate the offer: $error_message');</script>";
}
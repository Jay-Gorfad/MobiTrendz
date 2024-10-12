<?php
include '../DB/connection.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $sql = "UPDATE user_details_tbl SET Active_Status = 1 WHERE User_Id = $userId";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('User activated successfully!');</script>";
        echo "<script>window.location.href = 'users.php';</script>";
    } else {
        echo "Error activating user: " . mysqli_error($con);
    }
} else {
    echo "<script>window.location.href = 'users.php';</script>";
}
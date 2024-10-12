<?php
include('../DB/connection.php');

$user_id = $_GET['user_id'];

$query = "UPDATE `user_details_tbl` SET `Active_Status` = -1 WHERE `User_Id` = $user_id";

if (mysqli_query($con, $query)) {
    echo "<script>alert('User has been deleted successfully!');</script>";
} else {
    $error_message = mysqli_error($con);
    echo "<script>alert('Failed to delete the user: $error_message');</script>";
}

echo "<script>location.replace('users.php');</script>";
?>

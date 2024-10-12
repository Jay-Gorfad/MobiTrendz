<?php
include '../DB/connection.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $sql = "UPDATE user_details_tbl SET Active_Status = 0 WHERE User_Id = $userId";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('User deactivated successfully!');</script>";
        echo "<script>window.location.href = 'users.php';</script>";
    } else {
        echo "Error deactivating user: " . mysqli_error($con);
    }
} else {
    echo "<script>window.location.href = 'users.php';</script>";
}
?>

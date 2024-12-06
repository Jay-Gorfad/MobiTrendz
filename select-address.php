<?php
include("db/connection.php");

if (isset($_POST['id'])) {  // Fixed `$POST` to `$_POST`
    $id = mysqli_real_escape_string($con, $_POST['id']); // Sanitize input
    $q = "SELECT * FROM address_details_tbl WHERE Address_Id='$id'"; // Correct table name
    $r = mysqli_query($con, $q);
    if ($address = mysqli_fetch_assoc($r)) {
        $_SESSION['add_id']=$address['Address_Id'];
        $add = $address['Full_Name'] . ', ' . $address['Address'] . ', ' . $address['City'] . ', ' . $address['State'] . ' - ' . $address['Pincode'];
        echo $add;
    } else {
        echo "Address not found!";
    }
}

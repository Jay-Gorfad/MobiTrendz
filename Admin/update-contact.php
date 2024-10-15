<?php
include("../DB/connection.php");

$contactEmail = $_POST['contact_email'];
$contactNumber = $_POST['contact_number'];

$query = "UPDATE contact_page_details_tbl SET Contact_Email = '" . mysqli_real_escape_string($con, $contactEmail) . "', Contact_Number = '" . mysqli_real_escape_string($con, $contactNumber) . "' WHERE 1";

if (mysqli_query($con, $query)) {
    echo "Contact page info updated successfully.";
} else {
    echo "Error updating contact page info: " . mysqli_error($con);
}

header("Location: site-settings.php");
exit();
?>

<?php
include("../DB/connection.php");

$aboutContent = $_POST['about_content'];

$query = "UPDATE about_page_details_tbl SET Content = '" . mysqli_real_escape_string($con, $aboutContent) . "' WHERE 1";

if (mysqli_query($con, $query)) {
    echo "About page content updated successfully.";
} else {
    echo "Error updating about page content: " . mysqli_error($con);
}

header("Location: site-settings.php");
exit();
?>

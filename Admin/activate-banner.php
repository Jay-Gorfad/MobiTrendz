<?php
include '../DB/connection.php'; 

if (isset($_GET['banner_id'])) {
    $banner_id = $_GET['banner_id'];

    $query = "UPDATE banner_details_tbl SET Active_Status = 1 WHERE Banner_Id = $banner_id";

    if (mysqli_query($con, $query)) {
        echo '<script>
                alert("Banner activated successfully.");
                window.location.href = "banners.php";
              </script>';
    } else {
        echo '<script>
                alert("Error activating banner. Please try again.");
                window.location.href = "banners.php";
              </script>';
    }
} else {
    echo '<script>
            alert("Invalid banner selected for activation.");
            window.location.href = "banners.php";
          </script>';
}
?>
<?php
include '../DB/connection.php'; 

if (isset($_GET['banner_id'])) {
    $banner_id = $_GET['banner_id'];

    $query = "SELECT Banner_Image FROM banner_details_tbl WHERE Banner_Id = $banner_id";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        $banner = mysqli_fetch_assoc($result);
        $banner_image = $banner['Banner_Image'];

        $deleteQuery = "DELETE FROM banner_details_tbl WHERE Banner_Id = $banner_id";

        if (mysqli_query($con, $deleteQuery)) {
            if ($banner_image && file_exists("../img/banners/" . $banner_image)) {
                unlink("../img/banners/" . $banner_image);
            }
            echo '<script>
                    alert("Banner deleted successfully.");
                    window.location.href = "banners.php";
                  </script>';
        } else {
            echo '<script>
                    alert("Error deleting banner. Please try again.");
                    window.location.href = "banners.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("Error retrieving banner details.");
                window.location.href = "banners.php";
              </script>';
    }
} else {
    echo '<script>
            alert("No banner ID specified.");
            window.location.href = "banners.php";
          </script>';
}
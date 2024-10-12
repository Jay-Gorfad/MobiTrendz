<?php include("sidebar.php"); 

include '../DB/connection.php'; 

if (isset($_GET['banner_id'])) {
    $banner_id = $_GET['banner_id'];
    $query = "SELECT * FROM banner_details_tbl WHERE Banner_Id = $banner_id";
    $result = mysqli_query($con, $query);
    $banner = mysqli_fetch_assoc($result);
}

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Banner</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="banners.php">Banners</a></li>
            <li class="breadcrumb-item active">Update Banner</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form id="updateBannerForm" method="POST" enctype="multipart/form-data" onsubmit="return validateAddBannerForm();">
                    <input type="hidden" name="banner_id" value="<?php echo $banner['Banner_Id']; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bannerImage" class="form-label">Banner Image</label>
                                <input type="file" class="form-control" id="bannerImage" name="banner_image" accept="image/*">
                                <div id="bannerImageError" class="error-message"></div>
                            </div>
                            <div class="mb-3">
                                <img src="../img/banners/<?php echo $banner['Banner_Image']; ?>" alt="" height="200px" width="200px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bannerOrder" class="form-label">View Order</label>
                                <input type="number" class="form-control" id="bannerOrder" name="banner_order" value="<?php echo $banner['View_Order']; ?>">
                                <div id="bannerOrderError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bannerStatus" class="form-label">Status</label>
                        <select class="form-select" id="bannerStatus" name="banner_status">
                            <option value="1" <?php echo $banner['Active_Status'] == 1 ? 'selected' : ''; ?>>Active</option>
                            <option value="0" <?php echo $banner['Active_Status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update_banner">Update Banner</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); 

if (isset($_POST['update_banner'])) {
    $banner_id = $_POST['banner_id'];
    $banner_order = $_POST['banner_order'];
    $banner_status = $_POST['banner_status'];
    
    // Check if a new image is uploaded
    if ($_FILES['banner_image']['name']) {
        $banner_image = uniqid() . "_" . $_FILES['banner_image']['name'];
        move_uploaded_file($_FILES['banner_image']['tmp_name'], "../img/banners/" . $banner_image);
        
        $updateBannerQuery = "
            UPDATE banner_details_tbl 
            SET Banner_Image = '$banner_image', View_Order = '$banner_order', Active_Status = '$banner_status'
            WHERE Banner_Id = $banner_id
        ";
    } else {
        // If no new image is uploaded, retain the old image
        $updateBannerQuery = "
            UPDATE banner_details_tbl 
            SET View_Order = '$banner_order', Active_Status = '$banner_status'
            WHERE Banner_Id = $banner_id
        ";
    }

    if (mysqli_query($con, $updateBannerQuery)) {
        echo '<script>
                alert("Banner updated successfully.");
                window.location.href = "banners.php";
              </script>';
    } else {
        echo '<script>
                alert("Error updating banner. Please try again.");
                window.location.href = "update_banner.php?banner_id=' . $banner_id . '";
              </script>';
    }
}
?>

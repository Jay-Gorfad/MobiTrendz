<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Banner</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Banner</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateAddBannerForm()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bannerImage" class="form-label">Banner Image</label>
                                <input type="file" class="form-control" id="bannerImage" name="banner_image">
                                <div id="bannerImageError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bannerOrder" class="form-label">View Order</label>
                                <input type="number" class="form-control" id="bannerOrder" name="banner_order">
                                <div id="bannerOrderError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bannerStatus" class="form-label">Status</label>
                        <select class="form-select" id="bannerStatus" name="banner_status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="add-banner">Add Banner</button>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>
<?php 
    if(isset($_POST["add-banner"]))
    {

        $banner_url = $_POST['banner_url'];
        $banner_order = $_POST['banner_order'];
        $banner_status = $_POST['banner_status'];
        $banner_image = uniqid() . $_FILES['banner_image']['name']; // Unique image name

    
        $insertBannerQuery = "
            INSERT INTO banner_details_tbl (Banner_Image, View_Order, Active_Status)
            VALUES ('$banner_image', '$banner_order', '$banner_status')
        ";

        if (mysqli_query($con, $insertBannerQuery)) {

            // Upload banner image
            if (!is_dir("../img/banners/")) {
                mkdir("../img/banners/");
            }

            move_uploaded_file($_FILES['banner_image']['tmp_name'], "../img/banners/" . $banner_image);

            // Set success cookie and redirect
            setcookie('success', 'Banner added successfully.', time() + 2);
            ?>

            <script>
                window.location.href = "banners.php";
            </script>

            <?php
        } else {
            // Set error cookie and redirect in case of failure
            setcookie('error', 'Error in adding banner. Try again.', time() + 2);
            ?>

            <script>
                window.location.href = "add_banner.php";
            </script>

            <?php
        }
    }
?>
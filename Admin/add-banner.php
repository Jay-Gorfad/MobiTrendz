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
                                <input type="file" class="form-control" id="bannerImage" name="banner_image" >
                                <div id="bannerImageError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bannerURL" class="form-label">Banner URL</label>
                                <input type="url" class="form-control" id="bannerURL" name="banner_url" placeholder="https://example.com" >
                                <div id="bannerURLError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bannerOrder" class="form-label">View Order</label>
                        <input type="number" class="form-control" id="bannerOrder" name="banner_order" >
                        <div id="bannerOrderError" class="error-message"></div>
                    </div>

                    <div class="mb-3">
                        <label for="bannerStatus" class="form-label">Status</label>
                        <select class="form-select" id="bannerStatus" name="banner_status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Banner</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>

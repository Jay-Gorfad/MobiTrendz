<?php
include("sidebar.php");
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Site Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Site Settings</li>
        </ol>

        <?php
        // Fetch About Page Content
        $aboutContent = '';
        $aboutSql = "SELECT Content FROM about_page_details_tbl LIMIT 1";
        $aboutResult = mysqli_query($con, $aboutSql);
        if ($aboutResult && mysqli_num_rows($aboutResult) > 0) {
            $row = mysqli_fetch_assoc($aboutResult);
            $aboutContent = $row['Content'];
        }

        // Fetch Contact Page Info
        $contactEmail = '';
        $contactNumber = '';
        $contactSql = "SELECT Contact_Email, Contact_Number FROM contact_page_details_tbl LIMIT 1";
        $contactResult = mysqli_query($con, $contactSql);
        if ($contactResult && mysqli_num_rows($contactResult) > 0) {
            $row = mysqli_fetch_assoc($contactResult);
            $contactEmail = $row['Contact_Email'];
            $contactNumber = $row['Contact_Number'];
        }
        ?>

        <!-- About Page Content Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update About Page Content</h4>
            </div>
            <div class="card-body">
                <form id="aboutPageForm" action="update-about.php" method="POST" onsubmit="return validateAboutPageForm();">
                    <div class="mb-3">
                        <label for="aboutContent" class="form-label">About Page Content</label>
                        <textarea id="aboutContent" name="about_content" class="form-control" rows="10"><?php echo htmlspecialchars($aboutContent); ?></textarea>
                        <div id="aboutContentError" class="error-message" style="color: red;"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update About Page</button>
                </form>
            </div>
        </div>

        <!-- Contact Page Info Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Contact Page Info</h4>
            </div>
            <div class="card-body">
                <form id="contactInfoForm" action="update-contact.php" method="POST" onsubmit="return validateContactInfoForm();">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Contact Page Email</label>
                                <input type="text" class="form-control" id="contactEmail" name="contact_email" value="<?php echo $contactEmail; ?>">
                                <div id="contactEmailError" class="error-message" style="color: red;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contactNumber" class="form-label">Contact Page Number</label>
                                <input type="text" class="form-control" id="contactNumber" name="contact_number" value="<?php echo $contactNumber; ?>">
                                <div id="contactNumberError" class="error-message" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Contact Info</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#aboutContent'))
        .catch(error => {
            console.error(error);
        });
</script>

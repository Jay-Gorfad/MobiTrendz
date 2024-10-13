<?php include("sidebar.php"); ?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Review</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Review</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <?php
                // Initialize empty review data
                $productId = '';
                $userId = '';
                $rating = '';
                $reviewText = '';

                // Check if review_id is passed to edit an existing review
                if (isset($_GET['review_id'])) {
                    $reviewId = $_GET['review_id'];

                    // Fetch the review details from the database
                    $reviewQuery = "SELECT * FROM review_details_tbl WHERE Review_Id = '$reviewId'";
                    $reviewResult = mysqli_query($con, $reviewQuery);

                    if ($review = mysqli_fetch_assoc($reviewResult)) {
                        // Assign the existing review data to the form fields
                        $productId = $review['Product_Id'];
                        $userId = $review['User_Id'];
                        $rating = $review['Rating'];
                        $reviewText = $review['Review'];
                    } else {
                        echo "<script>alert('Review not found!'); location.href='reviews.php';</script>";
                    }
                } else {
                    echo "<script>alert('No review ID provided!'); location.href='reviews.php';</script>";
                }

                // Fetch product and user data from the database
                $productQuery = "SELECT Product_Id, Product_Name FROM product_details_tbl WHERE is_active = 1";
                $productResult = mysqli_query($con, $productQuery);

                $userQuery = "SELECT User_Id, Name FROM user_details_tbl WHERE Active_Status = 1";
                $userResult = mysqli_query($con, $userQuery);
                ?>

                <form id="updateReviewForm" action="" method="post" onsubmit="return validateAddReviewForm();">
                    <div class="mb-3">
                        <label for="productid" class="form-label">Product</label>
                        <select id="productid" name="productid" class="form-select">
                            <option value="" disabled>Select a product</option>
                            <?php
                            if (mysqli_num_rows($productResult) > 0) {
                                while ($product = mysqli_fetch_assoc($productResult)) {
                                    echo '<option value="' . $product['Product_Id'] . '"' . ($product['Product_Id'] == $productId ? ' selected' : '') . '>' . $product['Product_Id'] . ' - ' . $product['Product_Name'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No active products available</option>';
                            }
                            ?>
                        </select>
                        <div id="productidError" class="error-message"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userid" class="form-label">User</label>
                        <select id="userid" name="userid" class="form-select">
                            <option value="" disabled>Select a user</option>
                            <?php
                            if (mysqli_num_rows($userResult) > 0) {
                                while ($user = mysqli_fetch_assoc($userResult)) {
                                    echo '<option value="' . $user['User_Id'] . '"' . ($user['User_Id'] == $userId ? ' selected' : '') . '>' . $user['User_Id'] . ' - ' . $user['Name'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No active users available</option>';
                            }
                            ?>
                        </select>
                        <div id="useridError" class="error-message"></div>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select id="rating" name="rating" class="form-select">
                            <option value="" disabled>Select a rating</option>
                            <option value="1" <?= ($rating == 1) ? 'selected' : '' ?>>1 Star</option>
                            <option value="2" <?= ($rating == 2) ? 'selected' : '' ?>>2 Stars</option>
                            <option value="3" <?= ($rating == 3) ? 'selected' : '' ?>>3 Stars</option>
                            <option value="4" <?= ($rating == 4) ? 'selected' : '' ?>>4 Stars</option>
                            <option value="5" <?= ($rating == 5) ? 'selected' : '' ?>>5 Stars</option>
                        </select>
                        <div id="ratingError" class="error-message"></div>
                    </div>

                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="3" placeholder="Enter review"><?= htmlspecialchars($reviewText) ?></textarea>
                        <div id="reviewError" class="error-message"></div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Update Review" name="update">
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>

<?php
if (isset($_POST['update'])) {
    $productId = $_POST['productid'];
    $userId = $_POST['userid'];
    $rating = $_POST['rating'];
    $reviewText = $_POST['review'];

    // Update the review in the database
    $updateSql = "UPDATE review_details_tbl SET Product_Id = '$productId', User_Id = '$userId', Rating = '$rating', Review = '$reviewText', Review_Date = NOW() WHERE Review_Id = '$reviewId'";

    if (mysqli_query($con, $updateSql)) {
        echo "<script>location.href='reviews.php';</script>";
    } else {
        echo "Error: " . $updateSql . "<br>" . mysqli_error($con);
    }
}
?>

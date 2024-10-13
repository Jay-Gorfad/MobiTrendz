<?php include("sidebar.php"); ?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Review</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Review</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <?php
                // Fetch product and user data from the database
                $productQuery = "SELECT Product_Id, Product_Name FROM product_details_tbl WHERE is_active = 1";
                $productResult = mysqli_query($con, $productQuery);

                $userQuery = "SELECT User_Id, Name FROM user_details_tbl WHERE Active_Status = 1";
                $userResult = mysqli_query($con, $userQuery);
                ?>
                
                <form id="addReviewForm" action="" method="post" onsubmit="return validateAddReviewForm();">
                    <div class="mb-3">
                        <label for="productid" class="form-label">Product</label>
                        <select id="productid" name="productid" class="form-select">
                            <option value="" disabled selected>Select a product</option>
                            <?php
                            if (mysqli_num_rows($productResult) > 0) {
                                while ($product = mysqli_fetch_assoc($productResult)) {
                                    echo '<option value="' . $product['Product_Id'] . '">'.$product['Product_Id'].' - '. $product['Product_Name'] . '</option>';
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
                            <option value="" disabled selected>Select a user</option>
                            <?php
                            if (mysqli_num_rows($userResult) > 0) {
                                while ($user = mysqli_fetch_assoc($userResult)) {
                                    echo '<option value="' . $user['User_Id'] . '">' .$user['User_Id'].' - '. $user['Name'] . '</option>';
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
                            <option value="" disabled selected>Select a rating</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                        <div id="ratingError" class="error-message"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="3" placeholder="Enter review"></textarea>
                        <div id="reviewError" class="error-message"></div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="Submit Review" name="submit">
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); 

if (isset($_POST["submit"])) {
    $productId = $_POST['productid'];
    $userId = $_POST['userid'];
    $rating = $_POST['rating'];
    $reviewText = $_POST['review'];

    $checkSql = "SELECT * FROM review_details_tbl WHERE Product_Id = '$productId' AND User_Id = '$userId'";
    $checkResult = mysqli_query($con, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) 
    {
        echo "<script>
            alert('This user has already reviewed this product.');
            history.back();
        </script>";
    }
    else
    {
        $sql = "INSERT INTO review_details_tbl (Product_Id, User_Id, Rating, Review, Review_Date) 
                VALUES ('$productId', '$userId', '$rating', '$reviewText', NOW())";

        if (mysqli_query($con, $sql)) 
        {
            echo "<script>location.href='reviews.php';</script>";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}


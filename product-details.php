<?php include('header.php'); ?>

<?php
$query = "select product.Product_Id, product.Display, product.Processor,product.RAM, product.Storage, product.Rear_Camera, product.Front_Camera, product.Battery, product.Operating_System, product.Color, product.Product_Name, product.Product_Image, product.Description, product.Sale_Price, round(product.Sale_Price-(product.Sale_Price*product.Discount/100),2) 'Price', count(Rating) as 'Review_Count', round(avg(Rating)) as 'Rating' from product_details_tbl as product left join review_details_tbl as review on product.Product_Id = review.Product_Id where product.Product_Id=".$_GET['product_id'];
$result = mysqli_query($con,$query);
$product = mysqli_fetch_assoc($result);
$product_id=$_GET['product_id'];
$user_id = $_SESSION['user_id'];
?>

    <div class="container sitemap">
        <p>
            <a href="index.php" class="text-decoration-none dim link">Home /</a>
            <a href="shop.php" class="text-decoration-none dim link">Shop /</a>
            Product Details
        </p>

        <div class="row">
            <!-- Product Image -->
            <div class="col-md-5 col-sm-12">
                <img src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Product image" class="img-thumbnail p-3 w-100 h-100">
            </div>

            <!-- Product Details -->
            <div class="col-md-7 col-sm-12 d-flex flex-column px-5 align-items-start">
                <h4 class="product-title"><?php echo $product['Product_Name'];?></h4>
                
                <!-- Rating and Review -->
                <div class="rating-section-description">
                <div class="ratings">
                        <span class="fa fa-star <?php echo $product["Rating"]>=1?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=2?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=3?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=4?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=5?"checked":""; ?>"></span>
                    </div>
                    <div class="review-count ps-1">
                            (<?php echo $product["Review_Count"]; ?>) 
                    </div>
                </div>
                
                <!-- Product Description -->
                <div class="product-description mt-3">
                    <?php echo $product['Description']; ?>
                </div>

                <!-- Price -->
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3">Price</div>
                    <div class="col-9 price">₹<?php echo $product["Price"]; ?></div>
                </div>

                <!-- Quantity Selection -->
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3">Quantity</div>
                    <div class="col-9 quantity d-flex align-items-center">
                        <div onclick="selectQuantity(this, 1)">1</div>
                        <div onclick="selectQuantity(this, 2)">2</div>
                        <div onclick="selectQuantity(this, 3)">3</div>
                        <div onclick="selectQuantity(this, 4)">4</div>
                        <div onclick="selectQuantity(this, 5)">5</div>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <form action="cart.php" class="w-100 mt-4">
                    <input type="hidden" name="product_id" value="<?php echo $product["Product_Id"]; ?>">
                    <input type="hidden" id="quantity" name="quantity" value="1">
                    <button class="add-to-cart-btn primary-btn w-100" type="submit">Add to cart</button>
                </form>
            </div>
        </div>

        <!-- Specifications Table -->
        <div class="row mt-5">
            <div class="col-12">
                <h5>Specifications</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Display</th>
                            <td><?php echo $product["Display"]; ?></td>
                        </tr>
                        <tr>
                            <th>Processor</th>
                            <td><?php echo $product["Processor"]; ?></td>
                        </tr>
                        <tr>
                            <th>RAM</th>
                            <td><?php echo $product["RAM"]; ?></td>
                        </tr>
                        <tr>
                            <th>Storage</th>
                            <td><?php echo $product["Storage"]; ?></td>
                        </tr>
                        <tr>
                            <th>Rear Camera</th>
                            <td><?php echo $product["Rear_Camera"]; ?></td>
                        </tr>
                        <tr>
                            <th>Front Camera</th>
                            <td><?php echo $product["Front_Camera"]; ?></td>
                        </tr>
                        <tr>
                            <th>Battery</th>
                            <td><?php echo $product["Battery"]; ?></td>
                        </tr>
                        <tr>
                            <th>Operating System</th>
                            <td><?php echo $product["Operating_System"]; ?></td>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td><?php echo $product["Color"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    <div class="container my-5">
    <h4 class="mb-4 text-center fw-bold">Customer Reviews</h4>
        <div class="row">
        <?php 
            if(isset($_SESSION['user_id']))
            {
                $query = "select count(*) from order_details_tbl as od
                left join order_header_tbl as oh ON od.Order_Id = oh.Order_Id 
                where Product_Id=$product_id and User_Id IS NOT NULL and User_Id=$user_id ";
            $result = mysqli_query($con, $query);
            $orderCount = mysqli_fetch_array($result);
            $hasOrdered = $orderCount[0]>0 ? true : false;

            }
              
                if($hasOrdered)
                {
                    ?>
                    <div class="col-6">
                    <form method="post" onsubmit="return validateReviewForm();">
                        <div>
                            <input type="hidden" name="product_id" value="<?php echo $product["Product_Id"]; ?>">
                            <label for="userRating" class="d-block">Rating</label>
                            <select class="form w-100 p-2 rounded" id="userRating" name="rating">
                                <option value="">Select rating</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                            <p id="userRatingError" class="text-danger"></p>
                        </div>
                        <div >
                            <label for="userReview " class="d-block">Review</label>
                            <textarea  id="userReview" class="w-100" rows="3" placeholder="Write your review" name="review" ></textarea>
                            <p id="userReviewError" class="text-danger"></p>
                        </div>
                        <button type="submit" class="primary-btn" name="add_review_btn">Leave a review</button>
                    </form>
                    </div>
                            <?php
                }
                else
                {
                    ?>
                    <div class="col-6 d-flex  justify-content-center">
                        <h5>You need to order first to give review on this product!</h5>
                    </div>
                    <?php
                }
            ?>
            <div class="col-6">
                <div class="row">
                    <?php display_review($product,$con);?>
                </div>
            </div>
        </div>

        <h4 class="mt-5 mb-4 text-center fw-bold">Similar Products</h4>
        <div class="d-flex justify-content-start mt-3">
            <?php display_products();?>
        </div>
    </div>
        
<?php include('footer.php'); 

if(isset($_POST['add_review_btn']))
    {
        $product_id = $_POST["product_id"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];
        $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:5;

        $query = "insert into review_details_tbl values('$product_id', $user_id, $rating, '$review', NOW())";
        $sql = mysqli_query($con, $query);

        if($sql)
            echo "<script>alert('Response added successfully!');
        location.href=location;
            </script>";
        else    
            echo "<script>alert(".mysqli_error($con).")</script>";
    }

function display_products() {
    for($i=1;$i<=4;$i++) {
        echo '
        <div class="col-md-3 gap col-sm-4 p-2 col-6">
            <div class="card">
                <a href="product-details.php?id=1">
                    <div class="product-image">
                        <img class="img-thumbnail p-4" src="img/products/15Plus.jpg" alt="Card image cap">
                    </div>
                </a>
                <div class="card-body product-body px-3 ">
                    <h6 class="card-title d-flex justify-content-center">Phone</h6>
                    <div class="d-flex justify-content-center align-items-center flex-column mb-2 w-100">
                            <span class="shop-price">₹1,20,000.00</span>
                            <span class="striked-price">₹1,50,000.00</span>
                    </div>
                    <div class="rating-section mb-2 d-flex justify-content-center">
                        <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="review-count ps-1">(95)</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-around ">
                        <a class="order-link cart-btn flex-grow-1" href="cart.php">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}

function display_review($product,$con){

    $product_id =$product["Product_Id"];
    $query = "SELECT 
        r.Review_Id, r.Rating, r.Review, r.Review_Date, 
        p.Product_Id, p.Product_Name, p.Product_Image, 
        u.User_Id, u.Name,
        r1.Review_Id as 'Reply_Id', r1.Review as 'Reply' 
    FROM review_details_tbl r
    JOIN product_details_tbl p ON r.Product_Id = p.Product_Id
    JOIN user_details_tbl u ON r.User_Id = u.User_Id
    left join review_details_tbl r1 on r.Review_Id = r1.Reply_To
    where p.is_active=1 and p.Product_Id=$product_id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while($review = mysqli_fetch_assoc($result)) {
            
            $rating = intval($review['Rating']); 
            $review_text = $review['Review'];
            $review_date = date('F j, Y', strtotime($review['Review_Date']));
            $stars = str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
            $reply= $review["Reply"];
        
            $user_name = $review['Name']; 
            
            echo '
            <div class="col-md-6 mb-4">
            <div class="review-card  card h-100">
                <div class="card-body">
                    <h5 class="card-title">'. $user_name .'</h5>
                    <h6 class="card-subtitle mb-2 text-warning">'. $stars .'</h6>
                    <p class="card-text">'. $review_text .'</p>
                    <p class="text-muted mb-0"><small>Posted on '. $review_date .'</small></p>
                </div>
                ';
                if(isset($review['Reply_Id']))
                {
                    $reply_text = $review["Reply"];
                    echo '<div class="card-body ">
                    <h5 class="card-title">Admin</h5>
                    <p class="card-text ms-5">'. $reply_text .'</p>
                </div>';
                }
                echo '
            </div>
            </div>';
        }
    } else {
        echo '<p>No reviews yet for this product. Be the first to leave a review!</p>';
    }

    }
?>
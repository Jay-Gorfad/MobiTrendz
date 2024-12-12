<?php include("sidebar.php"); 

$product_id = $_GET['product_id'];

$query = "SELECT 
    product.`Product_Id`, 
    product.`Category_Id`, 
    product.`Product_Name`, 
    product.`Description`, 
    product.`Product_Image`, 
    product.`Sale_Price`, 
    product.`Cost_Price`, 
    product.`Discount`, 
    product.`stock`, 
    ROUND(AVG(review.Rating), 0) AS 'Rating', 
    ROUND(product.Sale_Price - (product.Sale_Price * product.Discount / 100), 2) AS 'Price', 
    COUNT(o.Order_Id) AS 'Sold_Quantity'
FROM 
    product_details_tbl AS product
LEFT JOIN 
    review_details_tbl AS review 
    ON product.Product_Id = review.Product_Id
LEFT JOIN 
    order_details_tbl AS o 
    ON product.Product_Id = o.Product_Id
GROUP BY 
    product.`Product_Id`, 
    product.`Category_Id`, 
    product.`Product_Name`, 
    product.`Description`, 
    product.`Product_Image`, 
    product.`Sale_Price`, 
    product.`Cost_Price`, 
    product.`Discount`, 
    product.`stock`
HAVING 
    product.`Product_Id` = $product_id;
";

#$query = "select product.`Product_Id`, product.`Category_Id`, product.`Product_Name`, product.`Description`, product.`Product_Image`, product.`Sale_Price`, product.`Cost_Price`, product.`Discount`, product.`stock` , round(avg(review.Rating)) 'Rating', round(Sale_Price-Sale_Price*Discount/100,2) 'Price',COUNT(o.Order_Id) 'Sold_Quantity' from product_details_tbl as product left join review_details_tbl as review on product.Product_Id = review.Product_Id left join order_details_tbl as o on o.Product_Id = review.Product_Id group by Product_Id having Product_Id=$product_id";
$result = mysqli_query($con,$query);
$product = mysqli_fetch_assoc($result);

?>

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">View Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Product</li>
        </ol>

        <!-- Product Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Product Information</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                    <img src="..\img\items\products\<?php echo $product["Product_Image"]; ?>" alt="Product Photo" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <p><strong>Product ID:</strong> <?php echo $product["Product_Id"]; ?></p>
                        <p><strong>Product Name:</strong> <?php echo $product["Product_Name"]; ?></p>
                        <p><strong>Average Rating:</strong>  <?php echo $product["Rating"]; ?></p>
                        <p><strong>Description:</strong>  <?php echo $product["Description"]; ?></p>
                        <p><strong>Stock Quantity:</strong>  <?php echo $product["stock"]; ?></p>
                        <p><strong>Cost Price:</strong> ₹ <?php echo $product["Cost_Price"]; ?></p>
                        <p><strong>Sale Price:</strong> ₹ <?php echo $product["Sale_Price"]; ?></p>
                        <p><strong>Discount Percentage:</strong>  <?php echo $product["Discount"]; ?>%</p>
                        <p><strong>Price After Discount:</strong> ₹<?php echo $product["Price"]; ?></p>
                        <p><strong>Category:</strong> Apple</p>
                        <p><strong>Total Sales:</strong>  <?php echo $product["Sold_Quantity"]; ?></p>
                        <a class="btn btn-success" href="update-product.php?product_id=<?php echo $product["Product_Id"]; ?>">Update Product</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Product</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order History Section -->
        <!-- <div class="card mb-4">
            <div class="card-header">
                <h4>Order History</h4>
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Payment Mode</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td>2024-08-10</td>
                            <td>2</td>
                            <td>₹1,02,500.00</td>
                            <td>Credit Card</td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="Pending" selected>Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <a href="view_order.php?id=1001" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div> -->

        <!-- Ratings and Reviews Section -->
        <!-- <div class="card mb-4">
            <div class="card-header">
                <h4>Ratings and Reviews</h4>
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead class="table-light">
                        <tr>
                            <th>Username</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="user_profile.php">John Doe</a></td>
                            <td>
                                <span class="text-warning">
                                    &#9733; &#9733; &#9733; &#9733; &#9734;
                                </span>
                            </td>
                            <td >
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
                                <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
    <!-- Reply Modal -->
    <!-- <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply to Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="reviewReply" class="form-label">Your Reply</label>
                            <textarea class="form-control" id="reviewReply" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Delete Modal -->
    <!-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this review? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="delete_review_handler.php" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div> -->
<?php include("footer.php"); ?>

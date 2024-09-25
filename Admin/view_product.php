<?php include("sidebar.php"); ?>
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
                        <img src="image/3.jpg" alt="Product Photo" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <p><strong>Product ID:</strong> 12345</p>
                        <p><strong>Product Name:</strong> Iphone 14 Pro</p>
                        <p><strong>Average Rating:</strong> 4.5</p>
                        <p><strong>Description:</strong> This is 5G phone with 4230mah battery</p>
                        <p><strong>Stock Quantity:</strong> 150</p>
                        <p><strong>Price:</strong> ₹1,20,500.00</p>
                        <p><strong>Discount Percentage:</strong> 10%</p>
                        <p><strong>Price After Discount:</strong> ₹1,02,500.00</p>
                        <p><strong>Category:</strong> Iphone</p>
                        <p><strong>Total Sales:</strong> 50</p>
                        <a class="btn btn-success" href="update-product.php?id=12345">Update Product</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Product</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order History Section -->
        <div class="card mb-4">
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
                        <!-- Additional rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ratings and Reviews Section -->
        <div class="card mb-4">
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
        </div>
    </div>
    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
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
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
    </div>
<?php include("footer.php"); ?>

<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">User Details</li>
        </ol>

        <!-- User Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Username:</strong> JohnDoe</p>
                        <p><strong>Email:</strong> john.doe@example.com</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone Number:</strong> +1234567890</p>
                        <p><strong>Registration Date:</strong> 2024-01-01</p>
                        <p><strong>Status:</strong> Active</p>
                    </div>
                </div>
                <a href="update_user.php" class="btn btn-primary mt-3">Edit User Info</a>
                <button class="btn btn-danger mt-3">Deactivate Account</button>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4>User Orders</h4>
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
                            <td>₹1,20,000.00</td>
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
                        <tr>
                            <td>1001</td>
                            <td>2024-08-10</td>
                            <td>2</td>
                            <td>₹1,20,000.00</td>
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
                        <tr>
                            <td>1001</td>
                            <td>2024-08-10</td>
                            <td>2</td>
                            <td>₹1,20,000.00</td>
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
        </div>
       

        <!-- User Reviews Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>User Reviews</h4>
            </div>
            <div class="card-body">
            <table class="table border">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="image/3.jpg" alt="Product 1" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                <a href="product_details.php">Product 1</a>
                            </div>
                        </td>
                        <td style="width: 110px;">
                            <span class="text-warning">
                                &#9733; &#9733; &#9733; &#9733; &#9734;
                            </span>
                        </td>
                        <td style="max-width: 250px;">
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

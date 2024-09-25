<?php include("sidebar.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                            <div>
                                <h1>Review Management</h1>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="Index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Review</li>
                                </ol>
                            </div>
                            <a class="btn btn-primary" href="add-review.php">Add Review</a>
                        </div>
        <div class="card-body">
            <table class="table border">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Username</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="image/1.jpg" alt="Product 1" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                <a href="product_details.php">Product 1</a>
                            </div>
                        </td>
                        <td><a href="user_profile.php">John Doe</a></td>
                        <td style="width: 100px;">
                            <span class="text-warning">
                                &#9733; &#9733; &#9733; &#9733; &#9734;
                            </span>
                        </td>
                        <td  style="max-width: 250px;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
                            <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="image/4.jpg" alt="Product 2" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                <a href="product_details.php">Product 2</a>
                            </div>
                        </td>
                        <td><a href="user_profile.php">Jane Smith</a></td>
                        <td style="width: 100px;">
                            <span class="text-warning">
                                &#9733; &#9733; &#9733; &#9733; &#9733;
                            </span>
                        </td>
                        <td  style="max-width: 250px;">
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
                            <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="image/3.jpg" alt="Product 3" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                <a href="product_details.php">Product 3</a>
                            </div>
                        </td>
                        <td><a href="user_profile.php">Emily Johnson</a></td>
                        <td style="width: 110px;">
                            <span class="text-warning">
                                &#9733; &#9733; &#9733; &#9734; &#9734;
                            </span>
                        </td>
                        <td  style="max-width: 250px;">
                            Sed euismod nisi porta lorem mollis aliquam ut porttitor leo a diam sollicitudin tempor id eu nisl nunc.
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

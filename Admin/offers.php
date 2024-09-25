<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1 class="mt-4">Offers Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Offers</li>
                    </ol>
                </div>
                <a class="btn btn-primary" href="add-offer.php">Add Offer</a>
            </div>
            <!-- Discount Offers Table -->
            <h4 class="mt-4">Discount Offers</h4>
            <table class="table border">
                <thead class="table-light">
                    <tr>
                        <th>Offer Description</th>
                        <th>Discount</th>
                        <th>Minimum Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10% discount on orders above ₹1000</td>
                        <td>10%</td>
                        <td>₹1000</td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5% discount on orders above ₹500</td>
                        <td>5%</td>
                        <td>₹500</td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- First Purchase Discount Table -->
            <h4 class="mt-4">First Purchase Discounts</h4>
            <table class="table border">
                <thead class="table-light">
                    <tr>
                        <th>Offer Description</th>
                        <th>Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" value="10% discount on first purchase"></td>
                        <td><input type="text" class="form-control" value="10%"></td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm">Update</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Free Shipping Table -->
            <h4 class="mt-4">Free Shipping Offers</h4>
            <table class="table border">
                <thead class="table-light">
                    <tr>
                        <th>Offer Description</th>
                        <th>Minimum Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" value="Free shipping on orders above ₹1500"></td>
                        <td><input type="text" class="form-control" value="₹1500"></td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm">Update</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </main>

    <!-- Modal for Delete Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this offer? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="delete_offer_handler.php" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>

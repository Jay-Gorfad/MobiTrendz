<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">User Details</li>
        </ol>

        <!-- Fetching User Information -->
        <?php
            $user_id = $_GET['user_id']; // Assuming the user_id is passed as a query parameter
            $query = "SELECT * FROM user_details_tbl WHERE User_Id = $user_id";
            $result = mysqli_query($con, $query);
            $user = mysqli_fetch_assoc($result);
            $status = $user['Active_Status']; // Get the user's active status
        ?>

        <!-- User Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Username:</strong> <?php echo $user['Name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone Number:</strong> <?php echo $user['Mobile_No']; ?></p>
                        <p><strong>Status:</strong> <?php echo $status == 1 ? 'Active' : ($status == 0 ? 'Inactive' : 'Deactivated'); ?></p>
                    </div>
                </div>
                <a href="update-user.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary mt-3">Edit User Info</a>

                <?php if ($status == 1): ?>
                    <!-- Show Deactivate Button if the user is Active -->
                    <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deactivateModal">Deactivate Account</button>
                <?php else: ?>
                    <!-- Show Activate Button if the user is Inactive or Deactivated -->
                    <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#activateModal">Activate Account</button>
                <?php endif; ?>
            </div>
        </div>

        <!-- Fetching User Orders -->
        <?php
            $order_query = "
                SELECT 
                    oh.Order_Id, oh.Order_Date, oh.Order_Status, oh.Total, oh.Shipping_Charge,
                    od.Quantity, od.Price, od.Product_Id
                FROM order_header_tbl oh
                JOIN order_details_tbl od ON oh.Order_Id = od.Order_Id
                WHERE oh.User_Id = $user_id
            ";
            $order_result = mysqli_query($con, $order_query);
        ?>

        <!-- User Orders Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>User Orders</h4>
            </div>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Shipping Charge</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (mysqli_num_rows($order_result) > 0) {
                                while ($order = mysqli_fetch_assoc($order_result)) {
                                    $order_id = $order['Order_Id'];
                                    $order_date = $order['Order_Date'];
                                    $quantity = $order['Quantity'];
                                    $total_price = $order['Total'];
                                    $shipping_charge = $order['Shipping_Charge'];
                                    $order_status = $order['Order_Status'];
                        ?>
                        <tr>
                            <td><?php echo $order_id; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo "$" . number_format($total_price, 2); ?></td>
                            <td><?php echo "$" . number_format($shipping_charge, 2); ?></td>
                            <td><?php echo $order_status; ?></td>
                            <td>
                                <a href="view-order.php?id=<?php echo $order_id; ?>" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteOrderModal<?php echo $order_id; ?>">Delete</button>
                            </td>
                        </tr>

                        <!-- Delete Order Modal -->
                        <div class="modal fade" id="deleteOrderModal<?php echo $order_id; ?>" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteOrderModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this order? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="delete-order.php?order_id=<?php echo $order_id; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                                }
                            } else {
                                echo "<tr><td colspan='7'>No orders found for this user.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Deactivate User Modal -->
        <div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deactivateModalLabel">Confirm Deactivation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to deactivate this account? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="deactivate-user.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger">Deactivate</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activate User Modal -->
        <div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="activateModalLabel">Confirm Activation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to activate this account?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="activate-user.php?user_id=<?php echo $user_id; ?>" class="btn btn-success">Activate</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
<?php include("footer.php"); ?>

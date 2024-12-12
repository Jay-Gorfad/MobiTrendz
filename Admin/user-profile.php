<?php include("sidebar.php"); 

$user_id = $_GET['user_id'];

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">User Details</li>
        </ol>

        <!-- Fetching User Information -->
        <?php
            $query = "SELECT * FROM user_details_tbl where User_Id=$user_id";
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
           $search = isset($_GET['search']) ? $_GET['search'] : '';
           $search_query = '';
           
           if (!empty($search)) {
               $search_query = "WHERE oh.Order_Id LIKE '%$search%' 
                   OR oh.Order_Status LIKE '%$search%'";
           }
           
           $query = "
               SELECT 
                   oh.Order_Id, 
                   oh.Order_Date, 
                   SUM(od.Quantity) AS Total_Quantity, 
                   SUM(od.Quantity * od.Price) AS Total_Price, 
                   oh.Order_Status,
                   u.User_Id
               FROM order_header_tbl oh
               JOIN user_details_tbl u ON oh.User_Id = u.User_Id 
               JOIN order_details_tbl od ON oh.Order_Id = od.Order_Id
               $search_query
               GROUP BY oh.Order_Id, oh.Order_Date, oh.Order_Status having u.User_Id = $user_id
               ORDER BY oh.Order_Date DESC 
           ";
           $result = mysqli_query($con, $query);
           $total_records = mysqli_num_rows($result);
           
           $records_per_page = 10;
           $total_pages = ceil($total_records / $records_per_page);
           
           $page = isset($_GET['page']) ? $_GET['page'] : 1;
           $start_from = ($page - 1) * $records_per_page;
           
           $query .= " LIMIT $start_from, $records_per_page";
           $result = mysqli_query($con, $query);
        ?>

        <!-- User Orders Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>User Orders</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="search"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) 
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                ?>
                                <tr>
                                <td><?php echo $row['Order_Id']; ?></td>
                                <td><?php echo $row['Order_Date']; ?></td>
                                <td><?php echo $row['Total_Quantity']; ?></td>
                                <td>₹<?php echo number_format($row['Total_Price'], 2); ?></td>
                                <td><?php echo $row['Order_Status']; ?></td>
                                <td>
                                    <div class='d-flex flex-nowrap'>
                                        <a href='view-order.php?order_id=<?php echo $row["Order_Id"]; ?>' class='btn btn-info btn-sm me-1'>View</a>
                                        <a href='update-order.php?order_id=<?php echo $row["Order_Id"]; ?>' class='btn btn-primary btn-sm me-1'>Edit</a>
                                        <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal<?php echo $row["Order_Id"]; ?>'>Delete</button>
                                    </div>
                                </td>
                            </tr>
                            
                            <div class="modal fade" id="deleteModal<?php echo $row["Order_Id"]; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this order? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete-order.php?order_id=<?php echo $row["Order_Id"]; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No orders found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            
                            <?php 
                                if ($page > 1) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."&search=$search&user_id=$user_id'>Previous</a></li>";
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=$search&user_id=$user_id'>" . $i . "</a></li>";
                                }
                                if ($page < $total_pages) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."&search=$search&user_id=$user_id'>Next</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div> 
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
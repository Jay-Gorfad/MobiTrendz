<?php include("sidebar.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                            <div>
                                <h1>Order Management</h1>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="Index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Order</li>
                                </ol>
                            </div>
                            <a class="btn btn-primary" href="add-order.php">Add Order</a>
                        </div>
    <main>
            <div class="card-body">
                <table class="table border">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
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
                            <td>1021</td>
                            <td>prince</td>
                            <td>2024-06-15</td>
                            <td>1</td>
                            <td>₹1,20,000</td>
                            <td>Case On Delivery</td>
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
                            <td>2125</td>
                            <td>Smith</td>
                            <td>2024-07-20</td>
                            <td>2</td>
                            <td>₹2,40,000</td>
                            <td>Case On Delivery</td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="Pending">Pending</option>
                                    <option value="Processing" selected>Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <a href="view_order.php?id=1002" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2425</td>
                            <td>Johnson</td>
                            <td>2024-08-1</td>
                            <td>1</td>
                            <td>₹1,50,000</td>
                            <td>Bank</td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped" selected>Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <a href="view_order.php?id=1003" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3023</td>
                            <td>jay</td>
                            <td>2024-06-1</td>
                            <td>1</td>
                            <td>₹1,20,000</td>
                            <td>Cash on Delivery</td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered" selected>Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <a href="view_order.php?id=1004" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3045</td>
                            <td>karan</td>
                            <td>2024-07-7</td>
                            <td>2</td>
                            <td>₹2,40,000</td>
                            <td>Cash on Delivery</td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered" selected>Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <a href="view_order.php?id=1004" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                    <a href="delete_order_handler.php" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>

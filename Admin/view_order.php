<?php include("sidebar.php") ?>
            <div id="layoutSidenav_content">
            <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>View Order</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="Index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
                        <li class="breadcrumb-item active">View Order</li>
                    </ol>
                </div>
            </div>

            <!-- Order Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Order Details</h5>
                </div>
                <div class="card-body">
                    <h6><strong>Order ID:</strong> 1001</h6>
                    <h6><strong>Status:</strong> Pending</h6>
                    <h6><strong>Order Date:</strong> 2024-08-10</h6>
                    <h6><strong>Payment mode:</strong> Cash on delivery</h6>
                </div>
            </div>

            <!-- Addresses -->
            <div class="row">
                <!-- Shipping Address -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Shipping Address</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Name:</strong> John Doe</p>
                            <p class="mb-1"><strong>Street:</strong> 56 Lotus Avenue</p>
                            <p class="mb-1"><strong>City:</strong> New Delhi</p>
                            <p class="mb-1"><strong>State:</strong> john.doe@example.com</p>
                            <p class="mb-1"><strong>Zip Code:</strong> 110001</p>
                            <p class="mb-0"><strong>Phone:</strong> (123) 456-7890</p>
                        </div>
                    </div>
                </div>

                <!-- Billing Address -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Billing Address</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Name:</strong> John Doe</p>
                            <p class="mb-1"><strong>Street:</strong> 56 Lotus Avenue</p>
                            <p class="mb-1"><strong>City:</strong> New Delhi</p>
                            <p class="mb-1"><strong>State:</strong> john.doe@example.com</p>
                            <p class="mb-1"><strong>Zip Code:</strong> 110001</p>
                            <p class="mb-0"><strong>Phone:</strong> (123) 456-7890</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>User Information</h5>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Name:</strong> John Doe</p>
                    <p class="mb-1"><strong>Email:</strong> john.doe@example.com</p>
                    <p class="mb-0"><strong>Phone:</strong> (123) 456-7890</p>
                </div>
            </div>

            <!-- Ordered Items -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Ordered Items</h5>
                </div>
                <div class="card-body">
                    <table class="table border">
                        <thead class="table-light">
                            <tr>
                                <th>Item Image</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="image/1.jpg" alt="Item 1" width="50"></td>
                                <td>i phone 14</td>
                                <td>₹1,20,000</td>
                                <td>1</td>
                                <td>₹1,20,000</td>
                            </tr>
                            <tr>
                                <td><img src="image/10.jpg" alt="Item 2" width="50"></td>
                                <td>Samsung</td>
                                <td>₹1,50,000</td>
                                <td>1</td>
                                <td>₹1,50,000</td>
                            </tr>
                            <!-- Add more items as needed -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-end">Subtotal:</th>
                                <td>₹2,70,000</td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-end">Shipping Charge:</th>
                                <td>₹200</td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-end">Total:</th>
                                <td>₹2,70,200</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php include("footer.php") ?>


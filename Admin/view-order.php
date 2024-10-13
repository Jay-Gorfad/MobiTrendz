<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>View Order</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
                        <li class="breadcrumb-item active">View Order</li>
                    </ol>
                </div>
            </div>

            <?php
            $order_id = $_GET['order_id']; // Retrieve the order ID from the URL

            // Fetch order details
            $order_query = "SELECT oh.Order_Id, oh.Order_Date, oh.Order_Status, oh.Payment_Mode, oh.Shipping_Address_Id, oh.Shipping_Charge, oh.Total,
                            ud.Name, ud.Email, ud.Mobile_No
                            FROM order_header_tbl oh
                            JOIN user_details_tbl ud ON oh.User_Id = ud.User_Id
                            WHERE oh.Order_Id = $order_id";
            $order_result = mysqli_query($con, $order_query);
            $order_data = mysqli_fetch_assoc($order_result);

            // Fetch shipping address details
            $shipping_query = "SELECT * FROM address_details_tbl WHERE Address_Id = " . $order_data['Shipping_Address_Id'];
            $shipping_result = mysqli_query($con, $shipping_query);
            $shipping_data = mysqli_fetch_assoc($shipping_result);

            // Fetch billing address details
            // $billing_query = "SELECT * FROM address_details_tbl WHERE Address_Id = " . $order_data['Billing_Address_Id'];
            // $billing_result = mysqli_query($con, $billing_query);
            // $billing_data = mysqli_fetch_assoc($billing_result);

            // Fetch ordered items
            $items_query = "SELECT od.Product_Id, od.Quantity, od.Price, p.Product_Name, p.Product_Image
                            FROM order_details_tbl od
                            JOIN product_details_tbl p ON od.Product_Id = p.Product_Id
                            WHERE od.Order_Id = $order_id";
            $items_result = mysqli_query($con, $items_query);
            ?>

            <!-- Order Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Order Details</h5>
                </div>
                <div class="card-body">
                    <h6><strong>Order ID:</strong> <?php echo $order_data['Order_Id']; ?></h6>
                    <h6><strong>Status:</strong> <?php echo $order_data['Order_Status']; ?></h6>
                    <h6><strong>Order Date:</strong> <?php echo $order_data['Order_Date']; ?></h6>
                    <h6><strong>Payment mode:</strong> <?php echo $order_data['Payment_Mode']; ?></h6>
                </div>
            </div>

            <!-- Addresses -->
            <div class="row">
                <!-- Shipping Address -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Shipping Address</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Name:</strong> <?php echo $shipping_data['Full_Name']; ?></p>
                            <p class="mb-1"><strong>Street:</strong> <?php echo $shipping_data['Address']; ?></p>
                            <p class="mb-1"><strong>City:</strong> <?php echo $shipping_data['City']; ?></p>
                            <p class="mb-1"><strong>State:</strong> <?php echo $shipping_data['State']; ?></p>
                            <p class="mb-1"><strong>Zip Code:</strong> <?php echo $shipping_data['Pincode']; ?></p>
                            <p class="mb-0"><strong>Phone:</strong> <?php echo $shipping_data['Phone']; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Billing Address -->
                <!-- <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Billing Address</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Name:</strong> <?php echo $billing_data['Full_Name']; ?></p>
                            <p class="mb-1"><strong>Street:</strong> <?php echo $billing_data['Address']; ?></p>
                            <p class="mb-1"><strong>City:</strong> <?php echo $billing_data['City']; ?></p>
                            <p class="mb-1"><strong>State:</strong> <?php echo $billing_data['State']; ?></p>
                            <p class="mb-1"><strong>Zip Code:</strong> <?php echo $billing_data['Pincode']; ?></p>
                            <p class="mb-0"><strong>Phone:</strong> <?php echo $billing_data['Phone']; ?></p>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- User Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>User Information</h5>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Name:</strong> <?php echo $order_data['Name']?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo $order_data['Email']; ?></p>
                    <p class="mb-0"><strong>Phone:</strong> <?php echo $order_data['Mobile_No']; ?></p>
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
                            <?php while ($item = mysqli_fetch_assoc($items_result)) { ?>
                                <tr>
                                    <td><img src="../img/items/products/<?php echo $item['Product_Image']; ?>" alt="Item Image" width="50"></td>
                                    <td><?php echo $item['Product_Name']; ?></td>
                                    <td>₹<?php echo $item['Price']; ?></td>
                                    <td><?php echo $item['Quantity']; ?></td>
                                    <td>₹<?php echo $item['Price'] * $item['Quantity']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-end">Subtotal:</th>
                                <td>₹<?php echo $order_data['Total'] - $order_data['Shipping_Charge']; ?></td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-end">Shipping Charge:</th>
                                <td>₹<?php echo $order_data['Shipping_Charge']; ?></td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-end">Total:</th>
                                <td>₹<?php echo $order_data['Total']; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php include("footer.php"); ?>

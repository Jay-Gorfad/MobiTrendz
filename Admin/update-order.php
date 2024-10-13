<?php include "sidebar.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Edit Order</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="order-management.php">Orders</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                <?php

                if (isset($_GET['order_id'])) {
                    $orderId = $_GET['order_id'];

                    $orderQuery = "SELECT * FROM order_header_tbl WHERE Order_Id = $orderId";
                    $orderResult = mysqli_query($con, $orderQuery);
                    $order = mysqli_fetch_assoc($orderResult);

                    // $billingQuery = "SELECT * FROM address_details_tbl WHERE Address_Id = {$order['Billing_Address_Id']}";
                    // $billingResult = mysqli_query($con, $billingQuery);
                    // $billingAddress = mysqli_fetch_assoc($billingResult);

                    $shippingQuery = "SELECT * FROM address_details_tbl WHERE Address_Id = {$order['Shipping_Address_Id']}";
                    $shippingResult = mysqli_query($con, $shippingQuery);
                    $shippingAddress = mysqli_fetch_assoc($shippingResult);

                    // $sameAsBilling = ($order['Billing_Address_Id'] == $order['Shipping_Address_Id']) ? true : false;

                    $productsQuery = "SELECT * FROM order_details_tbl WHERE Order_Id = $orderId";
                    $productsResult = mysqli_query($con, $productsQuery);
                    $products = [];
                    while ($row = mysqli_fetch_assoc($productsResult)) {
                        $products[] = $row;
                    }
                ?>
                <form action="" method="POST" onsubmit="return validateAddOrderForm()||event.preventDefault()">
                    <!-- Order Details -->
                    <?php
                    
                    $userQuery = "SELECT User_Id, Name FROM user_details_tbl WHERE Active_Status = 1";
                    $userResult = mysqli_query($con, $userQuery);
                    

                    ?>

                    <div class="mb-3">
                        <label for="userId" class="form-label">User ID</label>
                        <select class="form-select" id="userId" name="userId">
                            <option value="">Select User</option>
                            <?php
                            if (mysqli_num_rows($userResult) > 0) {
                                while ($userRow = mysqli_fetch_assoc($userResult)) {
                                    $userId = $userRow['User_Id'];
                                    $userName = $userRow['Name'];
                                    $isSelected = $userId == $order['User_Id'];
                                    ?>
                                    <option value="<?php echo $userId; ?>" <?php echo $isSelected?'selected':''; ?>><?php echo $userId; ?> - <?php echo $userName; ?></option>
                                    <?php
                                }
                            } else {
                                echo "<option value=''>No users found</option>";
                            }
                            ?>
                        </select>
                        <div id="userIdError" class="error-message"></div>
                    </div>
                    <div class="mb-3">
                        <label for="orderDate" class="form-label">Order Date</label>
                        <input type="date" class="form-control" id="orderDate" name="orderDate" value="<?php echo isset($order['Order_Date']) ? date('Y-m-d', strtotime($order['Order_Date'])) : ''; ?>">
                    </div>

                    <!-- Products Section -->
                    <div id="productContainer">
                        <?php
                        if (!empty($products)) {
                            foreach ($products as $index => $product) {
                                $productId = $product['Product_Id'];
                                $quantity = $product['Quantity'];
                                $productCount = $index + 1;

                                // Get all active products for the dropdown
                                $productQuery = "SELECT Product_Id, Product_Name FROM product_details_tbl WHERE is_active = 1";
                                $productResult = mysqli_query($con, $productQuery);
                                ?>
                                <div class="product-entry mb-3">
                                    <h5>Product <?php echo $productCount; ?></h5>
                                    <div class="row align-items-end">
                                        <!-- Product Dropdown -->
                                        <div class="col-md-5">
                                            <label for="productId<?php echo $productCount; ?>" class="form-label">Product ID</label>
                                            <select class="form-select product-dropdown" id="productId<?php echo $productCount; ?>" name="products[<?php echo $index; ?>][productId]" onchange="updateProductDropdowns()">
                                                <option value="">Select Product</option>
                                                <?php
                                                if (mysqli_num_rows($productResult) > 0) {
                                                    mysqli_data_seek($productResult, 0); // Reset pointer to start
                                                    while ($productRow = mysqli_fetch_assoc($productResult)) {
                                                        $prodId = $productRow['Product_Id'];
                                                        $prodName = $productRow['Product_Name'];
                                                        $selected = ($prodId == $productId) ? "selected" : "";
                                                        ?>
                                                        <option value="<?php echo $prodId; ?>" <?php echo $selected; ?>>
                                                            <?php echo $prodId . " - " . $prodName; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<option value=''>No products found</option>";
                                                }
                                                ?>
                                            </select>
                                            <div id="productId<?php echo $productCount; ?>Error" class="error-message"></div>
                                        </div>

                                        <!-- Quantity Input -->
                                        <div class="col-md-5">
                                            <label for="quantity<?php echo $productCount; ?>" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity<?php echo $productCount; ?>" name="products[<?php echo $index; ?>][quantity]" min="1" value="<?php echo $quantity; ?>">
                                            <div id="quantity<?php echo $productCount; ?>Error" class="error-message"></div>
                                        </div>

                                        <!-- Delete Product Button -->
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger mt-2 deleteProductBtn" onclick="removeProduct(this)">Delete Product</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>No products found for this order.</p>";
                        }
                        echo "<script>let productCount = $productCount;</script>";
                        ?>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addProductBtn">Add Another Product</button>


                    <!-- Billing Details Section -->
                    <!-- <div class="mb-4 mt-4">
                        <h2>Billing Details</h2>
                        <div class="row g-5">
                            <div class="col-md-12">
                                <div class="row gx-2 gy-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="billingFirstName" class="form-label d-block">First Name</label>
                                        <input type="text" id="billingFirstName" name="billingFirstName" class="form-control" value="<?php echo explode(' ', $billingAddress['Full_Name'])[0]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingLastName" class="form-label d-block">Last Name</label>
                                        <input type="text" id="billingLastName" name="billingLastName" class="form-control" value="<?php echo explode(' ', $billingAddress['Full_Name'])[1]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <label for="billingAddress" class="form-label d-block">Street Address</label>
                                        <textarea id="billingAddress" name="billingAddress" class="form-control" rows="2"><?php echo $billingAddress['Address']; ?></textarea>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingCity" class="form-label d-block">City</label>
                                        <input type="text" id="billingCity" name="billingCity" class="form-control" value="<?php echo $billingAddress['City']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingState" class="form-label d-block">State</label>
                                        <input type="text" id="billingState" name="billingState" class="form-control" value="<?php echo $billingAddress['State']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingPinCode" class="form-label d-block">Pin Code</label>
                                        <input type="text" id="billingPinCode" name="billingPinCode" class="form-control" value="<?php echo $billingAddress['Pincode']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingPhone" class="form-label d-block">Phone</label>
                                        <input type="text" id="billingPhone" name="billingPhone" class="form-control" value="<?php echo $billingAddress['Phone']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Checkbox to control Shipping Details visibility -->
                    <!-- <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="sameAsBilling" name="sameAsBilling" <?php echo $sameAsBilling ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="sameAsBilling">
                            Shipping address same as billing address
                        </label>
                    </div> -->

                    <!-- Shipping Details Section -->
                    <div id="shippingDetailsSection" class="mb-4">
                        <h2>Shipping Details</h2>
                        <div class="row g-5">
                            <div class="col-md-12">
                                <div class="row gx-2 gy-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingFirstName" class="form-label d-block">First Name</label>
                                        <input type="text" id="shippingFirstName" name="shippingFirstName" class="form-control" value="<?php echo explode(' ', $shippingAddress['Full_Name'])[0]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingLastName" class="form-label d-block">Last Name</label>
                                        <input type="text" id="shippingLastName" name="shippingLastName" class="form-control" value="<?php echo explode(' ', $shippingAddress['Full_Name'])[1]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <label for="shippingAddress" class="form-label d-block">Street Address</label>
                                        <textarea id="shippingAddress" name="shippingAddress" class="form-control" rows="2"><?php echo $shippingAddress['Address']; ?></textarea>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingCity" class="form-label d-block">City</label>
                                        <input type="text" id="shippingCity" name="shippingCity" class="form-control" value="<?php echo $shippingAddress['City']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingState" class="form-label d-block">State</label>
                                        <input type="text" id="shippingState" name="shippingState" class="form-control" value="<?php echo $shippingAddress['State']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingPinCode" class="form-label d-block">Pin Code</label>
                                        <input type="text" id="shippingPinCode" name="shippingPinCode" class="form-control" value="<?php echo $shippingAddress['Pincode']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingPhone" class="form-label d-block">Phone</label>
                                        <input type="text" id="shippingPhone" name="shippingPhone" class="form-control" value="<?php echo $shippingAddress['Phone']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="shippingCharge" class="form-label">Shipping Charge</label>
                        <input type="number" step="0.01" id="shippingCharge" name="shippingCharge" class="form-control" placeholder="Enter shipping charge" value="<?php echo $order["Shipping_Charge"]; ?>">
                        <div id="shippingChargeError" class="error-message"></div>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="orderStatus" class="form-label">Order Status</label>
                        <select class="form-select" id="orderStatus" name="orderStatus">
                            <option value="Pending" <?php echo ($order['Order_Status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="Processing" <?php echo ($order['Order_Status'] == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                            <option value="Shipped" <?php echo ($order['Order_Status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                            <option value="Delivered" <?php echo ($order['Order_Status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                            <option value="Cancelled" <?php echo ($order['Order_Status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                        <div id="orderStatusError" class="error-message"></div>
                    </div>
                    <button type="submit" name="update-order" class="btn btn-primary">Update Order</button>
                </form>
                <?php } else {
                    echo "<p>Invalid order ID.</p>";
                } ?>
            </div>
        </div>
    </main>

    <script>
    document.getElementById("sameAsBilling").addEventListener("change", function() {
        var shippingSection = document.getElementById("shippingDetailsSection");
        shippingSection.style.display = this.checked ? "none" : "block";
    });
    

    async function fetchProducts() {
        return fetch('fetch-products.php')
            .then(response => response.json())
            .then(data => data)
            .catch(error => console.error('Error fetching products:', error));
    }

    function createProductEntry(products) {
        const productContainer = document.getElementById('productContainer');
        const newProductEntry = document.createElement('div');
        newProductEntry.className = 'product-entry mb-3';
        productCount++;

        newProductEntry.innerHTML = `
            <h5>Product ${productCount}</h5>
            <div class="row align-items-end">
                <div class="col-md-5">
                    <label for="productId${productCount}" class="form-label">Product ID</label>
                    <select class="form-select product-dropdown" id="productId${productCount}" name="products[${productCount - 1}][productId]" onchange="updateProductDropdowns()">
                        <option value="">Select Product</option>
                        ${products.map(product => `<option value="${product.Product_Id}">${product.Product_Id} - ${product.Product_Name}</option>`).join('')}
                    </select>
                    <div id="productId${productCount}Error" class="error-message"></div>
                </div>
                <div class="col-md-5">
                    <label for="quantity${productCount}" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity${productCount}" name="products[${productCount - 1}][quantity]" min="1">
                    <div id="quantity${productCount}Error" class="error-message"></div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger mt-2 deleteProductBtn" onclick="removeProduct(this)">Delete Product</button>
                </div>
            </div>
        `;

        productContainer.appendChild(newProductEntry);
    }

    document.getElementById('addProductBtn').addEventListener('click', async function () {
        const products = await fetchProducts();
        createProductEntry(products);
        updateProductDropdowns(); 
    });

    function removeProduct(button) {
        const productEntry = button.closest('.product-entry');
        productEntry.remove();
        updateProductDropdowns(); 
    }

    function updateProductDropdowns() {
        const allDropdowns = document.querySelectorAll('.product-dropdown');
        const selectedProducts = Array.from(allDropdowns).map(dropdown => dropdown.value);

        allDropdowns.forEach(dropdown => {
            const currentSelection = dropdown.value;
            Array.from(dropdown.options).forEach(option => {
                if (selectedProducts.includes(option.value) && option.value !== currentSelection) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateProductDropdowns();
    });
</script>

<?php include "footer.php"; ?>
<?php
if (isset($_POST['update-order'])) {
    // Capture the form data
    $orderId = $_GET['order_id']; // Order ID to update
    $userId = $_POST['userId'];
    $orderDate = $_POST['orderDate'];
    $orderStatus = $_POST['orderStatus'];
    $sameAsBilling = isset($_POST['sameAsBilling']) ? true : false;
    $products = $_POST['products']; // Array of products
    $shippingCharge = $_POST['shippingCharge']; // Shipping Charge

    // Billing Address
    // $billingFirstName = $_POST['billingFirstName'];
    // $billingLastName = $_POST['billingLastName'];
    // $billingAddress = $_POST['billingAddress'];
    // $billingCity = $_POST['billingCity'];
    // $billingState = $_POST['billingState'];
    // $billingPinCode = $_POST['billingPinCode'];
    // $billingPhone = $_POST['billingPhone'];

    // Shipping Address (if not same as billing)
    if (!$sameAsBilling) {
        $shippingFirstName = $_POST['shippingFirstName'];
        $shippingLastName = $_POST['shippingLastName'];
        $shippingAddress = $_POST['shippingAddress'];
        $shippingCity = $_POST['shippingCity'];
        $shippingState = $_POST['shippingState'];
        $shippingPinCode = $_POST['shippingPinCode'];
        $shippingPhone = $_POST['shippingPhone'];
    }

    // Update Billing Address
    // $billingFullName = $billingFirstName . ' ' . $billingLastName;
    // $billingAddressQuery = "UPDATE address_details_tbl SET Full_Name = '$billingFullName', Address = '$billingAddress', 
    //                         City = '$billingCity', State = '$billingState', Pincode = '$billingPinCode', Phone = '$billingPhone' 
    //                         WHERE Address_Id = (SELECT Billing_Address_Id FROM order_header_tbl WHERE Order_Id = '$orderId')";

    // if (!mysqli_query($con, $billingAddressQuery)) {
    //     die("Error updating billing address: " . mysqli_error($con));
    // }

    // Update Shipping Address if different from billing
    if (!$sameAsBilling) {
        if($order['Billing_Address_Id'] == $order['Shipping_Address_Id'])
        {
            $shippingFullName = $shippingFirstName . ' ' . $shippingLastName;
            $shippingAddressQuery = "INSERT INTO address_details_tbl (User_Id, Full_Name, Address, City, State, Pincode, Phone) 
                                 VALUES ('$userId', '$shippingFullName', '$shippingAddress', '$shippingCity', '$shippingState', '$shippingPinCode', '$shippingPhone')";
        }
        else
        {
            $shippingFullName = $shippingFirstName . ' ' . $shippingLastName;
            $shippingAddressQuery = "UPDATE address_details_tbl SET Full_Name = '$shippingFullName', Address = '$shippingAddress', 
                                    City = '$shippingCity', State = '$shippingState', Pincode = '$shippingPinCode', Phone = '$shippingPhone' 
                                    WHERE Address_Id = (SELECT Shipping_Address_Id FROM order_header_tbl WHERE Order_Id = '$orderId')";

        }
        if (!mysqli_query($con, $shippingAddressQuery)) {
            die("Error updating shipping address: " . mysqli_error($con));
        }
    }

    // Update Order in order_header_tbl
    $orderQuery = "UPDATE order_header_tbl SET User_Id = '$userId', Order_Date = '$orderDate', Order_Status = '$orderStatus', 
                   Shipping_Charge = '$shippingCharge' WHERE Order_Id = '$orderId'";

    if (!mysqli_query($con, $orderQuery)) {
        die("Error updating order: " . mysqli_error($con));
    }

    // Delete existing order details
    $deleteOrderDetailsQuery = "DELETE FROM order_details_tbl WHERE Order_Id = '$orderId'";
    if (!mysqli_query($con, $deleteOrderDetailsQuery)) {
        die("Error deleting existing order details: " . mysqli_error($con));
    }

    // Insert products into order_details_tbl and calculate the total price
    $total = 0; // Initialize total

    foreach ($products as $product) {
        $productId = $product['productId'];
        $quantity = $product['quantity'];

        // Fetch product price (with discount)
        $priceQuery = "SELECT Sale_Price - Sale_Price * Discount / 100 AS price FROM product_details_tbl WHERE Product_Id = '$productId'";
        $priceResult = mysqli_query($con, $priceQuery);
        $productRow = mysqli_fetch_assoc($priceResult);
        $price = $productRow['price'];

        // Calculate total for each product
        $productTotal = $price * $quantity;
        $total += $productTotal; // Add to total

        // Insert into order_details_tbl
        $orderDetailsQuery = "INSERT INTO order_details_tbl (Order_Id, Product_Id, Quantity, Price) 
                              VALUES ('$orderId', '$productId', '$quantity', '$price')";

        if (!mysqli_query($con, $orderDetailsQuery)) {
            die("Error inserting order details: " . mysqli_error($con));
        }
    }

    // Add the shipping charge to the total
    $total += $shippingCharge;

    // Update the total field in the order_header_tbl
    $updateTotalQuery = "UPDATE order_header_tbl SET Total = '$total' WHERE Order_Id = '$orderId'";

    if (!mysqli_query($con, $updateTotalQuery)) {
        die("Error updating order total: " . mysqli_error($con));
    }

    echo "<script>alert('Order updated successfully!'); location.href='orders.php';</script>";
}
?>


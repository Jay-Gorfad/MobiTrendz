<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Add New Order</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="order-management.php">Orders</a></li>
                        <li class="breadcrumb-item active">Add Order</li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                <form action="add-order.php" method="POST" onsubmit="return validateAddOrderForm() || event.preventDefault()">
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
                                    $Name = $userRow['Name'];
                                    echo "<option value='{$userId}'>{$userId} - {$Name}</option>";
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
                        <input type="date" class="form-control" id="orderDate" name="orderDate">
                        <div id="orderDateError" class="error-message"></div>
                    </div>

                    <div id="productContainer">
                        <div class="product-entry mb-3">
                            <h5>Product 1</h5>
                            <div class="row align-items-end">
                                <?php
                                $productQuery = "SELECT Product_Id, Product_Name FROM product_details_tbl WHERE is_active = 1";
                                $productResult = mysqli_query($con, $productQuery);
                                ?>

                                <div class="col-md-5">
                                    <label for="productId1" class="form-label">Product ID</label>
                                    <select class="form-select product-dropdown" id="productId1" name="products[0][productId]" onchange="updateProductDropdowns()">
                                        <option value="">Select Product</option>
                                        <?php
                                        if (mysqli_num_rows($productResult) > 0) {
                                            while ($productRow = mysqli_fetch_assoc($productResult)) {
                                                $productId = $productRow['Product_Id'];
                                                $productName = $productRow['Product_Name'];
                                                echo "<option value='{$productId}'>{$productId} - {$productName}</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No products found</option>";
                                        }
                                        ?>
                                    </select>
                                    <div id="productId1Error" class="error-message"></div>
                                </div>

                                <div class="col-md-5">
                                    <label for="quantity1" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity1" name="products[0][quantity]" min="1">
                                    <div id="quantity1Error" class="error-message"></div>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger mt-2 deleteProductBtn" onclick="removeProduct(this)">Delete Product</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" id="addProductBtn">Add Another Product</button>

                  <!-- Begin Billing Details Section -->
                  <!-- <div class="mb-4 mt-4">
                        <h2>Billing Details</h2>
                        <div class="row g-5">
                            <div class="col-md-12">
                                <div class="row gx-2 gy-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="billingFirstName" class="form-label d-block">First Name<span class="required">*</span></label>
                                        <input type="text" id="billingFirstName" name="billingFirstName" class="form-control" placeholder="First Name">
                                        <p id="billingFirstNameError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingLastName" class="form-label d-block">Last Name<span class="required">*</span></label>
                                        <input type="text" id="billingLastName" name="billingLastName" class="form-control" placeholder="Last Name">
                                        <p id="billingLastNameError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <label for="billingAddress" class="form-label d-block">Street Address<span class="required">*</span></label>
                                        <textarea id="billingAddress" name="billingAddress" class="form-control" rows="2" placeholder="Street Address"></textarea>
                                        <p id="billingAddressError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingCity" class="form-label d-block">City<span class="required">*</span></label>
                                        <input type="text" id="billingCity" name="billingCity" class="form-control" placeholder="City">
                                        <p id="billingCityError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingState" class="form-label d-block">State<span class="required">*</span></label>
                                        <input type="text" id="billingState" name="billingState" class="form-control" placeholder="State">
                                        <p id="billingStateError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingPinCode" class="form-label d-block">Pin Code<span class="required">*</span></label>
                                        <input type="text" id="billingPinCode" name="billingPinCode" class="form-control" placeholder="Pin Code">
                                        <p id="billingPinCodeError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingPhone" class="form-label d-block">Phone<span class="required">*</span></label>
                                        <input type="text" id="billingPhone" name="billingPhone" class="form-control" placeholder="Phone Number">
                                        <p id="billingPhoneError" class="error-message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Billing Details Section -->

                    <!-- Checkbox to control Shipping Details visibility -->
                    <!-- <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="sameAsBilling" name="sameAsBilling">
                        <label class="form-check-label" for="sameAsBilling">
                            Shipping address same as billing address
                        </label>
                    </div> -->

                    <!-- Begin Shipping Details Section (Initially Hidden) -->
                    <div id="shippingDetailsSection" class="mb-4">
                        <h2>Shipping Details</h2>
                        <div class="row g-5">
                            <div class="col-md-12">
                                <div class="row gx-2 gy-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingFirstName" class="form-label d-block">First Name<span class="required">*</span></label>
                                        <input type="text" id="shippingFirstName" name="shippingFirstName" class="form-control" placeholder="First Name">
                                        <p id="shippingFirstNameError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingLastName" class="form-label d-block">Last Name<span class="required">*</span></label>
                                        <input type="text" id="shippingLastName" name="shippingLastName" class="form-control" placeholder="Last Name">
                                        <p id="shippingLastNameError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <label for="shippingAddress" class="form-label d-block">Street Address<span class="required">*</span></label>
                                        <textarea id="shippingAddress" name="shippingAddress" class="form-control" rows="2" placeholder="Street Address"></textarea>
                                        <p id="shippingAddressError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingCity" class="form-label d-block">City<span class="required">*</span></label>
                                        <input type="text" id="shippingCity" name="shippingCity" class="form-control" placeholder="City">
                                        <p id="shippingCityError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingState" class="form-label d-block">State<span class="required">*</span></label>
                                        <input type="text" id="shippingState" name="shippingState" class="form-control" placeholder="State">
                                        <p id="shippingStateError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingPinCode" class="form-label d-block">Pin Code<span class="required">*</span></label>
                                        <input type="text" id="shippingPinCode" name="shippingPinCode" class="form-control" placeholder="Pin Code">
                                        <p id="shippingPinCodeError" class="error-message"></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingPhone" class="form-label d-block">Phone<span class="required">*</span></label>
                                        <input type="text" id="shippingPhone" name="shippingPhone" class="form-control" placeholder="Phone Number">
                                        <p id="shippingPhoneError" class="error-message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Shipping Details Section -->

                    <div class="mb-3 mt-4">
                        <label for="shippingCharge" class="form-label">Shipping Charge</label>
                        <input type="number" step="0.01" id="shippingCharge" name="shippingCharge" class="form-control" placeholder="Enter shipping charge" required>
                        <div id="shippingChargeError" class="error-message"></div>
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="orderStatus" class="form-label">Order Status</label>
                        <select class="form-select" id="orderStatus" name="orderStatus">
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <div id="orderStatusError" class="error-message"></div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="add-order">Submit Order</button>
                </form>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>


<script>
    document.getElementById("sameAsBilling").addEventListener("change", function() {
        var shippingSection = document.getElementById("shippingDetailsSection");
        shippingSection.style.display = this.checked ? "none" : "block";
    });
    let productCount = 1;

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
<?php
if (isset($_POST['add-order'])) {
    // Capture the form data
    $userId = $_POST['userId'];
    $orderDate = $_POST['orderDate'];
    $orderStatus = $_POST['orderStatus'];
    $sameAsBilling = isset($_POST['sameAsBilling']) ? true : false;
    $products = $_POST['products'];  // Array of products
    $shippingCharge = $_POST['shippingCharge'];  // Shipping Charge

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

    // Insert Billing Address
    // $billingFullName = $billingFirstName . ' ' . $billingLastName;
    // $billingAddressQuery = "INSERT INTO address_details_tbl (User_Id, Full_Name, Address, City, State, Pincode, Phone) 
    //                         VALUES ('$userId', '$billingFullName', '$billingAddress', '$billingCity', '$billingState', '$billingPinCode', '$billingPhone')";

    // if (mysqli_query($con, $billingAddressQuery)) {
    //     $billingAddressId = mysqli_insert_id($con); // Get the last inserted Billing Address ID
    // } else {
    //     die("Error inserting billing address: " . mysqli_error($con));
    // }

    // Insert Shipping Address if different from billing
    if (!$sameAsBilling) {
        $shippingFullName = $shippingFirstName . ' ' . $shippingLastName;
        $shippingAddressQuery = "INSERT INTO address_details_tbl (User_Id, Full_Name, Address, City, State, Pincode, Phone) 
                                 VALUES ('$userId', '$shippingFullName', '$shippingAddress', '$shippingCity', '$shippingState', '$shippingPinCode', '$shippingPhone')";
        
        if (mysqli_query($con, $shippingAddressQuery)) {
            $shippingAddressId = mysqli_insert_id($con); // Get the last inserted Shipping Address ID
        } else {
            die("Error inserting shipping address: " . mysqli_error($con));
        }
    } else {
        // If shipping address is the same as billing
        $shippingAddressId = $billingAddressId;
    }

    // Insert Order into order_header_tbl
    $orderQuery = "INSERT INTO order_header_tbl (User_Id, Order_Date, Order_Status, Shipping_Address_Id, Shipping_Charge) 
                   VALUES ('$userId', '$orderDate', '$orderStatus', '$shippingAddressId', '$shippingCharge')";
    
    if (mysqli_query($con, $orderQuery)) {
        $orderId = mysqli_insert_id($con); // Get the last inserted Order ID
    } else {
        die("Error inserting order: " . mysqli_error($con));
    }

    // Insert products into order_details_tbl and calculate the total price
    $total = 0;  // Initialize total

    foreach ($products as $product) {
        $productId = $product['productId'];
        $quantity = $product['quantity'];

        // Fetch product price (with discount)
        $priceQuery = "SELECT Sale_Price - Sale_Price*Discount/100 as 'price' FROM product_details_tbl WHERE Product_Id = '$productId'";
        $priceResult = mysqli_query($con, $priceQuery);
        $productRow = mysqli_fetch_assoc($priceResult);
        $price = $productRow['price'];

        // Calculate total for each product
        $productTotal = $price * $quantity;
        $total += $productTotal;  // Add to total

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

    echo "<script>alert('Order added successfully!');
    location.href='orders.php';</script>";
}



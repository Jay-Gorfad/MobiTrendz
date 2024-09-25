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
                <form id="addOrderForm" action="javascript:void(0)" onsubmit="return validateAddOrderForm()">
                    <div class="mb-3">
                        <label for="userId" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userId" name="userId">
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
                                <div class="col-md-5">
                                    <label for="productId1" class="form-label">Product ID</label>
                                    <input type="text" class="form-control" id="productId1" name="products[0][productId]">
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
                    
                    <div class="mb-3 mt-4">
                        <label for="shippingAddress" class="form-label">Shipping Address</label>
                        <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="3"></textarea>
                        <div id="shippingAddressError" class="error-message"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="billingAddress" class="form-label">Billing Address</label>
                        <textarea class="form-control" id="billingAddress" name="billingAddress" rows="3"></textarea>
                        <div id="billingAddressError" class="error-message"></div>
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

                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </form>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>

<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Product to Cart</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Product to Cart</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="add_to_cart_handler.php" method="POST" onsubmit="return validateAddToCartForm()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="user" class="form-label">User</label>
                                    <select class="form-select" id="user" name="user_id">
                                        <option value="" disabled selected>Select a user</option>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <!-- Add more user options as needed -->
                                    </select>
                                    <div id="userError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="product" class="form-label">Product</label>
                                    <select class="form-select" id="product" name="product_id">
                                        <option value="" disabled selected>Select a product</option>
                                        <option value="101">Product A</option>
                                        <option value="102">Product B</option>
                                        <!-- Add more product options as needed -->
                                    </select>
                                    <div id="productError" class="error-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1">
                            <div id="quantityError" class="error-message"></div>
                        </div>
                        <button type="submit" class="btn btn-secondary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>

<?php include("sidebar.php"); ?>
<!-- Amdmin Side Start --><div id="layoutSidenav_content">
<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Statistics Cards Section -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="products.php" class="text-decoration-none">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Products</h5>
                            <h2>1,200</h2>
                        </div>
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card bg-success text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Orders</h5>
                            <h2>3,450</h2>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Revenue</h5>
                            <h2>₹58,000</h2>
                        </div>
                        <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="users.php" class="text-decoration-none">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Users</h5>
                            <h2>1,850</h2>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- Recent Orders Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Orders</h4>
            <a href="orders.php" class="btn btn-secondary">See All Orders</a>
        </div>
        <div class="card-body">
        <table class="table border">
            <thead class="table-light">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Order Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1001</td>
                    <td><a href="user_profile.php?username=JohnDoe">John Doe</a></td>
                    <td>2024-08-10</td>
                    <td>2</td>
                    <td>₹50,000.00</td>
                    <td>Pending</td>
                    <td>
                        <a href="view_order.php?id=1001" class="btn btn-info btn-sm">View</a>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1002</td>
                    <td><a href="user_profile.php?username=JaneSmith">Jane Smith</a></td>
                    <td>2024-08-11</td>
                    <td>3</td>
                    <td>₹75,000.00</td>
                    <td>Processing</td>
                    <td>
                        <a href="view_order.php?id=1002" class="btn btn-info btn-sm">View</a>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1003</td>
                    <td><a href="user_profile.php?username=EmilyJohnson">Emily Johnson</a></td>
                    <td>2024-08-12</td>
                    <td>1</td>
                    <td>₹25,000.00</td>
                    <td>Shipped</td>
                    <td>
                        <a href="view_order.php?id=1003" class="btn btn-info btn-sm">View</a>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1004</td>
                    <td><a href="user_profile.php?username=MichaelBrown">Michael Brown</a></td>
                    <td>2024-08-13</td>
                    <td>4</td>
                    <td>₹1,00,000.00</td>
                    <td>Delivered</td>
                    <td>
                        <a href="view_order.php?id=1004" class="btn btn-info btn-sm">View</a>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

    <!-- Recent Products Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Products</h4>
            <a href="products.php" class="btn btn-secondary">See All Orders</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Sold Quantity</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="image/3.jpg" alt="Iphone Image" style="width: 50px; height: 50px; object-fit: cover;">
                            <span class="ms-2">i phone 14 pro max</span>
                        </td>
                        <td>₹1,39,000</td>
                        <td>5%</td>
                        <td>90</td>
                        <td>50</td>
                        <td>i phone</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="view_product.php">View</a>
                            <a class="btn btn-success btn-sm" href="update-product.php">Update</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<?php include("sidebar.php"); ?>
<!-- Amdmin Side Start -->
<div id="layoutSidenav_content">
<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <?php 
        $query = "select * from product_details_tbl where is_active=1";
        $result = mysqli_query($con,$query);
        $total_products = mysqli_num_rows($result);

        $query = "select * from order_header_tbl";
        $result = mysqli_query($con,$query);
        $total_orders = mysqli_num_rows($result);

        $query = "select sum(Total) 'Total' from order_header_tbl where Order_Status = 'Delivered'";
        $result = mysqli_query($con,$query);
        $order_sum = mysqli_fetch_assoc($result);
        $total_revenue = $order_sum['Total'];
        


        $query = "select * from user_details_tbl where User_Role_Id=0 and Active_Status=1";
        $result = mysqli_query($con,$query);
        $total_users = mysqli_num_rows($result);

    ?>
    <!-- Statistics Cards Section -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="products.php" class="text-decoration-none">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Products</h5>
                            <h2><?php echo $total_products; ?></h2>
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
                            <h2><?php echo $total_orders; ?></h2>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

      
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Revenue</h5>
                            <h2>₹<?php echo $total_revenue; ?></h2>
                        </div>
                        <span style="font-size: 2em;">₹</span>
                    </div>
                </div>
            </a>
        </div> -->


        <div class="col-xl-3 col-md-6 mb-4">
            <a href="users.php" class="text-decoration-none">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Active Users</h5>
                            <h2><?php echo $total_users; ?></h2>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- Recent Orders Section -->
    <div class="card mb-4 p-2">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Orders</h4>
            <a href="orders.php" class="btn btn-secondary">See All Orders</a>
        </div>
        <?php include "common/order-table.php"; ?>
    </div>

    <div class="card mb-4 p-2">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Products</h4>
            <a href="products.php" class="btn btn-secondary">See All Products</a>
        </div>
        <?php 
        include "common/products-table.php"; ?>
    </div> 
</div>

<?php include("footer.php"); ?>
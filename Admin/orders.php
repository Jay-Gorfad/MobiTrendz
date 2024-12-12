
<?php  include "sidebar.php";  ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Order Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
                <a class="btn btn-primary text-nowrap" href="add-order.php">Add Order</a>
            </div>
            <?php   include "common/order-table.php"; ?>
        </div>
    </main>
<?php include("footer.php"); ?>

<?php $title="Orders";include('header.php'); ?>
    <div class="container sitemap cart-table">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Orders</p>
        <!-- table start -->
        <div class="row bg-light">
            <div class="col-2">
                Order ID
            </div>
            <div class="col-2 text-center">Order Date</div>
            <div class="col-2 ">
                Order status
            </div>
            <div class="col-2 text-center">Quantity</div>
            <div class="col-2 text-center">Total Price</div>
            <div class="col-2 text-center">View Orders</div>
        </div>
        <?php display_orders(); ?>
        <!-- table end -->
    </div>
    
<?php include('footer.php'); ?>

<?php 
    function display_orders(){
        for($i=1;$i<=5;$i++){
            echo '
            <div class="row mb-3">
                <div class="col-2">
                    123
                </div>
                <div class="col-2 text-center">11-08-2024</div>
                <div class="col-2 ">Pending</div>
                <div class="col-2 text-center">2</div>
                <div class="col-2 text-center">100.00</div>
                <div class="col-2 text-center"><a class="primary-btn order-link">View Order</a></div>
            </div>
    
            ';
        } 
    }
?>
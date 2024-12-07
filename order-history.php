<?php $title="Orders";include('header.php');
$query = "select oh.Order_Id, oh.User_Id, oh.Order_Status, DATE(oh.Order_Date) AS Order_Date, sum(od.Quantity) as 'Quantity', oh.Total from order_header_tbl oh left join order_details_tbl od on oh.Order_Id = od.Order_Id group by oh.Order_Id, oh.Order_Status, oh.Order_Date, oh.Total, oh.User_Id having oh.User_Id =". $_SESSION["user_id"];
$result = mysqli_query($con, $query);
?>
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
        <?php while($order = mysqli_fetch_assoc($result)){ ?>
        <div class="row mb-3">
                <div class="col-2">
                <?php echo $order["Order_Id"]; ?>
                </div>
                <div class="col-2 text-center"><?php echo $order["Order_Date"]; ?></div>
                <div class="col-2 "><?php echo $order["Order_Status"]; ?></div>
                <div class="col-2 text-center"><?php echo $order["Quantity"]; ?></div>
                <div class="col-2 text-center">₹<?php echo number_format($order["Total"],2); ?></div>
                <div class="col-2 text-center"><a class="primary-btn order-link" href="order-details2.php?order_id=<?php echo $order["Order_Id"]; ?>">View Order</a></div>
                
            </div>
            <?php }?>
        <!-- table end -->
    </div>
    
<?php include('footer.php'); ?>

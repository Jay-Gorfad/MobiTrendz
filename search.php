<?php include('header.php');
$search = $_GET['search'];
?>
<div class="container ">
    <div class="row align-items-center sitemap">
        <div class="col-6">
            <p class="mt-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Shop</p>
        </div>
        <div class="col-6 justify-content-end d-flex">
            <form method="POST" action="shop.php" style="margin-right:12px">
            <input type="submit" value="Clear Filters" name="clear_filters" class="primary-btn" />
        </form>
        </div>
        
    </div>
    <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-5 col-6">
            <?php include('filter.php'); ?>
        </div>
    <div class="col-lg-9 col-md-8 col-sm-7 col-6">
            <div class="row justify-content-start">
                <?php include "products-list.php"; ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php'); ?>
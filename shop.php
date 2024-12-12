<?php include('header.php'); ?>
<div class="container sitemap">
    <div class="d-flex col-12 justify-content-between container">
        <p class="mt-1 sitemap"><a href="index.php" class="text-decoration-none dim link">Home /</a> Shop</p>
        <form method="POST" action="shop.php" style="margin-right:12px">
            <input type="submit" value="Clear Filters" name="clear_filters" class="primary-btn" />
        </form>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 col-6">
            <?php include('filter.php'); ?>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7 col-6">
            <div class="row justify-content-start">
                <?php include('products-list.php');
                if (isset($_POST['clear_filters'])) {
                    echo '<script>window.location.href=shop.php</script>';
                    exit();
                }

                ?>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<?php include('header.php'); ?>
<div class="container sitemap">
    <p class="mt-1 sitemap"><a href="index.php" class="text-decoration-none dim link">Home /</a> Shop</p>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 col-6">
            <?php include('filter.php'); ?>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7 col-6">
            <div class="row justify-content-start">
                <?php display_products($con); ?>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

<?php
function display_products($con)
{

    $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count'
        FROM product_details_tbl AS product
        LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
        WHERE product.is_active = 1
        GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, product.Sale_Price
        ";
    $result = mysqli_query($con, $query);
    while ($product = mysqli_fetch_assoc($result)) {
?>
        <div class="col-lg-3 col-md-4 gap p-2 col-sm-6 col-12">
            <div class="card">

                <div class="product-image">
                    <a href="product-details.php?product_id=<?php echo $product["Product_Id"] ?>">
                        <img class="img-thumbnail p-4" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                    </a>
                    <a href="wishlist.php?product_id=<?php echo $product["Product_Id"] ?>">
                        <div class="like"><i class="fa-regular fa-heart"></i></div>
                    </a>
                </div>
                <div class="card-body product-body px-3 ">
                    <h6 class="card-title d-flex justify-content-center text-nowrap"><?php echo $product['Product_Name'] ?></h6>
                    <div class="d-flex justify-content-center align-items-center flex-column mb-2 w-100">
                        <span class="shop-price">₹<?php echo $product["Price"]; ?></span>
                        <span class="striked-price">₹<?php echo $product["Sale_Price"]; ?></span>
                    </div>
                    <div class="rating-section mb-2 d-flex justify-content-center">
                        <div class="ratings text-nowrap">
                            <span class="fa fa-star <?php echo $product['Average_Rating'] >= 1 ? 'checked' : ''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating'] >= 2 ? 'checked' : ''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating'] >= 3 ? 'checked' : ''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating'] >= 4 ? 'checked' : ''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating'] >= 5 ? 'checked' : ''; ?>"></span>
                        </div>
                        <div class="review-count ps-1">(<?php echo $product['Review_Count']; ?>)</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-around ">
                        <a class="order-link cart-btn flex-grow-1" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>
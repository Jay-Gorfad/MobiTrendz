<?php include('header.php');

$query = "SELECT `Banner_Image` FROM `banner_details_tbl` WHERE Active_Status=1 AND View_Order > 0 ORDER BY View_Order";
$result = mysqli_query($con, $query);
$total_banners = mysqli_num_rows($result);

?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
<ol class="carousel-indicators">
    <?php 
    for ($i = 0; $i < $total_banners; $i++) {
        echo '<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" class="'.($i == 0 ? 'active' : '').'"></li>';
    }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($banner = mysqli_fetch_assoc($result)) {
            ?>
            <div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
                <img class="d-block w-100" height="530" src="img/banners/<?php echo $banner['Banner_Image']; ?>" alt="Banner <?php echo $i + 1; ?>">
                
                <?php if ($i == 0) { ?>
                    <div class="carousel-caption h-100 justify-content-center flex d-md-block">
                        <div class="row align-items-center flex h-100">
                            <div class="hero-content col-md-6 order-md-1 order-2 text-center text-md-start text-wrap justify-content-center text-black"> 
                                <h1>MobiTrendz</h1>
                                <p>Get a 10% discount on the latest iPhone 14 series. Experience the innovation and style of the newest Apple technology.</p>
                                <a href="shop.php" class="cta-button btn btn-primary text-center align-self-sm-center align-self-md-start">Explore</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>   
            </div>
            <?php
            $i++;
        }
    ?>

<?php 
  if ($total_banners >= 2) {
      echo '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              
            </a>';
  }
  ?>
  </div>

    <section class=" mt-5 container">
        <div class="d-flex justify-content-between featured-products">
            <h4>Featuerd products</h4>
            
        </div>
        <div class="row justify-content-start pt-3">
            <?php display_products($con);?>
        </div>
        <!-- <div class="row mt-5">
            <div class="col-md-6 col-12 ps-2 pe-2">
                <div class="border ms-0 banner-1">
                    <p class="label-yellow">Free delivery</p>
                    <h5 class="heading">Free shipping over ₹500</h5>
                    <p class="content">Shop ₹500 products and get free delivery anywhere</p>
                    <button class="primary-btn">Shop Now <i class='fas fa-arrow-right ms-2'></i></button>
                </div>
            </div>
            <div class="col-md-6 col-12 pe-2 ps-2">
                <div class="border banner-2">
                    <p class="label-yellow">60% off</p>
                    <h5 class="heading">Mobile Phones</h5>
                    <p class="content">Save up to 60% off on your first order</p>
                    <button class="primary-btn">Order Now <i class='fas fa-arrow-right ms-2'></i></button>
                </div>
            </div>
        </div> -->
        <div class="d-flex justify-content-between align-items-center featured-products mt-5">
            <div class="d-flex align-items-center gap-5">
                <h4 >Latest Released</h4>
            </div>

        </div>
        <div class="row justify-content-start pt-3">
            <?php display_products($con);?>
        </div>
    </section>
<?php include('footer.php'); ?>

<?php
    function display_products($con) {
        $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count'
        FROM product_details_tbl AS product
        LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
        WHERE product.is_active = 1
        GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, product.Sale_Price
        ";
        $result = mysqli_query($con, $query);
        while($product = mysqli_fetch_assoc($result)){
        ?>
            <div class="col-lg-3 col-md-4 gap p-2 col-6">
                <div class="card">
                        <div class="product-image">
                            <a href="product-details.php?product_id=<?php echo $product["Product_Id"]?>">
                            <img class="img-thumbnail p-4" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Product Image">
                            </a>
                            <a href="wishlist.php?product_id=<?php echo $product["Product_Id"]?>">
                            <div class="like"><i class="fa-regular fa-heart"></i></div></a>
                        </div>
                    
                    <div class="card-body product-body px-3 ">
                        <h6 class="card-title d-flex justify-content-center text-nowrap"><?php echo $product['Product_Name'] ?></h6>
                        <div class="d-flex justify-content-center align-items-center flex-column mb-2 w-100">
                                <span class="shop-price">₹<?php echo $product["Price"]; ?></span>
                                <span class="striked-price">₹<?php echo $product["Sale_Price"]; ?></span>
                        </div>
                        <div class="rating-section mb-2 d-flex justify-content-center">
                            <div class="ratings text-nowrap">
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=1?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=2?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=3?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=4?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=5?'checked':''; ?>"></span>
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
    }?>

    <?php
    function display_products2($con) {
        $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count'
        FROM product_details_tbl AS product
        LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
        WHERE product.is_active = 1
        GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, product.Sale_Price
        ";
        $result = mysqli_query($con, $query);
        while($product = mysqli_fetch_assoc($result)){
        ?>
            <div class="col-lg-3 col-md-4 gap p-2 col-6">
                <div class="card">
                    <a href="product-details.php?product_id=<?php echo $product["Product_Id"]?>">
                        <div class="product-image">
                            <img class="img-thumbnail p-4" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                        </div>
                    </a>
                    <div class="card-body product-body px-3 ">
                        <h6 class="card-title d-flex justify-content-center"><?php echo $product['Product_Name'] ?></h6>
                        <div class="d-flex justify-content-center align-items-center flex-column mb-2 w-100">
                                <span class="shop-price">₹<?php echo $product["Price"]; ?></span>
                                <span class="striked-price">₹<?php echo $product["Sale_Price"]; ?></span>
                        </div>
                        <div class="rating-section mb-2 d-flex justify-content-center">
                        <div class="ratings text-nowrap">
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=1?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=2?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=3?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=4?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=5?'checked':''; ?>"></span>
                            </div>
                            <div class="review-count ps-1">(<?php echo $product['Review_Count']; ?>)</div>
                        </div>
                        
                        
                        <div class="d-flex align-items-center">
                            <a class=" order-link d-block cart-btn  flex-grow-1" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>"><i class="fa-solid fa-cart-shopping pe-2"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

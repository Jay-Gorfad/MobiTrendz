<?php $title="Home";include('header.php'); ?>

    <div class="hero">
        <div class="content ms-5 ps-5">
            <h1>Exclusive Offer!</h1>
            <p>Get a 10% discount on the latest iPhone 14 series. Experience the innovation and style of the newest Apple technology.</p>
            <a href="shop.php" class="cta-button order-link">Shop Now</a>
        </div>
    </div>

    <section class=" mt-5 container">
        <div class="d-flex justify-content-between featured-products">
            <h4 >Featuerd products</h4>
            
        </div>
        <div class="row justify-content-start pt-3">
            <?php display_products();?>
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
            <?php display_products2();?>
        </div>
    </section>
<?php include('footer.php'); ?>

<?php
    function display_products() {
        for($i=1;$i<=8;$i++) {
            echo '
            <div class="col-lg-3 col-md-4 gap p-2 col-6">
                <div class="card">
                    <a href="product-details.php?id=1">
                        <div class="product-image">
                            <img class="img-thumbnail p-4" src="img/products/15Plus.jpg" alt="Card image cap">
                        </div>
                    </a>
                    <div class="card-body product-body px-3 ">
                        <h6 class="card-title d-flex justify-content-center">Phone</h6>
                        <div class="d-flex justify-content-center align-items-center flex-column mb-2 w-100">
                                <span class="shop-price">₹1,20,000.00</span>
                                <span class="striked-price">₹1,50,000.00</span>
                        </div>
                        <div class="rating-section mb-2 d-flex justify-content-center">
                            <div class="ratings text-nowrap">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="review-count ps-1">(95)</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-around ">
                            <a class="order-link cart-btn flex-grow-1" href="cart.php">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
    function display_products2() {
        for($i=1;$i<=8;$i++) {
            echo '
            <div class="col-lg-3 col-md-4 gap p-2 col-6">
                <div class="card">
                    <a href="product-details.php?id=1">
                        <div class="product-image">
                            <img class="img-thumbnail p-4" src="img/products/15Plus.jpg" alt="Card image cap">
                        </div>
                    </a>
                    <div class="card-body product-body px-3 ">
                        <h6 class="card-title d-flex justify-content-center">Phone</h6>
                        <div class="d-flex justify-content-center align-items-center flex-column mb-2 w-100">
                                <span class="shop-price">₹1,20,000.00</span>
                                <span class="striked-price">₹1,50,000.00</span>
                        </div>
                        <div class="rating-section mb-2 d-flex justify-content-center">
                            <div class="ratings">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="review-count ps-1">(95)</div>
                        </div>
                        
                        
                        <div class="d-flex align-items-center">
                            <a class=" order-link d-block cart-btn  flex-grow-1" href="cart.php"><i class="fa-solid fa-cart-shopping pe-2"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
    
?>
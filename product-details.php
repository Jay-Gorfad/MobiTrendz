<?php include('header.php'); ?>
    <div class="container sitemap">
        <p>
            <a href="index.php" class="text-decoration-none dim link">Home /</a>
            <a href="shop.php" class="text-decoration-none dim link">Shop /</a>
            OnePlus Phone
        </p>

        <div class="row">
            <!-- Product Image -->
            <div class="col-md-5 col-sm-12">
                <img src="img/products/phone.png" alt="Product image" class="img-thumbnail p-3 w-100 h-100">
            </div>

            <!-- Product Details -->
            <div class="col-md-7 col-sm-12 d-flex flex-column px-5 align-items-start">
                <h4 class="product-title">OnePlus Phone</h4>
                
                <!-- Rating and Review -->
                <div class="rating-section-description">
                    <div class="ratings">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="review-count ps-1">
                        (95 reviews)
                    </div>
                </div>
                
                <!-- Product Description -->
                <div class="product-description mt-3">
                    The OnePlus Phone combines cutting-edge technology with sleek design. Featuring a stunning display, powerful processor, and an exceptional camera system, it provides a top-notch user experience. Perfect for those who demand high performance and style.
                </div>

                <!-- Price -->
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3">Price</div>
                    <div class="col-9 price">₹40,000.00</div>
                </div>

                <!-- Quantity Selection -->
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3">Quantity</div>
                    <div class="col-9 d-flex align-items-center">
                        <button class="quantity-button qty-minus">-</button>
                        <input type="number" id="quantity" name="quantity" value="1" class="quantity-input text-center">
                        <button class="quantity-button qty-plus">+</button>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <form action="cart.php" class="w-100 mt-4">
                    <input type="hidden" id="selectedQuantity" name="quantity" value="">
                    <button class="add-to-cart-btn primary-btn w-100" type="submit">Add to cart</button>
                </form>
            </div>
        </div>

        <!-- Specifications Table -->
        <div class="row mt-5">
            <div class="col-12">
                <h5>Specifications</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Display</th>
                            <td>6.55 inches AMOLED, 1080 x 2400 pixels</td>
                        </tr>
                        <tr>
                            <th>Processor</th>
                            <td>Qualcomm Snapdragon 888</td>
                        </tr>
                        <tr>
                            <th>RAM</th>
                            <td>8GB</td>
                        </tr>
                        <tr>
                            <th>Storage</th>
                            <td>128GB / 256GB</td>
                        </tr>
                        <tr>
                            <th>Rear Camera</th>
                            <td>48MP + 50MP + 2MP</td>
                        </tr>
                        <tr>
                            <th>Front Camera</th>
                            <td>16MP</td>
                        </tr>
                        <tr>
                            <th>Battery</th>
                            <td>4500mAh, Fast charging 65W</td>
                        </tr>
                        <tr>
                            <th>Operating System</th>
                            <td>OxygenOS based on Android 11</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>₹40,000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <h4 class="mb-4 text-center fw-bold">Customer Reviews</h4>
        <div class="row d-flex">
            <?php display_review();?>
        </div>

        <div class="text-end mt-2">
            <button class="primary-btn">Leave a Review</button>
        </div>

        <h4 class="mt-5 mb-4 text-center fw-bold">Similar Products</h4>
        <div class="d-flex justify-content-start mt-3">
            <?php display_products();?>
        </div>
    </div>
<?php include('footer.php'); 

function display_products() {
    for($i=1;$i<=4;$i++) {
        echo '
        <div class="col-md-3 gap col-sm-4 p-2 col-6">
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
                    <div class="d-flex align-items-center justify-content-around ">
                        <a class="order-link cart-btn flex-grow-1" href="cart.php">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}

function display_review(){
    for($i=1;$i<=4;$i++)
    {
        echo '
        <div class="col-sm-6 card mb-4">
            <div class="card-body review-card ">
                <h5 class="card-title">John Doe</h5>
                <h6 class="card-subtitle mb-2 text-warning">★★★★☆</h6>
                <p class="card-text">This product is really fresh and tastes great! Will definitely buy again.</p>
                <p class="text-muted mb-0"><small>Posted on August 19, 2024</small></p>
            </div>
        </div>';
    }
}
?>

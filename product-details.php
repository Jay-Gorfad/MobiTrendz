<?php include('header.php'); ?>
<?php
$query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name , product.Description, product.Display, product.Processor, product.RAM, product.Storage, product.Rear_Camera, product.front_Camera, product.Battery, product.Operating_System, product.Color, product.Sale_Price , round((product.Sale_Price-product.Sale_Price*product.Discount/100),2) as 'Price' from product_details_tbl as product left join category_details_tbl as category on product.Category_Id = category.Category_Id";
        $result = mysqli_query($con, $query);
        while($product = mysqli_fetch_assoc($result)) {
            ?>
    <div class="container sitemap">
        <p>
            <a href="index.php" class="text-decoration-none dim link">Home /</a>
            <a href="shop.php" class="text-decoration-none dim link">Shop /</a>
            Product Details
        </p>

        <div class="row">
            <!-- Product Image -->
            <div class="col-md-5 col-sm-12">
                <img src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Product image" class="img-thumbnail p-3 w-100 h-100">
            </div>

            <!-- Product Details -->
            <div class="col-md-7 col-sm-12 d-flex flex-column px-5 align-items-start">
                <h4 class="product-title"><?php echo $product['Product_Name'];?></h4>
                
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
                    <?php echo $product['Description']; ?>
                </div>

                <!-- Price -->
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3">Price</div>
                    <div class="col-9 price">₹<?php echo $product["Price"]; ?></div>
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
                            <td><?php echo $product["Display"]; ?></td>
                        </tr>
                        <tr>
                            <th>Processor</th>
                            <td><?php echo $product["Processor"]; ?></td>
                        </tr>
                        <tr>
                            <th>RAM</th>
                            <td><?php echo $product["RAM"]; ?></td>
                        </tr>
                        <tr>
                            <th>Storage</th>
                            <td><?php echo $product["Storage"]; ?></td>
                        </tr>
                        <tr>
                            <th>Rear Camera</th>
                            <td><?php echo $product["Rear_Camera"]; ?></td>
                        </tr>
                        <tr>
                            <th>Front Camera</th>
                            <td><?php echo $product["Front_Camera"]; ?></td>
                        </tr>
                        <tr>
                            <th>Battery</th>
                            <td><?php echo $product["Battery"]; ?></td>
                        </tr>
                        <tr>
                            <th>Operating System</th>
                            <td><?php echo $product["Operating_System"]; ?></td>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td><?php echo $product["Color"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
    
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

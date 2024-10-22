<?php include('header.php'); 
$search = $_GET['search'];

function display_products($con,$search) {

    $search_query = " having product.Product_Id LIKE '%$search%' or product.Discount LIKE '%$search%' or product.Product_Name LIKE '%$search%' or category.Category_Name LIKE '%$search%' or  ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) LIKE '%$search%' or COALESCE(AVG(review.Rating), 0) LIKE '%$search%' or  COUNT(review.Review_Id) LIKE '%$search%' ";

$query = "SELECT product.Product_Id, product.Display, product.Processor,product.RAM, product.Storage, product.Rear_Camera, product.Front_Camera, product.Battery, product.Operating_System, product.Color, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count'
FROM product_details_tbl AS product
LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
WHERE product.is_active = 1 
GROUP BY product.Product_Id, product.Display, product.Processor,product.RAM, product.Storage, product.Rear_Camera, product.Front_Camera, product.Battery, product.Operating_System, product.Color, product.Discount, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name,  product.Sale_Price $search_query
";
echo "<script>alert('$query')</script>";
$result = mysqli_query($con, $query);
    while($product = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-lg-3 col-md-4 gap p-2 col-sm-6 col-12">
            <div class="card">
                <a href="product-details.php?product_id=<?php echo $product["Product_Id"]?>">
                    <div class="product-image">
                        <img class="img-thumbnail p-4" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                    </div>
                </a>
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
}
?>

<div class="container sitemap">
    <p class="mt-1 sitemap"><a href="index.php" class="text-decoration-none dim link">Home /</a> Shop</p>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 col-6">
            <div class="border p-3" id="filter-section">
                <div class="col-12 mb-3">
                    <h6 class="mb-2"><span>Customer Ratings</span></h6>
                    <div>
                        <div>
                            <input type="checkbox" name="4star" id="4star">
                            <label for="4star">4 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                        </div>
                        <div>
                            <input type="checkbox" name="3star" id="3star">
                            <label for="3star">3 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                        </div>
                        <div>
                            <input type="checkbox" name="2star" id="2star">
                            <label for="2star">2 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                        </div>
                        <div>
                            <input type="checkbox" name="1star" id="1star">
                            <label for="1star">1 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="mb-2"><span>Price</span></h6>
                    <div>
                        <div>
                            <input type="checkbox" name="lt10000" id="lt10000">
                            <label for="lt10000">Less than Rs 10,000</label>
                        </div>
                        <div>
                            <input type="checkbox" name="10000to20000" id="10000to20000">
                            <label for="10000to20000">Rs 10,000 to 20,000</label>
                        </div>
                        <div>
                            <input type="checkbox" name="20000to30000" id="20000to30000">
                            <label for="20000to30000">Rs 20,000 to 30,000</label>
                        </div>
                        <div>
                            <input type="checkbox" name="30000to50000" id="30000to50000">
                            <label for="30000to50000">Rs 30,000 to 50,000</label>
                        </div>
                        <div>
                            <input type="checkbox" name="gt50000" id="gt50000">
                            <label for="gt50000">More than Rs 50,000</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="mb-2"><span>Discount</span></h6>
                    <div>
                        <div>
                            <input type="radio" name="discount" id="lt5" value="lt5">
                            <label for="lt5">Less than 5%</label>
                        </div>
                        <div>
                            <input type="radio" name="discount" id="5to15" value="5to15">
                            <label for="5to15">5% to 15%</label>
                        </div>
                        <div>
                            <input type="radio" name="discount" id="15to25" value="15to25">
                            <label for="15to25">15% to 25%</label>
                        </div>
                        <div>
                            <input type="radio" name="discount" id="gt25" value="gt25">
                            <label for="gt25">More than 25%</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="mb-2"><span>Brand</span></h6>
                    <div>
                        <div>
                            <input type="checkbox" name="apple" id="apple">
                            <label for="apple">Apple</label>
                        </div>
                        <div>
                            <input type="checkbox" name="samsung" id="samsung">
                            <label for="samsung">Samsung</label>
                        </div>
                        <div>
                            <input type="checkbox" name="oneplus" id="oneplus">
                            <label for="oneplus">OnePlus</label>
                        </div>
                        <div>
                            <input type="checkbox" name="xiaomi" id="xiaomi">
                            <label for="xiaomi">Xiaomi</label>
                        </div>
                        <div>
                            <input type="checkbox" name="realme" id="realme">
                            <label for="realme">Realme</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="mb-2"><span>Network</span></h6>
                    <div>
                        <div>
                            <input type="checkbox" name="3g" id="3g">
                            <label for="3g">3G</label>
                        </div>
                        <div>
                            <input type="checkbox" name="4g" id="4g">
                            <label for="4g">4G</label>
                        </div>
                        <div>
                            <input type="checkbox" name="5g" id="5g">
                            <label for="5g">5G</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="mb-2"><span>RAM</span></h6>
                    <div>
                        <div>
                            <input type="checkbox" name="ram2gb" id="ram2gb">
                            <label for="ram2gb">2 GB</label>
                        </div>
                        <div>
                            <input type="checkbox" name="ram4gb" id="ram4gb">
                            <label for="ram4gb">4 GB</label>
                        </div>
                        <div>
                            <input type="checkbox" name="ram6gb" id="ram6gb">
                            <label for="ram6gb">6 GB</label>
                        </div>
                        <div>
                            <input type="checkbox" name="ram8gb" id="ram8gb">
                            <label for="ram8gb">8 GB</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="mb-2"><span>Storage</span></h6>
                    <div>
                        <div>
                            <input type="checkbox" name="storage32gb" id="storage32gb">
                            <label for="storage32gb">32 GB</label>
                        </div>
                        <div>
                            <input type="checkbox" name="storage64gb" id="storage64gb">
                            <label for="storage64gb">64 GB</label>
                        </div>
                        <div>
                            <input type="checkbox" name="storage128gb" id="storage128gb">
                            <label for="storage128gb">128 GB</label>
                        </div>
                        <div>
                            <input type="checkbox" name="storage256gb" id="storage256gb">
                            <label for="storage256gb">256 GB</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-9 col-md-8 col-sm-7 col-6">
            <div class="row justify-content-start">
                <?php display_products($con,$search); ?>
            </div>
        </div>
    </div> 
</div>
<?php include('footer.php'); ?>

<?php
    
?>


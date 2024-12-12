<div class="row justify-content-start align-items-stretch">
    <?php
    $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, 
          category.Category_Name, product.Sale_Price, 
          ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price', 
          COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count', 
          category.Category_Id, product.stock
          FROM product_details_tbl AS product
          LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
          LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
          WHERE product.is_active = 1";


    // Initialize conditions array for filtering
    $conditions = [];
    $having_conditions = [];

    // Category filter
    if (!empty($_GET['category_id'])) {
        $category_id = (int)$_GET['category_id'];
        $conditions[] = "category.Category_Id = $category_id";
    }

    // Search filter
    if (!empty($_GET['search'])) {
        $search = mysqli_real_escape_string($con, $_GET['search']);
        $conditions[] = "(product.Product_Name LIKE '%$search%' OR category.Category_Name LIKE '%$search%')";
    }

    // Ratings filter
    if (!empty($_POST['ratings'])) {
        $ratings = (int)$_POST['ratings'];
        $having_conditions[] = "Average_Rating >= $ratings";
    }

    // Price filter
    if (!empty($_POST['price-range'])) {
        switch ($_POST['price-range']) {
            case 'lt10000':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) < 10000";
                break;
            case '10000to20000':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) BETWEEN 10000 AND 20000";
                break;
            case '20000to30000':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) BETWEEN 20000 AND 30000";
                break;
            case '30000to50000':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) BETWEEN 30000 AND 50000";
                break;
            case 'gt50000':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) > 50000";
                break;
        }
    }

    // Discount filter
    if (!empty($_POST['discount'])) {
        switch ($_POST['discount']) {
            case 'lt5':
                $conditions[] = "product.Discount < 5";
                break;
            case '5to15':
                $conditions[] = "product.Discount BETWEEN 5 AND 15";
                break;
            case '15to25':
                $conditions[] = "product.Discount BETWEEN 15 AND 25";
                break;
            case 'gt25':
                $conditions[] = "product.Discount > 25";
                break;
        }
    }

    // Brand filter
    if (!empty($_POST['brand'])) {
        $brand = mysqli_real_escape_string($con, $_POST['brand']);
        $conditions[] = "category.Category_Name = '$brand'";
    }

    // Apply conditions to the query
    if (!empty($conditions)) {
        $query .= " AND " . implode(" AND ", $conditions);
    }

    $query .= " GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, product.stock, category.Category_Id";

    // Add HAVING clause for ratings filter
    if (!empty($having_conditions)) {
        $query .= " HAVING " . implode(" AND ", $having_conditions);
    }

    // Shuffle the results by ordering them randomly
    $query .= " ORDER BY RAND();";

    // Now execute the query
    $result = mysqli_query($con, $query);


    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($product = mysqli_fetch_assoc($result)) {
            $isOutOfStock = $product['stock'] <= 0;
    ?>

            <div class="col-lg-3 col-md-4 gap p-2 col-sm-6 col-12">
                <div class="card <?php echo $isOutOfStock ? 'disabled-card' : ''; ?>">

                    <div class="product-image">
                        <a href="product-details.php?product_id=<?php echo $product["Product_Id"] ?>">
                            <img class="img-thumbnail p-4" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                        </a>
                        <a href="wishlist.php?product_id=<?php echo $product["Product_Id"] ?>">
                            <div class="like"><i class="fa-regular fa-heart"></i></div>
                        </a>
                    </div>

                    <div class="card-body product-body px-3">
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

                        <!-- Check for Out of Stock -->
                        <?php if ($isOutOfStock): ?>
                            <div class="d-flex align-items-center justify-content-around">
                                <a class="btn btn-danger rounded-pill cart-btn order-link  flex-grow-1">Out of Stock</a>
                            </div>
                        <?php else: ?>
                            <div class="d-flex align-items-center justify-content-around">
                                <a class="order-link cart-btn flex-grow-1" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>">Add to cart</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "<p>No products found matching your criteria.</p>";
    }
    ?>
</div>
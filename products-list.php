<div class="row justify-content-start align-items-stretch">
    <?php
    $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, 
    ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price', 
    COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count', 
    category.Category_Id, product.stock
    FROM product_details_tbl AS product
    LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
    LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
    WHERE product.is_active = 1";

    // Apply filters
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
        $having_conditions[] = "COALESCE(AVG(review.Rating), 0) >= $ratings";
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
        $conditions[] = "product.Brand_Name = '$brand'";
    }

    // Apply conditions to the query
    if (!empty($conditions)) {
        $query .= " AND " . implode(" AND ", $conditions);
    }

    $query .= " GROUP BY product.Product_Id";

    if (!empty($having_conditions)) {
        $query .= " HAVING " . implode(" AND ", $having_conditions);
    }

    $result = mysqli_query($con, $query);

    // Display products
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-item">
                    <img src="<?php echo $row['Product_Image']; ?>" alt="<?php echo $row['Product_Name']; ?>" class="img-fluid">
                    <h5><?php echo $row['Product_Name']; ?></h5>
                    <p>Price: Rs. <?php echo $row['Price']; ?></p>
                    <p>Discount: <?php echo $row['Discount']; ?>%</p>
                    <p>Average Rating: <?php echo number_format($row['Average_Rating'], 1); ?> (<?php echo $row['Review_Count']; ?> reviews)</p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No products found matching your criteria.</p>";
    }
    ?>
</div>

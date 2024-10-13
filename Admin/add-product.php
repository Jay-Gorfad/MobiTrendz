<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="Index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Product</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
            <form id="addProductForm" method="POST" enctype="multipart/form-data" onsubmit="return validateAddProductForm();">
            <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="product_name">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productDiscount" class="form-label">Discount (%)</label>
                                <input type="number" class="form-control" id="productDiscount" name="product_discount" step="0.01">
                                <div id="productDiscountError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="costPrice" class="form-label">Cost Price</label>
                                <input type="number" class="form-control" id="costPrice" name="cost_price" step="0.01">
                                <div id="costPriceError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="salePrice" class="form-label">Sale Price</label>
                                <input type="number" class="form-control" id="salePrice" name="sale_price" step="0.01">
                                <div id="salePriceError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productStock" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="productStock" name="product_stock">
                                <div id="productStockError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select class="form-select" id="productCategory" name="product_category">
                                <option value="" disabled selected>Select a category</option>
                                    <option value="-">None</option>
                                    <?php display_category_names($con); ?>
                                </select>
                                <div id="productCategoryError" class="error-message"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Display</label>
                                <input type="text" class="form-control" id="productDisplay" name="product_display">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Processor</label>
                                <input type="text" class="form-control" id="productProcessor" name="product_processor">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">RAM</label>
                                <input type="text" class="form-control" id="productRam" name="product_ram">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Storage</label>
                                <input type="text" class="form-control" id="productStorage" name="product_storage">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Rear Camera</label>
                                <input type="text" class="form-control" id="productRearCamera" name="product_rearcamera">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Front Camera</label>
                                <input type="text" class="form-control" id="productFrontCamera" name="product_frontcamera">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Battery</label>
                                <input type="text" class="form-control" id="productBattery" name="product_battery">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Operating System</label>
                                <input type="text" class="form-control" id="productOperatingSystem" name="product_operatingsystem">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Color</label>
                                <input type="text" class="form-control" id="productColor" name="product_color">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Operating System</label>
                                <input type="text" class="form-control" id="productOperatingSystem" name="product_name">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div> -->
                    </div>

                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="productDescription" name="product_description" rows="4"></textarea>
                                <div id="productDescriptionError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="productImage" name="product_image" accept="image/*">
                                <div id="productImageError" class="error-message"></div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>


<?php
function display_category_names($con){
    $query = "SELECT Category_Id,Category_Name FROM category_details_tbl where Parent_Category_Id IS NULL";
    $result=mysqli_query($con,$query);
    while($category= mysqli_fetch_assoc($result)){
        ?>
        <option value="<?php echo $category["Category_Id"]?>">
            <?php echo $category["Category_Name"]?>
        </option>
        <?php
    }
}
if (isset($_POST['add_product'])) {

    $product_name = $_POST['product_name'];
    $product_discount = $_POST['product_discount'];
    $cost_price = $_POST['cost_price'];
    $sale_price = $_POST['sale_price'];
    $product_stock = $_POST['product_stock'];
    $product_category = $_POST['product_category'];
    $product_description = $_POST['product_description'];
    $product_image = uniqid() . $_FILES['product_image']['name']; // Unique image name
    $product_display = $_POST['product_display'];
    $product_processor = $_POST['product_processor'];
    $product_ram = $_POST['product_ram'];
    $product_storage = $_POST['product_storage'];
    $product_rearcamera = $_POST['product_rearcamera'];
    $product_frontcamera = $_POST['product_frontcamera'];
    $product_battery = $_POST['product_battery'];
    $product_operatingsystem = $_POST['product_operatingsystem'];
    $product_color = $_POST['product_color'];

    $query = "INSERT INTO `product_details_tbl` (`Product_Name`, `Description`, `Product_Image`, `Sale_Price`, `Cost_Price`, `Discount`, `Stock`, `Display`, `Processor`, `RAM`, `Storage`, `Rear_Camera`, `Front_Camera`, `Battery`, `Operating_System`, `Color`, `Category_Id`) 
              VALUES ('$product_name', '$product_description', '$product_image', '$sale_price', '$cost_price', '$product_discount', '$product_stock', '$product_display', '$product_processor', '$product_ram', '$product_storage', '$product_rearcamera', '$product_frontcamera', '$product_battery', '$product_operatingsystem', '$product_color', '$product_category')";

    if (mysqli_query($con, $query)) {

        if (!is_dir("../img/items/products/")) {
            mkdir("../img/items/products/");
        }

        move_uploaded_file($_FILES['product_image']['tmp_name'], "../img/items/products/" . $product_image);

        setcookie('success', 'Product added successfully.', time() + 2);
        ?>

        <script>
            window.location.href = "products.php";
        </script>

        <?php
    } else {
        setcookie('error', 'Error in adding product. Try again.', time() + 2);
        ?>

        <script>
            window.location.href = "add_product.php";
        </script>

        <?php
    }
}
?>


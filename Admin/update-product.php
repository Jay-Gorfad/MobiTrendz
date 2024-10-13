<?php include("sidebar.php"); 

$product_id = $_GET['product_id'];
$query = "select * from product_details_tbl where Product_Id=$product_id";
$result = mysqli_query($con,$query);
$product = mysqli_fetch_assoc($result);

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
            <li class="breadcrumb-item active">Update Product</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form id="addProductForm" method="POST" enctype="multipart/form-data" onsubmit="return validateAddProductForm();">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="product_name" value="<?php echo $product["Product_Name"]; ?>" >
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productDiscount" class="form-label">Discount (%)</label>
                                <input type="number" class="form-control" id="productDiscount" name="product_discount" step="0.01" value="<?php echo $product["Discount"]; ?>" >
                                <div id="productDiscountError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="costPrice" class="form-label">Cost Price</label>
                                <input type="number" class="form-control" id="costPrice" name="cost_price" step="0.01" value="<?php echo $product["Sale_Price"]; ?>" >
                                <div id="costPriceError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="salePrice" class="form-label">Sale Price</label>
                                <input type="number" class="form-control" id="salePrice" name="sale_price" step="0.01" value="<?php echo $product["Cost_Price"]; ?>" >
                                <div id="salePriceError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productStock" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="productStock" name="product_stock" value="<?php echo $product["stock"]; ?>" >
                                <div id="productStockError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select class="form-select" id="productCategory" name="product_category" >
                                <option value="" disabled selected>Select a category</option>
                                    <option value="-">None</option>
                                    <?php display_category_names($con,$product["Category_Id"]); ?>
                                </select>
                                <div id="productCategoryError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Display</label>
                                <input type="text" class="form-control" id="productDisplay" name="product_display" value="<?php echo $product["Display"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Processor</label>
                                <input type="text" class="form-control" id="productProcessor" name="product_processor" value="<?php echo $product["Processor"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">RAM</label>
                                <input type="text" class="form-control" id="productRam" name="product_ram" value="<?php echo $product["RAM"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Storage</label>
                                <input type="text" class="form-control" id="productStorage" name="product_storage" value="<?php echo $product["Storage"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Rear Camera</label>
                                <input type="text" class="form-control" id="productRearCamera" name="product_rearcamera" value="<?php echo $product["Rear_Camera"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Front Camera</label>
                                <input type="text" class="form-control" id="productFrontCamera" name="product_frontcamera" value="<?php echo $product["Front_Camera"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Battery</label>
                                <input type="text" class="form-control" id="productBattery" name="product_battery" value="<?php echo $product["Battery"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Operating System</label>
                                <input type="text" class="form-control" id="productOperatingSystem" name="product_operatingsystem" value="<?php echo $product["Operating_System"]; ?>">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Color</label>
                                <input type="text" class="form-control" id="productColor" name="product_color" value="<?php echo $product["Color"]; ?>">
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
                                <textarea class="form-control" id="productDescription" name="product_description" rows="4"><?php echo $product["Description"]; ?></textarea>
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
                            <div class="mb-3">
                                <img src="../img/items/products/<?php echo $product['Product_Image']; ?>" alt="" height="200px" width="200px">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php"); 

function display_category_names($con,$category_id){
    $query = "SELECT Category_Id,Category_Name FROM category_details_tbl where Parent_Category_Id IS NULL";
    $result=mysqli_query($con,$query);
    while($category= mysqli_fetch_assoc($result)){
        ?>
        <option value="<?php echo $category["Category_Id"]; ?>" <?php echo $category_id==$category["Category_Id"]?"selected":""; ?>>
            <?php echo $category["Category_Name"]; ?>
        </option>
        <?php
    }
}
if (isset($_POST['update_product'])) {
    $product_name = $_POST['product_name'];
    $discount = $_POST['product_discount'];
    $cost_price = $_POST['cost_price'];
    $sale_price = $_POST['sale_price'];
    $stock = $_POST['product_stock'];
    $category_id = $_POST['product_category'];
    $description = $_POST['product_description'];
    $product_display = $_POST['product_display'];
    $product_processor = $_POST['product_processor'];
    $product_ram = $_POST['product_ram'];
    $product_storage = $_POST['product_storage'];
    $product_rearcamera = $_POST['product_rearcamera'];
    $product_frontcamera = $_POST['product_frontcamera'];
    $product_battery = $_POST['product_battery'];
    $product_operatingsystem = $_POST['product_operatingsystem'];
    $product_color = $_POST['product_color'];


    // Check if a new image is uploaded, else retain the old image
    $new_image = $_FILES['product_image']['name'];
    if ($new_image) {
        $image = uniqid() . "_" . $new_image;
        move_uploaded_file($_FILES['product_image']['tmp_name'], "../img/items/products/" . $image);
    } else {
        $image = $product['Product_Image'];
    }

    $query = "UPDATE product_details_tbl SET 
        Product_Name = '$product_name', 
        Discount = '$discount', 
        Cost_Price = '$cost_price', 
        Sale_Price = '$sale_price', 
        Stock = '$stock',
        Display = '$product_display',
        Processor = '$product_processor',
        RAM = '$product_ram',
        Storage = '$product_storage',
        Rear_Camera = '$product_rearcamera',
        Front_Camera = '$product_frontcamera',
        Battery = '$product_battery',
        Operating_System = '$product_operatingsystem',
        Color = '$product_color',
        Category_Id = '$category_id', 
        Description = '$description', 
        Product_Image = '$image' 
        WHERE Product_Id = $product_id";

    if (mysqli_query($con, $query)) {
        ?>
        <script>
            window.location.href = "products.php";
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
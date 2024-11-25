<?php include('header.php'); 

$user_id = $_SESSION['user_id'];
if (isset($_GET['product_id'])) 
{
    if (isset($_SESSION['user_id'])) 
    {
        $user_id = $_SESSION['user_id'];
    } 
    else 
    {
        echo "<script>location.href='login.php';</script>";
        exit;
    }
    $product_id = $_GET['product_id'];
    if(record_exists($user_id, $product_id, $con))
    {
        $query = "delete from wishlist_details_tbl where Product_Id=$product_id and User_Id=$user_id";
        if(mysqli_query($con, $query))
        {
            setcookie('success', "Product removed from wishlist successfully!", time() + 5, "/");
            echo "<script>
            location.replace('shop.php');</script>";
            exit;
        }    
    }
    else
    {
        $query = "INSERT INTO wishlist_details_tbl(Product_Id, User_Id) VALUES ('$product_id', '$user_id')"; 
        if (mysqli_query($con, $query)) {
            setcookie('success', "Product added to wishlist successfully!", time() + 5, "/");
            echo "<script>
            location.replace('wishlist.php');</script>";
            exit;
        } 
        else 
        {
            echo "Error: " . mysqli_error($con);
        }
    }


    
}
$query = "select p.Product_Name,p.Product_Id, p.Product_Image, round(p.Sale_Price-p.Sale_Price*p.Discount/100,2) as 'Price' from wishlist_details_tbl as w left join product_details_tbl as p on w.Product_Id = p.Product_Id where User_Id = ".$user_id;
$result = mysqli_query($con,$query);

?>
    <div class="container sitemap cart-table">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Wishlist</p>
        <!-- table start -->
        <?php
            if(mysqli_num_rows($result) > 0){
        ?>
        <div class="row font-bold bg-light">
            <div class="col-2">
            <img src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="<?php echo $product["Product_Name"]; ?>" class="image-item d-inline-block">
            </div>
            <div class="col-3">
            <?php echo $product["Product_Name"]; ?>
            </div>
            <div class="col-2 text-center">₹<?php echo $product["Price"]; ?></div>
            <div class="col-2 text-center">Subtotal</div>
            <div class="col-3 text-center">Actions</div>
        </div>
                <?php 
                while($product = mysqli_fetch_assoc($result))
                {
                    ?>
        <div class="row mb-2">
            <div class="col-2">
                <img src="img/products/phone.png" alt="Phone image" class="image-item d-inline-block">
            </div>
            <div class="col-3">
                <div class="d-inline-block">Phone</div>
            </div>
            <div class="col-2 text-center">₹100.00</div>
            <div class="col-2 text-center">₹300.00</div>
            <div class="col-3 d-flex">
                <a class="primary-btn not-link me-1">Add to cart</a>
                <a class="primary-btn not-link ">Remove</a>
            </div>
        </div>
        <?php
            }
        }
            ?>
    </div>
    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center cart-page mb-5">
            <a class="btn-msg" href="shop.php">Return to shop</a> 
            <button class="btn-msg">Move all to cart</button>
        </div>
        <!-- <div class="row justify-content-end">
            <div class="col-md-5">
                <div class="border p-4">
                    <h5 class="mb-3">Cart Total</h5>
                    <div class="d-flex align-items-center p-2">
                        <div>Subtotal:</div>
                        <div class="price">₹200.00</div>
                    </div>
                    <div class="my-2 border"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Shipping:</div>
                        <div class="price">₹100.00</div>
                    </div>
                    <div class="my-2 border"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Total:</div>
                        <div class="price">₹300.00</div>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-3">
                        <a class="btn-msg checkout-link" href="checkout.php">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
<?php include('footer.php'); ?>

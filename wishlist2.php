<?php include 'header.php' ;
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
    <p class="my-5"><a href="index.php" class="text-decoration-none dim link ">Home /</a> Wishlist</p>
    <table class="table cart-table text-nowrap">
        <?php
            if(mysqli_num_rows($result) > 0){
        ?>
        <tr class="heading">
            <th>Product</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>

        <?php 
                while($product = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td>
                            <img src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="<?php echo $product["Product_Name"]; ?>" class="image-item d-inline-block">
                            <div class="d-inline-block"><?php echo $product["Product_Name"]; ?></div>
                        </td>
                        <td>₹<?php echo $product["Price"]; ?></td>
                        <td>
                            <a class="primary-btn update-btn" href="move-to-cart.php?product_id=<?php echo $product["Product_Id"]?>&user_id=<?php echo $user_id?>">Add to cart</a>
                            <a class="primary-btn delete-btn ms-2" href="remove-from-wishlist.php?product_id=<?php echo $product["Product_Id"]?>">Delete</a>
                        </td>
                    </tr>
                    </form>
                    <?php
                }
            }
            else
            {
                echo "<td colspan='4'>No items in wishlist.</td>";
            }
        ?>
        
    </table>
</div>
<div class="container mb-5">
    <div class="d-flex justify-content-end align-items-center cart-page mb-5">
        <button class="btn-msg">Move all to cart</button>
    </div>
</div>
<?php include('footer.php'); 

    function record_exists($user_id, $product_id, $con)
    {
        $query = "select * from wishlist_details_tbl where User_Id=$user_id and Product_Id=$product_id";
        $result = mysqli_query($con, $query);
        return mysqli_num_rows($result)>0;
    }

?>

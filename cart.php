<?php include 'header.php';
$user_id = $_SESSION['user_id'];
if (isset($_GET['product_id'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        echo "<script>location.href='login.php';</script>";
        exit;
    }
    $product_id = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
    if (record_exists($user_id, $product_id, $con)) {
        $query = "update cart_details_tbl set quantity = quantity+1 where Product_Id = '$product_id' and User_Id = '$user_id'";
        mysqli_query($con, $query);
    } else {
        $query = "INSERT INTO cart_details_tbl(Product_Id, Quantity, User_Id) VALUES ('$product_id', '$quantity', '$user_id')";
        if (mysqli_query($con, $query)) {
            setcookie('success', "Product added to cart successfully!", time() + 5, "/");
            echo "<script>
            location.replace('cart.php');</script>";
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
$query = "select p.Product_Name,c.Product_Id, p.Product_Image, round(p.Sale_Price-p.Sale_Price*p.Discount/100,2) as 'Price',round((p.Sale_Price-p.Sale_Price*p.Discount/100)*c.Quantity,2) as 'Subtotal',c.Quantity from cart_details_tbl as c left join product_details_tbl as p on c.Product_Id = p.Product_Id where User_Id = " . $user_id;
$result = mysqli_query($con, $query);

?>
<div class="container sitemap cart-table">
    <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Cart</p>
    <?php
    $total = 0;
    if (mysqli_num_rows($result) > 0) {

    ?>
        <table class="table  text-nowrap">
            <tr class="heading">
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
            <?php
            while ($product = mysqli_fetch_assoc($result)) {
                $total += $product['Subtotal'];
            ?>
                <tr>
                    <form action="update-cart.php" method="post">
                        <td class="text-start">
                            <img src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="<?php echo $product["Product_Name"]; ?>" class="image-item d-inline-block" style="width: 50px; height: 60px; object-fit: cover;">
                            <div class="d-inline-block"><?php echo $product["Product_Name"]; ?></div>
                        </td>
                        <td>₹<?php echo $product["Price"]; ?></td>
                        <td>
                            <div class="d-flex justify-content-center qty-mod">
                                <button class="number-button qty-minus">-</button>
                                <input type="number" name="quantity" id="" value="<?php echo $product["Quantity"]; ?>">
                                <button class="number-button qty-plus">+</button>
                                <input type="hidden" name="product_id" value="<?php echo $product["Product_Id"]; ?>">
                            </div>
                        </td>
                        <td>₹<?php echo $product["Subtotal"]; ?></td>
                        <td>
                            <a class="primary-btn delete-btn" href="remove-from-cart.php?product_id=<?php echo $product["Product_Id"]; ?>">Remove</a>
                        </td>
                    </form>
                </tr>
        <?php
            }
        } else {
            echo "There is no record to display!";
        }
        ?>



        </table>
</div>
<?php
$shipping_charge = 50;
$final_total = $total + $shipping_charge;
?>
<div class="container mb-5">
    <div class="d-flex justify-content-between align-items-center cart-page mb-5">
        <a class="btn-msg px-sm-4 py-sm-2 px-2 py-1 mt-2" href="shop.php">Return to shop</a>
        <div class="flex flex-col">
            <div class="d-flex justify-content-end align-items-center not-hidden">
                <form class="d-flex justify-content-end" action="cart.php" method="post" onsubmit=" return validateOfferCode();">
                    <input class=" search-input" type="search" placeholder="Add offer code" size="25" name="offer_code" id="offerCodeText" value="<?php echo $_POST['offer_code']; ?>">
                    <button class="primary-btn" type="submit" name="apply">Apply</button>
                </form>
            </div>
            <div id="err"></div>
        </div>

    </div>
    <div class="row justify-content-end">
        <div class="col-md-5 col-sm-7">
            <div class="bold-border p-4">
                <form action="cart.php" method="post">
                    <h5 class="mb-3">Cart Total</h5>
                    <div class="d-flex align-items-center p-2">
                        <div>Subtotal:</div>
                        <div class="price">₹<?php echo $total; ?></div>
                        <input type="hidden" name="sub" value="<?php echo $total; ?>" />
                    </div>
                    <div class="my-2 line"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Shipping:</div>
                        <div class="price">₹<?php echo $shipping_charge; ?></div>
                        <input type="hidden" name="ship" value="<?php echo $shipping_charge; ?>" />
                    </div>
                    <div id="discount-section">

                    </div>
                    <div class="my-2 line"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Total:</div>
                        <div class="price" id="total">₹<?php echo $final_total; ?></div>
                        <input type="hidden" name="grand-total" id="gt" value="<?php echo $final_total; ?>" />
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-3">
                        <input type="submit" class="btn-msg checkout-link text-nowrap" name="checkout" value="Proceed to checkout" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');

function record_exists($user_id, $product_id, $con)
{
    $query = "select * from cart_details_tbl where User_Id=$user_id and Product_Id=$product_id";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result) > 0;
}
function is_first_order($con)
{
    $user_id = $_SESSION["user_id"];
    $query = "select count(*) from order_header_tbl where User_Id = $user_id";
    $result = mysqli_query($con, $query);
    $order_count_array = mysqli_fetch_array($result);
    $order_count = $order_count_array[0];
    return $order_count < 1;
}
if (isset($_SESSION['checkout_initiated']) && $_SESSION['checkout_initiated'] === true) {
    unset($_SESSION['total-pay']);
    unset($_SESSION['checkout_initiated']);
}

if (isset($_POST['apply'])) {

    $offer = strtoupper($_POST['offer_code']);
    $_SESSION['offer_code'] = $offer;
    $query = "SELECT `Offer_Id`, `Offer_Code`, `Offer_Description`, `Discount`, `Max_Discount`, `Minimum_Order`, `active_status`, `Start_Date`, `End_Date` 
    FROM `offer_details_tbl` 
    WHERE Offer_Code='$offer'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        date_default_timezone_set('Asia/Kolkata');
        $offer_data = mysqli_fetch_assoc($result);
        $discount_percentage = $offer_data['Discount'];
        $max_discount = $offer_data['Max_Discount'];
        $order_total = $offer_data['Minimum_Order'];
        $start_date = strtotime($offer_data['Start_Date']);
        $end_date = strtotime($offer_data['End_Date']);
        $current_date = time();
        $isactive = $offer_data['active_status'];

        if (!$isactive) {
?>
            <script>
                document.getElementById('err').style.color = "red";
                document.getElementById('err').innerHTML = "This offer is not available at the moment.";
            </script>
            <?php
        } else {
            if ($total >= $order_total) {
                $discount_amount = min(($total * $discount_percentage) / 100, $max_discount);  // Store discount in session
                $new_total = $total - $discount_amount;
            ?>
                <script>
                    document.getElementById('discount-section').innerHTML = `
                            <div class="my-2 line"></div>
                            <div class="d-flex align-items-center p-2">
                                <div>Discount:</div>
                                <div class="price">-₹<?php echo $discount_amount; ?></div>
                                <input type="hidden" name="discount" value="<?php echo $discount_amount; ?>" />
                            </div>`;
                    document.getElementById('total').innerHTML = `₹<?php echo $new_total + $shipping_charge; ?>`;
                    document.getElementById('gt').value = `<?php echo $new_total + $shipping_charge; ?>`;
                    document.getElementById('err').style.color = "green";
                    document.getElementById('err').innerHTML = "Offer code applied successfully";
                </script>
            <?php
            } else {
            ?>
                <script>
                    document.getElementById('err').style.color = "red";
                    document.getElementById('err').innerHTML = "To avail this offer, the cart total must be greater than ₹<?php echo $order_total; ?>.";
                </script>
<?php
            }
        }
    }
    else { ?>
        <script>
            document.getElementById('err').style.color = "red";
            document.getElementById('err').innerHTML = "Invalid Offer Code";
        </script>
<?php
    }
}

if (isset($_POST['checkout'])) {
    $user_id = $_SESSION["user_id"];
    $sql = "select * from cart_details_tbl where User_Id='$user_id'";
    $cart = mysqli_query($con, $sql);
    if (mysqli_num_rows($cart) > 0) {
        $subTotal = $_POST['sub'];
        $shipping = $_POST['ship'];
        $discount = $_POST['discount'];
        $grandTotal = $_POST['grand-total'];
        $_SESSION['total-pay'] = [
            'discount_amount' => $discount,
            'subtotal' => $subTotal,
            'total' => $grandTotal,
            'shipping_charge' => $shipping
        ];
        echo "<script>location.href='checkout.php';</script>";
    } else {
        echo "<script>alert('Cart is Empty')</script>";
        echo "<script>location.href='shop.php';</script>";
    }
}
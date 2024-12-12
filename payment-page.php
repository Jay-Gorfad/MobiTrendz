<?php
require 'vendor/autoload.php';

use Razorpay\Api\Api;

include_once("header.php");

$q = "select * from user_details_tbl where User_Id='$_SESSION[user_id]'";
$userData = mysqli_fetch_assoc(mysqli_query($con, $q));

$sql = "select * from address_details_tbl where Address_Id='$_SESSION[addId]'";
$address = mysqli_fetch_assoc(mysqli_query($con, $sql));
$addressParts = explode(',', $address['Address']);
$formattedAddress = implode(',' . PHP_EOL, $addressParts);
$fullAddress = $address['Full_Name'] . ',' . PHP_EOL .
    $address['Phone'] . ',' . PHP_EOL .
    $formattedAddress . ',' . PHP_EOL .
    $address['City'] . ',' . PHP_EOL .
    $address['State'] . ' - ' . $address['Pincode'];
$_SESSION['fullAddress'] = $fullAddress;

$total = isset($_SESSION['total-pay']['total']) ? $_SESSION['total-pay']['total'] : 0;

if ($total <= 0) {
    echo "Invalid total price. Please check your cart.";
    exit;
}

$api = new Razorpay\Api\Api('rzp_test_yCgrsfXSuM7SxL', 'eaxt0pkgow03xe2s2ufGFmBK');

try {
    $orderData = [
        'receipt' => 'order_rcptid_' . uniqid(),
        'amount' => $total * 100,
        'currency' => 'INR',
        'payment_capture' => 1
    ];

    $razorpayOrder = $api->order->create($orderData);
    $_SESSION['razorpay_order_id'] = $razorpayOrder['id'];
} catch (Exception $e) {
    echo "Error creating Razorpay order: " . $e->getMessage();
    exit;
}

?>
<div class="container">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 p-2 align-center">
                <h1>Paying to MobiTrendz</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="address"><b>Delivery Address</b></label>
                    </div>
                    <textarea class="form-control" id="address" name="address" rows="7" readonly><?php echo $fullAddress; ?></textarea>

                    <br>
                    <div class="form-group">
                        <label for="total"><b>Net Payable Amount</b></label>
                        <input type="text" class="form-control" value="<?php echo $total; ?>" disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="order_id"><b>Order ID</b></label>
                        <input type="text" class="form-control" readonly
                            value="<?php echo isset($_SESSION['razorpay_order_id']) ? $_SESSION['razorpay_order_id'] : 'Order ID not generated'; ?>" />
                    </div>
                    <br>
                    <div class="d-flex justify-content-start">
                        <input type="submit" value="Pay Now" id="rzp-button" class="btn-msg mt-2">
                    </div>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script>
                        // Attach event to the Pay Now button
                        $('#rzp-button').click(function(e) {
                            e.preventDefault();

                            var razorpay_order_id = '<?php echo isset($_SESSION['razorpay_order_id']) ? $_SESSION['razorpay_order_id'] : ''; ?>'; // Fetch Razorpay Order ID from session
                            var razorpay_key_id = 'rzp_test_yCgrsfXSuM7SxL'; // Your Razorpay key ID

                            if (!razorpay_order_id) {
                                alert('Order ID not generated.');
                                return;
                            }
                            var options = {
                                "key": razorpay_key_id,
                                "amount": <?php echo $_SESSION['total-pay']['total'] * 100; ?>, // Amount in paise
                                "currency": "INR",
                                "order_id": razorpay_order_id,
                                "name": "MobiTrendz",
                                "description": "Online Transaction",
                                //"image": "img/favicon.jpg", // Logo for your business
                                "handler": function(response) {
                                    console.log(response);
                                    alert("Payment Successful! Payment ID: " + response.razorpay_payment_id);
                                    var redirect_url = "process-order.php?payment_id=" + response.razorpay_payment_id +
                                        "&order_id=" + response.razorpay_order_id +
                                        "&total_amount=" + <?php echo $_SESSION['total-pay']['total'] * 100; ?> +
                                        "&uid=<?php echo $_SESSION['user_id']; ?>";
                                    window.location.href = redirect_url;
                                },
                                "modal": {
                                    "ondismiss": function() {
                                        alert('Payment process was cancelled');
                                    }
                                },
                                "error": function(error) {
                                    alert("Payment Failed: " + error.error.description);
                                },
                                "prefill": {
                                    "name": "<?php echo $userData['Name']; ?>", // Prefill customer's name (can fetch from session or database)
                                    "email": "<?php echo $userData['Email']; ?>", // Prefill customer's email (can fetch from session)
                                    "contact": "<?php echo $userData['Mobile_No']; ?>" // Prefill customer's contact number
                                },
                                "theme": {
                                    "color": "#3BB77E"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.open();
                        });
                    </script>
                    <input type="hidden" name="hidden">
                </form>
            </div>
        </div>
    </div>
    <?php

    include_once("footer.php");
    ?>
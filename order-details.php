<?php include('header.php'); ?>

<div class="container sitemap">
    <p class="breadcrumb">
        <a href="index.php" class="text-decoration-none dim link">Home /</a>
        <a href="order-history.php" class="text-decoration-none dim link">Orders /</a>
        Order# 123456
    </p>

    <!-- Order Overview -->
    <div class="row order-overview border p-3 mb-4">
        <div class="col-md-6">
            <h4 class="mb-2">Order# 123456</h4>
            <div class="order-status mb-3">Pending</div>
            <div class="order-date">Placed on: 11/08/2024, 06:49 PM</div>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-start">
            <button class="primary-btn">Re-order</button>
        </div>
    </div>

    <!-- Customer and Billing Information -->
    <div class="row mb-4 p-0">
        <div class="col-md-6 col-sm-12 ps-0">
            <div class="info-card border p-3 h-100">
                <h5 class="mb-3">Customer & Order</h5>
                <div class="customer-details row">
                    <div class="col-4">
                        <p>Name:</p>
                        <p>Phone:</p>
                        <p>Email:</p>
                        <p>Payment Terms:</p>
                    </div>
                    <div class="col-1 text-end">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-7">
                        <p>Tony Stark</p>
                        <p>+91 99099 99099</p>
                        <p>tony.stark@gmail.com</p>
                        <p>Cash on delivery</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 pe-0">
            <div class="info-card border p-3">
                <h5 class="mb-3">Billing Address</h5>
                <address class="address-book">
                    <p>Tony Stark</p>
                    <p>Street: 56 Lotus Avenue</p>
                    <p>City: New Delhi</p>
                    <p>State/Province: Delhi</p>
                    <p>Zip Code: 110001</p>
                    <p>Phone Number: +91 98101 23456</p>
                </address>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <div class="row order-items border py-4 mb-4">
        <h5 class="mb-3">Items ordered</h5>
        <div class="row item-list-header mx-0 my-2">
            <div class="col-4 p-0">Item Name</div>
            <div class="col-2 text-center">Quantity</div>
            <div class="col-4">Price</div>
            <div class="col-2 text-center">Total</div>
        </div>
        <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="row item-list border-bottom py-2">
            <div class="col-4 p-0">
                <img src="img/products/15Plus.jpg" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block ms-2">Phone</div>
            </div>
            <div class="col-2 text-center">2</div>
            <div class="col-4">₹100.00</div>
            <div class="col-2 text-center">₹200.00</div>
        </div>
        <?php endfor; ?>
        <div class="row m-0 border-bottom py-3">
            <div class="col-4 p-0"></div>
            <div class="col-2 text-center"></div>
            <div class="col-4 text-grey">Subtotal</div>
            <div class="col-2 text-center">₹600.00</div>
        </div>
        <div class="row m-0 border-bottom py-3">
            <div class="col-4 p-0">
                Free Shipping
                <a href="#" class="ps-5 highlight">[Change]</a>
            </div>
            <div class="col-2 text-center"></div>
            <div class="col-4 text-grey">Shipping Charge</div>
            <div class="col-2 text-center">₹0.00</div>
        </div>
        <div class="row m-0 border-bottom py-3">
            <div class="col-4 p-0"></div>
            <div class="col-2 text-center"></div>
            <div class="col-4 text-grey font-weight-bold">Total</div>
            <div class="col-2 text-center font-weight-bold">₹600.00</div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<?php include('header.php'); ?>
    <div class="container sitemap">
        <p>
            <a href="index.php" class="text-decoration-none dim link">Home /</a>
            <a href="cart.php" class="text-decoration-none dim link">Cart /</a> 
            Checkout
        </p>
    </div>
    <div class="container">
        <h2 class="mb-4">Billing Details</h2>
        <div class="row g-5">
            <div class="col-md-6">
                <div class="mb-4">
                    <form action="order-success.php" id="billingForm" class="billing-details form" onsubmit="return validateForms();">
                        <div class="row gx-2 gy-3">
                            <div class="col-12 col-sm-6">
                                <label for="billingFirstName" class="form-label">First Name<span class="required">*</label>
                                <input type="text" id="billingFirstName" class="w-100" >
                                <p id="billingFirstNameError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="billingLastName" class="form-label">Last Name<span class="required">*</span></label>
                                <input type="text" id="billingLastName" class="w-100" >
                                <p id="billingLastNameError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="billingAddress" class="form-label">Street Address<span class="required">*</span></label>
                                <textarea id="billingAddress" class="w-100" rows="2" ></textarea>
                                <p id="billingAddressError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="billingApartment" class="form-label">Apartment, Floor, etc. (Optional)</label>
                                <textarea id="billingApartment" class="w-100" rows="2"></textarea>

                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="billingCity" class="form-label">City<span class="required">*</span></label>
                                <input type="text" id="billingCity" class="w-100" >
                                <p id="billingCityError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="billingState" class="form-label">State<span class="required">*</span></label>
                                <input type="text" id="billingState" class="w-100" >
                                <p id="billingStateError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="billingPinCode" class="form-label">Pin code<span class="required">*</span></label>
                                <input type="text" id="billingPinCode" class="w-100" >
                                <p id="billingPinCodeError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="billingPhone" class="form-label">Phone<span class="required">*</span></label>
                                <input type="text" id="billingPhone" class="w-100" >
                                <p id="billingPhoneError" class="error"></p>
                            </div>
                            <div class="col-12">
                                <div>
                                    <input type="checkbox" id="saveInfo">
                                    <label for="saveInfo" class="form-label ms-1">Save this information for faster check-out next time</label>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="mt-4 line mb-4"></div>
            </div>
            <div class="col-md-6 font-black checkout">
                <div class="mb-2">
                    <div class="d-flex align-items-center p-2">
                        <img src="img/products/phone.png" class="checkout-image" alt="OnePlus Phone">
                        <div class="item-name ms-2">OnePlus Phone</div>
                        <div class="price">₹40,000.00</div>
                    </div>
                </div>
                <div class="d-flex align-items-center p-2">
                    <div>Subtotal:</div>
                    <div class="price">₹40,000.00</div>
                </div>
                <div class="my-2 line"></div>
                <div class="d-flex align-items-center p-2">
                    <div>Shipping:</div>
                    <div class="price">₹100.00</div>
                </div>
                <div class="my-2 line"></div>
                <div class="d-flex align-items-center p-2">
                    <div>Total:</div>
                    <div class="price">₹40,100.00</div>
                </div>
                <div class="mt-2">
                    <!-- <div class="mb-3">
                        <input type="radio" name="payment-choice" id="paymentBank">
                        <label for="paymentBank" class="ms-1 form-label m-0">Bank</label>
                    </div> -->
                    <!-- <div class="mb-3">
                        <input type="radio" name="payment-choice" id="paymentCOD">
                        <label for="paymentCOD" class="ms-1 form-label m-0">Cash on Delivery</label>
                    </div> -->
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Pay Now" class="btn-msg mt-2">
                </div>
            </div>
        </div>
        </form>
    </div>
    
<?php include('footer.php'); ?>

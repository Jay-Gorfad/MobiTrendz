<div class="border p-3" id="filter-section">
    <form action="" method="post">
        <div class="col-12 mb-3">
            <h6 class="mb-2"><span>Customer Ratings</span></h6>
            <div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="4star" value="4"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '4' ? 'checked' : ''; ?>>
                    <label for="4star">4 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="3star" value="3"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '3' ? 'checked' : ''; ?>>
                    <label for="3star">3 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="2star" value="2"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '2' ? 'checked' : ''; ?>>
                    <label for="2star">2 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="1star" value="1"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '1' ? 'checked' : ''; ?>>
                    <label for="1star">1 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <h6 class="mb-2"><span>Price</span></h6>
            <div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="lt10000" value="lt10000"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == 'lt10000' ? 'checked' : ''; ?>>
                    <label for="lt10000">Less than Rs 10,000</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="10000to20000" value="10000to20000"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == '10000to20000' ? 'checked' : ''; ?>>
                    <label for="10000to20000">Rs 10,000 to 20,000</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="20000to30000" value="20000to30000"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == '20000to30000' ? 'checked' : ''; ?>>
                    <label for="20000to30000">Rs 20,000 to 30,000</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="30000to50000" value="30000to50000"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == '30000to50000' ? 'checked' : ''; ?>>
                    <label for="30000to50000">Rs 30,000 to 50,000</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="gt50000" value="gt50000"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == 'gt50000' ? 'checked' : ''; ?>>
                    <label for="gt50000">More than Rs 50,000</label>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <h6 class="mb-2"><span>Discount</span></h6>
            <div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="lt5" value="lt5"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == 'lt5' ? 'checked' : ''; ?>>
                    <label for="lt5">Less than 5%</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="5to15" value="5to15"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == '5to15' ? 'checked' : ''; ?>>
                    <label for="5to15">5% to 15%</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="15to25" value="15to25"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == '15to25' ? 'checked' : ''; ?>>
                    <label for="15to25">15% to 25%</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="gt25" value="gt25"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == 'gt25' ? 'checked' : ''; ?>>
                    <label for="gt25">More than 25%</label>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <h6 class="mb-2"><span>Brand</span></h6>
            <div>
                <div>
                    <input type="radio" name="brand" id="apple" value="apple"
                        <?php echo isset($_POST['brand']) && $_POST['brand'] == 'apple' ? 'checked' : ''; ?>>
                    <label for="apple">Apple</label>
                </div>
                <div>
                    <input type="radio" name="brand" id="samsung" value="samsung"
                        <?php echo isset($_POST['brand']) && $_POST['brand'] == 'samsung' ? 'checked' : ''; ?>>
                    <label for="samsung">Samsung</label>
                </div>
                <div>
                    <input type="radio" name="brand" id="oneplus" value="oneplus"
                        <?php echo isset($_POST['brand']) && $_POST['brand'] == 'oneplus' ? 'checked' : ''; ?>>
                    <label for="oneplus">OnePlus</label>
                </div>
                <div>
                    <input type="radio" name="brand" id="xiaomi" value="xiaomi"
                        <?php echo isset($_POST['brand']) && $_POST['brand'] == 'xiaomi' ? 'checked' : ''; ?>>
                    <label for="xiaomi">Xiaomi</label>
                </div>
                <div>
                    <input type="radio" name="brand" id="realme" value="realme"
                        <?php echo isset($_POST['brand']) && $_POST['brand'] == 'realme' ? 'checked' : ''; ?>>
                    <label for="realme">Realme</label>
                </div>
            </div>
        </div>
        <div class="col-12 mb-2 d-flex justify-content-between">
            <input type="submit" value="Apply" name="filter-submit" class="primary-btn js-filter-btn">
        </div>
    </form>
</div>
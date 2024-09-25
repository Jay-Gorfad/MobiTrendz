<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add New Offer</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="offers.php">Offers</a></li>
                <li class="breadcrumb-item active">Add Offer</li>
            </ol>

            <!-- Add Offer Form -->
            <form action="add_offer_handler.php" method="post" onsubmit="return validateAddOfferForm()">
                <div class="mb-3">
                    <label for="offerDescription" class="form-label">Offer Description</label>
                    <input type="text" class="form-control" id="offerDescription" name="offerDescription">
                    <div id="offerDescriptionError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control" id="discount" name="discount">
                    <div id="discountError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="minOrder" class="form-label">Minimum Order Amount</label>
                    <input type="text" class="form-control" id="minOrder" name="minOrder">
                    <div id="minOrderError" class="error-message"></div>
                </div>

                <button type="submit" class="btn btn-primary">Add Offer</button>
            </form>
        </div>
    </main>
<?php include("footer.php"); ?>

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
            <form action="" method="post" onsubmit="return validateAddOfferForm()">
                <div class="mb-3">
                    <label for="offerDescription" class="form-label">Offer Description</label>
                    <input type="text" class="form-control" id="offerDescription" name="offer_description">
                    <div id="offerDescriptionError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="offerCode" class="form-label">Offer Code</label>
                    <input type="text" class="form-control" id="offerCode" name="offer_code">
                    <div id="offerCodeError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control" id="discount" name="discount">
                    <div id="discountError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="maxdiscount" class="form-label">Max Discount</label>
                    <input type="text" class="form-control" id="maxdiscount" name="max_discount">
                    <div id="maxdiscountError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="minOrder" class="form-label">Minimum Order</label>
                    <input type="text" class="form-control" id="minOrder" name="minimumorder">


                    <div id="minOrderError" class="error-message"></div>
                </div>

                <input type="submit" class="btn btn-primary" name="add_offer" value="Submit"/>
            </form>
        </div>
    </main>
<?php include("footer.php"); ?>
<?php 

if (isset($_POST['add_offer'])) {
    $offercode = $_POST['offer_code'];
    $offer_description = $_POST['offer_description'];
    $discount = $_POST['discount'];
    $maxdiscount = $_POST['max_discount'];
    $minimumorder = $_POST['minimumorder'];



    $insertOfferQuery = "INSERT INTO offer_details_tbl (Offer_Code,Offer_Description, Discount, Max_Discount,Minimum_Order)
        VALUES ('$offercode','$offer_description', $discount, $maxdiscount,$minimumorder)";

    if (mysqli_query($con, $insertOfferQuery)) {
        echo '<script>
                window.location.href = "offers.php"; // Redirect to offers page
              </script>';
    } else {
        echo '<script>
                alert("Error adding offer. Please try again.");
                window.location.href = "add_offer.php"; // Redirect to add offer page
              </script>';
    }
}
?>
<?php include("sidebar.php"); ?>
<?php
    $query = "SELECT `Offer_Id`, `Offer_Description`, `Discount`, `Minimum_Order`, `offer_type` FROM `offer_details_tbl` where Offer_Id=".$_GET["offer_id"];
    $result = mysqli_query($con,$query);
    $offer = mysqli_fetch_assoc($result);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Offer</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="offers.php">Offers</a></li>
                <li class="breadcrumb-item active">Update Offer</li>
            </ol>

            <!-- Update Offer Form -->
            <form action="" method="POST" onsubmit="return validateAddOfferForm()">
                <div class="mb-3">
                    <label for="offerDescription" class="form-label">Offer Description</label>
                    <input type="text" class="form-control" id="offerDescription" name="offer_description" value="<?php echo $offer["Offer_Description"]; ?>">
                    <div id="offerDescriptionError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Discount(%)</label>
                    <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $offer["Discount"]; ?>">
                    <div id="discountError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="minOrder" class="form-label">Minimum Order Amount</label>
                    <input type="text" class="form-control" id="minOrder" name="minimum_order" value="<?php echo $offer["Minimum_Order"]; ?>">
                    <div id="minOrderError" class="error-message"></div>
                </div>

                <button type="submit" class="btn btn-primary" name="update-offer">Update Offer</button>
            </form>
        </div>
    </main>
<?php include("footer.php"); ?>
<?php
    if(isset($_POST["update-offer"])){
        $offer_id = $offer["Offer_Id"];
        $minimum_order = $_POST["minimum_order"];
        $offer_description= $_POST['offer_description'];
        $discount = $_POST["discount"];

        $query = "update offer_details_tbl set Offer_Description = '$offer_description', Discount = '$discount', Minimum_Order='$minimum_order' where Offer_Id=$offer_id";
        if(mysqli_query($con,$query)){
            echo "<script>
                location.href='offers.php';
            </script>";
        }
        else{
            echo mysqli_error($con);
        }
    }
?>
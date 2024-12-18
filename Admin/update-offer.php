<?php include("sidebar.php"); ?>
<?php
$query = "SELECT * FROM `offer_details_tbl` where Offer_Id=" . $_GET["offer_id"];
$result = mysqli_query($con, $query);
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

            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST" onsubmit="return validateAddOfferForm()">
                        <div class="row">
                            <div class="mb-3">
                                <label for="offerDescription" class="form-label">Offer Description</label>
                                <input type="text" class="form-control" id="offerDescription" name="offer_description" value="<?php echo $offer["Offer_Description"]; ?>">
                                <div id="offerDescriptionError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="offerCode" class="form-label">Offer Code</label>
                                    <input type="text" class="form-control" id="offerCode" name="offer_code" value="<?php echo $offer["Offer_Code"]; ?>">
                                    <div id="offerCodeError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="discount" class="form-label">Discount(%)</label>
                                    <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $offer["Discount"]; ?>">
                                    <div id="discountError" class="error-message"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="maxDiscount" class="form-label">Maximum Discount Amount</label>
                                    <input type="text" class="form-control" id="maxDiscount" name="max_discount" value="<?php echo $offer["Max_Discount"]; ?>">
                                    <div id="maxDiscountError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="minOrder" class="form-label">Minimum Order Amount</label>
                                    <input type="text" class="form-control" id="minOrder" name="minimum_order" value="<?php echo $offer["Minimum_Order"]; ?>">
                                    <div id="minOrderError" class="error-message"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sDate" class="form-label">Start Date</label>
                                    <input type="Date" class="form-control" id="sDate" name="s_date" value="<?php echo date('Y-m-d', strtotime($offer['Start_Date'])); ?>">
                                    <div id="startDateError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="eDate" class="form-label">End Date</label>
                                    <input type="Date" class="form-control" id="eDate" name="e_date" value="<?php echo date('Y-m-d', strtotime($offer['End_Date'])); ?>">
                                    <div id="endDateError" class="error-message"></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="update-offer">Update Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include("footer.php"); ?>
    <?php
    if (isset($_POST["update-offer"])) {
        $offer_id = $offer["Offer_Id"];
        $offer_code =  strtoupper($_POST['offer_code']);
        $offer_description = $_POST['offer_description'];
        $discount = $_POST['discount'];
        $max_discount = $_POST['max_discount'];
        $minimum_order = $_POST['minimum_order'];
        $start = $_POST['s_date'];
        $end = $_POST['e_date'];

        $query = "update offer_details_tbl set Offer_Description = '$offer_description', Discount = '$discount', Minimum_Order='$minimum_order', Offer_Code ='$offer_code',Max_Discount = '$max_discount', Start_Date='$start', End_Date = '$end' where Offer_Id=$offer_id";
        if (mysqli_query($con, $query)) {
            echo "<script>
                location.href='offers.php';
            </script>";
        } else {
            echo mysqli_error($con);
        }
    }
    ?>
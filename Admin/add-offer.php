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
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="post" onsubmit="return validateAddOfferForm()">
                        <div class="row">
                            <div class="mb-3">
                                <label for="offerDescription" class="form-label">Offer Description</label>
                                <input type="text" class="form-control" id="offerDescription" name="offer_description">
                                <div id="offerDescriptionError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="offerCode" class="form-label">Offer Code</label>
                                    <input type="text" class="form-control" id="offerCode" name="offer_code">
                                    <div id="offerCodeError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="discount" class="form-label">Discount</label>
                                    <input type="text" class="form-control" id="discount" name="discount">
                                    <div id="discountError" class="error-message"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="maxDiscount" class="form-label">Maximum Discount Amount</label>
                                    <input type="text" class="form-control" id="maxDiscount" name="max_discount">
                                    <div id="maxDiscountError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="minOrder" class="form-label">Minimum Order Amount</label>
                                    <input type="text" class="form-control" id="minOrder" name="minimum_order">
                                    <div id="minOrderError" class="error-message"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sDate" class="form-label">Start Date</label>
                                    <input type="Date" class="form-control" id="sDate" name="s_date">
                                    <div id="startDateError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="eDate" class="form-label">End Date</label>
                                    <input type="Date" class="form-control" id="eDate" name="e_date">
                                    <div id="endDateError" class="error-message"></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="add_offer">Add Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include("footer.php"); ?>
    <?php

    if (isset($_POST['add_offer'])) {
        $offer_code =  strtoupper($_POST['offer_code']);
        $offer_description = $_POST['offer_description'];
        $discount = $_POST['discount'];
        $max_discount = $_POST['max_discount'];
        $minimum_order = $_POST['minimum_order'];
        $start = $_POST['s_date'];
        $end = $_POST['e_date'];

        $active = ($start <= date('Y-m-d') && $end >= date('Y-m-d')) ? 1 : 0;

        $insertOfferQuery = "INSERT INTO offer_details_tbl (Offer_Code, Offer_Description, Discount,Max_Discount, Minimum_Order, Start_Date, End_Date,active_status)
        VALUES ('$offer_code','$offer_description', '$discount','$max_discount', '$minimum_order','$start','$end','$active')";

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
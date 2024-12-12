<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1 class="mt-4">Offers Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Offers</li>
                    </ol>
                </div>
                <a class="btn btn-primary" href="add-offer.php">Add Offer</a>
            </div>
            <!-- Discount Offers Table -->
            <h4 class="mt-4">Discount Offers</h4>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Offer Description</th>
                            <th>Discount</th>
                            <th>Minimum Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT Offer_Id, Offer_Description, Discount, Minimum_Order, offer_type,active_status FROM offer_details_tbl where offer_type=1";
                            $result = mysqli_query($con,$query);
                            if(mysqli_num_rows($result)){
                                while($offer = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $offer["Offer_Description"]?></td>
                                    <td><?php echo $offer["Discount"]?>%</td>
                                    <td>₹<?php echo $offer["Minimum_Order"]?></td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            <a href="update-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-secondary btn-sm me-1">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $offer["Offer_Id"]?>">Delete</a>
                                            <?php if($offer["active_status"] == 1) { ?>
                                                <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#deactivateModal<?php echo $offer["Offer_Id"]?>">Deactivate</a>
                                            <?php } else { ?>
                                                <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal<?php echo $offer["Offer_Id"]?>">Activate</a>
                                            <?php } ?>
                                        </div>                           
                                    </td>
                                </tr>
                                <!-- Modal for Deactivate Confirmation -->
                                <div class="modal fade" id="deactivateModal<?php echo $offer["Offer_Id"]?>" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deactivateModalLabel">Confirm Deactivation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to deactivate this offer? You can reactivate it anytime.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="deactivate-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-warning">Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal for Activate Confirmation -->
                                <div class="modal fade" id="activateModal<?php echo $offer["Offer_Id"]?>" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="activateModalLabel">Confirm Activation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to activate this offer?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="activate-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-success">Activate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal for Delete Confirmation -->
                                <div class="modal fade" id="deleteModal<?php echo $offer["Offer_Id"]?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this offer? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            else{
                                echo "<tr>
                                    <td colspan='4'>There is no offer to display!</td> 
                                    </tr>";
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>

            <!-- First Purchase Discount Table -->
            <h4 class="mt-4">First Purchase Discounts</h4>
<div class="card-body">
    <table class="table border text-nowrap">
        <thead class="table-light">
            <tr>
                <th>Offer Description</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT Offer_Id, Offer_Description, Discount, Minimum_Order, offer_type, active_status FROM offer_details_tbl WHERE offer_type = 2";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($offer = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <form action="update-offer-type.php" method="post">
                    <input type="hidden" name="offer_id" value="<?php echo $offer["Offer_Id"]; ?>">
                    <input type="hidden" name="offer_type" value="<?php echo $offer["offer_type"]; ?>">

                    <td><input type="text" class="form-control" name="offer_description" value="<?php echo $offer["Offer_Description"]; ?>"></td>
                    <td><input type="text" class="form-control" name="discount" value="<?php echo $offer["Discount"]; ?>"></td>
                    <td>
                        <input type="submit" class="btn btn-success btn-sm" value="Update">
                        <?php if ($offer["active_status"] == 1) { ?>
                            <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#deactivateModal<?php echo $offer["Offer_Id"]?>">Deactivate</a>
                        <?php } else { ?>
                            <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal<?php echo $offer["Offer_Id"]?>">Activate</a>
                        <?php } ?>
                    </td>
                </form>
            </tr>
            <!-- Modal for Deactivate Confirmation -->
            <div class="modal fade" id="deactivateModal<?php echo $offer["Offer_Id"]?>" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deactivateModalLabel">Confirm Deactivation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to deactivate this offer? You can reactivate it anytime.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="deactivate-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-warning">Deactivate</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Activate Confirmation -->
            <div class="modal fade" id="activateModal<?php echo $offer["Offer_Id"]?>" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="activateModalLabel">Confirm Activation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to activate this offer?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="activate-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-success">Activate</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='3'>There are no first purchase discounts to display!</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>


            <!-- Free Shipping Table -->
            <h4 class="mt-4">Free Shipping Offers</h4>
<div class="card-body">
    <table class="table border text-nowrap">
        <thead class="table-light">
            <tr>
                <th>Offer Description</th>
                <th>Minimum Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT Offer_Id, Offer_Description, Discount, Minimum_Order, offer_type, active_status FROM offer_details_tbl WHERE offer_type = 3";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($offer = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <form action="update-offer-type.php" method="post">
                    <input type="hidden" name="offer_id" value="<?php echo $offer["Offer_Id"]; ?>">
                    <input type="hidden" name="offer_type" value="<?php echo $offer["offer_type"]; ?>">

                    <td><input type="text" class="form-control" name="offer_description" value="<?php echo $offer["Offer_Description"]; ?>"></td>
                    <td><input type="text" class="form-control" name="minimum_order" value="<?php echo $offer["Minimum_Order"]; ?>"></td>
                    <td>
                        <input type="submit" class="btn btn-success btn-sm" value="Update">
                        <?php if ($offer["active_status"] == 1) { ?>
                            <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#deactivateModal<?php echo $offer["Offer_Id"]?>">Deactivate</a>
                        <?php } else { ?>
                            <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal<?php echo $offer["Offer_Id"]?>">Activate</a>
                        <?php } ?>
                    </td>
                </form>
            </tr>
            <!-- Modal for Deactivate Confirmation -->
            <div class="modal fade" id="deactivateModal<?php echo $offer["Offer_Id"]?>" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deactivateModalLabel">Confirm Deactivation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to deactivate this offer? You can reactivate it anytime.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="deactivate-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-warning">Deactivate</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Activate Confirmation -->
            <div class="modal fade" id="activateModal<?php echo $offer["Offer_Id"]?>" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="activateModalLabel">Confirm Activation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to activate this offer?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="activate-offer.php?offer_id=<?php echo $offer["Offer_Id"]?>" class="btn btn-success">Activate</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='3'>There are no free shipping offers to display!</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

    

<?php include("footer.php"); ?>
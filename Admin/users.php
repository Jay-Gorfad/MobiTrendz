<?php include("sidebar.php");

$query = "SELECT User_Id, Name, Email, Mobile_No, Active_Status FROM user_details_tbl where User_Role_Id=0";
$result = mysqli_query($con, $query);
?>

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4 w-100">
                <div>
                    <h1>User Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <a class="btn btn-primary ms-auto" href="add-user.php">Add User</a>
            </div>

            <div class="card-body">
            <?php   
                    if(mysqli_num_rows($result))
                    {
                        ?>
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Account Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($user = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $user['User_Id']; ?></td>
                                <td><?php echo $user['Name']; ?></td>
                                <td><?php echo $user['Email']; ?></td>
                                <td><?php echo $user['Mobile_No']; ?></td>
                                <td>
                                    <?php 
                                    if ($user['Active_Status'] == 1) {
                                        echo 'Active';
                                    } elseif ($user['Active_Status'] == 0) {
                                        echo 'Inactive';
                                    } elseif ($user['Active_Status'] == -1) {
                                        echo 'Deleted';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="user-profile.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="update-user.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    <?php if ($user['Active_Status'] == 1) { ?>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deactivateModal<?php echo $user['User_Id']; ?>" data-user-id="<?php echo $user['User_Id']; ?>">Deactivate</button>
                                    <?php } elseif ($user['Active_Status'] == 0 || $user['Active_Status'] == -1) { ?>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal<?php echo $user['User_Id']; ?>" data-user-id="<?php echo $user['User_Id']; ?>">Activate</button>
                                    <?php } ?>

                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $user['User_Id']; ?>" data-user-id="<?php echo $user['User_Id']; ?>">Delete</button>
                                    <a href="cart.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-secondary btn-sm">Cart</a>
                                </td>
                            </tr>


                            <!-- Deactivate Modal -->
                            <div class="modal fade" id="deactivateModal<?php echo $user['User_Id']; ?>" tabindex="-1" aria-labelledby="deactivateModalLabel<?php echo $user['User_Id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deactivateModalLabel<?php echo $user['User_Id']; ?>">Confirm Deactivation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to deactivate this user? This action can be reversed by reactivating the account.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="deactivate-user.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-danger">Deactivate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Activate Modal -->
                            <div class="modal fade" id="activateModal<?php echo $user['User_Id']; ?>" tabindex="-1" aria-labelledby="activateModalLabel<?php echo $user['User_Id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="activateModalLabel<?php echo $user['User_Id']; ?>">Confirm Activation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to activate this user? This action will make the user's account active.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="activate-user.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-success">Activate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal for Delete Confirmation -->
                            <div class="modal fade" id="deleteModal<?php echo $user['User_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this user? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="delete-user.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>

                    </tbody>
                        <?php
                    }
                    else
                    {
                        echo "There is no user to display!";
                    }
                ?> 
                </table>
            </div>
        </div>
    </main>

    

<?php include("footer.php") ?>

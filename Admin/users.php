<?php include("sidebar.php") ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4 w-100">
                <div>
                    <h1>User Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="Index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <a class="btn btn-primary ms-auto" href="add-user.php">Add User</a>
            </div>

            <div class="card-body">
                <table class="table border">
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
                        <tr>
                            <td>1</td>
                            <td>Jay Barasiya</td>
                            <td>jay23@gmail.com</td>
                            <td>123456789</td>
                            <td>Active</td>
                            <td>
                                <a href="user_profile.php?id=1" class="btn btn-info btn-sm">View</a>
                                <a href="update_user.php?id=1" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-user-id="1">Deactivate</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jay Gorfad</td>
                            <td>jay24@gmail.com</td>
                            <td>987654321</td>
                            <td>Inactive</td>
                            <td>
                                <a href="user_profile.php?id=2" class="btn btn-info btn-sm">View</a>
                                <a href="update_user.php?id=2" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal" data-user-id="2">Activate</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Yagnik Desai</td>
                            <td>yagnik25@gmail.com</td>
                            <td>147852369</td>
                            <td>Active</td>
                            <td>
                                <a href="user_profile.php?id=1" class="btn btn-info btn-sm">View</a>
                                <a href="update_user.php?id=1" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-user-id="1">Deactivate</button>
                            </td>
                        </tr>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Deactivate Modal -->
    <div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deactivateModalLabel">Confirm Deactivation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to deactivate this user? This action can be reversed by reactivating the account.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="deactivate_user_handler.php?id=1" class="btn btn-danger">Deactivate</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Activate Modal -->
    <div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activateModalLabel">Confirm Activation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to activate this user? This action will make the user's account active.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="activate_user_handler.php?id=2" class="btn btn-success">Activate</a>
                </div>
            </div>
        </div>
    </div>

<?php include("footer.php") ?>

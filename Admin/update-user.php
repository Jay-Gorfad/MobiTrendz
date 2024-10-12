<?php include("sidebar.php"); 

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $sql = "SELECT * FROM user_details_tbl WHERE User_Id = $userId";
    $result = mysqli_query($con, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('User not found!'); window.location.href = 'users.php';</script>";
        exit();
    }
} else {
    echo "<script>window.location.href = 'users.php';</script>";
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form id="updateUserForm" action="update-user.php" method="POST">
                    <input type="hidden" name="user_id" id="userId" value="<?php echo $user['User_Id']; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="Name" name="name" value="<?php echo $user['Name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['Email']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user['Mobile_No']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"  value="<?php echo $user['Password']; ?>">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update-user">Update User</button>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>
<?php

if (isset($_POST["update-user"])) {
    $userId = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "UPDATE user_details_tbl 
            SET Name = '$name', Email = '$email', Mobile_No = '$phone', Password = '$password' 
            WHERE User_Id = $userId";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('User updated successfully!');</script>";
        echo "<script>window.location.href = 'users.php';</script>";
    } else {
        echo "Error updating user: " . mysqli_error($con);
    }
}
?>

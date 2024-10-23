<?php include('header.php');
$user_id = $_SESSION["user_id"];
$query = "select * from user_details_tbl where User_Id=" . $user_id;
$result = mysqli_query($con,$query);
$user = mysqli_fetch_assoc($result);
$fullname=explode(" ", $user['Name']);
$fname=$fullname[0];
$lname=$fullname[1];

?>
    <div class="container ">
        <div class=" d-flex justify-content-between sitemap">
            <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Account</p>
            <p>Welcome! <span class="highlight"><?php echo $user["Name"]; ?></span></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            
            <div class="col-12 p-2">
                <div class="shadow-sm p-4">
                    <div id="my-profile" >
                        <p class="title">Edit Your Profile</p>
                        <form action="update-profile.php" method="POST" enctype="multipart/form-data" class="edit-profile form" onsubmit = "return validateMyAccountForm();">
                            <div class="row g-2">
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" class="w-100" name="firstName" placeholder="Your First Name*" id="firstName" value="<?php echo $fname; ?>">
                                    <p id="firstNameError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" class="w-100" name="lastName" placeholder="Your Last Name*" id="lastName" value="<?php echo $lname; ?>">
                                    <p id="lastNameError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="w-100" name="uemail" placeholder="Your Email*" id="email" value="<?php echo $user['Email']; ?>" disabled>
                                    <p id="emailError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="w-100" name="uphone" placeholder="Your Phone*" id="phone" value="<?php echo $user['Mobile_No']; ?>" disabled>
                                    <p id="phoneError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <img src="img/users/<?php echo $user["Profile_Picture"]; ?>" alt="" height="200" width="200">
                                    <input type="hidden" name="old_image" value="<?php echo $user["Profile_Picture"]; ?>">
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="userImage" class="form-label">User Image</label>
                                        <input type="file" class="form-control" id="userImage" name="user_image" accept="image/*">
                                        <div id="userImageError" class="error-message"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                <input type="submit" value="Update Profile" class="btn-msg mt-2 ">
                            </div>
                            </form>
                                <form action="update-password.php" method="post"  onsubmit = "return validateChangePassword();">
                                <div class="col-12">
                                    <label for="" class="form-label">Password</label>
                                    <input type="text" name="current" class="w-100 mb-2" placeholder="Current password" id="currentPassword">
                                    <p id="currentPasswordError" class="error"></p>
                                    <input type="text" class="w-100 mb-2" name="new" placeholder="New password" id="newPassword">
                                    <p id="newPasswordError" class="error"></p>
                                    <input type="text" name="confirm" class="w-100 mb-2" placeholder="Confirm password" id="confirmPassword">
                                    <p id="confirmPasswordError" class="error"></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" name="change" value="Change Password" class="btn-msg mt-2 ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<?php include('footer.php'); 
if (isset($_POST['change'])) {
    $curr = $_POST['current'];
    $new = $_POST['new'];

    if ($curr == $user["Password"]) {
        $sql = "UPDATE user_details_tbl SET Password='$new' WHERE User_Id='$_SESSION[user_id]'";
        if (mysqli_query($con, $sql)) {
            setcookie('success', 'Your Details has been updated.', time() + 5, "/");
            echo "<script> location.replace('account.php');</script>";
        } else {
            setcookie('error', 'Error in Update Profile.', time() + 5, "/");
            echo "<script> location.replace('account.php');</script>";
        }
    } else {
        setcookie('error', 'Password does not matched.', time() + 5, "/");
        echo "<script> location.replace('account.php');</script>";
    }
}

?>


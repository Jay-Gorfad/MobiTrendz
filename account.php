<?php include('header.php');
$query = "Select Name from user_details_tbl where User_Id='$_SESSION[user_id]'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $username = $row['Name'];
}

?>
    <div class="container ">
        <div class=" d-flex justify-content-between sitemap">
            <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Account</p>
            <p>Welcome! <span class="highlight"><?php echo $username;?></span></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            
            <div class="col-12 p-2">
                <div class="shadow-sm p-4">
                    <div id="my-profile" >
                        <p class="highlight title">Edit Your Profile</p>
                        <form action="" class="edit-profile form" onsubmit = "return validateMyAccountForm();">
                            <div class="row g-2">
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" class="w-100" placeholder="Your First Name*" id="firstName" value="Jay">
                                    <p id="firstNameError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" class="w-100" placeholder="Your Last Email*" id="lastName" value="Barasiya">
                                    <p id="lastNameError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="w-100" placeholder="Your Email*" id="email" value="jbarasiya302@rku.ac.in">
                                    <p id="emailError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="w-100" placeholder="Your Phone*" id="phone" value="9874563200">
                                    <p id="phoneError" class="error"></p>
                                </div>
                            
                                <div class="col-12">
                                    <label for="" class="form-label">Password</label>
                                    <input type="text" class="w-100 mb-2" placeholder="Current password" id="currentPassword">
                                    <p id="currentPasswordError" class="error"></p>
                                    <input type="text" class="w-100 mb-2" placeholder="New password" id="newPassword">
                                    <p id="newPasswordError" class="error"></p>
                                    <input type="text" class="w-100 mb-2" placeholder="Confirm password" id="confirmPassword">
                                    <p id="confirmPasswordError" class="error"></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Change Password" class="btn-msg mt-2 ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<?php include('footer.php'); ?>


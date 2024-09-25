<?php include('header.php'); ?>
    <div class="container">
        <div class="row p-3 g-3">
            <div class="col-md-6 mb-3">
                <img src="img\banners\Side Image.png" alt="It is an chocolate image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3 text-center">Forgot Password?</h2>
                        <div class="mb-4 text-center">Enter an email account to reset password</div>
                        <form action="otp-page.php" onsubmit="return validateForgotPasswordForm()">
                            <input type="text" id="otpEmail" class="w-100 mb-3" placeholder="Email">
                            <p id="otpEmailError" class="error mb-2"></p>
                            <input type="submit" value="Send OTP" class="btn-msg w-100">
                            <div class="mt-4 text-center">
                                <a href="login.php" class="dim link ms-2">Back to log in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>
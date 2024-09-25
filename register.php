<?php include('header.php'); ?>
    <div class="container">
        <div class="row p-3 g-3">
            <div class="col-md-6 mb-3">
                <img src="img\banners\Side Image.png" alt="It is an chocolate image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3 text-center">Create an account</h2>
                        <div class="mb-4 text-center">Enter your details below</div>
                        <form id="registrationForm" action="login.php" onsubmit="return validateRegistrationForm();">
                            <input type="text" id="name" class="w-100 mb-3" placeholder="Name">
                            <p id="nameError" class="error mb-2"></p>

                            <input type="text" id="email" class="w-100 mb-3" placeholder="Email">
                            <p id="emailError" class="error mb-2"></p>

                            <input type="text" id="password" class="w-100 mb-3" placeholder="Password">
                            <p id="passwordError" class="error mb-2"></p>

                            <input type="text" id="confirmPassword" class="w-100 mb-3" placeholder="Confirm Password">
                            <p id="confirmPasswordError" class="error mb-2"></p>

                            <input type="submit" value="Create an account" class="btn-msg w-100">
                            <div class="mt-4 text-center">
                                Already have an account?<a href="login.php" class="dim link ms-2">Log in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>
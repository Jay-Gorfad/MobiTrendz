<?php include('header.php'); ?>
    <div class="container">
        <div class="row p-3 g-3">
            <div class="col-md-6 mb-3">
                <img src="img\banners\Side Image.png" alt="It is an chocolate image" class="img-fluid">
            </div>
            <div class="col-md-6">
    <div class="login-form d-flex flex-column justify-content-center align-items-center h-100">
        <div class="mb-4 w-75">
            <h2 class="mb-3 text-center">Log in</h2>
            <p class="mb-4 text-muted text-center">Enter your details below</p>
            <form id="loginForm" method="POST" onsubmit="return validateLoginForm();">
                <input type="text" id="loginEmail" name="LoginEmail" class="form-control mb-3" placeholder="Email">
                <p id="loginEmailError" class="error mb-2"></p>
                <input type="text" id="loginPassword" name="LoginPassword" class="form-control mb-3" placeholder="Password">
                <p id="loginPasswordError" class="error mb-2"></p>
                <input type="submit" value="Log in" name="login" class="btn-msg w-100">
                <!-- <button type="submit" class="btn btn-primary w-100 mb-2">Log in</button> -->
                <div class="mt-4 text-center">
                <a href="forgot-password.php" class="text-decoration-none text-primary">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
</div>

        </div>
    </div>
<?php include('footer.php'); 

// if (isset($_POST['login'])) {
//     $email = $_POST['LoginEmail'];
//     $pwd = $_POST['LoginPassword'];

//     $query = "Select * from user_details_tbl where Email='$email' and Password='$pwd'";
//     $result = mysqli_query($con, $query);
//     if (mysqli_num_rows($result) == 1) {
//         $row = mysqli_fetch_array($result);
//         $_SESSION['user_id'] = $row[0];
//         echo "<script> location.replace('index.php');</script>";
//     }
// }

?>
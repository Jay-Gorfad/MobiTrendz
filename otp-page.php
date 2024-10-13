<?php
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

<?php include('header.php'); ?>
    <div class="container">
        <div class="row p-3 g-3">
            <div class="col-md-6 mb-3">
                <img src="img\banners\Side Image.png" alt="It is an chocolate image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3 text-center">Enter OTP</h2>
                        <div class="mb-4 text-center">Enter the OTP we sent you in email</div>
                        <form id="otpForm" method="post" onsubmit="return validateOtpForm();">
                            <input type="number" id="otp" class="w-100 mb-3" placeholder="OTP">
                            <p id="otpError" class="error  mb-2"></p>
                            <input type="submit" value="Verify" name="verify" class="btn-msg w-100">
                            <!-- <div class="mt-4 text-center">
                                <a href="login.php" class="dim link ms-2">Back to log in</a>
                            </div> -->
                            <div class="mt-4 text-center">
                                <a href="" class="dim link ms-2">Resend OTP</a>
                            </div>
                        </form>
                        <!-- <form id="resend" method="post">
                        <div class="mt-4 text-center">
                            <button type="submit" name="resend_otp" class="otp ms-2">Resend OTP</button>
                        </div>
                    </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); 


if (isset($_POST['verify'])) {
    $inputtedOTP = $_POST['otp'];

    if (isset($_SESSION['otp']) && isset($_SESSION['otp_expiration'])) {

        if (time() > $_SESSION['otp_expiration']) {
            echo "The OTP has expired. Please request a new one.";
        } else {
            $session_otp = $_SESSION['otp'];

            if ($inputtedOTP == $session_otp) {
                $name = $_SESSION['user_data']['name'];
                $email = $_SESSION['user_data']['email'];
                $phone = $_SESSION['user_data']['phone'];
                $password = $_SESSION['user_data']['pwd'];

                $sql = "INSERT INTO user_details_tbl (User_Id, User_Role_Id, Name, Password, Email, Mobile_No, Active_Status) 
                        VALUES (User_Id, User_Role_Id, '$name','$password','$email','$phone', 'Active_Status')";

                if (mysqli_query($con, $sql)) {
                    unset($_SESSION['otp']);
                    unset($_SESSION['otp_expiration']);

                    echo "<script> location.replace('login.php');</script>";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "Wrong OTP. Please try again.";
            }
        }
    } else {
        echo "No OTP found. Please request a new one.";
    }
}

if (isset($_POST['resend_otp'])) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'purebitegroceryshop@gmail.com';
        $mail->Password = 'lkge rlbk vtgd uaih';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('purebitegroceryshop@gmail.com');
        $mail->addAddress($regemail, $regfname);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiration'] = time() + 300;

        $body = "<html>
                    <body>
                        <h2>Resend OTP for Email Verification</h2>
                        <p>Dear {$_SESSION['user_data']['fname']},</p>
                        <p>Your new OTP for email verification is: <strong>$otp</strong></p>
                        <p>This OTP will expire in 5 minutes.</p>
                        <p>If you didn't request this, please ignore this email.</p>
                    </body>
                </html>";

        $mail->Body = $body;

        if ($mail->send()) {
            setcookie('success', 'New OTP has been sent to your email.', time() + 5, "/");
        } else {
            setcookie('error', "Failed to resend OTP: " . $mail->ErrorInfo, time() + 5, "/");
        }
    } catch (Exception $e) {
        setcookie('error', "Error in sending email: " . $e->getMessage(), time() + 5, "/");
    }
}

?>
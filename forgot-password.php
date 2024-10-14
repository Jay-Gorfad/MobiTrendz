<?php include('header.php');

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>
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
                        <form action="" method="POST" onsubmit="return validateForgotPasswordForm()">
                            <input type="text" id="otpEmail" class="w-100 mb-3" placeholder="Email">
                            <p id="otpEmailError" class="error mb-2"></p>
                            <input type="submit" name="submit" value="Send OTP" class="btn-msg w-100">
                            <div class="mt-4 text-center">
                                <a href="login.php" class="dim link ms-2">Back to log in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); 

if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $sql = "select * from user_details_tbl where Email = '$email'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    $username = $user['Name'];
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jaygorfad00@gmail.com';
        $mail->Password = 'fkoo btkt biaw pdet';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('jaygorfad00@gmail.com');
        $mail->addAddress($email, $username);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiration'] = time() + 120;
        $_SESSION['email'] = $email;

        $body = "<html>
                    <body>
                        <h2>Email Verification</h2>
                        <p>Dear {$username},</p>
                        <p>Your OTP for email verification is: <strong>$otp</strong></p>
                        <p>This OTP will expire in 5 minutes.</p>
                        <p>If you didn't request this, please ignore this email.</p>
                    </body>
                </html>";

        $mail->Body = $body;

        if (!$mail->send()) {
            setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5, "/");
        } else {
            setcookie('success', 'Email sent successfully. Please check your inbox for OTP.', time() + 5, "/");
            echo "<script>location.href='otp-page.php'</script>";
        }
    } catch (Exception $e) {
        setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5, "/");
    }
}


?>
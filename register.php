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
                        <h2 class="mb-3 text-center">Create an account</h2>
                        <div class="mb-4 text-center">Enter your details below</div>
                        <form id="registrationForm" method="post" onsubmit="return validateRegistrationForm();">
                            <input type="text" id="name" name="regname" class="w-100 mb-3" placeholder="Name">
                            <p id="nameError" class="text-danger mb-2"></p>

                            <input type="text" id="email" name="regemail" class="w-100 mb-3" placeholder="Email">
                            <p id="emailError" class="text-danger mb-2"></p>

                            <input type="text" id="phone" name="regphone" class="w-100 mb-3" placeholder="Mobile number ">
                            <p id="phoneError" class="text-danger mb-2"></p>

                            <input type="text" id="password" name="regpwd" class="w-100 mb-3" placeholder="Password">
                            <p id="passwordError" class="text-danger mb-2"></p>

                            <input type="text" id="confirmPassword" name="regcpwd" class="w-100 mb-3" placeholder="Confirm Password">
                            <p id="confirmPasswordError" class="text-danger mb-2"></p>

                            <input type="submit" value="Create an account" name="regbtn" class="btn-msg w-100">
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

<?php

if(isset($_POST['regbtn']))
{
    $name = $_POST['regname'];
    $email = $_POST['regemail'];
    $phone = $_POST['regphone'];
    $password = $_POST['regpwd'];

    $_SESSION['user_data'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'pwd' => $password
    ];
    

    $email_check_query = "SELECT * FROM user_details_tbl WHERE Email = '$regemail' LIMIT 1";
        $result = mysqli_query($con, $email_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user)
        {
            if ($user['Active_Status'] == 1) 
            {
                setcookie('success', 'Your account already exists.', time() + 5, "/");
                header("Location:login.php");
                exit();
            }
        }
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
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_expiration'] = time() + 300;

            $body = "<html>
                        <body>
                            <h2>Email Verification</h2>
                            <p>Dear {$_SESSION['user_data']['name']},</p>
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
            }
        } catch (Exception $e) {
            setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5, "/");
        }

        echo "<script> location.replace('otp-page.php');</script>";
}

?>
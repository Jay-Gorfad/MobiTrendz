<?php
    include './DB/connection.php';
    if (isset($_POST['verify'])) {
        $inputtedOTP = $_POST['otp'];
    
        if (isset($_SESSION['otp'])) {
    
            if (time() > $_SESSION['otp_expiration']) {
                setcookie('error', "The OTP has expired. Please request a new one.", time() + 5, "/");
            } else {
                $session_otp = $_SESSION['otp'];
    
                if ($inputtedOTP == $session_otp) {
                    if(isset($_SESSION['email'])){
                        $_SESSION['verified'] = 1;
                        echo "<script>location.href='reset-password.php';</script>";
                    }
                    else{
                        $regname = $_SESSION['user_data']['name'];
                        $regemail = $_SESSION['user_data']['email'];
                        $regphone = $_SESSION['user_data']['phone'];
                        $regpwd = $_SESSION['user_data']['pwd'];
                        $sql = "INSERT INTO user_details_tbl (Name, Email, Mobile_no, Password, Active_Status) 
                                VALUES ('$regname', '$regemail', '$regphone', '$regpwd', '1')";

                        if (mysqli_query($con, $sql)) {
                            unset($_SESSION['user_data']);
                            unset($_SESSION['otp']);
                            unset($_SESSION['otp_expiration']);

                            $_SESSION['user_id']=mysqli_insert_id($con);
                            setcookie('success', "You have registered successfully!", time() + 5, "/");
                            echo "<script> location.replace('index.php');</script>";
                        } else {
                            setcookie('error', mysqli_error($con), time() + 5, "/");
                        }
                    }
                } else {
                    setcookie('error', "Wrong OTP. Please try again.", time() + 5, "/");
                }
            }
        } else {
            setcookie('error', "No OTP found. Please request a new one.", time() + 5, "/");
        }
    }
    echo "<script>location.replace('otp-page.php');</script>";
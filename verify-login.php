<?php
        include "DB/connection.php";
        $email = $_POST['logEmail'];
        $pwd = $_POST['logPwd'];
    
        $query = "Select * from user_details_tbl where Email='$email' and password='$pwd'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $active_status = $row['Active_Status'];
            if($active_status==1)
            {   
                $_SESSION['user_id'] = $row['User_Id'];
                $username = $row['Name']; 
                setcookie('success', "Welcome, $username!", time() + 5, "/");
                echo "<script> location.href='index.php';</script>";
            }
            else 
            {
                setcookie('error', "Your account is deactivate! Activate it!", time() + 5, "/");
                echo "<script> location.href='otp-page.php?resend_otp=submit';</script>";
            }
        }
        else{
            setcookie('error', "Wrong email or password!", time() + 5, "/");
            echo "<script> location.href='login.php';</script>";
        }
?>
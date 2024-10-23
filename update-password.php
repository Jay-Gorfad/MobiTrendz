<?php
include 'DB/connection.php'; 

    $curr = $_POST['current'];
    $new = $_POST['new'];
    $query = "select * from user_details_tbl where User_Id=" . $_SESSION['user_id'];
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
        if ($curr == $user['Password']) {
            $sql = "UPDATE user_details_tbl SET Password='$new' WHERE User_Id='$_SESSION[user_id]'";
            if (mysqli_query($con, $sql)) {
                setcookie("success","Profile updated successfully",time()+5,"/");
                echo "<script>
                        window.location.href = 'account.php';
                      </script>";
            } else {
                setcookie("error","Profile updated failed",time()+5,"/");
                echo "Error updating profile: " . mysqli_error($con);
          }
        } else {
            setcookie('error', 'Password does not matched.', time() + 5, "/");
            echo "<script> location.replace('account.php');</script>";
        }
    

    

?>

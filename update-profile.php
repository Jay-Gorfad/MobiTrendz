<?php
include 'DB/connection.php'; 

    $userId = $_SESSION['user_id'];
    $old_image = $_POST['old_image'];
    $new_image = $_FILES['user_image']['name'];
    $fullname =  $_POST['firstName'] . " " . $_POST['lastName'];

    if ($new_image) {
        $image = uniqid() . "_" . $new_image;
        move_uploaded_file($_FILES['user_image']['tmp_name'], "img/users/" . $image);
        if (!empty($old_image) && file_exists("img/users/" . $old_image)) {
            if($old_image!='default-img.png')
            unlink("img/users/" . $old_image);
        }
    } else {
        $image = $old_image;
    }

    $sql = "UPDATE user_details_tbl 
            SET Name = '$fullname', Profile_Picture = '$image' 
            WHERE User_Id = $userId";

    if (mysqli_query($con, $sql)) {
        setcookie("success","Profile updated successfully",time()+5,"/");
        echo "<script>
                window.location.href = 'account.php';
              </script>";
    } else {
        setcookie("error","Profile updated failed",time()+5,"/");

        echo "Error updating profile: " . mysqli_error($con);
  }

?>

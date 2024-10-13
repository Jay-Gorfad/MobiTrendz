<?php
    include "../DB/connection.php";

    $review_id = $_POST['review_id'];
    $updated_reply = mysqli_real_escape_string($con, $_POST['reply']);

    $query = "UPDATE review_details_tbl SET Review='$updated_reply' WHERE Review_Id=$review_id";

    if (mysqli_query($con, $query)) {
        echo "<script>location.href='reviews.php';</script>";
    } else {
        echo "Error updating reply: " . mysqli_error($con);
    }

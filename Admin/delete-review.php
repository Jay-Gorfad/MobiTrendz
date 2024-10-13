<?php
    include "../DB/connection.php";
    $query = "delete from review_details_tbl where Review_Id=" . $_GET["review_id"];
    if(mysqli_query($con,$query))
    {
        echo "<script>location.href='reviews.php';</script>";
    }
    else{
        echo mysqli_error($con);
    }
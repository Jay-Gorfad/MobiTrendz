<?php
    include "../DB/connection.php";
    $query = "delete from responses_tbl where Response_Id=" . $_GET["response_id"];
    if(mysqli_query($con,$query))
    {
        echo "<script>location.href='responses.php';</script>";
    }
    else{
        echo mysqli_error($con);
    }
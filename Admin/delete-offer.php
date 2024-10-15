<?php
    include "../DB/connection.php";
    $query = "delete from offer_details_tbl where Offer_Id = ".$_GET["offer_id"];
    if(mysqli_query($con,$query))
    {
        echo "<script>
                location.href='offers.php';
            </script>";
        exit();
    }
    else{
        echo mysqli_error($con);
    }
<?php

$con = mysqli_connect("localhost","root","","mobitrendz");
session_start();

$currentDate = date('Y-m-d');

$updateActiveStatus = "
    UPDATE offer_details_tbl
    SET active_status = 1
    WHERE Start_Date <= '$currentDate' AND End_Date >= '$currentDate';
";

$updateInactiveStatus = "
    UPDATE offer_details_tbl
    SET active_status = 0
    WHERE End_Date < '$currentDate' OR Start_Date > '$currentDate' ;
";

mysqli_query($con, $updateActiveStatus);
mysqli_query($con, $updateInactiveStatus);
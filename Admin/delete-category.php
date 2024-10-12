<?php
    require "../DB/connection.php";
    $category_id = $_GET['category_id'];
    $query = "delete from category_details_tbl where category_id=$category_id";
    $sql=mysqli_query($con,$query);

    if($sql){
        ?>
        <script>
            window.location.href='categories.php';
        </script>
        <?php
    }
    else{
        echo mysqli_error($con);  
    } 
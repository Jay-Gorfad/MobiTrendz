<?php include('header.php');

$query = "SELECT Content FROM `about_page_details_tbl`";
    $result = mysqli_query($con, $query);
    $content = mysqli_fetch_assoc($result);

?>
<div class="container sitemap mt-5">
    <p>
        <a href="index.php" class="text-decoration-none dim link">Home /</a>
        <a href="about.php" class="text-decoration-none dim link">About /</a>
    </p>
    <div class="about row justify-content-center">
        <div class="col-lg-12">
            <?php echo $content["Content"]; ?>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
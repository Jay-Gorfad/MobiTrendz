<?php
session_start();
include "../DB/connection.php"; // Make sure the path is correct

if (isset($_POST['review_id']) && isset($_POST['reply'])) {
    $review_id = $_POST['review_id'];
    $reply = $_POST['reply'];
    $admin_id = $_SESSION['user_id']; // Assuming admin ID is stored in the session

    // Insert reply to the review
    $stmt = $con->prepare("INSERT INTO review_details_tbl (Reply_To, Product_Id, User_Id, Review, Review_Date) 
                           SELECT ?, Product_Id, ?, ?, NOW() FROM review_details_tbl WHERE Review_Id = ?");
    $stmt->bind_param('iisi', $review_id, $admin_id, $reply, $review_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Reply added successfully.');
            location.href='product-details.php?product_id=" . $_GET['product_id'] . "';
        </script>";
    } else {
        echo "<script>
            alert('Error adding reply: " . mysqli_error($con) . "');
        </script>";
    }
    
    $stmt->close();
    $con->close();
} else {
    echo "<script>alert('Invalid request.');</script>";
}
?>
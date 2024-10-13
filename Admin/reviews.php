<?php include("sidebar.php"); 
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';

if (!empty($search)) {
    $search_query = "WHERE r.Rating LIKE '%$search%' OR r.Review LIKE '%$search%' OR p.Product_Name LIKE '%$search%' OR u.Name LIKE '%$search%'";
}

$query = "
    SELECT 
        r.Review_Id, r.Rating, r.Review, r.Review_Date, 
        p.Product_Id, p.Product_Name, p.Product_Image, 
        u.User_Id, u.Name,
        r1.Review_Id as 'Reply_Id', r1.Review as 'Reply' 
    FROM review_details_tbl r
    JOIN product_details_tbl p ON r.Product_Id = p.Product_Id
    JOIN user_details_tbl u ON r.User_Id = u.User_Id
    left join review_details_tbl r1 on r.Review_Id = r1.Reply_To 
    $search_query
";

$result = mysqli_query($con, $query);
$total_records = mysqli_num_rows($result);

$records_per_page = 10;
$total_pages = ceil($total_records / $records_per_page);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

$query .= " LIMIT $start_from, $records_per_page";
$result = mysqli_query($con, $query);
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <div>
                <h1 class="mt-4">Review Management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reviews</li>
                </ol>
            </div>
            <a class="btn btn-primary text-nowrap" href="add-review.php">Add Review</a>
        </div>
        <div class="card-body">
            <table class="table border text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Username</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result)) 
                    {
                        while($review = mysqli_fetch_assoc($result))
                        {
                            $Name = $review['Name'];
                            ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../img/items/products/<?php echo $review['Product_Image']; ?>" alt="<?php echo $review['Product_Name']; ?>" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                        <a href="view-product.php?product_id=<?php echo $review['Product_Id']; ?>"><?php echo $review['Product_Name']; ?></a>
                                    </div>
                                </td>
                                <td><a href="user-profile.php?user_id=<?php echo $review['User_Id']; ?>"><?php echo $Name; ?></a></td>
                                <td style="width: 100px;">
                                    <span class="text-warning">
                                        <?php
                                        for($i = 0; $i < 5; $i++) {
                                            echo ($i < $review['Rating']) ? "&#9733;" : "&#9734;";
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td style="max-width: 250px;" class="text-wrap"><?php echo $review['Review']; ?></td>
                                <td>
                                    <div class="d-flex flex-nowrap">
                                        <button class="btn btn-primary btn-sm me-2 <?php echo isset($review['Reply_Id'])?'d-none':''; ?>" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $review['Review_Id']; ?>">Reply</button>
                                        <a class="btn btn-info btn-sm" href="update-review.php?review_id=<?php echo $review['Review_Id']; ?>">Update</a>
                                        <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $review['Review_Id']; ?>">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Reply Modal -->
                            <div class="modal fade" id="replyModal<?php echo $review['Review_Id']; ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="replyModalLabel">Reply to Review</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="review-reply.php" method="post">
                                                <div class="mb-3">
                                                    <input type="hidden" name="review_id" value="<?php echo $review["Review_Id"]; ?>">
                                                    <label for="reviewReply" class="form-label">Your Reply</label>
                                                    <textarea class="form-control" id="reviewReply" rows="3" name="reply"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Send Reply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal<?php echo $review['Review_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this review? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="delete-review.php?review_id=<?php echo $review['Review_Id']; ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                if(isset($review['Reply_Id']))
                                {
                                    $reply_text = $review["Reply"];
                                ?>
                                    <tr>
                                        <td>Reply:</td>
                                        <td colspan="3"><?php echo $reply_text; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $review['Reply_Id']; ?>">Update</button>
                                            <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $review['Reply_Id']; ?>">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Update Modal -->
                                    <div class="modal fade" id="updateModal<?php echo $review['Reply_Id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalLabel">Update Reply</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update-reply.php" method="post">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="review_id" value="<?php echo $review['Reply_Id']; ?>">
                                                            <label for="reviewReply" class="form-label">Your Reply</label>
                                                            <textarea class="form-control" id="reviewReply" rows="3" name="reply"><?php echo $reply_text; ?></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update Reply</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?php echo $review['Reply_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this review? This action cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="delete-review.php?review_id=<?php echo $review['Reply_Id']; ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                    }
                    else 
                    {
                        echo "<td colspan='5'>No reviews found!</td>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php 
                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."&search=" . $search . "''>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . $search . "'>" . $i . "</a></li>";
                            }
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."&search=" . $search . "''>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div> 
        </div>
    </div>
<?php include("footer.php"); ?> 

<?php include("sidebar.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';

if (!empty($search)) {
    $search_query = "WHERE CONCAT(First_Name, ' ', Last_Name) LIKE '%$search%' 
                      OR Email LIKE '%$search%' 
                      OR Phone LIKE '%$search%' 
                      OR Message LIKE '%$search%'";
}

$query = "SELECT `Response_Id`, CONCAT(First_Name, ' ', Last_Name) AS Full_Name, `Email`, `Phone`, `Message` FROM `responses_tbl` $search_query";
$result = mysqli_query($con, $query);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Responses</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="Index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Responses</li>
                    </ol>
                </div>
                <!-- Search Form -->
                <form action="" method="get" class="d-flex">
                    <input type="text" class="form-control me-2" name="search" value="<?php echo $search; ?>" placeholder="Search Responses">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <div class="card-body">
                <?php 
                    if(mysqli_num_rows($result)) {
                ?>
                <table class="table border">
                    <thead class="table-light">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($response = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $response["Full_Name"]; ?></td>
                            <td><?php echo $response["Email"]; ?></td>
                            <td><?php echo $response["Phone"]; ?></td>
                            <td><?php echo $response["Message"]; ?></td>
                            <td>
                                <div class="d-flex flex-nowrap">
                                    <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $response["Response_Id"]; ?>">Reply</button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $response["Response_Id"]; ?>">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Reply Modal -->
                        <div class="modal fade" id="replyModal<?php echo $response["Response_Id"]; ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="replyModalLabel">Reply to Response</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="response-reply.php" method="POST">
                                            <div class="mb-3">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Message</label>
                                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                                            </div>
                                            <input type="hidden" name="email_id" value="<?php echo $response["Email"]; ?>">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal<?php echo $response["Response_Id"]; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this response? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="delete-response.php?response_id=<?php echo $response["Response_Id"]; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                <?php
                    } else {
                        echo "<h3>There is no response to display!</h3>";
                    }
                ?>
            </div>
        </div>
    </main>

<?php include("footer.php"); ?>

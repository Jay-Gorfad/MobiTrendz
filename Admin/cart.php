<?php include "sidebar.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <?php
                    if (isset($_GET['user_id'])) {
                        $userId = intval($_GET['user_id']); // Sanitize input

                        // Optional: Fetch user details if needed
                        $stmt = $con->prepare("SELECT Name AS full_name FROM user_details_tbl WHERE User_Id = ?");

                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $userResult = $stmt->get_result();

                        if ($userResult && $userResult->num_rows > 0) {
                            $userRow = $userResult->fetch_assoc();
                            $fullName = $userRow['full_name'];
                            echo "<h1>Cart of $fullName</h1>";
                        } else {
                            echo "<h1>User Not Found</h1>";
                        }
                    }
                    ?>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
                <a class="btn btn-primary text-nowrap" href="add-cart.php?user_id=<?php echo $userId; ?>">Add Items</a>
            </div>

            <div class="card-body">
                <table class="table border text-nowrap align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch cart items
                        $stmt = $con->prepare("SELECT 
                            p.Product_Image, 
                            p.Product_Id, 
                            p.Product_Name, 
                            c.Quantity, 
                            p.Sale_Price - (p.Sale_Price * p.Discount / 100) AS Price 
                            FROM cart_details_tbl c
                            JOIN product_details_tbl p ON c.Product_Id = p.Product_Id
                            WHERE c.User_Id = ?");
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $cartResult = $stmt->get_result();

                        if ($cartResult && $cartResult->num_rows > 0) {
                            while ($cartRow = $cartResult->fetch_assoc()) {
                                $productId = $cartRow['Product_Id'];
                                $productName = $cartRow['Product_Name'];
                                $quantity = $cartRow['Quantity'];
                                $price = $cartRow['Price'];
                                $total = $quantity * $price;
                                $productImage = $cartRow["Product_Image"];

                                echo "
                                    <tr>
                                        <td>
                                            <div class='d-flex align-items-center'>
                                                <img src='../img/items/products/$productImage' alt='$productName' class='me-2' style='width: 50px; height: 50px; object-fit: cover;'>
                                                <a href='view-product.php?product_id=$productId'>$productName</a>
                                            </div>
                                        </td>
                                        <td>$quantity</td>
                                        <td>₹$price</td>
                                        <td>₹$total</td>
                                        <td>
                                            <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$productId'>Remove</a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class='modal fade' id='deleteModal$productId' tabindex='-1' aria-labelledby='deleteModalLabel$productId' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title'>Confirm Removal</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    Are you sure you want to remove <strong>$productName</strong> from the cart? This action cannot be undone.
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                    <a href='remove-cart-item.php?product_id=$productId&user_id=$userId' class='btn btn-danger'>Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No items in the cart.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>

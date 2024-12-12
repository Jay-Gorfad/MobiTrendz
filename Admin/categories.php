<?php include("sidebar.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';

if (!empty($search)) {
    $search_query = " WHERE category.category_name LIKE '%$search%' 
                      OR parent_category.category_name LIKE '%$search%'";
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Categories</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
                <a class="btn btn-primary text-nowrap" href="add-category.php">Add Category</a>
            </div>
            
            <?php if (get_categories_count($con, $search_query)) { ?>
            <div class="card-body">
                <form method="get" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" class="form-control" placeholder="Search categories...">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Parent Category</th>
                            <th>Products Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php display_categories($con, $search_query); ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
            <h3 class="text-center">There are no categories to display!</h3>
            <?php } ?>
        </div>
    </main>
<?php include("footer.php"); ?>

<?php
// Function to get the count of categories
function get_categories_count($con, $search_query) {
    $query = "SELECT COUNT(*) AS category_count 
              FROM category_details_tbl AS category 
              LEFT JOIN category_details_tbl AS parent_category 
              ON category.parent_category_id = parent_category.category_id $search_query";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['category_count'];
}

// Function to display categories
function display_categories($con, $search_query) {
    $query = "SELECT category.category_id, 
                     category.category_name, 
                     parent_category.category_name AS parent_category_name, 
                     COUNT(product.product_id) AS products_count 
              FROM category_details_tbl AS category 
              LEFT JOIN category_details_tbl AS parent_category 
              ON category.parent_category_id = parent_category.category_id 
              LEFT JOIN product_details_tbl AS product 
              ON product.category_id = category.category_id 
              $search_query 
              GROUP BY category.category_id, category.category_name, parent_category.category_name";
    $result = mysqli_query($con, $query);

    while ($category = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $category['category_id']; ?></td>
            <td><?php echo $category['category_name']; ?></td>
            <td><?php echo empty($category['parent_category_name']) ? 'None' : $category['parent_category_name']; ?></td>
            <td><?php echo $category['products_count']; ?></td>
            <td>
                <div class="d-flex flex-nowrap">
                    <a class="btn btn-success btn-sm me-1" href="update-category.php?categoryId=<?php echo $category['category_id']; ?>">Edit</a>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $category['category_id']; ?>">Delete</button>
                </div>
            </td>
        </tr>
        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal<?php echo $category['category_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this category? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="delete-category.php?category_id=<?php echo $category['category_id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
?>

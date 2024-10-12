<?php include("sidebar.php") ?>
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
                        <?php
                        if(get_categories_count($con)){
                        ?>
                        <div class="card-body">
                            <table class="table border text-nowrap">
                                <thead class="table-light">
                                    <tr class="text-nowrap">
                                        <th>Category ID</th>
                                        <th>Category Name</th>
                                        <th>Parent Category</th>
                                        <th>Products Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <?php display_categories($con); ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                            </nav>
                        </div>

                        <?php
                        }
                        else
                        {
                        ?>
                            <h3 class="text-center">Thare are no categories!</h3>
                        <?php
                        }
                        ?>
                        
                    </div>
                </main>
<?php include("footer.php") ?>


<?php 
    function get_categories_count($con){
        $query = "select count(*) from category_details_tbl";
        $result = mysqli_query($con,$query);
        $category_count = mysqli_fetch_array($result);
        return $category_count[0];
    }
    function display_categories($con){
        $query = "select category.category_id, category.category_name, parent_category.category_name as 'parent_category_name',  count(product.product_id) as 'products_count' from category_details_tbl as category left join category_details_tbl as parent_category  on category.parent_category_id = parent_category.category_id left join  product_details_tbl as product  on product.category_id = category.category_id group by  category.category_id, category.category_name, parent_category.category_name;";
        $result = mysqli_query($con,$query);
        while($category = mysqli_fetch_assoc($result))
        {
        ?>
             <tr>
                <td><?php echo $category['category_id'] ?></td>
                <td><?php echo $category['category_name'] ?></td>
                <td><?php echo $category['parent_category_name']==''?'None':$category['parent_category_name'] ?></td>
                <td><?php echo $category['products_count'] ?></td>
                <td>
                    <div class="d-flex flex-nowrap">
                        <a class="btn btn-success btn-sm me-1" href="update-category.php?categoryId=<?php echo $category['category_id'] ?>">Edit</a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $category['category_id'] ?>">Delete</button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="deleteModal<?php echo $category['category_id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                            <a href="delete-category.php?category_id=<?php echo $category['category_id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
?>
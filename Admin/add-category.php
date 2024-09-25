<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="POST" onsubmit="return validateAddCategoryForm()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name">
                                <div id="categoryNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parentCategory" class="form-label">Parent Category</label>
                                <select class="form-select" id="parentCategory" name="parent_category">
                                    <option value="" disabled selected>Select a parent category</option>
                                    <option value="None">None</option>
                                    <option value="Fruits and Vegetables">Desktop Replacement</option>
                                    <option value="Dairy and Eggs">Gaming</option>
                                    <option value="Bakery">Lightweight</option>
                                </select>
                                <div id="parentCategoryError" class="error-message"></div>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>

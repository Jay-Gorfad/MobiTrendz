<?php include "sidebar.php"; ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="add-category.php" method="POST" onsubmit="return validateAddCategoryForm()">
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
                                    <option value="-">None</option>
                                    <?php display_category_names($con); ?>
                                </select>
                                <div id="parentCategoryError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="add-category">Add Category</button>
                </form>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>
<?php
    if(isset($_POST["add-category"])){
        $category_name = $_POST["category_name"];
        $parent_category = $_POST["parent_category"];

        $query = $parent_category=="-"?
        "INSERT INTO `category_details_tbl` (`Category_Name`) VALUES ('$category_name')":
        "INSERT INTO `category_details_tbl` (`Category_Name`, `Parent_Category_Id`) VALUES ('$category_name',$parent_category)";

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
        
    }
    function display_category_names($con){
        $query = "SELECT Category_Id,Category_Name FROM category_details_tbl where Parent_Category_Id IS NULL";
        $result=mysqli_query($con,$query);
        while($category= mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $category["Category_Id"]?>">
                <?php echo $category["Category_Name"]?>
            </option>
            <?php
        }
    }
?>

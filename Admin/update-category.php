<?php 

include("sidebar.php"); 

$categoryId = $_GET["categoryId"];
if($categoryId)
{
    $query = "select * from category_details_tbl where Category_Id=$categoryId";
    $result = mysqli_query($con,$query);
    $main_category = mysqli_fetch_assoc($result);
}
function display_category_names($con,$main_category){
    $query = "SELECT Category_Id,Category_Name FROM category_details_tbl where Parent_Category_Id IS NULL";
    $result=mysqli_query($con,$query);
    while($category= mysqli_fetch_assoc($result)){
        ?>
        <option value="<?php echo $category["Category_Id"]?>" <?php echo $main_category["Parent_Category_Id"]==$category["Category_Id"]?"selected":""; ?> >
            <?php echo $category["Category_Name"]?>
        </option>
        <?php
    }
}
?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Category</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="update-category.php" method="POST" onsubmit="return validateAddCategoryForm()">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="categoryId" value="<?php if(isset($_GET['categoryId'])) echo $_GET['categoryId']?>" >
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name" value="<?php echo $main_category['Category_Name']; ?>">
                                <div id="categoryNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parentCategory" class="form-label">Parent Category</label>
                                <select class="form-select" id="parentCategory" name="parent_category">
                                    <option value="" disabled>Select a parent category</option>
                                    <option value="-" selected>None</option>
                                    <?php display_category_names($con,$main_category); ?>
                                </select>
                                <div id="parentCategoryError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update">Update Category</button>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php"); 

if (isset($_POST["update"])) {
    $categoryId = $_POST["categoryId"];
    $categoryName =$_POST["category_name"];
    $parentCategoryId =$_POST["parent_category"];
    
    $query = $parentCategoryId=== '-' ?"UPDATE category_details_tbl SET Category_Name = '$categoryName', Parent_Category_Id = NULL WHERE Category_Id = '$categoryId'": "UPDATE category_details_tbl SET Category_Name = '$categoryName', Parent_Category_Id = '$parentCategoryId' WHERE Category_Id = '$categoryId'";

    if (mysqli_query($con, $query)) {
        echo "<script>window.location.href='categories.php';</script>";
    } else {
        echo "Error updating category: " . mysqli_error($con);
    }
}
?>




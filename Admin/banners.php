<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4 w-100">
                <div>
                    <h1>Banner Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Banners</li>
                    </ol>
                </div>
                <a class="btn btn-primary ms-auto" href="add-banner.php">Add Banner</a>
            </div>

            <div class="card-body">
                <table class="table border">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>View Order</th>
                            <th>URL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="path/to/banner1.jpg" alt="Banner 1" width="100"></td>
                            <td>1</td>
                            <td><a href="https://example.com/banner1">https://example.com/banner1</a></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">Active</a>
                                <a href="#" class="btn btn-sm btn-secondary ms-2">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="path/to/banner2.jpg" alt="Banner 2" width="100"></td>
                            <td>2</td>
                            <td><a href="https://example.com/banner2">https://example.com/banner2</a></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">Inactive</a>
                                <a href="#" class="btn btn-sm btn-secondary ms-2">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
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
        </div>
    </main>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this banner? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="delete_banner_handler.php" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>

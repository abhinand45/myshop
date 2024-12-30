<!-- resources/views/categories/index.php -->

<!DOCTYPE html>
<?php
include('helper.php');
$categories = get_category()
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Categories</h2>
        <button href="categories/create.php" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createCategory">Add New Category</button>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categories as $index => $category):
                        ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($category['name']); ?></td>
                                <td><?php echo htmlspecialchars($category['description']); ?></td>
                                <td>
                                    <a href="categories/create.php" class="btn btn-warning btn-sm edit-category"
                                        data-id="<?php echo $category['id']; ?>"
                                        data-name="<?php echo htmlspecialchars($category['name']); ?>"
                                        data-description="<?php echo htmlspecialchars($category['description']); ?>"
                                        data-toggle="modal"
                                        data-target="#updateCategory">Edit</a>

                                    <form action="delete.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Create Modal-->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="createCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryLabel">Category Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm" action="categories/router.php" method="post">
                        <div class="form-group">
                            <label for="txtname">Name</label>
                            <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="txtdes">Description</label>
                            <textarea class="form-control" name="txtdes" id="txtdes" placeholder="Description" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- Save button triggers form submission -->
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--Create Modal-->

    <!-- Modal -->
    <!-- Update Modal -->
    <div class="modal fade" id="updateCategory" tabindex="-1" aria-labelledby="updateCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCategoryLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateCategoryForm" action="categories/router.php" method="POST">
                        <input type="hidden" name="id" id="categoryId">
                        <div class="form-group">
                            <label for="updateCategoryName">Name</label>
                            <input type="text" class="form-control" name="txtname" id="updateCategoryName" required>
                        </div>
                        <div class="form-group">
                            <label for="updateCategoryDescription">Description</label>
                            <textarea class="form-control" name="txtdes" id="updateCategoryDescription" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitUpdateForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Modal -->

    <!--Create Modal-->

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript to trigger form submission -->
    <script>
        // JavaScript to populate the modal with data from the clicked category
        document.addEventListener('DOMContentLoaded', function() {
            const editLinks = document.querySelectorAll('.edit-category');
            console.log(editLinks)

            editLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Get data attributes from the clicked link
                    const categoryId = this.getAttribute('data-id');
                    const categoryName = this.getAttribute('data-name');
                    const categoryDescription = this.getAttribute('data-description');


                    // Set the values in the modal
                    document.getElementById('categoryId').value = categoryId;
                    document.getElementById('updateCategoryName').value = categoryName;
                    document.getElementById('updateCategoryDescription').value = categoryDescription;
                });
            });
        });

        // Function to submit the update form
        function submitUpdateForm() {
            document.getElementById("updateCategoryForm").submit();
        }


        function submitForm() {
            document.getElementById("categoryForm").submit();
        }
    </script>
</body>

</html>
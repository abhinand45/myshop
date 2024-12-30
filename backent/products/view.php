
<!DOCTYPE html>
<?php
include('helper.php');
$products = get_products();
$categories = get_category(); 
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Products</h2>
        <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createproducts">Add New Product</a>

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
                            <th>Category ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $index => $product): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($product['category_id']); ?></td>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo htmlspecialchars($product['description']); ?></td>
                                <td><?php echo htmlspecialchars($product['price']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($product['image_url']); ?>" width="50" height="50" alt="Product Image"></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm edit-product"
                                        data-id="<?php echo $product['category_id']; ?>"
                                        data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                        data-description="<?php echo htmlspecialchars($product['description']); ?>"
                                        data-price="<?php echo htmlspecialchars($product['price']); ?>"
                                        data-image="<?php echo htmlspecialchars($product['image_url']); ?>"
                                        data-toggle="modal"
                                        data-target="#updateproducts">Edit</a>
                                    <form action="delete.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Product Modal -->
    <div class="modal fade" id="createproducts" tabindex="-1" aria-labelledby="createproductsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createproductsLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="productForm" action="products/router.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="txtname">Name</label>
                            <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="txtdes">Description</label>
                            <textarea class="form-control" name="txtdes" id="txtdes" placeholder="Product Description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="txtprice">Price</label>
                            <input type="text" class="form-control" name="txtprice" id="txtprice" placeholder="Product Price" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>

                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image_url">Image</label>
                            <input type="file" class="form-control" name="image_url" id="image_url" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Update Product Modal -->
    <div class="modal fade" id="updateproducts" tabindex="-1" aria-labelledby="updateproductsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateproductsLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateProductForm" action="products/router.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="ProductId" name="id">
                        <div class="form-group">
                            <label for="updateProductName">Name</label>
                            <input type="text" class="form-control" id="updateProductName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="updateProductDescription">Description</label>
                            <textarea class="form-control" id="updateProductDescription" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="updateProductPrice">Price</label>
                            <input type="text" class="form-control" id="updateProductPrice" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="updateCategory">Category</label>
                            <select class="form-control" name="category" id="updateCategory" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="updateProductImage">Image</label>
                            <input type="file" class="form-control" id="updateProductImage" name="image_url">
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to handle modal form submission -->
    <script>
        // Populate the Update modal with product data
        document.addEventListener('DOMContentLoaded', function() {
            const editLinks = document.querySelectorAll('.edit-product');

            editLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Get data attributes from the clicked link
                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-name');
                    const productDescription = this.getAttribute('data-description');
                    const productPrice = this.getAttribute('data-price');
                    const productImage = this.getAttribute('data-image');

                    // Set the values in the update modal
                    document.getElementById('ProductId').value = productId;
                    document.getElementById('updateProductName').value = productName;
                    document.getElementById('updateProductDescription').value = productDescription;
                    document.getElementById('updateProductPrice').value = productPrice;
                });
            });
        });

        // Submit the Create form
        function submitForm() {
            document.getElementById("productForm").submit();
        }

        // Submit the Update form
        function submitUpdateForm() {
            document.getElementById("updateProductForm").submit();
        }
    </script>
</body>

</html>
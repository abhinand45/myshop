<!DOCTYPE html>
<?php
include('helper.php');
$cat_data = get_category();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <!-- Add any required CSS or JS here -->
</head>
<body>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <p class="card-description">Fill in the details to add a new product.</p>
                <form class="forms-sample" action="products/router.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                          <?php 
                          foreach ($cat_data as $item) {
                          ?>
                        <option value="<?php echo htmlspecialchars($item['id']); ?>"><?php echo htmlspecialchars($item['name']); ?></option>
                          <?php 
                          }
                          ?> 
                        </select>
                    </div>
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
                        <label for="image_url">Image</label>
                        <input type="file" class="form-control" name="image_url" id="image_url" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

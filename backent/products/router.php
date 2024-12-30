<?php
include('helper.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if we are updating a product
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $category_id = $_POST['category'];
        $name = $_POST['txtname'];
        $description = $_POST['txtdes'];
        $price = $_POST['txtprice'];
        $image_url = isset($_FILES['image_url']) ? $_FILES['image_url'] : null;
        $image_url_path = null;

        // Handle image upload if a new file is uploaded
        if ($image_url && $image_url['error'] === UPLOAD_ERR_OK) {
            $dest = "../products/images/" . basename($image_url['name']);
            $source = $image_url['tmp_name'];

            if (move_uploaded_file($source, $dest)) {
                $image_url_path = $dest; // Set the path for the updated image
            } else {
                $_SESSION['error'] = "Error: Failed to move the uploaded file.";
            }
        }

        // Update the product (use existing image if not updating)
        if (update_product($id, $category_id, $name, $description, $price, $image_url_path ?? '')) {
            $_SESSION['success'] = "Product updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update product.";
        }
    } else {
        // Create a new product
        $category_id = $_POST['category'];
        $name = $_POST['txtname'];
        $description = $_POST['txtdes'];
        $price = $_POST['txtprice'];
        $image_url = isset($_FILES['image_url']) ? $_FILES['image_url'] : null;

        if ($image_url && $image_url['error'] === UPLOAD_ERR_OK) {
            $dest = "../products/images/" . basename($image_url['name']);
            $source = $image_url['tmp_name'];

            if (move_uploaded_file($source, $dest)) {
                // File moved successfully, proceed with product creation
                if (create_products($category_id, $name, $description, $price, $dest)) {
                    $_SESSION['success'] = "Product created successfully.";
                } else {
                    $_SESSION['error'] = "Failed to create product.";
                }
            } else {
                $_SESSION['error'] = "Error: Failed to move the uploaded file.";
            }
        } else {
            $_SESSION['error'] = "Error: Invalid file upload.";
        }
    }

    // Redirect back to products page
    header('Location: http://localhost/myshop/backent/index.php?page=products');
    exit();
} else {
    // If not a POST request, redirect to products page
    header('Location: http://localhost/myshop/backent/index.php?page=products');
    exit();
}

$category_name = isset($_GET['category_name']) ? $_GET['category_name'] : null;


// Get the product ID from the URL

//  add_to_cart //

session_start();

$user_id = $_SESSION['user_id']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if ($product_id && $quantity > 0) {
        $result = add_to_cart($user_id, $product_id, $quantity);

        if ($result) {
            echo "Product added to cart successfully!";
        } else {
            echo "Failed to add product to cart.";
        }
    } else {
        echo "Invalid product or quantity.";
    }
} else {
    echo "Invalid request.";
}





?>

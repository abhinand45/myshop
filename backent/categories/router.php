<?php
include('helper.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['txtname'];
        $description = $_POST['txtdes'];

        if (update_category($id, $name, $description)) {
            $_SESSION['success'] = "Category updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update category.";
        }
    } 
    
    else {
        $name = $_POST['txtname'];
        $description = $_POST['txtdes'];

        if (create_categories($name, $description)) {
            $_SESSION['success'] = "Category created successfully.";
        } else {
            $_SESSION['error'] = "Failed to create category.";
        }
    }
    
    // Redirect back to categories page
    
    header('Location: http://localhost/myshop/backent/index.php?page=categories');
    exit();
} else {
   
    header('Location: http://localhost/myshop/backent/index.php?page=categories');
    exit();
}
?>

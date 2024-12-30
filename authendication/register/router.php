<?php
session_start();
require 'helper.php'; // Include the helper functions

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // Validate form inputs
    if (!empty($name) && !empty($email) && !empty($password)) {
        // Call the helper function to register the user
        $result = register_user($name, $email, $password, $address, $phone);

        if ($result) {
            // Redirect to the login page after successful registration
            header("Location: http://localhost/myshop/authendication/login/login.php");
            exit();
        } else {
            $error_message = "Registration failed. Please try again.";
        }
    } else {
        $error_message = "Please fill in all required fields.";
    }
}

// login routes


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (!empty($email) && !empty($password)) {
        // Call the helper function to login
        $user = login_user($email, $password);

        if ($user) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to user profile or dashboard after login
            header("Location: http://localhost/myshop/authendication/profile/user.php");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "Please fill in both email and password.";
    }
}
?>
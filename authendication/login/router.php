<?php
session_start();
require 'helper.php';

// Initialize email and password variables
$email = $password = "";
$error_message = "";

// Check if the user is already logged in
if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];  // Set the email from session
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate the input
    if (empty($email) || empty($password)) {
        $error_message = "Email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format. Please check the email you entered.";
    } else {
        // Authenticate the user
        if (authenticate_user($email, $password)) {
            // Store user email in session after successful login
            $_SESSION['user_email'] = $email; // Storing email in session
            
            // Redirect to the home page or dashboard
            header("Location: http://localhost/myshop/index.php");
            exit(); // Prevent further script execution after the redirect
        } else {
            $error_message = "Invalid email or password. Please try again.";
        }
    }
}


?>

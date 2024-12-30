<?php
session_start();

// Database connection function
function db_connect() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=myshop2", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $pdo;
    } catch (Exception $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}

// Function to authenticate the admin
function loginAdmin($username, $password) {
    $pdo = db_connect(); 
    if (!$pdo) {
        return false; 
    }

    $sql = "SELECT * FROM admin_users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        // Store admin details in session
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        return true;
    } else {
        return false;
    }
}

// Redirect if already logged in
if (isset($_SESSION['admin_id'])) {
    header("Location: admin_dashboard.php");
    exit;
}

// Handle login request
$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (loginAdmin($username, $password)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

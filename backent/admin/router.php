<?php
include('helper.php'); 

// Handle registration request
$success_message = "";
$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['user_name']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "Username and password are required.";
    } else {
        $pdo = db_connect();
        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin) {
                // Debugging output
                echo "User found: " . htmlspecialchars($admin['username']);
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['username'] = $admin['username'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error_message = "Invalid username or password.";
                }
            } else {
                $error_message = "Invalid username or password.";
            }
        } else {
            $error_message = "Database connection failed.";
        }
    }
}

?>
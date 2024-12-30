<?php


// Function to connect to the database
function db_connect() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=myshop2", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
        return null;
    }
}

// Function to authenticate the user
function authenticate_user($email, $password) {
    $pdo = db_connect();
    if ($pdo) {
        try {
            // Prepare and execute the query to fetch user by email
            $query = "SELECT id, name, password FROM cusers WHERE email = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Store user data in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Handle database error
            error_log("Error authenticating user: " . $e->getMessage());
            return false;
        }
    }
    return false;
}

// Function to fetch user details by user ID
function get_user_details($user_id) {
    $pdo = db_connect();
    if ($pdo) {
        try {
            $query = "SELECT * FROM users WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$user_id]);
            $user_details = $stmt->fetch(PDO::FETCH_ASSOC);

            // Debugging: Output the result to verify
            if ($user_details) {
                return $user_details;
            } else {
                return null;  // No user found
            }
        } catch (PDOException $e) {
            error_log("Error fetching user details: " . $e->getMessage());
            return null;  // Handle the error as needed
        }
    }
    return null;  // Database connection failed
}


?>

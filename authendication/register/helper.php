<?php
// helper.php

// Function to establish a database connection
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

// Function to register a new user
function register_user($name, $email, $password, $address = null, $phone = null) {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $pdo = db_connect();
    if ($pdo) {
        try {
            // Prepare the SQL statement to insert user data
            $sql = "INSERT INTO cusers (name, email, password, address, phone) VALUES (:name, :email, :password, :address, :phone)";
            $stmt = $pdo->prepare($sql);

            // Bind the data
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone', $phone);

            // Execute the query
            $stmt->execute();

            // Return success message or boolean
            return true;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    return false;
}

// login //

function login_user($email, $password) {
    // Connect to the database
    $pdo = db_connect();
    if ($pdo) {
        try {
            // Prepare SQL query to fetch the user based on email
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            // Fetch user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // If user exists, verify the password
            if ($user && password_verify($password, $user['password'])) {
                // If password matches, return user data
                return $user;
            } else {
                // If no match, return false
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    return false;
}

?>

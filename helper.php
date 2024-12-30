<?php
// Function to create a database connection
function db_connect() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=myshop", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
        return null;
    }
}

// Global $pdo variable
$pdo = db_connect();

// Function to insert a product into the database
function product_insert($name, $description, $price, $quandity, $imageUpload) {
    global $pdo; // Use global $pdo
    if ($pdo) {
        try {
            $query = "INSERT INTO product (name, description, price, quandity, imageUpload) 
                      VALUES (:name, :description, :price, :quandity, :imageUpload)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':price' => $price,
                ':quandity' => $quandity,
                ':imageUpload' => $imageUpload
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Error inserting product: " . $e->getMessage();
            return false;
        }
    } else {
        echo "PDO is not initialized.";
        return false;
    }
}

// Function to fetch products from the database
function product_fetch() {
    global $pdo; // Use global $pdo
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM product");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching products: " . $e->getMessage();
            return [];
        }
    } else {
        echo "PDO is not initialized.";
        return [];
    }
}
?>

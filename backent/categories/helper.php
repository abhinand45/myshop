<?php
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

function create_categories($name, $description) {
    $pdo = db_connect();
    if ($pdo) {
        $query = "INSERT INTO categories(name, description) VALUES (:name, :description)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        return $stmt->execute(); 
    } else {
        return false;
    }
}

function get_category() {
    $pdo = db_connect();
    if ($pdo) {
        $query = "SELECT * FROM categories";
        $stmt = $pdo->prepare($query);
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error retrieving categories: " . $e->getMessage();
            return false;
        }
    } else {
        return false;
    }
}

function update_category($id, $name, $description) {
    $pdo = db_connect();
    if ($pdo) {
        $query = "UPDATE categories SET name = :name, description = :description WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute(); 
    } else {
        return false;
    }
}

function delete_category($id) {
    $pdo = db_connect();
    if ($pdo) {
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute(); 
    } else {
        return false;
    }
}


?>



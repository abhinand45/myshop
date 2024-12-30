<?php
function db_connect()
{
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=myshop2", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}

// Product insert
function create_products($category_id, $name, $description, $price, $image_url)
{
    $pdo = db_connect();
    if ($pdo) {
        $query = "INSERT INTO products (category_id, name, description, price, image_url) VALUES (:category_id, :name, :description, :price, :image_url)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_url', $image_url);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error inserting product: " . $e->getMessage();
            return false;
        }
    } else {
        return false;
    }
}

function get_category()
{
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

// Fetch products 
function get_products()
{
    $pdo = db_connect();
    if ($pdo) {
        $query = "SELECT * FROM products";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error retrieving products: " . $e->getMessage();
            return false;
        }
    } else {
        return false;
    }
}

// Update product
function update_product($id, $category_id, $name, $description, $price, $image_url)
{
    $pdo = db_connect();
    if ($pdo) {
        $query = "UPDATE products SET category_id = :category_id, name = :name, description = :description, price = :price, image_url = :image_url WHERE id = :id";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_url', $image_url);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error updating product: " . $e->getMessage();
            return false;
        }
    } else {
        return false;
    }
}

// Delete product
function delete_product($id)
{
    $pdo = db_connect();
    if ($pdo) {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error deleting product: " . $e->getMessage();
            return false;
        }
    } else {
        return false;
    }
}

function get_products_by_category($category_name)
{
    $pdo = db_connect();
    if ($pdo) {

        $query = "SELECT p.* 
                  FROM products p 
                  INNER JOIN categories c ON p.category_id = c.id 
                  WHERE c.name = :category_name";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':category_name', $category_name);

        try {

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error retrieving products: " . $e->getMessage();
            return false;
        }
    } else {
        return false;
    }
}

// get product_by_id //

function getProductById($id)
{
    $pdo = db_connect(); // Create a new PDO connection
    if ($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return false; // Handle case where connection fails
    }
}

// cart_count_set //

function set_cart_count(){
    
}


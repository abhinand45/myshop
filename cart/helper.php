<?php


function db_connect()
{
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=myshop2", "root", "");
        return $pdo;
    } catch (Exception $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}
// add_to cart //

function add_to_cart($user_id, $product_id, $quantity)
{
    $pdo = db_connect();
    if ($pdo) {
        $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error adding to cart: " . $e->getMessage();
            return false;
        }
    }
    return false;
}


//  get_cart_products //

function get_cart_products($user_id)
{
    $pdo = db_connect();
    if ($pdo) {
        $query = "SELECT p.name, p.price, p.image_url, c.quantity ,p.id
                  FROM cart c 
                  INNER JOIN products p ON c.product_id = p.id 
                  WHERE c.user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}

// remove cart //

function remove_from_cart($user_id, $product_id)
{
    $pdo = db_connect();
    if ($pdo) {
        $query = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $product_id);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error removing product from cart: " . $e->getMessage();
            return false;
        }
    } else {
        return false;
    }
}

// get_cart_count //

function  get_cart_count($user_id)
{
    $pdo = db_connect();
    if ($pdo) {
        $query = " SELECT SUM(quantity) as total_item FROM cart WHERE user_id = :user_id ";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_item'] ?? 0;
        } catch (Exception  $e) {
            echo "Error getting cart count :" . $e->getMessage();
            return 0;
        }
    }
    return 0;
}


// check out option  

function get_checkout_products($user_id, $product_ids)
{
    $pdo = db_connect();
    if ($pdo) {

        $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
        $query = "SELECT p.name, p.price, p.image_url, c.quantity, p.id
                  FROM cart c 
                  INNER JOIN products p ON c.product_id = p.id 
                  WHERE c.user_id = ? AND c.product_id IN ($placeholders)";

        $stmt = $pdo->prepare($query);

        // Bind the user ID and product IDs
        $stmt->execute(array_merge([$user_id], $product_ids));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}

// clear cart 

function clear_cart($user_id)
{
    $pdo = db_connect();
    $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->execute([$user_id]);
}

//  add oders //

function place_order($user_id, $status, $total, $payment_id, $cart_items) {
    $pdo = db_connect();
    if ($pdo) {
        try {
            $pdo->beginTransaction();

            $query = "INSERT INTO orders (user_id, status, total, payment_id) VALUES (:user_id, :status, :total, :payment_id)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':payment_id', $payment_id);
            $stmt->execute();
            $order_id = $pdo->lastInsertId();

            foreach ($cart_items as $item) {
                save_order_item($order_id, $item['product_id'], $item['quantity']);
            }

            $pdo->commit();
            return true;
        } catch (Exception $e) {
            $pdo->rollBack();
            error_log("Error placing order: " . $e->getMessage());
            return false;
        }
    }
    return false;
}

function save_order_item($order_id, $product_id, $quantity) {
    $pdo = db_connect();
    if ($pdo) {
        $query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':price', $quantity);
    }
}




function get_last_inserted_order_id()
{
    $pdo = db_connect();
    if ($pdo) {
        return $pdo->lastInsertId();
    }
    return null;
}

// function clear_cart($user_id) {
//     $pdo = db_connect(); 
    
//     try {
        
//         $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
//         $stmt->execute([$user_id]);
//     } catch (Exception $e) {
//         echo "Error clearing cart: " . $e->getMessage();
//     }
// }

<?php
include 'helper.php';
session_start();


if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to perform this action.";
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'] ?? null;
    $quantity = $_POST['quantity'] ?? null;


    if ($product_id && $quantity) {
        if (add_to_cart($user_id, $product_id, $quantity)) {
            // Update cart count in session
            $_SESSION['cart_count'] = get_cart_count($user_id);
            header('Location: http://localhost/myshop/cart/cart.php');
            exit();
        } else {
            echo "Failed to add to cart.";
        }
    } else {
        echo "Error: Product ID or Quantity is missing.";
    }
}

// remove from cart  //

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    if (remove_from_cart($user_id, $product_id)) {
        header('Location: http://localhost/myshop/cart/cart.php');
        exit();
    } else {
        echo "Failed to remove product from cart.";
    }
}


// check_out option 

$product_ids = isset($_POST['product_ids']) ? explode(',', $_POST['product_ids']) : [];

// Get product details for checkout

$products = [];
if (!empty($product_ids)) {
    $products = get_checkout_products($_SESSION['user_id'], $product_ids);
}

//  add oders 



// header('Content-Type: application/json');
// session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User is not logged in.']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$payment_id = $data['payment_id'];
$total = $data['total'];
$cart_items = $data['products'];
$user_id = $_SESSION['user_id']; 
$status = 'pending'; 

if (place_order($user_id, $status, $total, $payment_id, $cart_items)) {
    echo json_encode(['success' => true, 'message' => 'Order placed successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to place order.']);
}

?>
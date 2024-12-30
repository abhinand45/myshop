<?php
include 'helper.php';
session_start();

 
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to view the cart.";
    exit();
}

$cart_items = get_cart_products($_SESSION['user_id']);
$_SESSION['cart_count'] = get_cart_count($_SESSION['user_id']);

if (!is_array($cart_items)) {
    $cart_items = [];
}


$user_id = $_SESSION['user_id']; 
$status = 'pending'; 
$total = 0; 
$cart_items = get_cart_products($user_id);
$_SESSION['cart_count'] = get_cart_count($user_id);

if (!is_array($cart_items)) {
    $cart_items = [];
}


foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="../style.css">
    <title>Checkout</title>
</head>

<body>

<?php 
include ('../layouts/header.php');
?>
    <div class="container">
        <div class="order-summary">
            <h2>Order Summary</h2>
            <form id="cart-form" method="POST" action="./router.php">
                <div class="shopping-cart">
                    <?php if (count($cart_items) > 0): ?>
                        <?php foreach ($cart_items as $item): ?>
                            <div class="product" data-product-price="<?php echo $item['price']; ?>">
                                <img src="<?php echo htmlspecialchars('http://localhost/myshop/backent/products/images/' . basename($item['image_url'])); ?>" alt="Product Image" style="width:100px">
                                <p><?php echo $item['name']; ?></p>
                                <p>Price: &dollar;<span class="product-price"><?php echo number_format($item['price'], 2); ?></span></p>
                                <p>Quantity:
                                    <input type="number" class="quantity-input" name="quantity[]" id="quantity-<?php echo $item['id']; ?>" value="<?php echo $item['quantity']; ?>" min="1" data-id="<?php echo $item['id']; ?>" data-price="<?php echo $item['price']; ?>" style="width:40px">
                                </p>
                                <p>Total: &dollar;<span class="product-total"><?php echo number_format($item['price'] * $item['quantity'], 2); ?></span></p>

                                <!-- Remove from cart button -->
                                <form action="./router.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" name="remove" class="r-btn">Remove</button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Your cart is empty.</p>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="checkout-section">
            <div class="total">
                <p>Total Price: &dollar;<span id="total-price">0.00</span></p>
            </div><br>

            <button id="rzp-button1" class="checkout-btn">Pay with Razorpay</button>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const totalPriceElement = document.getElementById('total-price');

            function updateCartTotal() {
                let total = 0;

                quantityInputs.forEach(function(input) {
                    const price = parseFloat(input.getAttribute('data-price'));
                    const quantity = parseInt(input.value);
                    total += price * quantity;
                });

                totalPriceElement.textContent = total.toFixed(2);
            }
            quantityInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    if (input.value < 1) {
                        input.value = 1;
                    }
                    updateCartTotal();
                });
            });

            updateCartTotal();

            // Razorpay payment options

            const options = {
                "key": "rzp_test_ijeXnoyufyNjzH",
                "amount": 0,
                "currency": "INR",
                "name": "MyShop",
                "description": "Order Payment",
                "image": "https://example.com/logo.png",
                "handler": function(response) {
                    if (response.razorpay_payment_id) {
                        alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
                        saveOrderDetails(response.razorpay_payment_id);
                    } else {
                        alert("Payment failed. Please try again.");
                    }
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            document.getElementById('rzp-button1').onclick = function(e) {
                options.amount = parseFloat(totalPriceElement.textContent) * 100;
                const rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();
            };

            function saveOrderDetails(paymentId) {
                const selectedProducts = [];

                quantityInputs.forEach(function(input) {
                    const productId = input.getAttribute('data-id');
                    const quantity = input.value;

                    selectedProducts.push({
                        product_id: productId,
                        quantity: quantity
                    });
                });

                fetch('./save_order.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            payment_id: paymentId,
                            total: totalPriceElement.textContent,
                            products: selectedProducts
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Order saved successfully!");
                            window.location.href = 'http://localhost/myshop/checkout/razorpay-sample-project/success.html';
                        } else {
                            alert("Failed to save order.");
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    </script>
</body>
</html>

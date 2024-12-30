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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="../style.css">
    <title>Shopping Cart</title>
</head>

<body>

    <?php include('../layouts/header.php') ?>

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

            <button id="rzp-button1" class="checkout-btn" onclick="window.location.href='./checkout.php'">checkout option</button>
        </div>
    </div>


    <script>
        // Select quantity inputs and total price element
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const totalPriceElement = document.getElementById('total-price');

        // Function to update the total price
        function updateTotalPrice() {
            let total = 0;

            quantityInputs.forEach(input => {
                const productPrice = parseFloat(input.getAttribute('data-price'));
                const quantity = parseInt(input.value);
                const productTotal = productPrice * quantity;

                // Update product total display
                input.closest('.product').querySelector('.product-total').textContent = productTotal.toFixed(2);

                // Sum up the total
                total += productTotal;
            });

            // Update the order summary total price
            totalPriceElement.textContent = total.toFixed(2);
        }

        // Event listeners for quantity inputs
        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.value < 1) {
                    this.value = 1; // Prevent zero or negative quantity
                }
                updateTotalPrice(); // Update total price on quantity change
            });
        });

        // Initial total price calculation
        updateTotalPrice();

        // Confirmation before removing an item
        const removeButtons = document.querySelectorAll('.r-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                if (!confirm('Are you sure you want to remove this item from your cart?')) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
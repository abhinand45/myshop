<!DOCTYPE html>
<html lang="en">
<?php
include('./backent/products/helper.php');

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($productId > 0) {
    $product = getProductById($productId);

    if (!$product) {

        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid product ID.";
    exit;
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./style.css">
    <!-- Link to your CSS file for styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* General Container Styles */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Row and Column Styles */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 15px;
    }

    .col-lg-12 {
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 15px;
    }

    /* Image Styles */
    .details-image-1 {
        position: relative;
        overflow: hidden;
    }

    .details-image-1 img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    /* Price and Size Styles */
    .price-detail {
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
    }

    .cloth-details-size {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Remove bullet points from all list items */
    ul {
        list-style: none;
        /* Removes bullets from all unordered lists */
        padding: 0;
        /* Removes default padding */
    }

    .size-box ul {
        display: flex;
        /* Use flexbox for horizontal layout of sizes */
        padding: 0;
    }

    .size-box li {
        margin-right: 10px;
    }

    .size-box a {
        padding: 10px 15px;
        border: 1px solid #000;
        border-radius: 5px;
        text-decoration: none;
        color: #000;
        transition: background 0.3s;
    }

    .size-box a:hover {
        background: #000;
        color: #fff;
    }

    /* Quantity Selector Styles */
    .qty-box {
        margin-top: 10px;
    }

    .qty-box input {
        width: 60px;
        text-align: center;
    }

    /* Button Styles */
    .product-buttons {
        margin-top: 20px;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    /* Shipping Information Styles */
    .shipping-order {
        margin-top: 15px;
        display: flex;
        align-items: center;
    }

    .shipping-order img {
        margin-right: 10px;
    }

    /* Social Share Styles */
    .product-social {
        list-style: none;
        /* Removes bullets from social share list */
        padding: 0;
    }

    .product-social li {
        display: inline-block;
        margin-right: 10px;
    }

    .product-social a {
        color: #000;
        font-size: 18px;
        transition: color 0.3s;
    }

    .product-social a:hover {
        color: #007bff;
    }

    .col-lg-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 16.66667%;
    }

    .slick-slider {
        position: relative;
        display: block;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .rounded {
        border-radius: 0.25rem !important;
    }

    .rounded {
        border-radius: 0.25rem !important;
    }

    element.style {
        height: 501.261px;
        padding: 0px;
    }

    .slick-slider .slick-list {
        margin: 0 -12px;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-list {
        position: relative;
        overflow: hidden;
        display: block;
        margin: 0;
        padding: 0;
    }

    .slick-track:before,
    .slick-track:after {
        content: "";
        display: table;
    }

    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }

    .slick-initialized .slick-slide {
        display: block;
    }

    .slick-slide {
        float: left;
        height: 100%;
        min-height: 1px;
        display: none;
    }
</style>

<body>
    <?php
    include('./layouts/header.php')
    ?>

    <div class="row">
        <section>
            <div class="container">
                <div class="row gx-4 gy-5">
                    <div class="col-lg-12 col-12">
                        <div class="details-items">
                            <div class="row g-4">
                                <div class="col-md-6">

                                    <div class="details-image-1 ratio_asos">
                                        <img src="<?php echo htmlspecialchars('http://localhost/myshop/backent/products/images/' . basename($product['image_url'])); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid w-100">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="cloth-details-size">
                                        <div class="details-image-concept">
                                        </div>
                                        <h3 class="name"><?php echo htmlspecialchars($product['name']); ?></h3>
                                        <p class="name"><?php echo htmlspecialchars($product['description']); ?></p>
                                        <p class="price-detail">&dollar;<?php echo htmlspecialchars($product['price']); ?></p>

                                        <div id="selectSize" class="products$products-description border-product">
                                            <h6 class="product-title size-text" style="margin: revert;">Select Size</h6>
                                            <div class="size-box">
                                                <ul>
                                                    <li><a href="javascript:void(0)">S</a></li>
                                                    <li><a href="javascript:void(0)">M</a></li>
                                                    <li><a href="javascript:void(0)">L</a></li>
                                                    <li><a href="javascript:void(0)">XL</a></li>
                                                </ul>
                                            </div>

                                            <h6 class="product-title product-title-2 d-block" style="margin: revert;">Quantity</h6>
                                            <div class="qty-box">
                                                <input type="number" name="quantity" id="quantity" class="form-control input-number" value="1" min="1">
                                            </div>
                                        </div>

                                        <div class="product-buttons">
                                            <form action="./cart/router.php" method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <a href="./cart/router.php">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add To Cart</span>
                                                </a>
                                            </form>
                                            <!-- <form action="./cart/router.php" method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <a href="./cart/router.php" class="btn btn-solid">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <span>Add To Cart</span>
                                                </a> -->

                                            <!-- <a href="./cart/cart.php" class="btn btn-solid">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add To Cart</span>
                                            </a> -->
                                        </div>

                                        <ul class="shipping-order">
                                            <li><img src="#" class="img-fluid blur-up lazyload" alt="image"><span class="lang">Free shipping for orders above $500 USD</span></li>
                                        </ul>

                                        <div class="border-product">
                                            <h6 class="product-title d-block">Share it</h6>
                                            <div class="product-icon">
                                                <ul class="product-social">
                                                    <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
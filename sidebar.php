<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome for icons -->
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1200px;
        padding: 20px;
    }

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

    .details-image-1 {
        position: relative;
        overflow: hidden;
    }

    .details-image-1 img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

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

    ul {
        list-style: none;
        padding: 0;
    }

    .size-box ul {
        display: flex;
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

    .qty-box {
        margin-top: 10px;
    }

    .qty-box input {
        width: 60px;
        text-align: center;
    }

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

    .shipping-order {
        margin-top: 15px;
        display: flex;
        align-items: center;
    }

    .shipping-order img {
        margin-right: 10px;
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

    /* Media Queries for Responsiveness */
    @media (max-width: 768px) {
        .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .price-detail {
            font-size: 20px;
        }

        .btn {
            padding: 8px 12px;
        }

        .qty-box input {
            width: 50px;
        }

        .size-box ul {
            flex-direction: column;
        }

        .size-box li {
            margin-bottom: 10px;
        }

        .shipping-order {
            flex-direction: column;
            text-align: center;
        }

        .product-social {
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .cloth-details-size {
            padding: 15px;
        }

        .price-detail {
            font-size: 18px;
        }

        .btn {
            padding: 7px 10px;
            font-size: 14px;
        }

        .qty-box input {
            width: 45px;
        }
    }
</style>

<body>
    <?php include('./layouts/header.php') ?>

    <div class="row">
        <section>
            <div class="container">
                <div class="row gx-4 gy-5">
                    <div class="col-lg-12 col-12">
                        <div class="details-items">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="details-image-1 ratio_asos">
                                        <img src="./images/Deviate-NITRO™-2-Men's-Running-Shoes.avif" class="img-fluid w-100" alt="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="cloth-details-size">
                                        <div class="details-image-concept">
                                            <h2>Men's Running Shoes</h2>
                                        </div>
                                        <h3 class="name">Nike</h3>
                                        <h3 class="price-detail">$435</h3>

                                        <div id="selectSize" class="product-description border-product">
                                            <h6 class="product-title size-text">Select Size</h6>
                                            <div class="size-box">
                                                <ul>
                                                    <li><a href="javascript:void(0)">S</a></li>
                                                    <li><a href="javascript:void(0)">M</a></li>
                                                    <li><a href="javascript:void(0)">L</a></li>
                                                    <li><a href="javascript:void(0)">XL</a></li>
                                                </ul>
                                            </div>

                                            <h6 class="product-title product-title-2 d-block">Quantity</h6>
                                            <div class="qty-box">
                                                <input type="number" name="quantity" id="quantity" class="form-control input-number" value="1" min="1">
                                            </div>
                                        </div>

                                        <div class="product-buttons">
                                            <a href="javascript:void(0)" class="btn btn-solid">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add To Cart</span>
                                            </a>
                                        </div>

                                        <ul class="shipping-order">
                                            <li><img src="#" class="img-fluid blur-up lazyload" alt="image">
                                                <span class="lang">Free shipping for orders above $500 USD</span>
                                            </li>
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

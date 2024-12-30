<!DOCTYPE html>

<?php
include('./backent/products/helper.php');
$products = get_products();



$category_name = isset($_GET['category_name']) ? $_GET['category_name'] : null;



if ($category_name) {
    $products = get_products_by_category($category_name);
    // header('Location: http://localhost/myshop/categories/shoes.php');
    // print_r($products);
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>
<style>
    .navbar-nav .nav-link {
        color: #000 !important;
        padding: 0.5rem 0rem !important;
        border-color: transparent;
        margin-left: 1.5rem;
        transition: none
    }

    .navbar .navbar-toggler:focus {
        box-shadow: none
    }

    .navbar-nav .nav-link.active,
    .border-red {
        border-bottom: 3px solid #b71c1c
    }

    .navbar-nav .nav-link:hover {
        border-bottom: 3px solid #b71c1c
    }


    .fw-800 {
        font-weight: 800
    }

    .bg-green {
        background-color: #208f20 !important;
        color: #fff
    }

    .bg-black {
        background-color: #1f1d1d;
        color: #fff
    }

    .bg-red {
        background-color: #bb3535;
        color: #fff
    }

    @media (max-width: 767.5px) {

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            background-color: #b71c1c;
            color: #fff !important
        }

        .navbar-nav .nav-link {
            border: 3px solid transparent;
            margin: 0.8rem 0;
            display: flex;
            border-radius: 10px;
            justify-content: center
        }
    }
</style>


<body>

    <?php
    include('./layouts/header.php')

    ?>

    <section id="sellers">

        <div class="container bg-white">
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <div class="container-fluid p-0">
                    <a class="navbar-brand text-uppercase fw-800" href="#">
                        <span class="border-red pe-2">New</span>Product
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="myNav">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active" aria-current="page" href="#">All</a>
                            <a class="nav-link" href="#">Women's</a>
                            <a class="nav-link" href="#">Men's</a>
                            <a class="nav-link" href="#">Kid's</a>
                            <a class="nav-link" href="#">Accessories</a>
                            <a class="nav-link" href="#">Cosmetics</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>



        <div class="seller container">
            <h2>All Products</h2>
            <div class="best-seller">
                <?php foreach ($products as $item): ?>
                    <div class="best-p1">
                        <img src="<?php echo htmlspecialchars('http://localhost/myshop/backent/products/images/' . basename($item['image_url'])); ?>" alt="img">
                        <div class="best-p1-txt">
                            <div class="name-of-p">
                                <p><?php echo htmlspecialchars($item['name']); ?></p>
                            </div>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                            <div class="price">
                                &dollar;<?php echo number_format($item['price'], 2); ?>
                                <div class="colors">
                                    <i class='bx bxs-circle red'></i>
                                    <i class='bx bxs-circle blue'></i>
                                    <i class='bx bxs-circle white'></i>
                                </div>
                            </div>
                            <div class="buy-now" style="display: flex; gap:10px; justify-content: center;">
                                <a href="./details.php?id=<?= $item['id']; ?>">
                                    <button>Buy Now</button>
                                </a>
                                <div class="add-cart">
                                    <form action="./cart/router.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Repeat similar structure for New Arrivals and Hot Sales sections -->
        <!-- ... (New Arrivals and Hot Sales sections here) ... -->

    </section>
    <section id="news">
        <div class="news-heading">
            <p>LATEST NEWS</p>
            <h2>Fashion New Trends</h2>
        </div>
        <div class="l-news container">
            <div class="l-news1">
                <div class="news1-img">
                    <img src="https://i.postimg.cc/2y6wbZCm/news1.jpg" alt="img">
                </div>
                <div class="news1-conte">
                    <div class="date-news1">
                        <p><i class='bx bxs-calendar'></i> 12 February 2022</p>
                        <h4>What Curling Irons Are The Best Ones</h4>
                        <a href="https://www.vogue.com/article/best-curling-irons" target="_blank">read more</a>
                    </div>
                </div>
            </div>
            <div class="l-news2">
                <div class="news2-img">
                    <img src="https://i.postimg.cc/9MXPK7RT/news2.jpg" alt="img">
                </div>
                <div class="news2-conte">
                    <div class="date-news2">
                        <p><i class='bx bxs-calendar'></i> 17 February 2022</p>
                        <h4>The Health Benefits Of Sunglasses</h4>
                        <a href="https://www.rivieraopticare.com/blog/314864-the-health-benefits-of-wearing-sunglasses_2/" target="_blank">read more</a>
                    </div>
                </div>
            </div>
            <div class="l-news3">
                <div class="news3-img">
                    <img src="https://i.postimg.cc/x1KKdRLM/news3.jpg" alt="img">
                </div>
                <div class="news3-conte">
                    <div class="date-news3">
                        <p><i class='bx bxs-calendar'></i> 26 February 202</p>
                        <h4>Eternity Bands Do Last Forever</h4>
                        <a href="https://www.briangavindiamonds.com/news/eternity-bands-symbolize-love-that-lasts-forever/" target="_blank">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contact container">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.121169986175!2d73.90618951442687!3d18.568575172551647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c131ed5b54a7%3A0xad718b8b2c93d36d!2sSky%20Vista!5e0!3m2!1sen!2sin!4v1654257749399!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <form action="https://formspree.io/f/xzbowpjq" method="POST">
                <div class="form">
                    <div class="form-txt">
                        <h4>INFORMATION</h4>
                        <h1>Contact Us</h1>
                        <span>As you might expect of a company that began as a high-end interiors contractor, we pay strict
                            attention.</span>
                        <h3>USA</h3>
                        <p>195 E Parker Square Dr, Parker, CO 801<br>+43 982-314-0958</p>
                        <h3>India</h3>
                        <p>HW95+C9C, Lorem ipsum dolor sit.<br>411014</p>
                    </div>
                    <div class="form-details">
                        <input type="text" name="name" id="name" placeholder="Name" required>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                        <textarea name="message" id="message" cols="52" rows="7" placeholder="Message" required></textarea>
                        <button>SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
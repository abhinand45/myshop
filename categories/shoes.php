<!DOCTYPE html>
<?php
include('../backent/products/helper.php');

$category = isset($_GET['category']) ? strval($_GET['category']) : 0;
// echo $category;
$products = get_products_by_category($category);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php include('../layouts/header.php'); ?>

    <section id="sellers">
        <div class="seller container">
            <!-- <aside id="sidebar">
                <div class="sidebar-container">
                    <h3>Product Categories</h3>
                    <ul class="category-list">
                        <li><a href="#">NIKE</a></li>
                        <li><a href="#">ADIDAS</a></li>
                        <li><a href="#">PUMA</a></li>
                        <li><a href="#">REEBOK</a></li>
                        <li><a href="#">VANS</a></li>
                        <li><a href="#">JORDAN</a></li>
                    </ul>
                </div>
            </aside> -->

            <h2>Top Sales</h2>
            <div class="best-seller">
                <?php foreach ($products as $item): ?>
                    <div class="best-p1">
                        <img src="<?php echo htmlspecialchars('http://localhost/myshop/backent/products/images/'.basename($item['image_url'])); ?>" alt="img">
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
                            <div class="buy-now">
                                <button><a href="product.php?id=<?php echo $item['id']; ?>">Buy Now</a></button>
                                <button><a href="product.php?id=<?php echo $item['id']; ?>">AddtoCart</a></button>
                            </div>
                         
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

      <section id="sellers">
        <div class="seller container">
            <h2>Top Sales</h2>
            <div class="best-seller">
                <div class="best-p1">
                    <img src="https://i.postimg.cc/8CmBZH5N/shoes.webp" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Shoes</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="price">
                            &dollar;37.24
                            <div class="colors">
                                <i class='bx bxs-circle red'></i>
                                <i class='bx bxs-circle blue'></i>
                                <i class='bx bxs-circle white'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                        <div class="add-cart">
                            <button>Add To Cart</button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/76X9ZV8m/Screenshot_from_2022-06-03_18-45-12.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Jacket</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="price">
                            &dollar;17.24
                            <div class="colors">
                                <i class='bx bxs-circle green'></i>
                                <i class='bx bxs-circle grey'></i>
                                <i class='bx bxs-circle brown'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/j2FhzSjf/bs2.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Shirt</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="price">
                            &dollar;27.24
                            <div class="colors">
                                <i class='bx bxs-circle brown'></i>
                                <i class='bx bxs-circle green'></i>
                                <i class='bx bxs-circle blue'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/QtjSDzPF/bs3.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Shoes</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="price">
                            &dollar;43.67
                            <div class="colors">
                                <i class='bx bxs-circle red'></i>
                                <i class='bx bxs-circle grey'></i>
                                <i class='bx bxs-circle blue'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="seller container">
            <h2>New Arrivals</h2>
            <div class="best-seller">
                <div class="best-p1">
                    <img src="https://i.postimg.cc/fbnB2yfj/na1.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England T-Shirt</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="price">
                            &dollar;10.23
                            <div class="colors">
                                <i class='bx bxs-circle blank'></i>
                                <i class='bx bxs-circle blue'></i>
                                <i class='bx bxs-circle brown'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/zD02zJq8/na2.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Bag</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="price">
                            &dollar;09.28
                            <div class="colors">
                                <i class='bx bxs-circle brown'></i>
                                <i class='bx bxs-circle red'></i>
                                <i class='bx bxs-circle green'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/Dfj5VBcz/sunglasses1.jpg" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Sunglass</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="price">
                            &dollar;06.24
                            <div class="colors">
                                <i class='bx bxs-circle grey'></i>
                                <i class='bx bxs-circle blank'></i>
                                <i class='bx bxs-circle blank'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/FszW12Kc/na4.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Shoes</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="price">
                            &dollar;43.67
                            <div class="colors">
                                <i class='bx bxs-circle grey'></i>
                                <i class='bx bxs-circle red'></i>
                                <i class='bx bxs-circle blue'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
         <div class="seller container">
            <h2>Hot Sales</h2>
            <div class="best-seller">
                <div class="best-p1">
                    <img src="https://i.postimg.cc/jS7pSQLf/na4.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Shoes</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="price">
                            &dollar;37.24
                            <div class="colors">
                                <i class='bx bxs-circle grey'></i>
                                <i class='bx bxs-circle black'></i>
                                <i class='bx bxs-circle blue'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/fbnB2yfj/na1.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England T-Shirt</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="price">
                            &dollar;10.23
                            <div class="colors">
                                <i class='bx bxs-circle blank'></i>
                                <i class='bx bxs-circle blue'></i>
                                <i class='bx bxs-circle brown'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/RhVP7YQk/hs1.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England T-Shirt</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="price">
                            &dollar;15.24
                            <div class="colors">
                                <i class='bx bxs-circle blank'></i>
                                <i class='bx bxs-circle red'></i>
                                <i class='bx bxs-circle blue'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="best-p1">
                    <img src="https://i.postimg.cc/zD02zJq8/na2.png" alt="img">
                    <div class="best-p1-txt">
                        <div class="name-of-p">
                            <p>PS England Bag</p>
                        </div>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="price">
                            &dollar;09.28
                            <div class="colors">
                                <i class='bx bxs-circle blank'></i>
                                <i class='bx bxs-circle grey'></i>
                                <i class='bx bxs-circle brown'></i>
                            </div>
                        </div>
                        <div class="buy-now">
                            <button><a href="https://codepen.io/sanketbodke/full/mdprZOq">Buy  Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section> -->
    <!-- <section id="news">
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
    </section> -->
    <!-- <section id="contact">
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

</body>

</html>

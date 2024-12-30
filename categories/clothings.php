<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
</head>
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Container */
.container {
    display: flex;
    flex-direction: row;
    margin: 20px;
}

/* Sidebar Styles */
#sidebar {
    width: 25%;
    background-color: #333;
    color: white;
    padding: 20px;
    margin-right: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.sidebar-container h3 {
    font-size: 18px;
    margin-bottom: 20px;
    color: #fff;
}

.category-list {
    list-style: none;
    padding: 0;
}

.category-list li {
    margin-bottom: 10px;
}

.category-list a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    padding: 10px;
    display: block;
    transition: background-color 0.3s ease;
}

.category-list a:hover {
    background-color: #444;
}

/* Best Seller Section */

.best-seller {
    width: 75%;
    display: flex;
    flex-direction: column;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.best-p1 {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.best-p1 img {
    width: 100px;
    height: 100px;
    margin-right: 20px;
    border-radius: 10px;
    background-color: #ccc;
}

.name-of-p {
    display: flex;
    flex-direction: column;
}

.name-of-p p {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.price {
    font-size: 20px;
    font-weight: bold;
    color: #28a745;
    margin-top: 5px;
}

.buy-now {
    margin-top: 20px;
}

.buy-now button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.buy-now button:hover {
    background-color: #218838;
}

.buy-now a {
    color: white;
    text-decoration: none;
}

</style>

<body>
    
    <section id="seller ">
        <div class="seller container">
            <aside id="sidebar">
                   <div class="sidebar-container">
                       <h3>Product Categories</h3>

                      <ul class="category-list">
                           <li><a href="#">NIKE</a></li>
                           <li><a href="#">NIKE</a></li>
                           <li><a href="#">NIKE</a></li>
                           <li><a href="#">NIKE</a></li>
                           <li><a href="#">NIKE</a></li>
                      </ul>
                 </div>
            </aside>

          <h3>Products</h3>

           <div class="best-seller">
              <div class="best-p1">
                  <img src="#">
                 <div class="name-of-p">
                     <p>name</p>

                     <div class="price">
                         &dollar;37.24
                      </div>
                   </div>
              </div>

              <div class="buy-now">
                  <button><a href="#">BUY NOW</button>
             </div>
         </div>

        </section>


    </div>
    
</body>
</html>
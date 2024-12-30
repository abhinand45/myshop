<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Half Page Modal</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        /* Use flexbox to center the button */
        justify-content: center;
        /* Center horizontally */
        align-items: center;
        /* Center vertically */
        height: 100vh;
        /* Full viewport height */
        background-color: #f8f8f8;
        /* Light background color */
    }

    .modal-button {
        padding: 10px 20px;
        font-size: 16px;
        color: black;
        /* Black text color */
        background-color: #e0e0e0;
        /* Light gray background for button */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        /* Transition for hover effect */
    }

    .modal-button:hover {
        background-color: #d0d0d0;
        /* Darker gray on hover */
    }

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.5);
        /* Black with opacity */
    }

    .modal-content {
        background-color: white;
        /* White background */
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        /* Half width */
        height: 50%;
        /* Half height */
        position: relative;
        top: 50%;
        /* Center vertically */
        transform: translateY(-50%);
        /* Adjust for half height */
        display: flex;
        /* Use flexbox to align content */
        flex-direction: column;
        /* Align items in a column */
        justify-content: center;
        /* Center content vertically */
        align-items: center;
        /* Center content horizontally */
    }

    .close {
        color: #aaa;
        /* Close button color */
        float: right;
        margin-left: 100%;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .category-list {
        list-style: none;
        /* Remove bullet points */
        padding: 0;
        /* Remove padding */
    }

    .category-list li {
        margin: 10px 0;
        /* Space between items */
    }

    .category-list a {
        text-decoration: none;
        /* Remove underline */
        color: #007BFF;
        /* Link color */
        transition: color 0.3s;
        /* Smooth color transition */
    }

    .category-list a:hover {
        color: #0056b3;
        /* Darker blue on hover */
    }
</style>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Product Categories</title>
    </head>

    <body>
        <button id="openModal" class="modal-button">Open Modal</button>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Modal Title</h2>
                <!-- <p>This is a vertically centered half-page modal example.</p>
        <p>You can add more content here.</p> -->
                <div class="categories-list">
                    <ul>
                        <li><a href="?category_name=shoes">Shoes</a></li>
                        <li><a href="?category_name=jackets">Jackets</a></li>
                        <li><a href="?category_name=cloths">Cloths</a></li>
                        <li><a href="?category_name=tshirts">T-Shirts</a></li>
                        <li><a href="?category_name=bags">Bags</a></li>
                        <li><a href="?category_name=accessories">Sunglasses</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    </html>

    <script>
        // Get the modal
        const modal = document.getElementById("modal");

        // Get the button that opens the modal
        const btn = document.getElementById("openModal");

        // Get the <span> element that closes the modal
        const span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block"; // Show the modal
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none"; // Hide the modal
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none"; // Hide the modal
            }
        }
    </script>


</body>

</html>
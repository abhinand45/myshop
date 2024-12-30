<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    /* Resetting some basic styles */
body, h1, h2, p, input, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.profile-container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 100%;
    max-width: 600px;
}

.profile-header {
    text-align: center;
    padding: 20px;
    background-color: #007bff;
    color: #fff;
    position: relative;
}

.profile-picture {
    position: relative;
    width: 150px;
    height: 150px;
    margin: 0 auto;
    border-radius: 50%;
    overflow: hidden;
    border: 5px solid #fff;
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.edit-btn {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background-color: #fff;
    border: none;
    border-radius: 50%;
    padding: 5px;
    cursor: pointer;
    color: #007bff;
}

.username {
    margin-top: 10px;
    font-size: 24px;
}

.email {
    margin-top: 5px;
    font-size: 14px;
    color: #ddd;
}

.profile-details {
    padding: 20px;
}

.profile-details h2 {
    margin-bottom: 15px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.save-btn {
    display: inline-block;
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.save-btn:hover {
    background-color: #0056b3;
}

/* Responsive styles */
@media (max-width: 600px) {
    .profile-container {
        width: 90%;
    }

    .profile-picture {
        width: 120px;
        height: 120px;
    }

    .username {
        font-size: 20px;
    }
}

</style>

<body>

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-picture">
            <img src="https://via.placeholder.com/150" alt="Profile Picture">
            <button class="edit-btn"><i class="fas fa-edit"></i></button>
        </div>
        <h1 class="username">John Doe</h1>
        <p class="email">johndoe@example.com</p>
    </div>

    <div class="profile-details">
        <h2>Personal Information</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="John Doe">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="johndoe@example.com">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="123 Main St, City, Country">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="+123456789">
            </div>
            <button type="submit" class="save-btn">Save Changes</button>
        </form>
    </div>
</div>

</body>
</html>

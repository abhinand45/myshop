<?php
session_start();
require '../login/helper.php';

$user_details = null;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_details = get_user_details($user_id);
}

if (!$user_details) {
    echo "Error retrieving user details.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../../layouts/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    /* Add your CSS here */
    /* Example: Basic Profile Page Styling */
    /* Full profile styling as shared above */
</style>

<body>

    <div class="headr">
        <div class="header-main">
            <?php include '../../layouts/header.php'; ?>
        </div>
    </div>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-picture">
                <img src="<?= htmlspecialchars($user_details['profile_picture']) ?: 'default-profile.png' ?>" alt="Profile Picture">
                <button class="edit-btn" aria-label="Edit Profile"><i class="fas fa-edit"></i></button>
            </div>
            <h1 class="username"><?= htmlspecialchars($user_details['name']) ?></h1>
            <p class="email"><?= htmlspecialchars($user_details['email']) ?></p>

            <!-- Logout button -->
            <a href="logout.php" class="logout-btn" aria-label="Logout"><i class="fas fa-sign-out-alt"></i></a>
        </div>

        <div class="profile-details">
            <h2>Personal Information</h2>
            <form action="update_user.php" method="POST"> <!-- Form for updating user details -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($user_details['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user_details['email']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?= htmlspecialchars($user_details['address']) ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($user_details['phone']) ?>">
                </div>
                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; <?php echo date("Y"); ?> MyShop. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="terms.php">Terms of Service</a></li>
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </footer>

</body>

</html>

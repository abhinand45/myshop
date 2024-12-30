<?php
include('helper.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate the user
    
    if (authenticate_user($email, $password)) {
       
        header("Location: http://localhost/myshop/index.php");
        exit;
    } else {
        
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="container forms">       
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="login.php" method="POST">
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password" required>
                    </div>
                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>
                    <div class="field button-field">
                        <button type="submit">Login</button>
                    </div>
                </form>

                <!-- Display error message if login fails -->
                 
                <?php if (isset($error_message)): ?>
                    <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>

                <div class="form-link">
                    <span>Don't have an account? <a href="../register/register.php" class="link signup-link">Signup</a></span>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
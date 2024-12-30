<?php
session_start();
include ('helper.php') 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-content {
            display: flex;
            flex-direction: column;
        }

        header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .field {
            margin-bottom: 20px;
            position: relative;
        }

        .input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        .input:focus {
            border-color: #007bff;
            outline: none;
        }

        .button-field button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-field button:hover {
            background-color: #0056b3;
        }

        .form-link {
            text-align: center;
            font-size: 14px;
        }

        .form-link .link {
            color: #007bff;
            text-decoration: none;
        }

        .form-link .link:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            header {
                font-size: 20px;
            }

            .input {
                padding: 10px;
            }

            .button-field button {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <section class="container">
        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form action="router.php" method="POST">
                    <div class="field input-field">
                        <input type="text" name="name" placeholder="Name" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="address" placeholder="Address" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="text" name="phone" placeholder="Phone" class="input">
                    </div>
                    <div class="field button-field">
                        <button type="submit">Signup</button>
                    </div>
                </form>

                <!-- Display error message if validation fails -->
                <?php if (!empty($error_message)): ?>
                    <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>

                <div class="form-link">
                    <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
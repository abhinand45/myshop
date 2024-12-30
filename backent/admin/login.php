<?php
include('helper.php');  // Include the helper file
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-card {
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .login-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            padding: 20px;
        }

        .login-header h2 {
            margin: 0;
        }

        .login-form {
            padding: 20px;
        }

        .form-group {
            position: relative;
        }

        .form-group .input-icon {
            position: absolute;
            left: 10px;
            top: 12px;
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-danger {
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="card login-card">
            <div class="card-header login-header">
                <h2>Login</h2>
            </div>
            <div class="card-body login-form">
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form id="loginForm" method="POST" action="">
                    <div class="form-group">
                        <label for="user_name" class="sr-only">Username</label>
                        <input type="text" id="user_name" name="user_name" placeholder="Username" class="form-control" required>
                        <span class="text-danger" id="usernameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                        <span class="text-danger" id="passwordError"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Simple form validation
        document.getElementById('loginForm').addEventListener('submit', function (event) {
            let valid = true;
            const username = document.getElementById('user_name').value;
            const password = document.getElementById('password').value;

            // Clear previous error messages
            document.getElementById('usernameError').innerText = '';
            document.getElementById('passwordError').innerText = '';

            // Basic validation
            if (username.trim() === '') {
                document.getElementById('usernameError').innerText = 'Username is required.';
                valid = false;
            }
            if (password.trim() === '') {
                document.getElementById('passwordError').innerText = 'Password is required.';
                valid = false;
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>

</body>

</html>

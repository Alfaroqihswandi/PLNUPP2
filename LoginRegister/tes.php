<?php
// PHP code to handle form submission
$error = ''; // Define the $error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate password
    if (strlen($password) < 8 || !preg_match('/\d/', $password)) {
        $error = "Password harus minimal 8 karakter dan mengandung angka.";
    } else {
        // Login successful, redirect to dashboard or perform other actions
        echo "Login berhasil!";
    }
}
?>

<!-- HTML code -->
<html>
<head>
    <title>Login Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to bottom, #3498db, #2980b9);
            background-size: 100% 300px;
            background-position: 0% 100%;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 500px;
            padding: 80px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            text-align: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100%;
            height: 40px;
            margin: 0 auto;
            object-fit: contain;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-control {
            width: 90%;
            height: 40px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 auto;
        }

        .form-control:focus {
            border-color: #aaa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            width: 80%;
            height: 40px;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        .btn:hover {
            background-color: #3e8e41;
        }

        .forgot-password {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }

        .forgot-password a {
            text-decoration: none;
            color: #666;
        }

        .forgot-password a:hover {
            color: #333;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .show-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .show-password i {
            font-size: 18px;
            color: #666;
        }

        .register-link {
            margin-top: 10px;
            font-size: 14px;
        }

        .register-link a {
            text-decoration: none;
            color: #4CAF50;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="logo.png" alt="Logo">
    </div>
    <form id="loginForm" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required name="username" style="padding-right: 40px;">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Password" required name="password" style="padding-right: 40px;">
            <span class="show-password" onclick="togglePassword()">
                <i class="fa fa-eye" id="eye"></i>
            </span>
        </div>
        <div class="error" id="passwordError">
            <?php echo $error; ?>
        </div>
        <button class="btn" type="submit">Login</button>
        <div class="forgot-password" style="margin-top: 20px;">
            <a href="#">Forgot password?</a>
        </div>
    </form>
    <div class="register-link">
        <a href="register.php">Daftar di sini</a>
    </div>
</div>

<!-- JavaScript code -->
<script>
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye');

    function togglePassword() {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        eyeIcon.className = type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
    }
</script>
<script src="tes.js"></script>
</body>
</html>

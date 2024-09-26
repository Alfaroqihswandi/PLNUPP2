<?php
$error = ''; // Initialize the error variable
$showPopup = false; // Variable to control popup display

include('Service/Database.php');
if (isset($_POST ['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($password != $confirmPassword) {
        $error = "Password tidak sama.";
    } else {
        // Registration successful
        $showPopup = true; // Set to true to show popup
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/Ravly/LoginRegister/tes.css">
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

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-control {
            width: 80%;
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

        /* Popup styles */
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        #popup h2 {
            margin: 0 0 10px;
        }

        #popup button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        #popup button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            Register
        </div>
        <form id="registerForm" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Username" required name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
                <span class="show-password" onclick="togglePassword('password')">
                    <i class="fa fa-eye" id="eye-password"></i>
                </span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required name="confirmPassword">
                <span class="show-password" onclick="togglePassword('confirmPassword')">
                    <i class="fa fa-eye" id="eye-confirmPassword"></i>
                </span>
            </div>
            <div class="error" id="passwordError">
                <?php echo $error; ?>
            </div>
            <button class="btn" type="submit">Register</button>
        </form>
    </div>

    <div id="popup" style="<?php echo $showPopup ? 'display: block;' : 'display: none;'; ?>">
        <div class="popup-content">
            <h2>Register Berhasil!</h2>
            <button id="popup-button">OK</button>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const passwordInput = document.getElementById(id);
            const eyeIcon = document.getElementById('eye-' + id);

            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            eyeIcon.className = type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
        }

        document.getElementById('popup-button').addEventListener('click', function() {
            window.location.href = 'tes.php'; // Redirect after clicking OK
        });
    </script>
</body>
</html>

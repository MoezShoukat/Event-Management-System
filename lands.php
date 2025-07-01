
<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lands.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Signup and Login</title>
</head>
<body>

<div class="wrapper" id="signup" style="display: none;">
    <form action="Register.php" method="POST">
        <h1>Register</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="remember-forgot">
            <label>
                <input type="checkbox"> Remember me
            </label>
        </div>

        <button type="submit" class="bnt" value="Sign up" name="signup">Signup</button>

        <div class="register-link">
            <p>Already have an account? <a href="#" id="LogInLink">Login</a></p>
        </div>
        
    </form>
</div>
    
<div class="wrapper" id="login">
    <form action="Register.php" method="POST">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="remember-forgot">
            <label>
                <input type="checkbox"> Remember me
            </label>
            <a href="#">Forgot Password?</a>
        </div>

        <button type="submit" class="bnt" value="Log in" name="login">Login</button>

        <div class="register-link">
            <p>Don't have an account? <a href="#" id="RegisterLink">Register</a></p>
        </div>

        <div class="register-link">
            <p><a href="event.html" id="RegisterLink">Home Page</a></p>
        </div>
    </form>
</div>

<script src="lands.js"></script>
</body>
</html>

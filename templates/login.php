<?php

session_start();
    if (!empty($_SESSION['user'])){
        header("Location: http://localhost/php/project/templates/home.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../style/signin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="content">
    <div class="logo">
        <img src="../images/logo.png" alt="">
    </div>
    <div class="heading">
        <h1>Login</h1>
    </div>
    <div class="main">
        <fieldset>
        <form action="" method="POST">
            <div class="ep">
                <div class="ep-fields-wrapper">
                    <input type="email" placeholder="Enter email" name="email1" id="email">
                </div>
                <div class="ep-fields-wrapper"><input type="text" placeholder="Password" name="password1" id="current-password"></div>
            </div>
            <div class="btns">
                <div class="submit">
                <input type="submit" value="Login" name="login" id="signin">
                </div>
                <div class="btn">
                    <button id="signup">Sign Up</button>
                </div>
            </div>
        </form>
    </fieldset>
    </div>
</div>

    <script src="script.js" ></script>
</body>
</html>
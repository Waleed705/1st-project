<?php
    session_start();
    if (empty($_SESSION['user'])){
        header("Location: http://localhost/php/project/1st-signup.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="service.css">
</head>
<body>
    <?php include_once 'header.php'; ?>
    <div class="heading">
        <h1>Services</h1>
        </div>
    <div class="main">
        <div class="calculator">
        <img src="calculator.png" class="calculaterImg"  id="cal" />
        <p id="cal" >calculator</p>
    </div>

        <div class="add-service">
        <img src="services.jpg" class="serimg"  id="ser" />
        <p id="ser" >Add Services</p>
        
        </div>
        </div>

    <script src="1st.js"></script>
</body>
</html>
<?php
    session_start();
    if (empty($_SESSION['user'])){
        header("Location: http://localhost/php/project/templates/login.php");
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
    <link rel="stylesheet" href="../style/service.css">
</head>
<body>
    <?php include_once 'header.php'; ?>
    <div class="heading">
        <h1>Services</h1>
        </div>
        <div class="main-wrapper">
            <div class="main">
                <div class="calculator">
                <img src="../images/calculator.png" class="calculaterImg"  id="cal" />
                <p id="cal" >calculator</p>
                </div>
                <div class="show">
                <img src="../images/show.png" class="showimg"  id="show" />
                <input type="hidden" Value="<?php echo $_SESSION['user']['id'] ?>"  name="user_id">
                <p id="show" >Show Services</p>
                
                </div>
            </div>
        </div>

    <script src="script.js"></script>
</body>
</html>
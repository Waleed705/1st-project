<?php

session_start();
if(empty($_SESSION['user'])){
    header("Location: http://localhost/php/project/templates/login.php");
    die();
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="../style/update.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="head">
        <h1>About</h1>
    </div>
    <div class="main">
    <fieldset>
        <legend> User Detail </legend>
        <form action="" method="POST">
            <div class="form-1">
                <div class="nep">
                    <div class="nep--fields--wrapper">
                    <input type="text" placeholder="Enter Your Name" class="nep--field" name="name" id="name" value="<?php echo $_SESSION['user']['fname'] ?>" readonly>
                    </div>
                    <div class="nep--fields--wrapper">
                        <input type="email" placeholder="Enter Your Email" class="nep--field" name="email" id="email" value="<?php echo $_SESSION['user']['email'] ?>" readonly>
                    </div>
                    <div class="nep--fields--wrapper">
                    <input type="numbers"  placeholder="Enter Your Password" class="nep--field" name="password" id="current-password" value="<?php echo $_SESSION['user']['mpassword'] ?>" readonly>
                    </div>    
                </div>
                <div class="new">
                <div class="gmf">
                    <label for="gender" class="gender">Gender</label>
                    <div class="gmf--fields--wrapper">
                        <?php $gender = $_SESSION['user']['gender']; ?>
                        <input type="radio" name="gender" value="<?php echo $gender ?>" id="<?php echo $gender ?>" checked>
                        <label for="<?php echo $gender ?>" class="<?php echo $gender ?>"><?php echo $gender ?></label>
                    </div>
                </div>
                <div class="country">
                    <select name="country" id="country" readonly value="<?php echo $_SESSION['user']['country'] ?>">
                        <option value="<?php echo $_SESSION['user']['country'] ?>"><?php echo $_SESSION['user']['country'] ?></option>
                    </select><br>
                    </div>
            </form>
        </fieldset>
    </div>  
    <script src="script.js"></script>
</body>
</html>
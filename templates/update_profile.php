
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
    <title>Update</title>
    <link rel="stylesheet" href="../style/update.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="head">
        <h1>Update </h1>
    </div>
    <div class="main">
    <fieldset>
        <legend>Enter personal details</legend>
        <form action="" method="POST">
            <div class="form-1">
                <div class="nep">
                    <div class="nep--fields--wrapper">
                    <input type="text" placeholder="Enter Your Name" class="nep--field" name="name" id="name" value="<?php echo $_SESSION['user']['fname'] ?>" required>
                    </div>
                    <div class="nep--fields--wrapper">
                        <input type="email" placeholder="Enter Your Email" class="nep--field" name="email" id="email" value="<?php echo $_SESSION['user']['email'] ?>" required>
                    </div>
                    <div class="nep--fields--wrapper">
                    <input type="password" placeholder="Enter Your Password" class="nep--field" name="password" id="current-password" value="<?php echo $_SESSION['user']['mpassword'] ?>" required>
                    </div>    
                </div>
                <div class="gmf">
                    <label for="gender" class="gender">Gender</label>
                    <div class="gmf--fields--wrapper">
                        <input type="radio" name="gender" value="male" id="male" 
                        <?php echo (isset($_SESSION['user']['gender']) && $_SESSION['user']['gender'] === 'male') ? 'checked' : ''; ?>
                        ><label for="male" class="male">Male</label>
                    </div>
                    <div class="gmf--fields--wrapper">
                        <input type="radio" name="gender" value="female" id="female" 
                        <?php echo (isset($_SESSION['user']['gender']) && $_SESSION['user']['gender'] === 'female') ? 'checked' : ''; ?>
                        ><label for="female">Female</label>
                    </div>
                </div>
                <div class="country">

                    <select name="country" id="country" value="<?php echo $_SESSION['user']['country'] ?>">
                        <option value="Pakistan" <?php echo $_SESSION['user']['country'] == 'Pakistan' ? 'selected' : ''; ?>>Pakistan</option>
                        <option value="India" <?php echo $_SESSION['user']['country'] == 'India' ? 'selected' : ''; ?>>India</option>
                        <option value="Bangladash" <?php echo $_SESSION['user']['country'] == 'Bangladash' ? 'selected' : ''; ?>>Bangladash</option>
                        <option value="Austrelia" <?php echo $_SESSION['user']['country'] == 'Austrelia' ? 'selected' : ''; ?>>Austrelia</option>
                        <option value="America" <?php echo $_SESSION['user']['country'] == 'America' ? 'selected' : ''; ?>>America</option>
                        <option value="Canada" <?php echo $_SESSION['user']['country'] == 'Canada' ? 'selected' : ''; ?>>Canada</option>
                        <option value="Afganstan" <?php echo $_SESSION['user']['country'] == 'Afganstan' ? 'selected' : ''; ?>>Afganstan</option>
                        </select><br>
                </div>
                <div class="btns">
                    <input type="hidden" id="user_id" Value="<?php echo $_SESSION['user']['id'] ?>"  name="user_id">
                    <input type="submit" Value="update" class="submit" name="update" id="update">
                    <input type="reset" class="reset">
                    <p id="response"></p>
                </div>
            </div>
            </form>
        </fieldset>
    </div>  
    <script src="script.js"></script>
</body>
</html>
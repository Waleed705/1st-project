
<?php
    session_start();
    if (!empty($_SESSION['user'])){
        header("Location: http://localhost/php/project/1st-home.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head">
        <img src="logo.png" alt="">
        <h1>Login Form</h1>
    </div>
    <div class="main">
    <fieldset>
        <legend>Enter personal details</legend>
        <form action="" method="POST">
            <div class="form-1">
                <div class="nep">
                    <div class="nep--fields--wrapper">
                    <input type="text" placeholder="Enter Your Name" class="nep--field" name="name" id="name" required  >
                    <div class="error-message" id="name-error" ></div>
                </div>
                <div class="nep--fields--wrapper">
                    <input type="email" placeholder="Enter Your Email" class="nep--field" name="email" id="email" required>
                    <div class="error-message" id="email-error" ></div>
                    </div>
                    <div class="nep--fields--wrapper">
                    <input type="password" placeholder="Enter Your Password" minlength="8" maxlength="8" class="nep--field" name="password" id="current-password" required  >
                    </div>    
                </div>
                <div class="gmf">
                    <label for="gender" class="gender">Gender</label>
                    <div class="gmf--fields--wrapper">
                        <input type="radio" name="gender" value="male" id="male" class="gender1" required ><label for="male" class="male"  >Male</label>
                    </div>
                    <div class="gmf--fields--wrapper">
                        <input type="radio" name="gender" value="female" id="female" class="gender1" required><label for="female">Female</label>
                    </div>
                </div>
                <div class="country">

                    <select name="country" id="country">
                        <option>Pakistan</option>
                        <option>India</option>
                        <option>Bangladash</option>
                        <option>Austrelia</option>
                        <option>America</option>
                        <option>Canada</option>
                        <option>Afganstan</option>
                        </select><br>
                </div>
                <div class="btns">
                
                    <input type="submit" Value="Login" class="submit" name="submit" id="login">
                    <input type="reset" class="reset">
                    <p id="response"></p>
                </div>
            </div>
            </form>
        </fieldset>
    </div>  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="1st.js"></script>
</body>
</html>
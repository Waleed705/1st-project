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
    <title>Add services</title>
    <link rel="stylesheet" href="../style/add.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<?php include_once 'header.php'; ?>

    <div class="head">
    </div>
    <div class="main">
        <h1>Add Service</h1>
        <fieldset>
            <legend>Add Service</legend>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-1">
                <div class="nep">
                    <div class="nep--fields--wrapper">
                    <input type="text" placeholder="Enter Title" class="nep--field" id="title"  required  >
                    <div class="error-message" id="title-error" ></div>
                </div>
                <div class="nep--fields--wrapper">
                    <textarea name="description" id="descrription" placeholder="Description" cols="60" rows="4" class = "des" required></textarea>
                    <div class="error-message" id="des-error" ></div>
                    </div>
                <div class="image">
                <label>Select Image File:</label>
                <input type="file" name="image" id="img" accept=".jpg, .png">
                </div>
                <div class="btns">
                        <input type="hidden" id="user_id" Value="<?php echo $_SESSION['user']['id'] ?>"  name="user_id">
                        <input type="submit" Value="ADD" class="submit" name="add" id="add">
                        <input type="reset" class="reset">
                        <p id="response"></p>
                    </div>
            </form>
    </fieldset>
    <script src="script.js"></script>
</body>
</html>
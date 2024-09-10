<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<?php include_once 'header.php'; ?>

    <div class="head">
    </div>
    <div class="main">
        <h1>Add Service</h1>
        <fieldset>
            <legend>Add Service</legend>
        <form action="" method="POST">
            <div class="form-1">
                <div class="nep">
                    <div class="nep--fields--wrapper">
                    <input type="text" placeholder="Enter Title" class="nep--field" required  >
                    <div class="error-message" id="name-error" ></div>
                </div>
                <div class="nep--fields--wrapper">
                    <input type="text" placeholder="Description" class="nep-field" required>
                    <div class="error-message" id="email-error" ></div>
                    </div>
                <div class="btns">
                        <!-- <input type="hidden" id="user_id" Value="<?php echo $_SESSION['user']['id'] ?>"  name="user_id"> -->
                        <input type="submit" Value="ADD" class="submit" name="update" id="update">
                        <input type="reset" class="reset">
                        <!-- <p id="response"></p> -->
                    </div>
            </form>
    </fieldset>
</body>
</html>
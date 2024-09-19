<?php
    session_start();
    if (empty($_SESSION['user'])){
        header("Location: http://localhost/php/project/templates/login.php");
        die();
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "1st";

    // create conection
    $conn = new mysqli($servername,$username,$password,$dbname);

    // check connection
    if($conn->connect_error){
        die("connection fail!" . mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit services</title>
    <link rel="stylesheet" href="../style/add.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php 
    include_once 'header.php';
    $service_id = $_GET['service'];
    $check = "SELECT * FROM services WHERE id = '$service_id'";
    $result3 = $conn->query($check);
    if($result3->num_rows > 0) {   //
        $services = $result3->fetch_all();
        $title1 = $services[0][1];
        $des1 = $services[0][2];
        $img = $services[0][3];
    }
    ?>
    <div class="head">
    </div>
    <div class="main">
        <h1>Edit Service</h1>
        <fieldset>
            <legend>Edit Service</legend>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-1">
                <div class="nep">
                    <div class="nep--fields--wrapper">
                    <input type="text" placeholder="Enter Title" class="nep--field" id="title" value="<?php echo $title1 ?>" required  >
                    <div class="error-message" id="title-error" ></div>
                </div>
                <div class="nep--fields--wrapper">
                    <textarea name="description" id="descrription" placeholder="Description" cols="60" rows="5" class = "des" value="" required><?php echo $des1 ?></textarea>
                    <div class="error-message" id="des-error" ></div>
                    </div>
                <div class="image">
                <label>Change Image File:</label>
                <!-- // if image then <img>  -->
                 <?php
                 if(!empty($img) ){ ?>
                     <img src="http://localhost/php/project/uploads/<?php echo $img; ?>" alt="">
                     <?php
                    }
                    ?>
                <input type="file" name="image"  id="img" accept=".jpg, .png">
                </div>
                <div class="btns">
                        <input type="hidden" id="user_id" Value="<?php echo $_SESSION['user']['id'] ?>"  name="user_id">
                        <input type="hidden" id="id" Value="<?php echo $service_id = $_GET['service'];?>"  name="id">
                        <input type="submit" Value="Add changes" class="save" name="edit" id="update_service">
                        <p id="response"></p>
                    </div>
            </form>
    </fieldset>
    <script src="script.js"></script>
</body>
</html>
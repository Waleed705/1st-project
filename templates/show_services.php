<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Services</title>
    <link rel="stylesheet" href="../style/show.css">
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
session_start();
if(empty($_SESSION['user'])){
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
$user_id = $_SESSION['user']['id'];
$user_name = $_SESSION['user']['fname'];
$check = "SELECT * FROM services WHERE user_id = '$user_id'";
$result3 = $conn->query($check);
include_once 'header.php';
?>
<?php
    if (!empty($result3)){
    $services = $result3->fetch_all();
    ?> 
        <div class="addbtn">
            <button id="add-ser" class = "add-ser" >Add Services</button>
        </div>
    <div class="container">
        <?php
    if ( ! empty( $services ) ){
        foreach ($services as $service){
            ?>
            <div class="card">
                <img style="width:30%" src="http://localhost/php/project/uploads/<?php echo $service[3]; ?>">
                <h1><?php echo $service[1]; ?></h1>
                <p class="description"><?php echo $service[2]; ?></p>
                <p>Created by : <?php echo $user_name; ?></p>
                <div class="btns">
                <button class="edit" data-service="<?php echo $service[0]; ?>" id="edit">Edit</button>
                <button class="del" data-service="<?php echo $service[0]; ?>" id="del">Delete</button>
                </div>
            </div>
            <?php
        }
        ?> </div>
        <?php
    } else {
        $message = " has not added any post yet!";
        ?>
        <p class="error_message"><?php echo $user_name.$message; ?> </p>
        <?php
    }
    ?>
        <script src="script.js"></script>
    <?php
}
?>
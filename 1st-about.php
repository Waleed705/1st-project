<?php

session_start();
if(empty($_SESSION['user'])){
    header("Location: http://localhost/php/project/1st-signup.php");
    die();
}
if (!empty($_SESSION['user'])){
    $row = $_SESSION['user'];
    echo  "Name: " .($row['fname']) ."<br>" ."Email: " .($row['email'])."<br>". "Password: " .($row['mpassword'])."<br>" ."Gender: ".($row['gender'])."<br>". "Country: ".($row['country']);
}
    
?>
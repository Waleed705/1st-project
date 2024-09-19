<?php

session_start();
if(empty($_SESSION['user'])){
    header("Location: http://localhost/php/project/templates/login.php");
    die();
} else {
    header("Location: http://localhost/php/project/templates/home.php");
    die();
}
?>
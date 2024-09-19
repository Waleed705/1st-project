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
        <title>Home</title>
        <link rel="stylesheet" href="../style/ser.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <!-- <form action="db_request.php" method="POST"> -->
        
    <?php include_once 'header.php'; ?>
        <div class="main">
            <div class="top">
            <!-- <img  class="arrow left"> -->
                <div class="frame">
                    <div class="slider">
                        <img src="../images/01.jpg" class="image">
                        <img src="../images/02.jpg" class="image">
                        <img src="../images/03.jpg" class="image">
                        <img src="../images/04.jpg" class="image">
                        <img src="../images/05.jpg" class="image">
                        <img src="../images/06.jpg" class="image">
                        <img src="../images/07.jpeg" class="image">
                        <img src="../images/08.jpg" class="image">
                        <img src="../images/09.jpeg" class="image">
                        <img src="../images/10.jpg" class="image">
                    </div>
                </div>
            <!-- <img  class="arrow right"> -->
            </div> <!--End top-->
            <div class="bottom">
            
            </div> <!--End bottom-->
        </div> <!--end main -->

        <!-- </form> -->
        <script>
            
            // js of slider
            // "use strict"
            // const left = document.querySelector('.left')
            // const right = document.querySelector('.right')
            const slider = document.querySelector('.slider')
            const images = document.querySelectorAll('.image')


            let slideNumber = 1
            const length = images.length;

            $(document).ready(function() {
                function showRandomImage() {
                    var images = $(".image");
                    var randomIndex = Math.floor(Math.random() * images.length); 
                    images.hide();
                    images.eq(randomIndex).show();
                }
                slideinterval = setInterval(()=>{
                    showRandomImage();
                }, 1500);

                showRandomImage(); // Start the slider.
                
                

                // slider.addEventListener('mouseover',stopslideshow);
                // slider.addEventListener('mouseout',startslideshow);
                // right.addEventListener('mouseover',stopslideshow);
                // right.addEventListener('mouseout',startslideshow);
                // left.addEventListener('mouseover',stopslideshow);
                // left.addEventListener('mouseout',startslideshow);
            });
        </script>
    </body>
</html>
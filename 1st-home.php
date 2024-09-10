<?php
    session_start();
    if (empty($_SESSION['user'])){
        header("Location: http://localhost/php/project/1st-signup.php");
        die();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>1st Services</title>
        <link rel="stylesheet" href="ser.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            .img-logoi{
                width: 100px;
                height: 100px;
                margin-left: 30px;
            }
            .header{
                display: flex;
                justify-content: space-between;
                /* background: radial-gradient(circle, rgba(0,36,16,1) 0%, rgba(57,55,57,1) 0%, rgba(8,149,124,1) 57%); */


            }
            .main{
                /* background-image: linear-gradient(red green blue); */
                display: flex;
                align-items: center;
                gap: 5px;
                margin-top: 0px;
                /* margin-left: 50px; */
                flex-direction: column;
                
            }
            .top{
                display: flex;
                align-items: center;
                gap: 50px;
                margin-top: 20px;
                
            }
            .arrow{
                height: 150px;
                width: 120px;
                cursor: pointer;
            }
            .right{
                transform: rotate(180deg);
            }
            .frame{
                width: 1500px;
                height: 550px;
                overflow: hidden;
                box-shadow: 2px 5px 15px rgba(0,0,0,0.5);
            }
            .image{
                height: 550px;
                width: 1500px;
                /* object-fit: cover; */
            }
            .slider{
                display: flex;
                transition: all 1s ease;
            }
            .bottom{
                display: flex;
                gap: 10px;
            }
            .button{
                width: 15px;
                height: 15px;
                border: 1px solid white;
                border-radius: 50%;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <!-- <form action="1st.php" method="POST"> -->
        
    <?php include_once 'header.php'; ?>
        <div class="main">
            <div class="top">
            <!-- <img  class="arrow left"> -->
                <div class="frame">
                    <div class="slider">
                        <img src="01.jpg" class="image">
                        <img src="02.jpg" class="image">
                        <img src="03.jpg" class="image">
                        <img src="04.jpg" class="image">
                        <img src="05.jpg" class="image">
                        <img src="06.jpg" class="image">
                        <img src="07.jpeg" class="image">
                        <img src="08.jpg" class="image">
                        <img src="09.jpeg" class="image">
                        <img src="10.jpg" class="image">
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
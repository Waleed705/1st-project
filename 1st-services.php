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
</head>
<body>
    <!-- <form action="1st.php" method="POST"> -->
        <style>
            .img-logoi{
                width: 100px;
                height: 100px;
                margin-left: 30px;
            }
            .header{
                display: flex;
                justify-content: space-between;
                background: radial-gradient(circle, rgba(0,36,16,1) 0%, rgba(57,55,57,1) 0%, rgba(8,149,124,1) 57%);


            }
            
        </style>
        <div class="header">
    <div class="logo">
        <img src="logo.png" alt=""  class="img-logoi">
    </div>
        <div class="con-btn">
            <div class="btn1">
                <button  class="services" id="services" >Services</button>
            </div>
        <div class="btn">
            <button class="update" onclick="update()">Update</button>
        </div>
        <div class="btn2">
            <button name="logout" onclick="logOut()" class="logout">Logout</button>
        </div>
        <div class="btn3">
        <input type="hidden" Value="<?php echo $_SESSION['user']['id'] ?>"  name="user_id">
            <button name="about" onclick="about()" class="about">about</button>
            
        </div>
    </div>
    </div>
    <!-- css of slider  -->
     <style>
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
    width: 800px;
    height: 550px;
    overflow: hidden;
    box-shadow: 2px 5px 15px rgba(0,0,0,0.5);
}
 .image{
    height: 550px;
    width: 800px;
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
    <div class="main">
        <div class="top">
        <img src="2.png" class="arrow left">
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

        <img src="2.png" class="arrow right">
        
    </div> <!--End top-->
    <div class="bottom">
        
    </div> <!--End bottom-->
     </div> <!--end main -->

    <!-- </form> -->
    <script>
        function services() {
            window.location.href = "http://localhost/php/project/calculater/index.html"
        }
        function update() {
            window.location.href = "http://localhost/php/project/1st-update.php"
        }
        function logOut() {
            window.location.href = "http://localhost/php/project/1st-logout.php"
        }
        function about() {
            window.location.href = "http://localhost/php/project/1st-about.php"
        }
        
    // js of slider
        "use strict"
const left = document.querySelector('.left')
const right = document.querySelector('.right')
const slider = document.querySelector('.slider')
const images = document.querySelectorAll('.image')


let slideNumber = 1
const length = images.length;

const getrandomslides = () => Math.floor(Math.random() * length) + 1;

const showrandomslides = () => {
    const random = getrandomslides();
    if ( random > 1 ){
        slider.style.transform = `translateX(-${(random - 1) * 800}px)`;
    } else {
        slider.style.transform = `translateX(-${0* 800}px)`;
    }
    slideNumber = slideNumber <= length ? random : 1;
};


const bottom = document.querySelector('.bottom');

for(let i = 0; i<length; i++){
    const div = document.createElement('div');
    div.className = 'button';
    bottom.appendChild(div);
}

const changecolor = ()=>{
    resetbg();
    if ( slideNumber > 1 ){
        buttons[slideNumber - 1].style.backgroundColor = 'white';
    } else {
        buttons[0].style.backgroundColor = 'white';
    }
    
}


// start for dots 

const buttons = document.querySelectorAll('.button');
buttons[0].style.backgroundColor = 'white';

const resetbg = ()=>{
    buttons.forEach((button) =>{
        button.style.backgroundColor = 'transparent';
        button.addEventListener('mouseover',stopslideshow);
        button.addEventListener('mouseout',startslideshow);
    })
}

buttons.forEach((button, i) =>{
    button.addEventListener('click',()=>{
        resetbg();
        slider.style.transform = `translateX(-${i*800}px)`;
        slideNumber = i + 1;
        button.style.backgroundColor = 'white'
    });
});
// end dots 

const nextslide = () => {
    slider.style.transform = `translateX(-${(slideNumber - 1)*800}px)`;
}
const prevslide = () => {
        slider.style.transform = `translateX(-${(slideNumber-2)*800}px)`;
        slideNumber--;
    }
        
const getfirstslide = () => {
    slider.style.transform = `translateX(0px)`;
    slideNumber = 1 ;
}
const getlastslide = () => {
    slider.style.transform = `translateX(-${(length -1)*800}px)`;
    slideNumber = length ;
}
right.addEventListener('click',()=>{
    slideNumber < length ? nextslide() : getfirstslide() ;
    changecolor();
});

left.addEventListener('click',()=>{
    slideNumber > 1 ? prevslide() : getlastslide() ;
    changecolor();
});

// start auto slider

let slideinterval;

const startslideshow = ()=>{ 
    slideinterval = setInterval(()=>{
        showrandomslides();
        changecolor();
        // slideNumber < length ? nextslide() : getfirstslide() ;
        }, 1500);
};

const stopslideshow = ()=>{
    clearInterval(slideinterval);
}

startslideshow();

slider.addEventListener('mouseover',stopslideshow);
slider.addEventListener('mouseout',startslideshow);
right.addEventListener('mouseover',stopslideshow);
right.addEventListener('mouseout',startslideshow);
left.addEventListener('mouseover',stopslideshow);
left.addEventListener('mouseout',startslideshow);
    </script>
</body>
</html>
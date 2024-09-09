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
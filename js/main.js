let slideImg = document.querySelector(".slideImg");

const images = [
    "Source/2.jpg",
    "Source/3.jpg",
    "Source/1.jpg",
];

let current = 0;

function slider(){
    if(current === 2){
        current = 0;
    }
    else{
        current++;
    }
    slideImg.src = images[current];
}

let slideInt;
slideInt = setInterval(slider, 3000);

// navbar

let navbarBg = document.getElementById("navbar-bg");

window.addEventListener("scroll", function(){
    if(this.scrollY > 500){
        navbarBg.style.backgroundColor = "rgba(89, 97, 109, 0.952)"
    }
    else{
        navbarBg.style.backgroundColor = "rgba(89, 97,109, 0.452)"
    }
})
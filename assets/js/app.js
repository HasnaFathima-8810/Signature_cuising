
let navBtn =  document.querySelector("#menu-icon");
let navCloseBtn = document.querySelector("#nav-close");
let navArea = document.querySelector(".nav-area");
let gotoTop = document.querySelector("#gotoTop")
let searchOverlay = document.querySelector("#searchOverlay")


var navTL = gsap.timeline({defaults:{duration: .6}});

navTL.paused(true);

navTL.to("#Full-nav", {clipPath: 'circle(100%)'})
navTL.from('#Full-nav >li', {opacity: 0, x: '30px', stagger: 0.2},"-=.2")
navTL.from("#nav-close", {opacity: 0, scale: '0.6'},"-=1.3")


navBtn.addEventListener("click", ()=>{
    // navigation.classList.add("n-show");
    navTL.play();
});

navCloseBtn.addEventListener("click", function(){
    // navigation.classList.remove("n-show");
    navTL.reverse(.3);
});

gotoTop.addEventListener("click", function(){
    
    lenis.scrollTo("body");
    
});

document.querySelector('#search').addEventListener("click", function(){
   searchOverlay.style.clipPath = "circle(150% at 85% 10%)";
});

document.querySelector('#searchClose').addEventListener("click", function(){
   searchOverlay.style.clipPath = "circle(0% at 85% 10%)";
});


// subnav dropdown controll
function subnav() {
    document.getElementById("Subnav-Dropdown").classList.toggle("show");
};
  

window.onclick = function(event) {
    if (!event.target.matches('.subnav-dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}

// Scroll animations

gsap.registerPlugin(ScrollTrigger);

ScrollTrigger.create({
    trigger: "body",
    start: "300px top",
    onEnter() { navArea.classList.add("scrolled");},
    onLeaveBack() {navArea.classList.remove("scrolled");}
});

// ScrollTrigger.create({
//     trigger: "body",
//     start: "80% top",
//     onEnter() { navArea.classList.add("scrolled");},
//     onLeaveBack() {navArea.classList.remove("scrolled");}
// });

gsap.from("#gotoTop",{
    scrollTrigger: {
      trigger: "#Footer",
      start: "-800 bottom",
      toggleActions: "restart pause pause reverse"
    },
    opacity: 0,
    x: 200,
    ease: "power3",
    duration: 1
  
});



document.addEventListener("DOMContentLoaded", function () {
    // Select all elements with the class .heading
    const headings = document.querySelectorAll(".heading");

    // Loop through each .heading element
    headings.forEach((heading, index) => {
        // Create a pseudo-element (span) inside each .heading
        const pseudoElement = document.createElement("span");
        pseudoElement.className = "pseudo-element";
        heading.appendChild(pseudoElement);

        // Animate the pseudo-element using GSAP
        gsap.from(pseudoElement, {
            scrollTrigger: {
                trigger: heading,
                start: "top bottom",
                toggleActions: "restart complete pause reverse"
            },
            duration: 0.7,
            x: 200, 
            ease: "power2.inOut", 
           
        });

        gsap.from(heading, {
            scrollTrigger: {
                trigger: heading,
                start: "top bottom",
                toggleActions: "restart complete pause reverse"
            },
            duration: 0.6,
            x: -30, 
            opacity: 0, 
            ease: "power2.inOut", 
            
        });
    });
});






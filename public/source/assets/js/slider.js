var slideIndex = 1;
var status;
var id;
showSlide(slideIndex);

function moveSlide(n) {
    showSlide(slideIndex += n);
}

function currentDiv(n) {
    showSlide(slideIndex = n);
}

function showSlide(n) {
    move();
    clearTimeout(status);
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (slideIndex > x.length) {slideIndex = 1}    
    if (slideIndex < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("white", "");
    }
    x[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += "white";
    status = setTimeout(moveSlide,5000,1)
}
function move() {
  clearInterval(id);
  var elem = document.getElementById("myBar");   
  var width = 0;
  id = setInterval(frame, 49);
  function frame() {
    if(width >= 100)
        clearInterval(id);
    else{
        width++; 
        elem.style.width = width + '%';
    }
  }
}

window.onscroll = function() {menuSticky()};
			
var navbar = document.getElementById("nav");
var sticky = navbar.offsetTop;

function menuSticky() {
    if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
    } else {
    navbar.classList.remove("sticky");
    }
}
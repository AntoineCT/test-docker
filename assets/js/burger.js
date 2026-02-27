var burgerMenu = document.getElementById("burger-menu");
var overlay = document.getElementById("menu");

burgerMenu.addEventListener("click", function () {
  this.classList.toggle("close");
  overlay.classList.toggle("overlay");
});

var menuLinks = document.querySelectorAll("#menu a");
menuLinks.forEach(function (link) {
  link.addEventListener("click", function () {
    burgerMenu.classList.remove("close");
    overlay.classList.remove("overlay");
  });
});

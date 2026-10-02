let lastScrollTop = 0;
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        navbar.style.top = "-60px"; // Ocultar la barra cuando se hace scroll hacia abajo
    } else {
        navbar.style.top = "0"; // Mostrar la barra cuando se hace scroll hacia arriba
    }
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});
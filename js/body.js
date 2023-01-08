/* Función que determina si aparece el botón hacia el arriba. */
function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        buttonTop.style.display = "block"
    } else {
        buttonTop.style.display = "none"
    }
}
/* Función que envia el scroll hacia arriba. */
function backToTop() {
    document.body.scrollTop = 0
    document.documentElement.scrollTop = 0
}
/* Escucha la etiqueta de cada elemento. */
new bootstrap.ScrollSpy(document.body, {
    target: '#navbarNav'
})
/* Función de inicialización de la pagina. */
function init () {
    scrollFunction()
}

let buttonTop = document.getElementById("btn-back-to-top");
window.onscroll = function () {
    init()
};
buttonTop.addEventListener("click", backToTop);

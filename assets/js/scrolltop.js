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

/* Función de inicialización de la pagina. */
function run () {
    scrollFunction()
}

/* Creación de componentes globales. */
let buttonTop = document.getElementById("btn-back-to-top")

/* Función de deslizamiento de ventana. */
window.onscroll = function () {
    run()
}

/* Agregación del evento de botón scroll */
buttonTop.addEventListener("click", backToTop)

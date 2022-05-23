window.onload = function() {
    cambiar_nav(screen.width);
};
window.onresize = function(event) {
    cambiar_nav(screen.width);
};

function cambiar_nav(ancho) {
    if(ancho < 500) {
        document.getElementById("nav_ordenador").style.display = "none";
        document.getElementById("nav_movil").style.display = "block";
    }
    else {
        document.getElementById("nav_ordenador").style.display = "block";
        document.getElementById("nav_movil").style.display = "none";
    }
}
function abrir_menu() {
    document.getElementById("fondo_menu_movil").style.display = "flex";
    document.getElementById("fondo_menu_movil").style.alignItems = "flex-end";
    document.getElementById("content").style.display = "none";
}
function cerrar_menu() {
    document.getElementById("fondo_menu_movil").style.display = "none";
    document.getElementById("content").style.display = "block";
}
function mostrar_borde(tr) {
	document.getElementById(tr.id).style.borderBottom = "1px solid white";
}
function ocultar_borde(tr) {
	document.getElementById(tr.id).style.borderBottom = "1px solid black";
}
function cerrar_modal_carta() {
	document.getElementById("modal_informacion").style.display = "none";
	document.getElementById("footer").style.display = "block";
	document.getElementById("primary").style.display = "block";
	document.getElementById("content").classList.remove('fondo_carta_informacion');
	document.getElementById("content").classList.remove('d-md-flex');
	document.getElementById("main").classList.remove('mt-5');
}
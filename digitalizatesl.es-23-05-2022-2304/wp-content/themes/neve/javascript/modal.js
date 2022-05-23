window.onload = function() {
	console.log("modal cargada");
}
function modal(modal, estado) {
	document.getElementById(modal).style.display = "block";
	document.getElementById("primary").style.opacity = "5%";
	document.getElementById("titulo_modal").style.border = "2px solid white";
	if(modal == "modal_login" || modal == "modal_registro") {
		document.getElementById("titulo_modal").style.backgroundColor = "red";
		document.getElementById(modal).style.width = "500px";
	}
	else if(modal == "modal_cuenta") {
		if(modal == "modal_cuenta" && estado == "bien") {
			document.getElementById("titulo_modal").style.backgroundColor = "green";
		}
		else if(modal == "modal_cuenta" && estado == "advertencia") {
			document.getElementById("titulo_modal").style.backgroundColor = "orange";
		}
		else {
			document.getElementById("titulo_modal").style.backgroundColor = "red";
		}
		document.getElementById(modal).style.width = "500px";
	}
	else {
		document.getElementById("titulo_modal").style.backgroundColor = "green";
		document.getElementById(modal).style.width = "400px";
	}
}
function modal(modal) {
console.log("dentro");
}
function cerrar_modal(modal) {
	document.getElementById(modal).style.display = "none";
	document.getElementById("primary").style.opacity = "100%";
}
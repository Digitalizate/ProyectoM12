function comprobar_input(input) {
	if(input.value == "") {
		input_error(input.id, input.id+"_error", "No puede estar vacio");
	}
	else {
		if(input.id.includes('nombre') || input.id.includes('apellido')) {
			if((input.value).length < 3 || (input.value).length > 30) {
				if(input.id.includes('nombre')) {
					input_error(input.id, input.id+"_error", "Revisa la longitud del nombre (Longitud mínima 3 y máximo 30 carácteres)");
				}
				else {
					input_error(input.id, input.id+"_error", "Revisa la longitud del apellido (Longitud mínima 3 y máximo 30 carácteres)");
				}
			}
			else {
				input_bien(input.id);
			}
		}
		else if(input.id.includes("email")) {
			if((input.value).length < 11 || (input.value).length > 30) {
				input_error(input.id, input.id+"_error", "Revisa la longitud del correo (Longitud mínima 11 y máxima 30 carácteres)");
			}
			else if(!input.value.indexOf("@") || !input.value.lastIndexOf(".", 4)) {
				input_error(input.id, input.id+"_error", "Formato del correo incorrecto");
			}
			else {
				var nombre_correo = input.value.substring(0,input.value.indexOf("@"));
				var organizacion_correo = input.value.substring(input.value.indexOf("@")+1, input.value.lastIndexOf("."));
				var tipo_correo = input.value.substring(input.value.lastIndexOf(".")+1, input.value.length);
				if (nombre_correo.length  < 3 || nombre_correo.length  > 25 || organizacion_correo.length  < 3 || organizacion_correo.length  > 20) {
					input_error(input.id, input.id+"_error", "Formato del correo incorrecto");
				}
				else if (tipo_correo.length  < 2 || tipo_correo.length  > 5) {
					input_error(input.id, input.id+"_error", "Formato del correo incorrecto");
				}
				else {
					input_bien(input.id);
				}
			}
		}
		else if(input.id.includes("telefono")) {
			if((input.value).length <= 8 || (input.value).length >= 10) {
				input_error(input.id, input.id+"_error", "Número de teléfono incorrecto");
			}
			else if(isNaN(input.value)) {
				input_error(input.id, input.id+"_error", "Formato del teléfono incorrecto");
			}
			else {
				input_bien(input.id);
			}
		}
		else if(input.id.includes("password")) {
			if(input.id.includes("registro")) {
				comprobar_input_contraseña(input, "registro");
			}
			else {
				console.log("dentro de login");
				comprobar_input_contraseña(input, "login");
			}
		}
		else if(input.id == "contacto_mensaje" && (input.value).length < 10 || (input.value).length > 255) {
			input_error(input.id, input.id+"_error", "Revisa la longitud del mensaje (Longitud mínima 10 y máxima 255 carácteres)");
		}
		else {
			input_bien(input.id);
		}
	}
}

// Cambiar color input
function input_error(input_error, nombre_input, mensaje) {
	document.getElementById(input_error).style.borderColor = "red";
	document.getElementById(nombre_input).innerHTML = mensaje;
	document.getElementById(nombre_input).className = "m-0 text-center";
}
function input_bien(input_bien) {
	document.getElementById(input_bien).style.borderColor = "green";
	document.getElementById(input_bien+"_error").innerHTML = "";
	document.getElementById(input_bien+"_error").className = "mb-4";
}

function comprobar_input_contraseña(input, pagina) {
	if(input.id.includes("2")) {
		if(comprobar_contraseñas(input, pagina)) {
			input_bien(input.id);
		}
	}
	else {
		console.log("dentro de comprobar");
		if((input.value).length < 8 || (input.value).length > 20) {
			console.log("longitud mal");
			input_error(input.id, input.id+"_error", "Longitud de la contraseña incorrecta");
		}
		else {
			input_bien(input.id);
			if(pagina == "registro") {
				var password_2 = document.getElementById(pagina+"_password_2");
				if(password_2.value != "") {
					comprobar_contraseñas(password_2, pagina);
				}
			}
		}
	}
}
function comprobar_contraseñas(input, pagina) {
	if(document.getElementById(pagina+"_password").value == "") {
		input_error(input.id, input.id+"_error", "Comprueba la contraseña del otro campo");
	}
	else {
		if(document.getElementById(pagina+"_password").value != input.value) {
			input_error(input.id, input.id+"_error", "Las contraseñas no coinciden");
		}
		else {
			return true;
		}
	}
}
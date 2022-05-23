<?php
/*
	Template Name: Mi cuenta
*/
	/* 
		Condición: si el metodo de la petición es GET y si la variable elemento sacada de GET está definida 
		y el conteo de GET es mayor que 
	*/
	if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET) && count($_GET) > 0) {
		/* Si la variable nombre sacada del GET está definida */
		if(isset($_GET['nombre'])) {
			/* 
				Si la variable nombre sacada del GET es igual a formato, 
				la variable pondrá formato incorrecto y el color será rojo
			*/
			if($_GET['nombre'] == "formato") {
				$nombre = "<p class='m-auto mt-2 py-2' style='color:white; background-color: red; max-width: 365px;'>El formato del nombree és incorrecto</p>";
				$color_nombre = "red";
			}
			/* 
				Pero Si la variable nombre sacada del GET es igual a exito, 
				la variable pondrá Se ha cambiado con éxito el nombre y el color será verde
			*/
			else if($_GET['nombre'] == "exito") {
				$nombre = "<p class='m-auto mt-2 py-2' style='color:white; background-color: green; max-width: 365px;'>Se ha cambiado con éxito el nombre</p>";
				$color_nombre = "green";
			}
			/* 
				Pero Si la variable nombre sacada del GET es igual a no_cambiado, 
				la variable pondrá No se ha podido modificar porque és el mismo nombre y el color será #ff6f00
			*/
			else if($_GET['nombre'] == "no_cambiado") {
				$nombre = "<p class='m-auto mt-2 py-2' style='color:white; background-color: #ff6f00; max-width: 365px;'>No se ha podido modificar porque és el mismo nombre</p>";
				$color_nombre = "#ff6f00";
			}
		}
		/* Sino la variable nombre se quedará vacia */
		else {
			$nombre = "";
		}
		/* Si la variable apellido sacada del GET está definida */
		if(isset($_GET['apellido'])) {
			/* 
				Si la variable apellido sacada del GET es igual a formato, 
				la variable pondrá formato incorrecto y el color será rojo
			*/
			if($_GET['apellido'] == "formato") {
				$apellido = "<p class='m-auto mt-2 py-2' style='color:white; background-color: red; max-width: 365px;'>El formato del apellido és incorrecto</p>";
				$color_apellido = "red";
			}
			/* 
				Pero si la variable apellido sacada del GET es igual a exito, 
				la variable pondrá Se ha cambiado con éxito el apellido y el color será verde
			*/
			else if($_GET['apellido'] == "exito") {
				$apellido = "<p class='m-auto mt-2 py-2' style='color:white; background-color: green; max-width: 365px;'>Se ha cambiado con éxito el apellido</p>";
				$color_apellido = "green";
			}
			/* 
				Pero Si la variable apellido sacada del GET es igual a no_cambiado, 
				la variable pondrá No se ha podido modificar porque és el mismo apellido y el color será #ff6f00
			*/
			else if($_GET['apellido'] == "no_cambiado") {
				$apellido = "<p class='m-auto mt-2 py-2' style='color:white; background-color: #ff6f00; max-width: 365px;'>No se ha podido modificar porque és el mismo apellido</p>";
				$color_apellido = "#ff6f00";
			}
		}
		/* Sino la variable apellido se quedará vacia */
		else {
			$apellido = "";
		}
		/* Si la variable correo sacada del GET está definida */
		if(isset($_GET['correo'])) {
			/* 
				Si la variable correo sacada del GET es igual a formato, 
				la variable pondrá formato incorrecto y el color será rojo
			*/
			if($_GET['correo'] == "formato") {
				$correo = "<p class='m-auto mt-2 py-2' style='color:white; background-color: red; max-width: 365px;'>El formato del correo és incorrecto</p>";
				$color_correo = "red";
			}
			/* 
				Pero si la variable correo sacada del GET es igual a exito, 
				la variable pondrá Se ha cambiado con éxito el correo y el color será verde
			*/
			else if($_GET['correo'] == "exito") {
				$correo = "<p class='m-auto mt-2 py-2' style='color:white; background-color: green; max-width: 365px;'>Se ha cambiado con éxito el correo</p>";
				$color_correo = "green";
			}
			/* 
				Pero Si la variable correo sacada del GET es igual a no_cambiado, 
				la variable pondrá No se ha podido modificar porque és el mismo correo y el color será #ff6f00
			*/
			else if($_GET['correo'] == "no_cambiado") {
				$correo = "<p class='m-auto mt-2 py-2' style='color:white; background-color: #ff6f00; max-width: 365px;'>No se ha podido modificar porque és el mismo correo</p>";
				$color_correo = "#ff6f00";
			}
		}
		/* Sino la variable correo se quedará vacia */
		else {
			$correo = "";
		}
		/* Si la variable telefono sacada del GET está definida */
		if(isset($_GET['telefono'])) {
			/* 
				Si la variable telefono sacada del GET es igual a formato, 
				la variable pondrá formato incorrecto y el color será rojo
			*/
			if($_GET['telefono'] == "formato") {
				$telefono = "<p class='m-auto mt-2 py-2' style='color:white; background-color: red; max-width: 365px;'>El formato del teléfono és incorrecto</p>";
				$color_telefono = "red";
			}
			/* 
				Pero si la variable telefono sacada del GET es igual a exito, 
				la variable pondrá Se ha cambiado con éxito el telefono y el color será verde
			*/
			else if($_GET['telefono'] == "exito") {
				$telefono = "<p class='m-auto mt-2 py-2' style='color:white; background-color: green; max-width: 365px;'>Se ha cambiado con éxito el teléfono</p>";
				$color_telefono = "green";
			}
			/* 
				Pero Si la variable telefono sacada del GET es igual a no_cambiado, 
				la variable pondrá No se ha podido modificar porque és el mismo telefono y el color será #ff6f00
			*/
			else if($_GET['telefono'] == "no_cambiado") {
				$telefono = "<p class='m-auto mt-2 py-2' style='color:white; background-color: #ff6f00; max-width: 365px;'>No se ha podido modificar porque és el mismo teléfono</p>";
				$color_telefono = "#ff6f00";
			}
		}
		/* Sino la telefono nombre se quedará vacia */
		else {
			$telefono = "";
		}
		/* Si la variable password sacada del GET está definida */
		if(isset($_GET['password'])) {
			/* 
				Si la variable password sacada del GET es igual a formato, 
				la variable pondrá formato incorrecto y el color será rojo
			*/
			if($_GET['password'] == "formato") {
				$password = "<p class='m-auto mt-2 py-2' style='color:white; background-color: red; max-width: 365px;'>El formato de la contraseña és incorrecta</p>";
				$color_password = "red";
			}
			/* 
				Pero si la variable password sacada del GET es igual a exito, 
				la variable pondrá Se ha cambiado con éxito el password y el color será verde
			*/
			else if($_GET['password'] == "exito") {
				$password = "<p class='m-auto mt-2 py-2' style='color:white; background-color: green; max-width: 365px;'>Se ha cambiado con éxito la contraseña</p>";
				$color_password = "green";
			}
			/* 
				Pero Si la variable password sacada del GET es igual a no_cambiado, 
				la variable pondrá No se ha podido modificar porque és el mismo password y el color será #ff6f00
			*/
			else if($_GET['password'] == "no_cambiado") {
				$password = "<p class='m-auto mt-2 py-2' style='color:white; background-color: #ff6f00; max-width: 365px;'>No se ha podido modificar porque és la misma contraseña</p>";
				$color_password = "#ff6f00";
			}
		}
		/* Sino la password nombre se quedará vacia */
		else {
			$password = "";
		}
	}

	/* Si la id de la sesión está definida */
	if(isset($_SESSION['id'])) {
		/* Hace la conexión a la base de datos restaurante */
		$mydb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
		/* 
			En una variable guarda la información del usuario haciendo la consulta a la tabla usuario 
			donde la id sea igual a la cogida por la variable de sesión 
		*/
		$informacion_usuario = $mydb->get_results("SELECT * from usuarios where id = '$_SESSION[id]'");
		/* Se cierra la conexión con la base de datos */
		$mydb->close();
	}
	/* Sino redirecciona a la url actual */
	else {
		wp_redirect(site_url()); 
	}	

get_header();

?>
<div id="main_cuenta" class="wrap m-auto position-relative" style="min-height: 82vh;">
	<div id="primary" class="container content-area py-5">
		<main id="main" class="bg-black site-main text-center">
			<h2 class="pt-5">Mi cuenta</h2>
			<div>
			<?php
			// Recorre el array con la información del usuario, donde cada elemento será usuario
			foreach ($informacion_usuario as $usuario) {?>
				<!-- El envio del formulario envia los datos a admin-post.php -->
				<form id="form_nombre_cuenta" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="text-center">
					<label for="cambiar_nombre" class="fs-5 m-3">Nombre:</label><br>
					<!-- El valor del nombre será del usuario el nombre, al hacer el blur comprobará el input, si el color del nombre está definido será blanco -->
					<input type="text" name="cambiar_nombre" id="cambiar_nombre" class="m-0 mb-2" autocomplete="off" value="<?php echo $usuario->nombre ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_nombre) ? $color_nombre : "white") ?>"/><br>
					<input type="hidden" name="action" value="cambiar_datos">
					<!-- Si el nombre está definido el valor será vacio -->
					<?php echo (isset($nombre) ? $nombre : "") ?>
					<input type="submit" class="mt-4 mb-3" id="cambiar_nombre_submit" name="cambiar_nombre_submit" value="Modificar nombre">
				</form>
				<!-- El envio del formulario envia los datos a admin-post.php -->
				<form id="form_apellido_cuenta" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="text-center">
					<label for="cambiar_apellido" class="fs-5 m-3">Apellido:</label><br>
					<!-- El valor del apellido será del usuario el apellido, al hacer el blur comprobará el input, si el color del apellido está definido será blanco -->
					<input type="text" name="cambiar_apellido" id="cambiar_apellido" class="m-0 mb-2" autocomplete="off" value="<?php echo $usuario->apellido ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>"/><br>
					<input type="hidden" name="action" value="cambiar_datos">
					<!-- Si el apellido está definido el valor será vacio -->
					<?php echo (isset($apellido) ? $apellido : "") ?>
					<input type="submit" class="mt-4 mb-3" id="cambiar_apellido_submit" name="cambiar_apellido_submit" value="Modificar apellido">
				</form>
				<!-- El envio del formulario envia los datos a admin-post.php -->
				<form id="form_correo_cuenta" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="text-center">
					<label for="cambiar_correo" class="fs-5 m-3">Correo:</label><br>
					<!-- El valor del correo será del usuario el correo, al hacer el blur comprobará el input, si el color del correo está definido será blanco -->
					<input type="text" name="cambiar_correo" id="cambiar_correo" class="m-0 mb-2" autocomplete="off" value="<?php echo $usuario->correo ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>"/><br>
					<input type="hidden" name="action" value="cambiar_datos">
					<!-- Si el correo está definido el valor será vacio -->
					<?php echo (isset($correo) ? $correo : "") ?>
					<input type="submit" class="mt-4 mb-3" id="cambiar_correo_submit" name="cambiar_correo_submit" value="Modificar correo">
				</form>
				<form id="form_telefono_cuenta" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="text-center">
					<label for="cambiar_telefono" class="fs-5 m-3">Teléfono:</label><br>
					<!-- El valor del telefono será del usuario el telefono, al hacer el blur comprobará el input, si el color del telefono está definido será blanco -->
					<input type="text" name="cambiar_telefono" id="cambiar_telefono" class="m-0 mb-2" autocomplete="off" value="<?php echo $usuario->telefono ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>"/><br>
					<input type="hidden" name="action" value="cambiar_datos">
					<!-- Si el telefono está definido el valor será vacio -->
					<?php echo (isset($telefono) ? $telefono : "") ?>
					<input type="submit" class="mt-4 mb-3" id="cambiar_telefono_submit" name="cambiar_telefono_submit" value="Modificar teléfono">
				</form>
				<form id="form_password_cuenta" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="text-center pb-5">
					<label for="cambiar_password" class="fs-5 m-3">Contraseña:</label><br>
					<!-- El valor del password será del usuario el password, al hacer el blur comprobará el input, si el color del password está definido será blanco -->
					<input type="password" name="cambiar_password" id="cambiar_password" class="m-0 mb-2" autocomplete="off" onblur="comprobar_input(this)" style="border-color: white"/><br>
					<input type="hidden" name="action" value="cambiar_datos">
					<!-- Si el password está definido el valor será vacio -->
					<?php echo (isset($password) ? $password : "") ?>
					<input type="submit" class="mt-4" id="cambiar_passowrd_submit" name="cambiar_passowrd_submit" value="Modificar contraseña">
				</form>
			<?php
			} ?>
			</div>
		</main>
	</div>
</div>
<?php
	/* Muestra el footer definido en su archivo t_footer.php */
	include get_template_directory()."/page-templates/t_footer.php";
?>

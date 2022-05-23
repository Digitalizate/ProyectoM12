<?php
/*
	Template Name: Login
*/

	/* 
		Condición: si el metodo de la petición es GET y si la variable elemento sacada de GET está definida 
		y el conteo de GET es mayor que 0
	*/
	if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET) && count($_GET) > 0) {
		/* Si la variable exito sacada del GET está definida */
		if(isset($_GET["exito"])) {
			/* Si la variable exito sacada del GET está definida siendo igual a no*/
			if(isset($_GET["exito"]) == "no") {
				/* El color del email y la password serà rojo y el error de password será Comprueba el correo y/o la contraseña*/
				$color_email = "red";
				$color_password = "red";
				$error_password = "Comprueba el correo y/o la contraseña";
			}
		}
	}

get_header();

?>
<div id="main_login" class="wrap position-relative">
	<div id="primary" class="content-area container py-5">
		<main id="main" class="bg-black site-main row m-2 m-md-auto py-5">
			<h2 class="mt-5 text-center">Login</h2>
			<!-- El envio del formulario envia los datos a admin-post.php -->
			<form id="form_login" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="col-12 m-auto text-center" style="max-width:500px;" >
				<label for="login_email" class="fs-5 m-3">Correo:</label><br>
				<!-- Si la variable email sacada del GET está definida, el GET del email estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
				<input type="email" name="login_email" id="login_email" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["email"]) ? $_GET["email"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>" required />
				<!-- Si la variable error_email sacada del GET está definida, el GET del error_email estará vacio -->
				<p id="login_email_error" class="mb-4"><?php echo (isset($error_email) ? $error_email : "") ?></p>
				<label for="login_password" class="m-3">Contraseña:</label><br>
				<!-- Si la variable contrasena sacada del GET está definida, el GET del contrasena estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
				<input type="password" name="login_password" id="login_password" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["password"]) ? $_GET["password"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_password) ? $color_password : "white") ?>" required />
				<!-- Si la variable error_password sacada del GET está definida, el GET del error_password estará vacio -->
				<p id="login_password_error" class="mb-3 mt-2"><?php echo (isset($error_password) ? $error_password : "") ?></p>
				<input type="hidden" name="action" value="login_formulario">
				<input type="submit" class="mt-3 mb-4" id="login_submit" name="login_submit" value="Enviar">
			</form>
		</main>
	</div>
	<div id="modal_login">
		<!-- Al clicar llamará a la función que cerrará el modal -->
		<input id="modal_btn_cerrar" type="button" name="cerrar_modal" value="X" onclick="cerrar_modal('modal_login')"/>
		<h1 id="titulo_modal" class="fs-1 text-center py-2">Error</h1>
		<div style="border: 2px solid white; padding: 15px; background-color: black;">
			<p class="fs-4 text-center mt-2 mb-3">Ha habido un error con los datos!</p>
			<span>Comprueba si los datos introduccidos son correctos</span>
			<br>
			<span>Gracias!</span>
		</div>
	</div>
</div>
<?php
	/* Muestra el footer definido en su archivo t_footer.php */
	include get_template_directory()."/page-templates/t_footer.php";
?>

<?php
/*
	Template Name: Perfil
*/
	/* 
		Condición: si el metodo de la petición es GET y si la variable elemento sacada de GET está definida 
		y el conteo de GET es mayor que 0
	*/
	if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET) && count($_GET) > 0) {
		/* Si la variable exito sacada del GET está definida */
		if(isset($_GET["exito"])) {
			?>
			<script>
				/* Función que llama a la función modal */
				window.onload = function() {
					modal();
				};
			</script>
			<?php
		}
		else {
			/* Si la variable nombre sacada del GET está definida, el color del input será verde */
			if(isset($_GET["nombre"])) {
				$color_nombre = "green";
			}
			/* Sino el color del input será de color rojo y el error será revisa el formato del nombre */
			else {
				$color_nombre = "red";
				$error_nombre = "Revisa el formato del nombre";
			}
			/* Si la variable email sacada del GET está definida, el color del input será verde */
			if(isset($_GET["email"])) {
				$color_email = "green";
			}
			/* Sino el color del input será de color rojo y el error será revisa el formato del email */
			else {
				$color_email = "red";
				$error_email = "Revisa el formato del correo";
			}
			/* Si la variable apellido sacada del GET está definida, el color del input será verde */
			if(isset($_GET["apellido"])) {
				$color_apellido = "green";	
			}
			/* Sino el color del input será de color rojo y el error será revisa el formato del apellido */
			else {
				$color_apellido = "red";
				$error_apellido = "Revisa el formato del apellido";
			}
			/* Si la variable password sacada del GET está definida, el color del input será verde */
			if(isset($_GET["password"])) {
				$color_password = "green";
			}
			/* Sino el color del input será de color rojo y el error será revisa el formato del password */
			else {
				$color_password = "red";
				$error_password = "Revisa el formato del password";
			}
		}
	}

get_header();

?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main text-center">
			<h2 class="pt-5">Editar Perfil</h2>
			<!-- El envio del formulario envia los datos a admin-post.php -->
			<form id="form_contacto" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="text-center" >
			<div class="container">
				<div class="row">
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="perfil_nombre" class="fs-5 m-3">Nombre(*)</label><br>
						<!-- Si la variable nombre sacada del GET está definida, el GET del nombre estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
						<input type="text" name="perfil_nombre" id="perfil_nombre" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["nombre"]) ? 	$_GET["nombre"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_nombre) ? $color_nombre  : "white") ?>" required />
						<!-- Si la variable error_nombre sacada del GET está definida, el GET del error_nombre estará vacio -->
						<p id="registro_nombre_error" class="mb-2"><?php echo (isset($error_nombre) ? $error_nombre : "") ?></p>
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_email" class="fs-5 m-3">Correo(*)</label><br>
						<!-- Si la variable email sacada del GET está definida, el GET del email estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
						<input type="email" name="registro_email" id="registro_email" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["email"]) ? $_GET["email"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>" required />
						<!-- Si la variable error_email sacada del GET está definida, el GET del error_email estará vacio -->
						<p id="registro_email_error" class="mb-2"><?php echo (isset($error_email) ? $error_email : "") ?></p>
					</div>
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
				</div>
				<div class="row">
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
					<div class="col-md-6 col-lg-4 pe-0">

						<label for="registro_apellido" class="fs-5 m-3">Apellidos</label><br>
						<!-- Si la variable apellido sacada del GET está definida, el GET del apellido estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
						<input type="text" name="registro_apellido" id="registro_apellido" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["apellido"]) ? $_GET["apellido"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_nombre) ? $color_nombre  : "white") ?>" required />
						<!-- Si la variable error_apellido sacada del GET está definida, el GET del error_apellido estará vacio -->
						<p id="registro_apellido_error" class="mb-2"><?php echo (isset($error_apellido) ? $error_apellido : "") ?></p>

					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="contrasena" class="fs-5 m-3">Contraseña(*):</label><br>
						<!-- Si la variable contrasena sacada del GET está definida, el GET del contrasena estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
						<input type="registro_password" name="registro_password" id="registro_password" autocomplete="off" value="<?php echo (isset($_GET["password"]) ? $_GET["password"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_password) ? $color_password : "white") ?>" required />
						<!-- Si la variable error_password sacada del GET está definida, el GET del error_password estará vacio -->
						<p id="registro_password_error" ><?php echo (isset($error_password) ? $error_password : "") ?></p>
					</div>
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
				</div>
				<div class="row">
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_telefono" class="fs-5 m-3">Teléfono:</label><br>
						<!-- Si la variable telefono sacada del GET está definida, el GET del telefono estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
						<input type="text" name="registro_telefono" id="registro_telefono" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["telefono"]) ? $_GET["email"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>" required />
						<!-- Si la variable error_telefono sacada del GET está definida, el GET del error_telefono estará vacio -->
						<p id="registro_telefono_error" class="mb-2"><?php echo (isset($error_telefono) ? $error_telefono : "") ?></p>
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="confirmcontrasena" class="fs-5 m-3">Confirmar contraseña(*):</label><br>
						<input type="password" name="confirmcontrasena" id="confirmcontrasena" required>
					</div>
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="archivo" class="fs-5 m-3">Sube tu certificado covid(*):</label><br>
						<input type="file" class="mb-4" name="archivo">
					</div>
				</div>
					<input type="hidden" name="action" value="process_form">
					<input type="submit" name="submit" value="Guardar cambios" class="m-3">
			</div>
			</form>

		</main>
	</div>
</div>

<style>
	input[type="submit"] {
		background-color: black;
		color: white;
	}
	main#main {
		background-color: white;
		color: black;	
	}
</style>
<?php
	/* Muestra el footer definido en su archivo t_footer.php */
	include get_template_directory()."/page-templates/t_footer.php";
?>

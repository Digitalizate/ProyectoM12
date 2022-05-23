<?php
/*
	Template Name: Registro
*/
	if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET)) {
		if(isset($_GET['exito'])) {
			if($_GET['exito'] == "no") {
				$vacios = "<p class='m-auto my-2 py-2' style='color:white; background-color: red; max-width: 365px;'>No puedes dejar los campos vacios</p>";
				$color_nombre = "red";
				$color_apellido = "red";
				$color_telefono = "red";
				$color_email = "red";
				$color_password = "red";
				$color_password_2 = "red";
			}
		}
		else {
			$vacios = "";
		}
		if(count($_GET) > 0) {
			if(isset($_GET['nombre'])) {
				if(!empty($_GET['nombre'])) {
					$color_nombre = "green";
				}
			}
			else {
				$nombre = "<p id='info_registro_nombre' class='m-auto mt-3 py-2' style='color:white; background-color: red; max-width: 365px;'>Campo incorrecto o vacío</p>";
				$color_nombre = "red";
			}
			if(isset($_GET['apellido'])) {
				if(!empty($_GET['apellido'])) {
					$color_apellido = "green";
				}
			}
			else {
				$apellido = "<p id='info_registro_apellido' class='m-auto mt-3 py-2' style='color:white; background-color: red; max-width: 365px;'>Campo incorrecto o vacío</p>";
				$color_apellido = "red";
			}
			if(isset($_GET['telefono'])) {
				if(!empty($_GET['telefono'])) {
					$color_telefono = "green";
				}
			}
			else {
				$telefono = "<p id='info_registro_telefono' class='m-auto mt-3 py-2' style='color:white; background-color: red; max-width: 365px;'>Campo incorrecto o vacío</p>";
				$color_telefono = "red";
			}
			if(isset($_GET['email'])) {
				if(!empty($_GET['email'])) {
					$color_email = "green";
				}
			}
			else {
				$email = "<p id='info_registro_correo' class='m-auto mt-3 py-2' style='color:white; background-color: red; max-width: 365px;'>Campo incorrecto o vacío</p>";
				$color_email = "red";
			}
			if(isset($_GET['password'])) {
				if($_GET['password'] == 2) {
					$password = "<p id='info_registro_password' class='col-12 m-auto mt-3 py-2' style='color:white; background-color: red; max-width: 500px;'>Las contraseñas no coinciden</p>";
					$color_password = "red";
				}
			}
			else {
				$password = "<p id='info_registro_password' class='col-12 m-auto mt-3 py-2' style='color:white; background-color: #ff6f00; max-width: 500px;'>Vuelve a añadir las contraseñas</p>";
				$color_password = "#ff6f00";
			}
		}
	}

get_header();

?>
<div id="main_registro" class="wrap py-1 py-lg-4">
	<div id="primary" class="content-area container d-flex">
		<main id="main" class="bg-black site-main text-center m-auto my-5">
			<h2 class="pt-4">Formulario de registro</h2>
			<form id="form_contacto" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="text-center pb-3">
			<div class="container">
				<div class="row">
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_nombre" class="fs-5 m-3">Nombre:</label><br>
						<input type="text" name="registro_nombre" id="registro_nombre" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["nombre"]) ? 	$_GET["nombre"] : "") ?>" onblur="comprobar_input(this)" onkeypress='document.getElementById("info_registro_nombre").style.display = "none";' style="border-color:<?php echo (isset($color_nombre) ? $color_nombre  : "white") ?>" required />
						<p id="registro_nombre_error" class="mb-4"><?php echo (isset($error_nombre) ? $error_nombre : "") ?></p>
						<?php echo (isset($nombre) ? $nombre : "") ?>
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_apellido" class="fs-5 m-3">Apellido:</label><br>
						<input type="text" name="registro_apellido" id="registro_apellido" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["apellido"]) ? $_GET["apellido"] : "") ?>" onblur="comprobar_input(this)" onkeypress='document.getElementById("info_registro_apellido").style.display = "none";' style="border-color:<?php echo (isset($color_apellido) ? $color_apellido  : "white") ?>" required />
						<p id="registro_apellido_error" class="mb-4"><?php echo (isset($error_apellido) ? $error_apellido : "") ?></p>
						<?php echo (isset($apellido) ? $apellido : "") ?>
					</div>
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
				</div>
				<div class="row">
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_telefono" class="fs-5 m-3">Teléfono:</label><br>
						<input type="text" name="registro_telefono" id="registro_telefono" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["telefono"]) ? $_GET["telefono"] : "") ?>" onblur="comprobar_input(this)" onkeypress='document.getElementById("info_registro_telefono").style.display = "none";' style="border-color:<?php echo (isset($color_telefono) ? $color_telefono : "white") ?>" required />
						<p id="registro_telefono_error" class="mb-4"><?php echo (isset($error_telefono) ? $error_telefono : "") ?></p>
						<?php echo (isset($telefono) ? $telefono : "") ?>
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_email" class="fs-5 m-3">Correo:</label><br>
						<input type="email" name="registro_email" id="registro_email" class="m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["email"]) ? $_GET["email"] : "") ?>" onblur="comprobar_input(this)" onkeypress='document.getElementById("info_registro_correo").style.display = "none";' style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>" required />
						<p id="registro_email_error" class="mb-4"><?php echo (isset($error_email) ? $error_email : "") ?></p>
						<?php echo (isset($email) ? $email : "") ?>
					</div>
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
				</div>
				<div class="row">
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_password" class="fs-5 m-3">Contraseña:</label><br>
						<input type="password" name="registro_password" id="registro_password" value="<?php echo (isset($_GET["password"]) ? $_GET["password"] : "") ?>" onblur="comprobar_input(this)" onkeypress='document.getElementById("info_registro_password").style.display = "none";' style="border-color:<?php echo (isset($color_password) ? $color_password : "white") ?>" required />
						<p id="registro_password_error" class="mb-4"><?php echo (isset($error_password) ? $error_password : "") ?></p>
					</div>
					<div class="col-md-6 col-lg-4 pe-0">
						<label for="registro_password_2" class="fs-5 m-3">Confirmar contraseña:</label><br>
						<input type="password" name="registro_password_2" id="registro_password_2" onblur="comprobar_input(this)" onkeypress='document.getElementById("info_registro_password").style.display = "none";' style="border-color:<?php echo (isset($color_password) ? $color_password : "white") ?>" required>
						<p id="registro_password_2_error" class="mb-4" ></p>
					</div>
					<div class="d-sm-none d-md-none d-lg-block col-lg-2">
					</div>
					<?php echo (isset($password) ? $password : "") ?>
				</div>
				<div class="row">
					<div class="col">
						<label class="mt-4 mb-3 fs-5"><input type="checkbox" class="me-2" id="registro_terminos" name="registro_terminos" value="acepto" required>Aceptar los Términos y Condiciones</label><br>
					</div>
				</div>
				<input type="hidden" name="action" value="registro_formulario">
				<?php echo (isset($vacios) ? $vacios : "") ?>
				<input type="submit" id="registro_submit" name="registro_submit" value="Enviar" class="m-3">
			</div>
			</form>
		</main>
	</div>
</div>
<?php
	include get_template_directory()."/page-templates/t_footer.php";
?>

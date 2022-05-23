<?php
/*
	Template Name: Contacto
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
				/* Función que devuelve el modal del contacto (ventana al completar el contacto con éxito) */
				window.onload = function() {
					modal("modal_contacto");
				};
			</script>
			<?php
		}
		else {
			/* Si la variable nombre sacada del GET está definida, el color del input será verde */
			if(isset($_GET["nombre"])) {
				$color_nombre = "green";
			}
			/* Sino el color del input será de color rojo y el error será revisar la longitud del nombre */
			else {
				$color_nombre = "red";
				$error_nombre = "Revisa la longitud del nombre";
			}
			/* Si la variable email sacada del GET está definida, el color del input será verde */
			if(isset($_GET["email"])) {
				$color_email = "green";
			}
			/* Sino el color del input será de color rojo y el error será revisar el formato del correo */
			else {
				$color_email = "red";
				$error_email = "Revisa el formato del correo";
			}
			/* Si la variable comentario sacada del GET está definida, el color del input será verde */
			if(isset($_GET["comentario"])) {
				$color_comentario = "green";
			}
			/* Sino el color del input será de color rojo y el error será revisar la longitud del comentario */
			else {
				$color_comentario = "red";
				$error_comentario = "Revisa la longitud del comentario";
			}
		}
	}

	get_header();
?>

<div id="main_contacto" class="wrap position-relative">
	<div id="primary" class="content-area container py-5">
		<main id="main" class="bg-black site-main row m-auto">
			<h2 class="my-4 mb-xs-5 text-center">Formulario de contacto</h2>
			<!-- El envio del formulario envia los datos a admin-post.php -->
			<form id="form_contacto" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="col-12 m-auto text-center px-4" style="max-width:500px;" >
				<label for="contacto_nombre" class="mb-2 w-100 text-start">Nombre:</label><br>
				<!-- Si la variable nombre sacada del GET está definida, el GET del nombre estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
				<input type="text" name="contacto_nombre" id="contacto_nombre" class="w-100 m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["nombre"]) ? $_GET["nombre"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_nombre) ? $color_nombre  : "white") ?>" required />
				<!-- Si la variable error_nombre sacada del GET está definida, el GET del error_nombre estará vacio -->
				<p id="contacto_nombre_error" class="mb-2"><?php echo (isset($error_nombre) ? $error_nombre : "") ?></p>

				<label for="contacto_email" class="my-2 w-100 text-start">Correo:</label><br>
				<!-- Si la variable email sacada del GET está definida, el GET del email estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
				<input type="email" name="contacto_email" id="contacto_email" class="w-100 m-0 mb-2" autocomplete="off" value="<?php echo (isset($_GET["email"]) ? $_GET["email"] : "") ?>" onblur="comprobar_input(this)" style="border-color:<?php echo (isset($color_email) ? $color_email : "white") ?>" required />
				<!-- Si la variable error_email sacada del GET está definida, el GET del error_email estará vacio -->
				<p id="contacto_email_error" class="mb-2"><?php echo (isset($error_email) ? $error_email : "") ?></p>

				<label for="contacto_mensaje" class="my-2 w-100 text-start">Mensaje:</label><br>
				<!-- Si la variable mensaje sacada del GET está definida, el GET del mensaje estará vacio, al hacer el blur comprobará el input, si el GET del color está definido, el valor será blanco -->
				<textarea type="text" name="contacto_mensaje" id="contacto_mensaje" class="w-100 m-0 mb-2" autocomplete="off" onblur="comprobar_input(this)" style="height: 200px; border-color:<?php echo (isset($color_comentario) ? $color_comentario : "white") ?>" required><?php echo (isset($_GET["comentario"]) ? $_GET["comentario"] : "") ?></textarea>
				<!-- Si la variable error_mensaje sacada del GET está definida, el GET del error_mensaje estará vacio -->
				<p id="contacto_mensaje_error" class="mb-2"><?php echo (isset($error_comentario) ? $error_comentario : "") ?></p>

				<input type="hidden" name="action" value="contacto_formulario">
				<input type="submit" id="contacto_submit" class="w-100 text-dark mt-2 mt-md-4 mb-4" name="contacto_submit" value="Enviar">
			</form>
		</main>
	</div>
	<div id="modal_contacto">
		<!-- Al clicar llamará a la función que cerrará el modal -->
		<input id="modal_btn_cerrar" type="button" name="cerrar_modal" value="X" onclick="cerrar_modal('modal_contacto')"/>
		<h1 id="titulo_modal" class="fs-1 text-center py-2">Éxito</h1>
		<div style="border: 2px solid white; padding: 15px; background-color: black;">
			<p>Se ha mandado tu mensaje con éxito!</p>
			<span>Nos pondremos en contacto con usted lo más pronto y rápido posible</span>
			<br>
			<span>Gracias!</span>
		</div>
	</div>
</div>
<?php
	/* Muestra el footer definido en su archivo t_footer.php */
	include get_template_directory()."/page-templates/t_footer.php";
?>

<?php
	/*
		Template Name: Administracion
	*/
	get_header();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["nombre_admin"]) && !empty($_POST["password_admin"])) {
			$a = sanitize_text_field($_POST["nombre_admin"]);
			var_dump($a);
			echo "<br>";
		}
		else {
			if (empty($_POST["nombre_admin"])) {
				$errorsDetectats["nombre_admin"] = "Es obligatorio el correo";
			}
			if (empty($_POST["password_admin"])) {
				$errorsDetectats["password_admin"] = "Es obligatorio la contraseña";
			}			
		}
	}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="wrap" style="background-color:#d9903b; padding: 20px 0px;">
	<div id="primary" class="content-area container">
		<main id="main" class="site-main row">
			<h2>Admin</h2>
			<form method="post" action="" class="col d-flex align-items-center justify-content-center text-end" style="margin: 0 auto; border: 1px solid white;">
				<div class="margin: 0 auto;">
					<label for="nombre_admin">Nombre:</label>
					<input type="text" name="nombre_admin" id="nombre_admin">
					<span class="error" ><?php echo (isset($errorsDetectats["nombre_admin"]))?$errorsDetectats["nombre_admin"]:"";?></span>
					<br>
					<label for="password_admin">Contraseña:</label>
					<input type="password" name="password_admin" id="password_admin">
					<span class="error"> <?php echo (isset($errorsDetectats["password_admin"]))?$errorsDetectats["password_admin"]:"";?></span>
					<br>
					<div class="text-center">
						<input type="hidden" name="action" value="process_form">
						<input type="submit" name="submit" value="Enviar">
					</div>
				</div>
			</form>
		</main>
	</div>
</div>

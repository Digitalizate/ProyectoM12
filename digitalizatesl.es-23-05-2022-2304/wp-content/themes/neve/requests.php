<?php
	require_once 'functions.php';
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		if (isset($_POST["submit_contacto"])) {
		
			$name = sanitize_nombre($_POST['name']);
			$email = sanitize_email($_POST['email']);
			$message = sanitize_textarea_field($_POST['message']);
			
			if(strlen($name) < 3 || strlen($name) > 20) {
				if(strlen($email) < 8 || strlen($email) > 50) {
					if(strlen($message) < 5 || strlen($message) > 200) {
						$error = false;
					}
					else {
						$error = true;
					}
				}
				else {
					$error = true;
				}
			}
			else {
				$error = true;
			}
			wp_redirect("http://www.digitalizatesl.es.mialias.net/contacto" .'?error='.$name);
		}
	}
?>

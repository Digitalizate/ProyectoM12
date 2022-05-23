<?php
/**
 * Neve functions.php file
 *
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      17/08/2018
 *
 * @package Neve
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define( 'NEVE_VERSION', '3.1.5' );
define( 'NEVE_INC_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
define( 'NEVE_ASSETS_URL', trailingslashit( get_template_directory_uri() ) . 'assets/' );
define( 'NEVE_MAIN_DIR', get_template_directory() . '/' );

if ( ! defined( 'NEVE_DEBUG' ) ) {
	define( 'NEVE_DEBUG', false );
}
define( 'NEVE_NEW_DYNAMIC_STYLE', true );
/**
 * Buffer which holds errors during theme inititalization.
 *
 * @var WP_Error $_neve_bootstrap_errors
 */
global $_neve_bootstrap_errors;

$_neve_bootstrap_errors = new WP_Error();

if ( version_compare( PHP_VERSION, '7.0' ) < 0 ) {
	$_neve_bootstrap_errors->add(
		'minimum_php_version',
		sprintf(
		/* translators: %s message to upgrade PHP to the latest version */
			__( "Hey, we've noticed that you're running an outdated version of PHP which is no longer supported. Make sure your site is fast and secure, by %1\$s. Neve's minimal requirement is PHP%2\$s.", 'neve' ),
			sprintf(
			/* translators: %s message to upgrade PHP to the latest version */
				'<a href="https://wordpress.org/support/upgrade-php/">%s</a>',
				__( 'upgrading PHP to the latest version', 'neve' )
			),
			'7.0'
		)
	);
}
/**
 * A list of files to check for existance before bootstraping.
 *
 * @var array Files to check for existance.
 */

$_files_to_check = defined( 'NEVE_IGNORE_SOURCE_CHECK' ) ? [] : [
	NEVE_MAIN_DIR . 'vendor/autoload.php',
	NEVE_MAIN_DIR . 'style-main-new.css',
	NEVE_MAIN_DIR . 'assets/js/build/modern/frontend.js',
	NEVE_MAIN_DIR . 'assets/apps/dashboard/build/dashboard.js',
	NEVE_MAIN_DIR . 'assets/apps/customizer-controls/build/controls.js',
];
foreach ( $_files_to_check as $_file_to_check ) {
	if ( ! is_file( $_file_to_check ) ) {
		$_neve_bootstrap_errors->add(
			'build_missing',
			sprintf(
			/* translators: %s: commands to run the theme */
				__( 'You appear to be running the Neve theme from source code. Please finish installation by running %s.', 'neve' ), // phpcs:ignore WordPress.Security.EscapeOutput
				'<code>composer install --no-dev &amp;&amp; yarn install --frozen-lockfile &amp;&amp; yarn run build</code>'
			)
		);
		break;
	}
}
/**
 * Adds notice bootstraping errors.
 *
 * @internal
 * @global WP_Error $_neve_bootstrap_errors
 */
function _neve_bootstrap_errors() {
	global $_neve_bootstrap_errors;
	printf( '<div class="notice notice-error"><p>%1$s</p></div>', $_neve_bootstrap_errors->get_error_message() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

if ( $_neve_bootstrap_errors->has_errors() ) {
	/**
	 * Add notice for PHP upgrade.
	 */
	add_filter( 'template_include', '__return_null', 99 );
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	add_action( 'admin_notices', '_neve_bootstrap_errors' );

	return;
}

/**
 * Themeisle SDK filter.
 *
 * @param array $products products array.
 *
 * @return array
 */
function neve_filter_sdk( $products ) {
	$products[] = get_template_directory() . '/style.css';

	return $products;
}

add_filter( 'themeisle_sdk_products', 'neve_filter_sdk' );

require_once 'globals/migrations.php';
require_once 'globals/utilities.php';
require_once 'globals/hooks.php';
require_once 'globals/sanitize-functions.php';
require_once get_template_directory() . '/start.php';

/**
 * If the new widget editor is available,
 * we re-assign the widgets to hfg_footer
 */
if ( neve_is_new_widget_editor() ) {
	/**
	 * Re-assign the widgets to hfg_footer
	 *
	 * @param array  $section_args The section arguments.
	 * @param string $section_id The section ID.
	 * @param string $sidebar_id The sidebar ID.
	 *
	 * @return mixed
	 */
	function neve_customizer_custom_widget_areas( $section_args, $section_id, $sidebar_id ) {
		if ( strpos( $section_id, 'widgets-footer' ) ) {
			$section_args['panel'] = 'hfg_footer';
		}
		return $section_args;
	}
	add_filter( 'customizer_widgets_section_args', 'neve_customizer_custom_widget_areas', 10, 3 );
}

require_once get_template_directory() . '/header-footer-grid/loader.php';

// Hooks admin-post
//add_action( 'admin_post_nopriv_process_form', 'send_mail_data' );
//add_action( 'admin_post_process_form', 'send_mail_data' );

require_once 'requests.php';

// Funcion callback
function mandar_mensaje($name, $email, $message) {
	
	$adminmail = "destino@dominio.com"; //email destino
	$subject = 'Formulario de contacto'; //asunto
	$headers = "Reply-to: " . $name . " <" . $email . ">";

	//Cuerpo del mensaje
	$msg = "Nombre: " . $name . "\n";
	$msg .= "E-mail: " . $email . "\n\n";
	$msg .= "Mensaje: \n\n" . $message . "\n";

	$sendmail = wp_mail( $adminmail, $subject, $msg, $headers);
}

/* Formulario contacto */

add_action('admin_post_contacto_formulario', 'contacto_formulario');
add_action('admin_post_nopriv_contacto_formulario', 'contacto_formulario');

function contacto_formulario(){
	if(empty($_POST['contacto_nombre']) || empty($_POST['contacto_email']) || empty($_POST['contacto_mensaje'])) {
		wp_redirect(get_template_directory_uri().'/contacto?error=si');
	}
	else {
		$input_nombre = sanitize_user($_POST['contacto_nombre']);
		$input_email = sanitize_email($_POST['contacto_email']);
		$textarea = sanitize_text_field($_POST['contacto_mensaje']);
		if(validar_texto($input_nombre, "nombre")) {
			$nombre_correcto = true;
		}
		if(validar_texto($textarea, "textarea")) {
			$textarea_correcto = true;
		}
		if(validar_correo($input_email)) {
			$email_correcto = true;
		}
		if(isset($nombre_correcto) && isset($email_correcto) && isset($textarea_correcto)) {
			$wpdb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
			$e = $wpdb->insert('consultas', array(
				'nombre' => $input_nombre,
				'correo' => $input_email,
				'mensaje' => $textarea
			));
			$wpdb->close();
			wp_redirect(get_template_directory_uri()."/contacto?exito=si");
		}
		else {
			$url = "/contacto?error=si";
			if(isset($nombre_correcto)) {
				$url = $url . "&nombre=$input_nombre";
			}
			if(isset($email_correcto)) {
				$url = $url . "&email=$input_email";
			}
			var_dump($url);
			if(isset($textarea_correcto)) {
				$url = $url . "&comentario=$textarea";
			}
			wp_redirect(get_template_directory_uri().$url);
		}	
	}
}

/* Formulario registro */

add_action('admin_post_registro_formulario', 'registro_formulario');
add_action('admin_post_nopriv_registro_formulario', 'registro_formulario');

function registro_formulario(){
	if(empty($_POST['registro_nombre']) || empty($_POST['registro_apellido']) || empty($_POST['registro_telefono']) || empty($_POST['registro_email']) || empty($_POST['registro_password']) || empty($_POST['registro_password_2']) || $_POST['registro_terminos'] !== 'acepto') {
		wp_redirect(get_template_directory_uri().'/registro?exito=no');
	}
	else {
		$input_nombre = sanitize_user($_POST['registro_nombre']);
		$input_apellido = sanitize_user($_POST['registro_apellido']);
		$input_telefono = $_POST['registro_telefono'];
		$input_email = sanitize_email($_POST['registro_email']);
		if(validar_texto($input_nombre, "nombre")) {
			$nombre_correcto = true;
		}
		if(validar_texto($input_apellido, "apellido")) {
			$apellido_correcto = true;
		}
		if(validar_telefono($input_telefono)) {
			$telefono_correcto = true;
		}
		if(validar_correo($input_email)) {
			$email_correcto = true;
		}
		if(validar_password($_POST['registro_password'])) {
			$password_correcta = true;
			if(validar_password($_POST['registro_password_2'])) {
				$password_2_correcta = true;
				if($_POST['registro_password'] == $_POST['registro_password_2']) {
					$passwords_correctas = true;
				}
			}
		}
		if(isset($nombre_correcto) && isset($apellido_correcto) && isset($telefono_correcto) && isset($email_correcto) && isset($passwords_correctas)) {
			$wpdb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
			if ($wpdb->get_results("SELECT * from usuarios where correo = $input_email")) {
				$wpdb->close();
				wp_redirect(get_template_directory_uri().'/registro?exito=registrado');
			}
			else {
				$wpdb->insert('usuarios', array(
					'nombre' => $input_nombre,
					'apellido' => $input_apellido,
					'correo' => $input_email,
					'telefono' => $input_telefono,
					'password' => $input_password
				));
				$wpdb->close();
				wp_redirect(get_template_directory_uri()."/login");
			}
		}
		else {
			$url = "/registro?error=si";
			if(isset($nombre_correcto)) {
				$url = $url . "&nombre=$input_nombre";
			}
			if(isset($apellido_correcto)) {
				$url = $url . "&apellido=$input_apellido";
			}
			if(isset($telefono_correcto)) {
				$url = $url . "&telefono=$input_telefono";
			}
			if(isset($email_correcto)) {
				$url = $url . "&email=$input_email";
			}
			if(!isset($passwords_correctas)) {
				$url = $url . "&contra=2";
			}
			wp_redirect(get_template_directory_uri().$url);
		}
	}
}

/* Formulario login */

add_action('admin_post_login_formulario', 'login_formulario');
add_action('admin_post_nopriv_login_formulario', 'login_formulario');

function login_formulario(){
	if(empty($_POST['login_email']) || empty($_POST['login_password'])) {
		wp_redirect(get_template_directory_uri().'/login?exito=no');
	}
	else {
		$wpdb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
		if($u = $wpdb->get_results("SELECT * from usuarios where correo = '$_POST[login_email]'")) {
			foreach ($u as $usuario) { 
				if(password_verify($_POST["login_password"], $usuario->password)) {
					$_SESSION['id'] = $usuario->id;
					$wpdb->close();
					wp_redirect(site_url());
				}
				else {
					$wpdb->close();
					wp_redirect(get_template_directory_uri().'/login?exito=no');
				}
			}
		}
		else {
			$wpdb->close();
			wp_redirect(get_template_directory_uri().'/login?exito=no');
		}
	}
}

/* Activar session */

add_action('init', 'iniciar_sesion');

function iniciar_sesion() {
    session_start();
}

/* Salir de la session */

add_action('admin_post_nav_formulario', 'salir_session');
add_action('admin_post_nopriv_nav_formulario', 'salir_session');

function salir_session(){
	if($_POST['mi_cuenta']) {
		wp_redirect(get_template_directory_uri().'/mi_cuenta');
	}
	else if($_POST['reservas']) {
		wp_redirect(get_template_directory_uri().'/mis_reservas');
	}
	else if($_POST['votaciones']) {
		wp_redirect(get_template_directory_uri().'/votaciones');
	}
	else {
		session_destroy();
		wp_redirect(site_url());
	}
}

/* Modificar cuenta */

add_action('admin_post_cambiar_datos', 'modificar_datos');
add_action('admin_post_nopriv_cambiar_datos', 'modificar_datos');

function modificar_datos(){
	if(isset($_POST["cambiar_nombre"]) || isset($_POST["cambiar_apellido"]) || isset($_POST["cambiar_correo"]) || isset($_POST["cambiar_telefono"]) || isset($_POST["cambiar_password"])) {
		$wpdb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
		if(isset($_POST["cambiar_nombre"])) {
			$input_nombre = sanitize_user($_POST['cambiar_nombre']);
			if(validar_texto($input_nombre, "nombre")) {
				$u = $wpdb->get_results("SELECT nombre from usuarios where id = '$_SESSION[id]'");
				foreach ($u as $nombre) {
					if($nombre->nombre != $input_nombre) {
						$wpdb->update('usuarios',
							array('nombre' => $input_nombre), 
							array('id' => $_SESSION["id"])
						);
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?nombre=exito');
					}
					else {
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?nombre=no_cambiado');	
					}
				}
			}
			else {
				wp_redirect(get_template_directory_uri().'/mi_cuenta?nombre=formato');
			}
		}
		else if(isset($_POST["cambiar_apellido"])) {
			$input_apellido = sanitize_user($_POST['cambiar_apellido']);
			if(validar_texto($input_apellido, "apellido")) {
				$u = $wpdb->get_results("SELECT apellido from usuarios where id = '$_SESSION[id]'");
				foreach ($u as $apellido) {
					if($apellido->apellido != $input_apellido) {
						$wpdb->update('usuarios',
							array('apellido' => $input_apellido), 
							array('id' => $_SESSION["id"])
						);
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?apellido=exito');
					}
					else {
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?apellido=no_cambiado');
					}
				}
			}
			else {
				wp_redirect(get_template_directory_uri().'/mi_cuenta?apellido=formato');
			}
		}
		else if(isset($_POST["cambiar_correo"])) {
			$input_correo = sanitize_email($_POST['cambiar_correo']);
			if(validar_correo($input_correo)) {
				$u = $wpdb->get_results("SELECT correo from usuarios where id = '$_SESSION[id]'");
				foreach ($u as $correo) {
					if($correo->correo != $input_correo) {
						$wpdb->update('usuarios',
							array('correo' => $input_correo), 
							array('id' => $_SESSION["id"])
						);
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?correo=exito');
					}
					else {
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?correo=no_cambiado');
					}
				}
			}
			else {
				wp_redirect(get_template_directory_uri().'/mi_cuenta?correo=formato');
			}
		}
		else if(isset($_POST["cambiar_telefono"])) {
			$input_telefono = filter_var($_POST['cambiar_telefono'], FILTER_SANITIZE_NUMBER_INT);
			if(validar_telefono($input_telefono)) {
				$u = $wpdb->get_results("SELECT telefono from usuarios where id = '$_SESSION[id]'");
				foreach ($u as $telefono) {
					if($telefono->telefono != $input_telefono) {
						$wpdb->update('usuarios',
							array('telefono' => $input_telefono), 
							array('id' => $_SESSION["id"])
						);
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?telefono=exito');
					}
					else {
						$wpdb->close();
						wp_redirect(get_template_directory_uri().'/mi_cuenta?telefono=no_cambiado');	
					}
				}
			}
			else {
				wp_redirect(get_template_directory_uri().'/mi_cuenta?telefono=formato');
			}
		}
		else {
			$u = $wpdb->get_results("SELECT password from usuarios where id = '$_SESSION[id]'");
			if(validar_password($_POST['cambiar_password'])) {
				if(!password_verify($_POST["cambiar_password"], $u->password)) {
					$input_password = password_hash($_POST['cambiar_password'], PASSWORD_DEFAULT);
					$wpdb->update('usuarios',
							array('password' => $input_password), 
							array('id' => $_SESSION["id"])
					);
					$wpdb->close();
					wp_redirect(get_template_directory_uri().'/mi_cuenta?password=exito');
				}
				else {
					$wpdb->close();
					wp_redirect(get_template_directory_uri().'/mi_cuenta?password=no_cambiado');	
				}
			}
			else {
				wp_redirect(get_template_directory_uri().'/mi_cuenta?password=formato');
			}
		}
	}
	else {
		wp_redirect(get_template_directory_uri().'/mi_cuenta');
	}
}

/* Funcion para reservar mesa */

add_action('admin_post_reserva_formulario', 'reservar_mesa');
add_action('admin_post_nopriv_reserva_formulario', 'reservar_mesa');

function reservar_mesa(){
	$wpdb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
	if(empty($_POST['reserva_comentario'])) {
		var_dump("comentario vacio");
		var_dump($_SESSION["id"]);
		$wpdb->update('reservas',
			array('id_usuario' => $_SESSION["id"]),
			array('personas' => $_POST['reserva_personas']),
			array('hora' => $_POST['reserva_hora']),
			array('ninos' => $_POST['reserva_ninos']),
			array('comentario' => null),
			array('dia' => $_POST['reserva_dia'])
		);
	}
	else {
		$textarea = sanitize_text_field($_POST['reserva_comentario']);
		$wpdb->update('reservas',
			array('id_usuario' => $_SESSION["id"]),
			array('personas' => $_POST['reserva_personas']),
			array('hora' => $_POST['reserva_hora']),
			array('ninos' => $_POST['reserva_ninos']),
			array('comentario' => $textarea),
			array('dia' => $_POST['reserva_dia'])
		);
	}
	$wpdb->close();
}

/* Validaciones inputs */

function validar_texto($texto, $tipo) {
	if ($tipo == "textarea") {
		if(strlen($texto) >= 10 && strlen($texto) <= 255) {
			return true;
		}
	}
	else {
		if(strlen($texto) >= 3 && strlen($texto) <= 30) {
			return true;
		}
	}
	return false;
}

function validar_correo($correo) {
	if(strlen($correo) >= 11 && strlen($correo) <= 30) {
		if(strpos($correo, "@") && strripos($correo, ".")) {
			$nombre_correo = substr($correo, 0, strpos($correo, "@"));
			$organizacion_correo = substr($correo, strpos($correo, "@")+1, (strlen($correo) - strrpos($correo, "."))+1);
			$tipo_correo = substr($correo, strripos($correo, ".")+1);
			if((strlen($nombre_correo) >= 3 && strlen($nombre_correo) <= 25) && strlen($organizacion_correo) >= 3 && strlen($organizacion_correo) <= 20 && strlen($tipo_correo) >= 2 && strlen($tipo_correo) <= 5) {
				return true;
			}
		}
	}
	return false;
}

function validar_telefono($telefono) {
	if(strlen($telefono) == 9 && is_int((int)$telefono)) {
		return true;
	}
	return false;
}

function validar_password($password) {
	if(strlen($password) >= 8 && strlen($password) <= 20) {
		return true;
	}
	return false;
}
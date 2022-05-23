<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 *
 * @package Neve
 * @since   1.0.0
 */
?><!DOCTYPE html>
<?php

/**
 * Filters the header classes.
 *
 * @param string $header_classes Header classes.
 *
 * @since 2.3.7
 */
$header_classes = apply_filters( 'nv_header_classes', 'header' );

/**
 * Fires before the page is rendered.
 */
do_action( 'neve_html_start_before' );

?>
<?php if(isset($_SESSION['id'])) {
    $wpdb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
	$nombre = $wpdb->get_results("SELECT nombre from usuarios where id = '$_SESSION[id]'");	
	foreach ($nombre as $nombre) {
		$nombre_usuario = $nombre->nombre;
	}
}
?>

<html <?php language_attributes(); ?>>

<head>
	<?php
	/**
	 * Executes actions after the head tag is opened.
	 *
	 * @since 2.11
	 */
	do_action( 'neve_head_start_after' );
	?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	
	<!-- Validaciones formularios -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/javascript/validaciones.js' ?>"></script>
	<!-- Carta -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/javascript/functions_carta.js' ?>"></script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/styles/carta.css' ?>"/>
	<!-- Modal -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/javascript/modal.js' ?>"></script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/styles/modal.css' ?>"/>
	<!-- Estilo general -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/styles/style.css' ?>"/>
	<!-- Nav usuario -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/javascript/usuario.js' ?>"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/javascript/nav.js' ?>"></script>
	<!-- Reservas -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/styles/reservas.css' ?>"/>

	<?php wp_head(); ?>

	<?php
	/**
	 * Executes actions before the head tag is closed.
	 *
	 * @since 2.11
	 */
	do_action( 'neve_head_end_before' );
	?>
</head>

<body  <?php body_class(); ?> <?php neve_body_attrs(); ?> >
<?php
/**
 * Executes actions after the body tag is opened.
 *
 * @since 2.11
 */
do_action( 'neve_body_start_after' );
?>
<?php wp_body_open(); ?>
<div class="wrapper">
	<?php
	/**
	 * Executes actions before the header tag is opened.
	 *
	 * @since 2.7.2
	 */
	do_action( 'neve_before_header_wrapper_hook' );
	?>

	<header id="nav_ordenador" class="position-relative">
		<div id="header-grid" class="container site-header">
			<div class="row col-12 justify-content-between align-items-center">
				<div class="col-3">
					<img src="<?php echo get_bloginfo('wpurl').'/wp-content/themes/neve/assets/img/logo_empresa.png'?>" style="max-height: 82px;padding-top:10px;" class="logo"/>
				</div>
				<div class="col-4 text-end" onmouseleave="ocultar_info()">
					<?php 
					if(isset($_SESSION['id'])) {
						echo "<p class='text-end mb-0' onclick='usuario();' onmouseover='usuario();'>Bienvenido ".$nombre_usuario."</p>";
					}
					else {
						echo '<a class="me-3 boton_nav" href="http://www.digitalizatesl.es.mialias.net/registro">Registro</a>';
						echo '<a class="boton_nav" href="http://www.digitalizatesl.es.mialias.net/login">Login</a>';
					}
					?>
					<div id="info" class="p-2" onmouseleave="ocultar_info()">
						<form id="form_nav" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="col-12 m-auto text-center">
							<input type="submit" name="mi_cuenta" class="p-0" value="Mi cuenta">
							<input type="submit" name="reservas" class="p-0" value="Mis reservas">
							<input type="submit" name="votaciones" class="p-0" value="Votaciones">
							<input type="submit" name="desconectar" class="p-0" value="Desconectar">
							<input type="hidden" name="action" value="nav_formulario">
						</form>
					</div>
				</div>
			</div>
			<nav class="col-12">
				<ul class="text-center m-3">
					<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net">Inicio</a></li>
					<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/carta">Carta</a></li>
					<?php 
					if(isset($_SESSION['id'])) {?>
						<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/reservar_mesa">Reserva</a></li>
						<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/votaciones">Votaciones</a></li>
					<?php } ?>
					<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/contacto">Contacto</a></li>
					<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/info">Sobre nosotros</a></li>
				</ul>		
			</nav>
		</div>
	</header>
	<header id="nav_movil">
		<div id="header-grid" class="container site-header">
			<div class="row justify-content-between align-items-center">
				<div class="col-3">
					<img src="<?php echo get_bloginfo('wpurl').'/wp-content/themes/neve/assets/img/logo_empresa.png'?>" style="max-height: 82px;padding-top:10px;" class="logo"/>
				</div>
				<div class="col-4 text-end">
					<button id="btn_abrir_menu" onclick="abrir_menu()">Menú</button>
				</div>
				<nav id="fondo_menu_movil" class="bg-black col-12 row px-3 py-4">
				<?php
				if(isset($_SESSION['id'])) {?>
					<form id="form_nav_movil" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="col-12 m-auto text-center">
						<input id="boton_nav_movil_cuenta" class="fs-5" type="submit" name="mi_cuenta" value="Mi cuenta">
						<input id="boton_nav_movil_desconectar" class="fs-5" type="submit" name="desconectar" value="Desconectar">
						<input type="hidden" name="action" value="nav_formulario">
					</form>
				<?php }
				else { ?>
					<ul class="text-center row col-12 m-auto">
						<li id="boton_nav_movil_registro" class="col-6 fs-5"><a href="http://www.digitalizatesl.es.mialias.net/registro">Registro</a></li>
						<li id="boton_nav_movil_login" class="col-6 fs-5"><a class="boton_nav_movil" href="http://www.digitalizatesl.es.mialias.net/login">Login</a></li>
					</ul>
				<?php } ?>
					<ul class="text-center row col-12 m-auto">
						<li class="pb-3 fs-5 border-bottom border-light"><a href="http://www.digitalizatesl.es.mialias.net">Inicio</a></li>
						<li class="py-3 fs-5 border-bottom border-light"><a href="http://www.digitalizatesl.es.mialias.net/carta">Carta</a></li>
						<?php 
						if(isset($_SESSION['id'])) {?>
							<li class="py-3 fs-5 border-bottom border-light"><a href="http://www.digitalizatesl.es.mialias.net/reservar_mesa">Reserva</a></li>
							<li class="py-3 fs-5 border-bottom border-light"><a href="http://www.digitalizatesl.es.mialias.net/votaciones">Votaciones</a></li>
						<?php } ?>
						<li class="py-3 fs-5 border-bottom border-light"><a href="http://www.digitalizatesl.es.mialias.net/contacto">Contacto</a></li>
						<li class="py-3 fs-5"><a href="http://www.digitalizatesl.es.mialias.net/info">Sobre nosotros</a></li>
					</ul>
					<button id="btn_cerrar_menu" class="col-12" onclick="cerrar_menu()">Cerrar</button>
				</nav>
			</div>
		</div>
	</header>
	<?php
	/**
	 * Executes actions after the header tag is closed.
	 *
	 * @since 2.7.2
	 */
	do_action( 'neve_after_header_wrapper_hook' );
	?>


	<?php
	/**
	 * Executes actions before main tag is opened.
	 *
	 * @since 1.0.4
	 */
	do_action( 'neve_before_primary' );
	?>

	<main id="content" class="neve-main" role="main">
	<style>
	.boton_nav {
		padding: 5px 10px;	
	}
	@media (max-width: 575px){
		img.logo {
			max-height: 50px!important;
		}
		div#boton {
			flex: 0 0 auto;
    		width: 20.333333%;
		}
		div#boton2 {
			flex: 0 0 auto;
    		width: 40.333333%;
		}
	}
	@media (max-width: 850px){
		img.logo {
			max-height: 70px!important;
		}
	}
</style>
<?php
/**
 * Executes actions after main tag is opened.
 *
 * @since 1.0.4
 */
do_action( 'neve_after_primary_start' );
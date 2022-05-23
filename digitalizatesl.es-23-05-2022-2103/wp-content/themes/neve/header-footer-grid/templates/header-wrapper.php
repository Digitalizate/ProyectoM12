<?php
/**
 * Template used for header rendering.
 *
 * Name:    Header Footer Grid
 *
 * @version 1.0.0
 * @package HFG
 */

namespace HFG;

use HFG\Core\Builder\Header as HeaderBuilder;

global $nombre_usuario;

$classes = apply_filters( 'hfg_header_wrapper_class', '' );

?>
<div id="header-grid"  class="<?php echo esc_attr( get_builder( HeaderBuilder::BUILDER_NAME )->get_property( 'panel' ) ) . esc_attr( $classes ); ?> site-header position-relative">
	<div id="header-grid" class="container site-header">
		<div class="row col-12 justify-content-between align-items-center">
			<div class="col-xs-0 col-sm-4 col-md-2 col-lg-3" id="boton">
				<img src="<?php echo get_bloginfo('wpurl').'/wp-content/themes/neve/assets/img/logo_empresa.png'?>" style="max-height: 82px;padding-top:10px;" class="logo"/>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2" onmouseleave="ocultar_info()" id="boton2">
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
				<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/reserva">Reserva</a></li>
				<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/contacto">Contacto</a></li>
				<li class="d-inline-block mx-2"><a href="http://www.digitalizatesl.es.mialias.net/info">Sobre Nosotros</a></li>
			</ul>		
			</nav>
		</nav>
	</div>
</div>
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
<?php //render_builder( HeaderBuilder::BUILDER_NAME ); ?>

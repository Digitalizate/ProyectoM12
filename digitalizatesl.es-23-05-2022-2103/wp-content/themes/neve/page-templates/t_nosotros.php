<?php
/*
	Template Name: Info
*/
	get_header();
?>

<div id="main_nosotros" class="wrap position-relative">
	<div id="primary" class="content-area container my-5">
		<main id="main" class="bg-black site-main row m-2 m-md-auto">
			<h2 class="my-4 mb-xs-5 text-center">Sobre nosotros</h2>
			<p class="mt-3">Ca La Loli es un restaurante que fue fundado en 1970, el restaurante era una masía, que ahora se ha restaurado para reconvertirla en un restaurante, 
			hemos dejado algunas cosas para dar ese ambiente hogareño. Ca La Loli se situa en el Nordeste de Cataluña, concretamente en Girona.</p>

			<p>El restaurante ofrece diferentes espacios con una capacidad máxima de 200 comensales, nuestra carta destaca porque su elaboración es 100% casera 
			y los productos para la elaboración son	de gran calidad.</p>

			<p>También dispone de un espacio fuera a disposición de los clientes, para los que quieran disfrutar de la comida al aire libre o quieran tomar algo 
			y de un sitio para que los niños jueguen.</p>

			<p>Nuestra idea es transmitir a nuestros clientes que están en un ambiente familiar, trasladando esa sensación con la comida casera que servimos, 
			que les recuerde a las comidas que preparaban sus abuelas.</p>
		</main>
	</div>
</div>
<style>
	main#content {
		background-image: url("http://www.digitalizatesl.es.mialias.net/wp-content/themes/neve/assets/img/foto_empresa.jpg");
		background-position: bottom;
		background-repeat: no-repeat;
		
	}
	main#main {
		background-color: black;
		width: 70%;
		padding: 0px 15px 46px 15px;
	}	
</style>
<?php
	/* Muestra el footer definido en su archivo t_footer.php */
	include get_template_directory()."/page-templates/t_footer.php";
?>

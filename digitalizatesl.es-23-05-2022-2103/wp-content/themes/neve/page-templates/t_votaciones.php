<?php
    /*
        Template Name: Votaciones
    */
    	
	get_header();
?>
<div id="main_votaciones" class="wrap position-relative">
	<div id="primary" class="content-area container py-5" style="min-height: 82vh;">
		<main id="main" class="bg-black site-main row m-2 m-md-auto">
			<h2 class="my-4 mb-xs-5 text-center">Votaciones</h2>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pb-5 px-5">
            <?php
            if(!isset($_SESSION['id'])) {?>
                <h3 class="text-center">Necesitas estar logeado para votar el siguiente plato!</h3>
                <span>Entra en tu cuenta desde el <a href='http://www.digitalizatesl.es.mialias.net/login' class='link_login'>LOGIN</a> para poder acceder a este apartado. En este apartado podrás votar entre diferentes platos que el ganador se añadirá a la carta la próxima semana</span>
                <script>document.getElementById("primary").style.display = "flex";</script>
            <?php }
			else {?>
                <h3>Cada semana puedes votar un plato!</h3>
                <p>Durante una semana se podrá votar entre 3 platos diferentes</p>
                <p>Cada lunes el nuevo plato estará en la carta!</p>
                <form id="form_votacion" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="row col-12 border m-auto p-4 mt-3">
                    <div>
                        <input type="radio" id="huey" name="drone" value="huey" checked>
                        <label for="huey">Huey</label>
                    </div>
                    <div>
                        <input type="radio" id="dewey" name="drone" value="dewey">
                        <label for="dewey">Dewey</label>
                    </div>
                    <div>
                        <input type="radio" id="louie" name="drone" value="louie">
                        <label for="louie">Louie</label>
                    </div>
                </form>
                
			<?php }?> 
       		</div>
		</main>
	</div>
</div>
<?php
	include get_template_directory()."/page-templates/t_footer.php";
?>
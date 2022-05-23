<?php
    /*
        Template Name: Mis reservas
    */

    get_header();
?>
<div id="main_mis_reservas" class="wrap position-relative">
	<div id="primary" class="content-area container py-5" style="min-height: 82vh;">
		<main id="main" class="bg-black site-main row m-2 m-md-auto">
			<h2 class="my-4 mb-xs-5 text-center">Mis reservas</h2>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pb-5 px-5">
            <?php
            if(!isset($_SESSION['id'])) {?>
                <h3 class="text-center">Necesitas estar logeado para acceder a esta sección!</h3>
                <span>Entra en tu cuenta desde el <a href='http://www.digitalizatesl.es.mialias.net/login' class='link_login'>LOGIN</a> para poder acceder a este apartado. En este apartado podrás ver todas las reservas que tienes</span>
                <script>document.getElementById("primary").style.display = "flex";</script>
            <?php }
			else {
                $mydb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
                $reservas_usuario = $mydb->get_results("SELECT * from reservas where id_usuario = $_SESSION[id]");
                $mydb->close();
                ?>
                <table id="reservas_usuario" class="text-center">
                    <tr>
                        <th class="p-3">Dia</th>
                        <th class="p-3">Hora</th>
                        <th class="p-3">Personas</th>
                        <th class="p-3">Niños</th>
                        <th class="p-3">Comentario</th>
                    </tr>
                <?php
                foreach($reservas_usuario as $reserva) {?>
                    <tr>
					    <td><?php echo $reserva->fecha ?></td>
                        <td><?php echo $reserva->hora ?></td>
                        <td><?php echo $reserva->personas ?></td>
                        <td><?php echo $reserva->ninos ?></td>
                        <td><?php echo $reserva->comentario ?></td>
                    </tr>
				<?php }?>
                </table>
                <div id="llamar_telefono" class="border border-light text-center mt-5 w-75 mx-auto">
                    <p class="p-5 m-0 text-light">Para modificar o eliminar una reserva llame al 934376434</p>
                </div>
			<?php }?>
       		</div>
		</main>
	</div>
</div>
<?php
	include get_template_directory()."/page-templates/t_footer.php";
?>
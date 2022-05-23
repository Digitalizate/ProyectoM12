<?php
/*
	Template Name: Reserva
*/

	/* Conexión a la base de datos restaurante */
	$mydb = new wpdb('mydig71a0e4','aQ7wVuWh','restaurante','localhost');
	/* Consulta con datos del usuario*/
	$datos_usuario = $mydb->get_results("SELECT * from usuarios where id = $_SESSION[id]");
	/* Cerrar conexión de base de datos */
	$mydb->close();
	
	get_header();
?>

<div id="main_restaurante" class="wrap position-relative">
	<div id="primary" class="content-area container py-5" style="min-height: 82vh;">
		<main id="main" class="bg-black site-main row m-2 m-md-auto">
			<h2 class="my-4 mb-xs-5 text-center">Reservar mesa</h2>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- Si no está definida la variable de sesión -->
            <?php 
			if(!isset($_SESSION['id'])) { ?>
                    <h3 class="text-center">Necesitas estar logeado para acceder a las reservas!</h3>
                    <span>Entra en tu cuenta desde el <a href='http://www.digitalizatesl.es.mialias.net/login' class='link_login'>LOGIN</a> para poder acceder a este apartado. En este apartado podrás reservar una mesa en este restaurante</span>
			<?php 
			}
			// Si no
				else { 
					// Recorre el array con los datos de usuario donde cada elemento será datos_usuario
					foreach ($datos_usuario as $datos_usuario) {?>
					<div class="row p-4">
						<h3 class="col-12">Datos de la reserva:</h3>
						<!-- Coger del array de datos de usuario el nombre -->
						<p class="col-12 col-md-4 mb-2">Nombre: <?php echo $datos_usuario->nombre ?></p>
						<!-- Coger del array de datos de usuario el correo -->
						<p class="col-12 col-md-4 mb-2 text-md-center">Correo: <?php echo $datos_usuario->correo ?></p>
						<!-- Coger del array de datos de usuario el telefono -->
						<p class="col-12 col-md-4 mb-2 text-md-end">Teléfono: <?php echo $datos_usuario->telefono ?></p>
						<!-- El envio del formulario envia los datos a admin-post.php -->
						<form id="form_reserva" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="row col-12 border m-auto p-4 mt-3">
						<?php
							/* Guarda en una variable el tiempo, poniendolo como hora de inicio las 9 */
							$hora_inicio = (new DateTime())->setTime(9,0,0);
							/* Guarda en una variable el tiempo, poniendolo como hora de fin las 22:45 */
							$hora_final = (new DateTime())->setTime(22,45,0);
							/* Guarda en una variable el intervalo de tiempo en el formato indicado (minutos)*/
							$cada_minutos = new DateInterval('PT15M');
							/* Guarda en una variable el periodo de fechas, con la hora de inicio, el intervalo y la hora final */
							$rango_fecha = new DatePeriod($hora_inicio, $cada_minutos ,$hora_final);
							?>
							<div class="col-12 row p-0 p-md-3">
								<div class="col-12 col-md-4">
									<label for="reserva_hora" class="fs-5 text-start mb-3">Escoge una hora:</label><br>
									<select name="reserva_hora" id="reserva_hora">
									<!-- Recorre el array de rang de fecha donde cada elemento será la fecha -->
									<?php foreach($rango_fecha as $fecha) {
										/* Hace selector para cada fecha con el formato indicado */
										echo "<option value='".$fecha->format("H:i") . "'>".$fecha->format("H:i")."</option>\n";
									}?>
									</select>
								</div>
								<div class="col-12 col-md-4">
									<label for="reserva_dia" class="fs-5 text-start mb-3">Escoge un dia:</label><br>
									<select name="reserva_dia" id="reserva_dia">
									<?
										$fecha_1="2022/03/28";
										$fecha_2="2022/05/04";

										/* Hace la conversión de fecha */
										$dif=((strtotime($fecha_2)-strtotime($fecha_1))/86400);
										/* Separa en partes la fecha delimitada por barra */
										$partes=explode("/",$fecha_1);

										/* Mientras que la i sea menor o igual que la conversión de la fecha */
										for ($i=0;$i<=$dif;$i++){
											/* Calcula la fecha con las partes de antes y la muestra en una selector */
											$dia=mktime(0,0,0,$partes[1],$partes[2]+$i,$partes[0]);
											echo "<option value=".date("d/m/Y",$dia).">".date("d/m/Y",$dia)."<br>\n";
										}
									?>
									</select>
								</div>
							</div>
							<div class="row col-12 p-0 p-md-3">
								<div class="col-12 col-md-4">
									<label for="reserva_personas" class="fs-5 my-3">Personas:</label><br>
									<select name="reserva_personas" id="reserva_personas">
									<!-- Mientras que la i sea menor que 30, mostrará un selector para el numero de personas de la reserva-->
									<?php for($i=1; $i < 30; $i++) {
										echo "<option value=$i>".$i."</option>\n";
									}?>
									</select>
								</div>
								<div class="col-12 col-md-4">
									<label for="reserva_ninos" class="fs-5 my-3">Niños:</label><br>
									<select name="reserva_ninos" id="reserva_ninos">
									<!-- Mientras que la i sea menor que 31, mostrará un selector para el numero de niños de la reserva-->
									<?php for($i=0; $i < 31; $i++) {
										echo "<option value=$i>".$i."</option>\n";
									}?>
									</select>
								</div>
							</div>
							<div class="col-12 p-0 p-md-3">
								<label for="reserva_comentario" class="fs-5 my-3">¿Hay algo que nos tengas que comentar?</label>
								<textarea id="reserva_comentario" name="reserva_comentario" rows="4" class="w-100" style="resize:none"></textarea>
							</div>
							<input type="hidden" name="action" value="reserva_formulario">
							<input type="submit" class="mt-3 mb-4" id="reserva_submit" name="reserva_submit" value="Enviar">
						</form>
					</div>
				<?php }
				}?> 
       		</div>
		</main>
	</div>
</div>
<?php
	/* Muestra el footer definido en su archivo t_footer.php */
	include get_template_directory()."/page-templates/t_footer.php";
?>
<?php
/*
	Template Name: Carta
*/

	get_header();

	/* Se hace la conexión con la base de datos de la carta*/
	$mydb = new wpdb('mydig71a0e4','aQ7wVuWh','carta','localhost');
	/* Se guarda en una variable la lista de platos */
	$lista_platos = $mydb->get_results("SELECT * from Platos where oferta = 0");
	/* Se guarda en una variable la lista de platos con descuento */
	$lista_platos_descuento = $mydb->get_results("SELECT * from Platos where oferta = 1");
	/* Se guarda en una variable la lista de postres con descuento */
	$lista_postres_descuento = $mydb->get_results("SELECT * from Postres where oferta = 1");
	/* Se guarda en una variable la lista de vinos */
	$lista_vinos = $mydb->get_results("SELECT * from Bebidas where tipo = 'Vinos'");
	/* Se guarda en una variable la lista de cafés */
	$lista_cafe = $mydb->get_results("SELECT * from Bebidas where tipo = 'Cafe'");
	/* Se guarda en una variable la lista de aguas */
	$lista_agua = $mydb->get_results("SELECT * from Bebidas where tipo = 'Agua'");
	/* Se guarda en una variable la lista de otras bebidas */
	$lista_otros = $mydb->get_results("SELECT * from Bebidas where tipo = 'Otros'");
	/* Se guarda en una variable la lista de refrescos */
	$lista_refrescos = $mydb->get_results("SELECT * from Bebidas where tipo = 'Refresco'");
	/* Se guarda en una variable la lista de postres */
	$lista_postres = $mydb->get_results("SELECT * from Postres where oferta = 0");
	/* Se cierra la conexión con la base de datos */
	$mydb->close();

	/* Se guarda en una variable la imagen de platos cada semana, con la función getbloginfo y la ruta de la imagen */
    $banner = get_bloginfo('wpurl')."/wp-content/themes/neve/assets/img/banner.jpg";

	/* Condición: si el metodo de la petición es GET y si la variable elemento sacada de GET está definida */
	if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['elemento'])) {
		/* 
			Guarda en una variable cada elemento en una cadena que contiene ese elemento desde la posisión 0,
			hasta el primer _ que haya, poniendo la primera letra en mayúscula 
		*/
		$tabla_elemento = ucfirst(substr($_GET['elemento'], 0, strpos($_GET['elemento'], "_")));
		/* 
			Guarda en una variable el id del elemento en una cadena con el elemento, comenzando después del primer _, 
			hasta el guión menos una posición antes del _
		*/
		$id_elemento = substr($_GET['elemento'], strpos($_GET['elemento'], "_")+1, strpos($_GET['elemento'], "-")-strpos($_GET['elemento'], "_")-1);
		/* Se hace la conexión a la base de datos de la carta */
		$mydb = new wpdb('mydig71a0e4','aQ7wVuWh','carta','localhost');
		/* Se hace una consulta a la base de datos para sacar cada elemento donde la id sea la id que hemos guardado antes */
		$informacion = $mydb->get_results("SELECT * from $tabla_elemento where id = $id_elemento");
		/* Se cierra la conexión de la base de datos */
		$mydb->close();
		/* Recorre el array de información que contiene cada elemento de la carta, donde cada elemento se definirá como elemento */
		foreach ($informacion as $elemento) {
			/* En una variable se guarda el html que generará por cada elemento */
			$modal = "<div id='modal_informacion' class='row m-3 mx-md-auto' style='display:block;'>
						<h1 id='titulo_informacion' class='fs-1 text-center py-2 mb-3' style='background-color: black; border: 2px solid white;'>$elemento->nombre</h1>
						<div class='row col p-0'>
							<div class='col-md-6 d-flex mx-auto' style='border: 2px solid black; padding: 15px; background-color: white;'>
								<img id='informacion_muestra' src='".get_bloginfo('wpurl')."/wp-content/themes/neve/assets/img/carta/$elemento->nombre_img.jpg' class='img-fluid d-flex m-auto' style='max-height: 200px;'/>
							</div>
							<div class='col-md-6 p-0 ps-md-4 mt-3 mt-md-0 align-self-center'>";		
			/* Condición: si el elemento de la tabla es igual a platos o postres */		
			if($tabla_elemento == "Platos" || $tabla_elemento == "Postres") {
				/* Si el elemento tiene oferta igual a 1, que quiere decir que tiene descuento */
				if($elemento->oferta == "1") {
					/* El precio después del descuento será, el precio menos el descuento por el elemento entre 100*/
					$precio_descuento = $elemento->precio - ($elemento->descuento * $elemento->precio/100);
					/* 
						En la variable donde antes se ha guardado el html, se concatena y se mete más html, 
						pero esta vez de descuentos que hay 
					*/
					$modal = $modal."<div class='col-12 me-2 mb-4 text-center' style='border: 2px solid white; padding: 15px; background-color: red; color: white;'>
									<p class='h3 mb-0'>¡Descuento ($elemento->descuento%)!</p>
								</div>
								<div class='col-12' style='border: 2px solid white; padding: 15px; background-color: black;'>
									<p class='h3 mb-0'>Precio: <span class='oferta'><del>$elemento->precio €</del></span> $precio_descuento €</p>
								</div>";
				}
				/* Sino, se concatena con la variable que genera el html y se pone el html con el precio sin descuento */
				else {
				$modal = $modal."<div class='col-12 mb-4' style='border: 2px solid white; padding: 15px; background-color: black;'>
									<p class='h3 mb-0'>Precio: $elemento->precio €</p>
								</div>
								<div class='col-12' style='border: 2px solid white; padding: 15px; background-color: black;'>
									<p class='h3 mb-0 mb-md-2'>Curiosidad</p>
									<span> $elemento->curiosidad</span>
								</div>";
				}
				/* Se sigue guardando y concatenando el html para que se genere por cada elemento */
				$modal = $modal."</div>
							 		<div class='col-12 p-0'>";
				/* En una variable se guardan por separado los ingredientes de cada plato que estan separados por una coma */
				$ingredientes_elemento = explode(", ", $elemento->ingredientes);
				/* Se sigue guardando y concatenando el html para que se genere por cada elemento */
				$modal = $modal."<div class='col-12 mt-4' style='border: 2px solid white; padding: 15px; background-color: black;'>
									<h2 class='h2 mb-3 text-center'>Ingredientes</h2>
									<ul class='row'>";
				/* Se recorre el array de ingredientes donde cada elemento será el ingrediente */
				foreach ($ingredientes_elemento as $ingrediente) { 
					/* se genera la lista con cada ingrediente */
					$modal = $modal."<li class='col-12 col-md-6'>- ".ucfirst($ingrediente)."</li>";
				}
				/* Se sigue guardando y concatenando el html para que se genere por cada elemento */
				$modal = $modal."</ul>
							</div>
						</div>";
			}
			/* Sino (el elemento no es plato ni postre) */
			else {
				/* Se sigue guardando y concatenando el html para que se genere por cada elemento, en este caso el precio */
				$modal = $modal."<div class='col-12 mb-4' style='border: 2px solid white; padding: 15px; background-color: black;'>
					<p class='h3 mb-0'>Precio: $elemento->precio €</p>
				</div>";
				/* Si la marca del elemento existe */
				if ($elemento->marca) {
					/* Se sigue guardando y concatenando el html para que se genere por cada elemento, en este caso la marca del producto */
					$modal = $modal."<div class='col-12 mt-4' style='border: 2px solid white; padding: 15px; background-color: black;'>
								<p class='h3'>Marca: $elemento->marca</p>
							</div>";
				}
				/* Se sigue guardando y concatenando el html para que se genere por cada elemento */
				$modal = $modal."</div>
							<div class='col-12 p-0'>";	
				/* En una variable se guardan por separado los ingredientes de cada plato que estan separados por una coma */
				$ingredientes_elemento = explode(", ", $elemento->ingredientes);
				/* Se sigue guardando y concatenando el html para que se genere por cada elemento */
				$modal = $modal."<div class='col-12 mt-4' style='border: 2px solid white; padding: 15px; background-color: black;'>
									 <h2 class='h2 mb-3 text-center'>Ingredientes</h2>
									 <ul class='row'>";
				/* Se recorre el array de ingredientes donde cada elemento será el ingrediente */	
				foreach ($ingredientes_elemento as $ingrediente) { 
					/* se genera la lista con cada ingrediente */
					$modal = $modal."<li class='col-12 col-md-6'>- ".ucfirst($ingrediente)."</li>";
				}
				/* Se sigue guardando y concatenando el html para que se genere por cada elemento */
				$modal = $modal."</ul>
							</div>
						</div>";					
			}
			/* Se sigue guardando y concatenando el html para que se genere por cada elemento, en este caso el botón de cerrar */
			$modal = $modal."</div>
				<input id='modal_btn_carta_cerrar' class='mt-4' type='button' name='cerrar_modal' value='Atrás' onclick='cerrar_modal_carta()'/>
			</div>";
		}
   }
?>
<script type="text/javascript">
	/* Función que muestra las imágenes de la carta, osea de cada producto */
	function mostrar_img(el) {
		/* Guarda en una variable la ruta donde estan las imágenes */
		var ruta = "<?php echo get_bloginfo('wpurl'); ?>/wp-content/themes/neve/assets/img/carta/";
		/* 
			Guarda en una variable el nombre de la imagen, cogiendolo del parámetro que se pasa, 
			cogiendo el id de este hasta la posición del primer guión más 1 
		*/
		var nombre = el.id.substring(el.id.indexOf("-")+1);
		/* Coge el elemento con id muestra y como fuente pone la ruta de la imagen más el nombre i la extensión de la imagen */
		document.getElementById("muestra").src = ruta + nombre + ".jpg";
	}
	/* Función que muestra en la url el producto de la carta seleccionado */
	function informacion(elemento) {
		window.location.href = "<?php echo Site_url() ?>" + "/carta?elemento=" + elemento.id;
	}
	/* Función que substituye la imagen del producto por el banner */
	function ocultar_img() {
		document.getElementById("muestra").src = "<?php echo $banner ?>";
	}
</script>
<?php
	/* Condición: si el metodo de la petición es GET y si la variable elemento sacada de GET está definida */
	if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['elemento'])) {
		/* Muestra el html generado que está dentro de la variable modal */
		echo $modal;?>
		<script type="text/javascript">
			/* Función que oculta los elementos con id primary y footer y añade al elemento con id content la varias clases */
			window.onload = function() {
				document.getElementById("primary").style.display = "none";
				document.getElementById("footer").style.display = "none";
				document.getElementById("content").className += " fondo_carta_informacion d-md-flex mt-0 mt-lg-4";
				/* Funció que cambia la nav segun la medida de la pantalla */
				cambiar_nav(screen.width);		
			};
		</script>
		<?php
	}
?>
<div id="main_carta" class="wrap">
	<div id="primary" class="content-area container position-relative py-5">
		<main id="main" class="bg-black site-main row text-start mb-3 mx-md-auto mx-2">
			<h2 class="text-center mt-4">Carta</h2>
			<div id="carta" class="col row p-0 mx-md-5 mx-2">
				<div id="platos" class="col-12 col-md-5">
					<h3 class="text-center">Platos</h3>
					<table id="table_platos" onMouseLeave='ocultar_img()'>
						<?php
							/* Recorre el array con la lista de platos y muestra los platos en la tabla */
							foreach ($lista_platos as $platos) {
								echo "<tr id='tr_$platos->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
									echo "<td id='platos_$platos->id-$platos->nombre_img' class='col-9 border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$platos->nombre."</td>";
									echo "<td class='col-3 border-0 text-end py-1'>".$platos->precio."€</td>";
								echo "</tr>";
							}
						?>
					</table>
				</div>
				<div class="d-none d-md-block col-1"></div>
				<div class="d-none d-md-block col-1 border-start"></div>
				<div id="descuentos" class="col-12 col-md-5" onMouseLeave='ocultar_img()'>
					<h3 class="text-center">Descuentos</h3>
					<h4 class='text-center'>Platos</h4>
					<table>
						<?php
							/* Si los platos con descuento son mayor o igual que 1 */
							if(count($lista_platos_descuento) >= 1) {
								/* Recorre el array con la lista de platos con descuento y muestra los platos en la tabla */
								foreach ($lista_platos_descuento as $plato_descuento) {
									$precio_descuento = $plato_descuento->precio - ($plato_descuento->descuento * $plato_descuento->precio/100);
									echo "<tr id='tr_$plato_descuento->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
										echo "<td id='platos_$plato_descuento->id-$plato_descuento->nombre_img' class='col-9 align-self-center border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$plato_descuento->nombre."</td>";
										echo "<td class='col-3 border-0 text-end py-1'><span class='oferta'><del>".$plato_descuento->precio."€</del></span> ".$precio_descuento."€</td>";
									echo "</tr>";
								}
							}
							/* Sino muestra un html donde diga que no hay platos con descuento */
							else {
								echo "<tr class='row'>";
									echo "<td class='col-12 border-0 py-1 text-center'>Actualmente no hay platos con descuento</td>";
								echo "</tr>";
							}
							
						?>
					</table>
					<h4 class='text-center'>Postres</h4>
					<table>
						<?php
							/* Si los postres con descuento son mayor o igual que 1 */
							if(count($lista_postres_descuento) >= 1) {
								/* Recorre el array con la lista de postres con descuento y muestra los postres en la tabla */
								foreach ($lista_postres_descuento as $postre_descuento) {
									$precio_descuento = $postre_descuento->precio - ($postre_descuento->descuento * $postre_descuento->precio/100);
									echo "<tr id='tr_$postre_descuento->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
										echo "<td id='postres_$postre_descuento->id-$postre_descuento->nombre_img' class='col-9 align-self-center border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$postre_descuento->nombre."</td>";
										echo "<td class='col-3 border-0 text-end py-1'><span class='oferta'><del>".$postre_descuento->precio."€</del></span> ".$precio_descuento."€</td>";
									echo "</tr>";
								}
							}
							/* Sino muestra un html donde diga que no hay postres con descuento */
							else {
								echo "<tr class='row'>";
									echo "<td class='col-12 border-0 py-1 mb-md-4 text-center'>Actualmente no hay postres con descuento</td>";
								echo "</tr>";
							}
							
						?>
					</table>
				</div>
				<div id="postres" class="col-12 col-md-5" onMouseLeave='ocultar_img()'>
                    <h3 class="text-center mt-3">Postres</h3>
					<table id="table_platos">
						<?php
							/* Recorre el array con la lista de postres y muestra los postres en la tabla */
							foreach ($lista_postres as $postre) {
								echo "<tr id='tr_$postre->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
									echo "<td id='postres_$postre->id-$postre->nombre_img' class='col-9 border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$postre->nombre."</td>";
									echo "<td class='col-3 border-0 text-end py-1'>".$postre->precio."€</td>";
								echo "</tr>";
							}
						?>
					</table>
				</div>
                <div class="d-none d-md-block col-2"></div>
                <div id="img_muestra" class="d-none d-md-flex col-5 bg-white d-flex justify-content-center align-items-center">
                    <img id="muestra" src="<?php echo $banner ?>" class="img-fluid" style="max-height: 200px;"/>
                </div>
				<div id="bebidas" class="col row p-0 pb-4" onMouseLeave='ocultar_img()'>
					<h3 class="text-center mt-md-5">Bebidas</h3>
					<div class="col row pe-md-2 px-0">
						<div class="col-12 col-md-6">
							<h4 class="text-center">Agua</h4>
							<table>
							<?php
								/* Recorre el array con la lista de aguas y muestra los aguas en la tabla */
								foreach ($lista_agua as $agua) {
									echo "<tr id='tr_$agua->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
										echo "<td id='bebidas_$agua->id-$agua->nombre_img' class='col-9 border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$agua->nombre."</td>";
										echo "<td class='col-3 border-0 text-end py-1 pe-md-4'>".$agua->precio."€</td>";
									echo "</tr>";
								}
							?>
							</table>
						</div>
						<div id="refrescos" class="col-12 col-md-6" onMouseLeave='ocultar_img()'>
							<h4 class="text-center">Refrescos</h4>
							<table>
								<?php
								/* Recorre el array con la lista de refrescos y muestra los refrescos en la tabla */
								foreach ($lista_refrescos as $refresco) {
									echo "<tr id='tr_$refresco->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
										echo "<td id='bebidas_$refresco->id-$refresco->nombre_img' class='col-9 border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$refresco->nombre."</td>";
										echo "<td class='col-3 border-0 text-end py-1'>".$refresco->precio."€</td>";
									echo "</tr>";
								}
								?>
							</table>
						</div>
						<div id="cafes" class="col-12 col-md-6" onMouseLeave='ocultar_img()'>
						<h4 class="text-center">Café</h4>
							<table>
								<?php
								/* Recorre el array con la lista de cafés y muestra los cafés en la tabla */
								foreach ($lista_cafe as $cafe) {
									echo "<tr id='tr_$cafe->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
										echo "<td id='bebidas_$cafe->id-$cafe->nombre_img' class='col-9 border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$cafe->nombre."</td>";
										echo "<td class='col-3 border-0 text-end py-1 pe-md-4'>".$cafe->precio."€</td>";
									echo "</tr>";
								}
							?>
							</table>
						</div>
						<div id="otros" class="col-12 col-md-6" onMouseLeave='ocultar_img()'>
							<h4 class="text-center">Otros</h4>
							<table>
								<?php
								/* Recorre el array con la lista de otros refrescos y muestra los otros refrescos en la tabla */
								foreach ($lista_otros as $otros) {
									echo "<tr id='tr_$otros->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
										echo "<td id='bebidas_$otros->id-$otros->nombre_img' class='col-9 border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$otros->nombre."</td>";
										echo "<td class='col-3 border-0 text-end py-1'>".$otros->precio."€</td>";
									echo "</tr>";
								}
								?>
							</table>
						</div>
					</div>
					<div id="vinos" class="col-12 col-md-4" onMouseLeave='ocultar_img()'>
						<h4 class="text-center">Vinos</h4>
						<table>
							<?php
								/* Recorre el array con la lista de vinos y muestra los vinos en la tabla */
								foreach ($lista_vinos as $vino) {
								echo "<tr id='tr_$vino->nombre_img' class='row' onMouseOver='mostrar_borde(this)' onMouseLeave='ocultar_borde(this)' style='border-bottom: 1px solid black;'>";
									echo "<td id='bebidas_$vino->id-$vino->nombre_img' class='col-9 border-0 py-1' onclick='informacion(this)' onMouseOver='mostrar_img(this)'>".$vino->nombre."</td>";
									echo "<td class='col-3 border-0 text-end py-1'>".$vino->precio."€</td>";
								echo "</tr>";
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</main>
	</div>
	<?php
		/* Muestra el footer definido en su archivo t_footer.php */
		include get_template_directory()."/page-templates/t_footer.php";
	?>
</div>

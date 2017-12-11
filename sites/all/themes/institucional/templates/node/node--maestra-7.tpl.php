<?php
global $language;
?>
<div class="contenedor-principal container-fluid">

	<div class="container-fluid banner-superior">
		<div class="row row-principal">
			<div class="col-xs-12 col-md-12">
				<div class="container-fluid">
					<div class="img-desktop">
						<?php if (!empty($node->field_imagen_desk_banner_m7)){ ?>
							<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_desk_banner_m7["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_desk_banner_m7["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_desk_banner_m7["und"][0]["title"] ?>" >

						<?php } ?>
					</div>
					<div class="img-mobile">
						<?php if (!empty($node->field_imagen_mob_banner_m7)){ ?>
							<img src="<?php print file_create_url( $node->field_imagen_mob_banner_m7["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mob_banner_m7["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mob_banner_m7["und"][0]["title"] ?>" >

						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-12 content-slides">
				<div class="container-fluid">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-md-7 info-banner">
								<h1 id="title"> <?php print $node->title ?> </h1>
								<?php if (!empty($node->field_sub_titulo_m7)){ ?>
									<div class="linea-division"></div>
									<p id="description"> <?php print $node->field_sub_titulo_m7["und"][0]["value"] ?> </p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid miga-de-pan">
		<?php
		if (!empty($GLOBALS["breadcrumb"])){
			$breadcrumb = $GLOBALS["breadcrumb"];
			print $breadcrumb;
		}
		?>
	</div>

	<div class="container-fluid">
		<div class="container">
			<div class="col-xs-12 col-md-6">
				<figure>
					<?php if (!empty($node->field_imagen_principal_m7)){ ?>
						<img src="<?php print file_create_url( $node->field_imagen_principal_m7["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_principal_m7["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_principal_m7["und"][0]["title"] ?>" >
					<?php }
					else {
						if (!empty($node->field_video_principal_m7)){

							$cadena = $node->field_video_principal_m7["und"][0]["value"];

							$fuente = 0;

							$iframe = '';

							$identificador = '';
							
							if (strpos($cadena, 'youtu') !== false) {
								$fuente = 1;
							}
							else if (strpos($cadena, 'vimeo') !== false) {
								$fuente = 2;
							}
							else if (strpos($cadena, 'ustream') !== false) {
								$fuente = 3;
							} 
							else if( strstr( $cadena, "maps" ) ){
								print $cadena;
							}
							else {
								$fuente = 4;
							}

							
							if ($fuente == 1){

								if (strpos($cadena,'youtu.be') !== false){
									$identificador = str_replace("https://youtu.be/","",$cadena);
								}
								if (strpos($cadena,'watch') !== false){
									$identificador = str_replace("https://www.youtube.com/watch?v=","",$cadena);
								}
								if (strpos($cadena,'embed') !== false){
									$identificador = str_replace("https://www.youtube.com/embed/","",$cadena);
								}

								$iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '"></iframe>';
							}
							if ($fuente == 2){

								if (strpos($cadena,'player') !== false){
									$identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
								}
								else{
									$identificador = str_replace("https://vimeo.com/","",$cadena);
								}

								$iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
							}
							if ($fuente == 3){

								$identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);

								$iframe = '<iframe width="480" height="270" src="http://www.ustream.tv/embed/'. $identificador .'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>';
							}
							if ($fuente == 4){
								$iframe = $cadena;
							}

							print $iframe;
						}
					}
					?>
					<figcaption>
						<?php
						if (!empty($node->field_texto_pie_mult_m7)){
							print $node->field_texto_pie_mult_m7["und"][0]["value"];
						}
						?>
					</figcaption>
				</figure>
			</div>
			<div class="col-xs-12 col-md-6">
				<?php if (!empty($node->field_texto_principal_m7)){ ?>
				<p> <?php print $node->field_texto_principal_m7["und"][0]["value"]  ?> </p>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<?php
					$iconos=array();
					$botones = array();
					if (!empty($node->field_enlaces_internos_m7)){
						foreach ($node->field_enlaces_internos_m7["und"] as $item){
							if (count($botones) <= 14){
								array_push($iconos,1);
								array_push($botones,$item);
							}
						}
					}
					if (!empty($node->field_enlaces_externos_m7)){
						foreach ($node->field_enlaces_externos_m7["und"] as $item){
							if (count($botones) <= 14){
								array_push($iconos,2);
								array_push($botones,$item);
							}
						}
					}
					if (!empty($node->field_enlaces_descarga_m7)){
						foreach ($node->field_enlaces_descarga_m7["und"] as $item){
							if (count($botones) <= 14){
								array_push($iconos,3);
								array_push($botones,$item);
							}
						}
					}
					?>
					<?php if (!empty($botones)) { ?>
						<div class="menu-seccion-linea"></div>
						<ul class='menu-seccion'>
							<?php
							for ($i = 0; $i < count($botones); $i++){
								$enlace = $botones[$i];
								$numero = $iconos[$i];

								if ($numero == 1){
								?>
								<li class="linck-interno"><span></span><a target="<?php echo $enlace[ "attributes" ][ "target" ] ?>" href="<?php print $enlace["url"] ?> "> <?php print $enlace["title"] ?> </a></li>
							<?php }
								if ($numero == 2){
							 ?>
									<li class="linck-externo"><span><img src="/sites/default/files/icon-flecha.png"></span><a target="<?php echo $enlace[ "attributes" ][ "target" ] ?>" href="<?php print $enlace["url"] ?> "> <?php print $enlace["title"] ?> </a></li>
							<?php }
								if ($numero == 3) {
										if($language->language=="en"){
										$url_limpia=str_replace("/en/", "",$enlace['url']);
										}else{
										$url_limpia=str_replace("/es/", "",$enlace['url']);

										}
								

									?>
									<li class="linck-descarga"><span><img src="/sites/default/files/icon-descargar.png"></span><a target="<?php echo $enlace[ "attributes" ][ "target" ] ?>" href="/<?php print $url_limpia; ?> "> <?php print $enlace["title"] ?> </a></li>
							<?php }?>
							<?php }?>

						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<?php if (!empty($node->field_activar_noticias_m7) && $node->field_activar_noticias_m7["und"][0]["value"] == 1) { ?>

	<div class="container-fluid container-noticias-fluid">
		<div class="container">
			<div class="title-bloques"><h2> <span></span><?php print t("Recent News"); ?></h2></div>
			<div class="container-noticias">

				<?php
				
					$block = module_invoke('views', 'block_view', 'vista_noticias_interna-block');
					print render($block['content']);

				?>

			</div>
		</div>
	</div>

	<?php } ?>

	<div class="container-fluid compartir-redes">
		<div class="container">
			<div class="linea-100"></div>
			<p><?php //print t("Share"); ?></p>
			<?php
			$block = module_invoke('block', 'block_view', '3');
			print render($block['content']);
			?>
			<?php
			/*if ($service_links_rendered):
				print $service_links_rendered;
			endif;*/
			?>
		</div>
	</div>

</div>

















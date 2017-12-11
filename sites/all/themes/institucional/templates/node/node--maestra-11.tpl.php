<?php
/*echo "<pre>";
	print_r($node);
echo "<pre>";*/
?>
<div class="contenedor-principal container-fluid">

	<div class="container-fluid miga-de-pan">
		<?php
		if (!empty($GLOBALS["breadcrumb"])){
			$breadcrumb = $GLOBALS["breadcrumb"];
			print $breadcrumb;
		}
		?>
	</div>

	<div class="container-fluid container-img-fluid">
		<div class="container">
			<?php if (!empty($node->field_imagen_desk_banner_m11) && !empty($node->field_imagen_mob_banner_m11)) { ?>
			<figure>
				<div class="img-desktop">
					<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_desk_banner_m11["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_desk_banner_m11["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_desk_banner_m11["und"][0]["title"] ?>" >
				</div>
				<div class="img-mobile">
					<img src="<?php print file_create_url( $node->field_imagen_mob_banner_m11["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mob_banner_m11["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mob_banner_m11["und"][0]["title"] ?>" >
				</div>
				<figcaption>
					<?php print $node->field_pie_de_multimedia_m11["und"][0]["value"] ?>
				</figcaption>
			</figure>
			<?php } ?>
			<?php if (!empty($node->field_video_principal_m11)){

				$cadena = $node->field_video_principal_m11["und"][0]["value"];

				$fuente = 0;

				$iframe = '';

				$identificador = '';

				if (strpos($cadena, 'youtu') !== false) {
					$fuente = 1;
				}
				if (strpos($cadena, 'vimeo') !== false) {
					$fuente = 2;
				}
				if (strpos($cadena, 'ustream') !== false) {
					$fuente = 3;
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

				print $iframe;
			} ?>
		</div>
	</div>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<h1 id="title"><?php print $node->title ?></h1>
					<div class='linea-h2'></div>
				</div>
				<div class="col-xs-12 col-md-6">
					<p id="description">  <?php print $node->field_texto_principal_1_m11["und"][0]["value"] ?> </p>
				</div>
				<div class="col-xs-12 col-md-6">
					<p> <?php print $node->field_texto_principal_2_m11["und"][0]["value"] ?> </p>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid container-listado-maestra11">
		<div class="container">
			<div class="title-bloques"> <span></span> <?php print $node->field_titulo_bloque_inferior_m11["und"][0]["value"] ?></div>
			<?php
			$array = array($node->field_tipo_m11["und"][0]["tid"]);
			$view = views_get_view('vista_lista_maestra_11');
			$view->set_display("block");
			$view->set_arguments($array);
			$view->pre_execute();
			$view->execute();
			print $view->render();
			?>
		</div>
	</div>
	<div class="container-fluid block-views-vista-anuncios-home-block">
		<div class="container">

			<?php
			if ($node->field_activar_anuncios_m11["und"][0]["value"] == 1){
				$block = module_invoke('views', 'block_view', 'vista_anuncios_home-block');
				print render($block['content']);
			}
			?>
		</div>
	</div>
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
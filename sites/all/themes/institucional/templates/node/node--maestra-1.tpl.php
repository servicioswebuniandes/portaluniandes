<?php
//echo "<pre>";
	//print_r($node);
//echo "</pre>";
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
			<figure>
				<div class="img-desktop">
					<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_maestra_1["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_maestra_1["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_maestra_1["und"][0]["title"] ?>" >
				</div>
				<div class="img-mobile">
					<img src="<?php print file_create_url( $node->field_imagen_mobile_maestra1["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mobile_maestra1["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_maestra1["und"][0]["title"] ?>" >
				</div>
				<figcaption id="caption">
					<?php print $node->field_imagen_maestra_1["und"][0]["image_field_caption"]["value"]; ?>
				</figcaption>
			</figure>
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
					<p id="description">  <?php print $node->field_descripcion1_maestra_1["und"][0]["value"] ?> </p>
				</div>
				<div class="col-xs-12 col-md-6">
					<p> <?php print $node->field_descripcion_2_maestra_1["und"][0]["value"] ?> </p>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid block-views-vista-anuncios-home-block">
		<div class="container">

            <?php
                if ($node->field_anuncios_maestra_1["und"][0]["value"] == 1){
                    $block = module_invoke('views', 'block_view', 'vista_anuncios_home-block');
                    print render($block['content']);
                }
            ?>
			
		</div>
	</div>

	<div class="container-fluid container-noticias-fluid">
		<div class="container">
		<?php
				if ($node->field_noticias_maestra_1["und"][0]["value"] == 1){ ?>

			<div class="title-bloques"><h2> <span></span><?php print t("Recent News"); ?></h2></div>
			<div class="container-noticias">
<?php 
				
					$block = module_invoke('views', 'block_view', 'vista_noticias_interna-block');
					print render($block['content']);
				}
				?>

			</div>
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

















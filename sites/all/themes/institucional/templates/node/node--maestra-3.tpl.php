<?php
//echo "<pre>";
//	print_r($node);
//echo "</pre>";
?>
<div class="contenedor-principal container-fluid">
	<div class="container-fluid banner-superior">
		<div class="row row-principal">
			<div class="col-xs-12 col-md-12">
				<div class="container-fluid">
					<div class="img-desktop">
						<?php if (!empty($node->field_imagen_maestra3)){ ?>
							<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_maestra3["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_maestra3["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_maestra3["und"][0]["title"] ?>" >
						<?php } ?>
					</div>
					<div class="img-mobile">
						<?php if (!empty($node->field_img_ban_mob_maestra3)){ ?>
							<img src="<?php print file_create_url( $node->field_img_ban_mob_maestra3["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_img_ban_mob_maestra3["und"][0]["alt"] ?>" title="<?php print $node->field_img_ban_mob_maestra3["und"][0]["title"] ?>" >
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
								<?php if (!empty($node->field_sub_titulo_maestra3)){ ?>
								<div class="linea-division"></div>
								<p id="description"> <?php print $node->field_sub_titulo_maestra3["und"][0]["value"] ?> </p>
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
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<?php if (!empty($node->field_texto1_maestra3)){ ?>
					<p> <?php print $node->field_texto1_maestra3["und"][0]["value"] ?> </p>
					<?php } ?>
				</div>
				<div class="col-xs-12 col-md-6">
					<?php if (!empty($node->field_texto2_maestra3)){ ?>
						<p> <?php print $node->field_texto2_maestra3["und"][0]["value"] ?> </p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid container-accordion">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<?php 
					$info_node=translation_path_get_translations("node/6231");
					if ("node/".$node->nid == $info_node['es'] || "node/".$node->nid == $info_node['en'] ){
						$block = module_invoke('views', 'block_view', 'vista_faq-block');
						print render($block['content']);
					}
					else { ?>

						<div class="title-bloques"><span></span> Convenios y Becas</div>
						<?php
						$block = module_invoke('quicktabs', 'block_view', 'tab_de_convenios_');
						print render($block['content']);
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<!---<div class="container-fluid container-background-gray">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
						<?php
						if (!empty($node->field_titulo_alianzas_m3)){
						?>
					<div class="title-bloques"> <span></span> <?php print $node->field_titulo_alianzas_m3["und"][0]["value"] ?> </div>
						<?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<?php if (!empty($node->field_sub_titulo_alianzas_1_m3)) {?>
					<h3> <?php print $node->field_sub_titulo_alianzas_1_m3["und"][0]["value"] ?> </h3>
					<?php }?>
					<?php if (!empty($node->field_texto_alianzas_1_m3)) { ?>
					<section><?php print $node->field_texto_alianzas_1_m3["und"][0]["value"] ?></section>
					<?php }?>
				</div>
				<div class="col-xs-12 col-md-4">
					<?php if (!empty($node->field_sub_titulo_alianzas_2_m3)) {?>
						<h3> <?php print $node->field_sub_titulo_alianzas_2_m3["und"][0]["value"] ?> </h3>
					<?php }?>
					<?php if (!empty($node->field_texto_alianzas_2_m3)) { ?>
						<section><?php print $node->field_texto_alianzas_2_m3["und"][0]["value"] ?></section>
					<?php }?>
				</div>
				<div class="col-xs-12 col-md-4">
					<?php if (!empty($node->field_sub_titulo_alianzas_3_m3)) {?>
						<h3> <?php print $node->field_sub_titulo_alianzas_3_m3["und"][0]["value"] ?> </h3>
					<?php }?>
					<?php if (!empty($node->field_texto_alianzas_3_m3)) { ?>
						<section><?php print $node->field_texto_alianzas_3_m3["und"][0]["value"] ?></section>
					<?php }?>
				</div>
			</div>
		</div>
	</div> -->
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

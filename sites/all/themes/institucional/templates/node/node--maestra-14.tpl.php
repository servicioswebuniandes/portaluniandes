<?php
/*echo "<pre>";
	print_r($node);
	echo "<pre>";*/
	?>
	<div class="container-fluid contenedor-principal">
		<div class="container-fluid banner-superior">
			<div class="row row-principal">
				<div class="col-xs-12 col-md-12">
					<div class="container-fluid">
						<div class="img-desktop">
							<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_desk_banner_m14["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_desk_banner_m14["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_desk_banner_m14["und"][0]["title"] ?>" >
						</div>
						<div class="img-mobile">
							<img src="<?php print file_create_url( $node->field_imagen_mob_banner_m14["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mob_banner_m14["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mob_banner_m14["und"][0]["title"] ?>" >
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-md-12 content-slides">
					<div class="container-fluid">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-md-7 info-banner">
									<h1 id="title"> <?php print $node->title ?> </h1>
									<div class="linea-division"></div>
									<?php if (!empty($node->field_sub_titulo_m14)){ ?>
									<p id="description"> <?php print $node->field_sub_titulo_m14["und"][0]["value"] ?> </p>
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
		
		<div class="container-fluid secciones-guia">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<section class="bg-img">
							<img src="/sites/default/files/guia-icono1.png">
						</section>
						<section class='box-links background-yellow'>
							<h2>VIDA ACADÉMICA</h2>
							<?php
							$block = module_invoke('menu_block', 'block_view', '2');
							print render($block['content']);
							?>
						</section>
					</div>
					<div class="col-xs-12 col-md-6">
						<section class="bg-img">
							<img src="/sites/default/files/guia-icono2.png">
						</section>
						<section class='box-links'>
							<h2>VIDA UNIVERSITARIA</h2>
							<?php
							$block = module_invoke('menu_block', 'block_view', '3');
							print render($block['content']);
							?>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<section class="bg-img">
							<img src="/sites/default/files/guia-icono3.png">
						</section>
						<section class='box-links'>
							<h2>SERVICIOS</h2>
							<?php
							$block = module_invoke('menu_block', 'block_view', '4');
							print render($block['content']);
							?>
						</section>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="guia-rapida">
							<h2>GUÍA RÁPIDA</h2>
							<div class="content-guia-rapida">
								<img src="/sites/default/files/guia-icono4.png">
								<!--<a href="">Ver guía</a>-->
								<?php
								$block = module_invoke('menu_block', 'block_view', '5');
								print render($block['content']);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid container-noticias-fluid">
			<div class="container">
				<div class="title-bloques"><h2> <span></span><?php print t("Recent News"); ?></h2></div>
				<div class="container-noticias">

					<?php
					if ($node->field_activar_noti_recientes_m14["und"][0]["value"] == 1){
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
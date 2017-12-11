<?php

$menu = menu_get_active_trail();

$menu = end( $menu );

$result = db_select('menu_links', 'ml')
	->fields('ml')
	->condition('plid', $menu[ "mlid" ],'=')
	->execute();

$background = "/sites/default/files/fondo-uniandes.jpg";
if( isset( $node->field_imagen_panel_1_maestra2["und"] ) ) {
	$background = file_create_url( $node->field_imagen_panel_1_maestra2["und"][0]["uri"] );
}
	
?>

<div class="container-fluid miga-de-pan">
	<?php
	if (!empty($GLOBALS["breadcrumb"])){
		$breadcrumb = $GLOBALS["breadcrumb"];
		print $breadcrumb;
	}
	?>
</div>

<div class="container-fluid noticia-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h1> <?php print $node->title ?> </h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<p> <?php print $node->field_descripcion_submenu["und"][0]["value"] ?> </p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
	 <div class="row">
		<figure>
		 <?php if( !empty( isset( $node->field_imagen["und"] ) ) ){ ?>
		 <div class="img-desktop">
			 <img src="<?php print file_create_url( $node->field_imagen["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print isset( $node->field_imagen["und"] ) ? $node->field_imagen["und"][0]["alt"] : $node->title ?>" title="<?php print $node->field_imagen["und"][0]["title"] ?>" >

		 </div>
		 <?php } ?>
		 <?php if( isset( $node->field_imagen_mobile_bannerh ) ){ ?>
			 <div class="img-mobile">
				 <img src="<?php print file_create_url( $node->field_imagen_mobile_bannerh["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mobile_bannerh["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_bannerh["und"][0]["title"] ?>" >
			 </div>
		 <?php } ?>
		</figure>
	 </div>
	 <p>
		<?php echo $node->body["und"][0]["value"] ?>
	</p>
	</div>
 </div>
<div class="container">
	<div class="col-xs-12 col-md-12">
		<div class="submenu-auto node-type-maestra-4">
			<div class="container-lista">
				<div class="view">
					<div class="view-content">
                        <?php
                        ?>
						<ul>
							<?php foreach( $result as $item ){

							    $opt = $item->options;
							    $targ = "";

							    if (strpos($opt, '_blank') !== false){
							        $targ = "_blank";
                                }

									?>
										<li class="views-row" style="background-image: url( '<?php echo $background; ?>' )">
											<div class="views-field views-field-title-1">
												<div class="field-content">

                                                    <a target="<?php print $targ?>" href="<?php print url( $item->link_path, array('absolute' => true)) ?>" class='multi-enlace'><span class="field-content"><?php print $item->link_title ?> </span></a>

												</div>
											</div>
											<div class="views-field views-field-nothing-1">
												<span class="field-content opacidad-content">
													<div class="opacidad">
													</div>
												</span>
											</div>
										</li>
									<?php

							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$request= $_SERVER['REQUEST_URI'];
$request=str_replace("/es/", "es/", $request);

$request=str_replace("/en/", "en/", $request);
$graduate=false;


   if (strpos($request, 'graduate-programs') !== false) {
         $request=str_replace("/graduate-programs", "", $request);    
         $graduate=true;          
    }

if($request=="en/programs-and-faculties/programs/" || $request=="en/programs-and-faculties/programs"){
	if($graduate){
	$request="en/programs-and-faculties/programs/specialization-programs";

	}else{
	$request="en/programs-and-faculties/programs/undergraduate";

	}

}



$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'taxonomy_term')
    ->fieldCondition('field_path_programas', 'value',$request , '=');
$result = $query->execute();

foreach ($result['taxonomy_term'] as $key) {
$term_id=$key->tid;
}

if(is_null($term_id)){
	$programa=false;
}else{
	$programa=true;
	$info_taxonomy= taxonomy_term_load($term_id);

}
?>
<div class="contenedor-principal container-fluid">
	<div class="container-fluid banner-superior">
		<div class="row row-principal">
			<div class="col-xs-12 col-md-12">
				<div class="container-fluid">
					<div class="img-desktop">
						<?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
							<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >

						<?php } ?>
					</div>
					<div class="img-mobile">
						<?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
							<img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >
							
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
								<?php if (!empty($node->field_descripcion_img_maestra4)){ ?>
									<div class="linea-division"></div>
									<p id="description"> <?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?> </p>
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

	
	<div class="container-fluid container-lista">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
<?php 
   if($programa){

$vista_categorias = views_get_view('lista_de_programas');
$vista_categorias->set_display("block");
$vista_categorias->pre_execute();
$vista_categorias->execute();
$result_categorias=$vista_categorias->result;



?>

<div id="quicktabs-tab_de_tipos_programas" class="quicktabs-wrapper quicktabs-style-nostyle jquery-once-2-processed">
<ul class="quicktabs-tabs quicktabs-style-nostyle">

<?php 
$i=0;
foreach ($result_categorias as $item_categoria) {

	if ($graduate){
		$ruta=$item_categoria->_field_data['tid']['entity']->field_path_programas['und'][0]['value'];
		$ruta=str_replace("programs-and-faculties/programs/", "programs-and-faculties/programs/graduate-programs/", $ruta);
		$item_categoria->_field_data['tid']['entity']->field_path_programas['und'][0]['value']=$ruta;
	}

	if($item_categoria->taxonomy_term_data_name=="Undergraduate" && $graduate){


	}else{


    ?>
   <li class="<?php 
    if ($item_categoria->taxonomy_term_data_name==$info_taxonomy->name) {
        print "active";
    }
     ?>">
        <a id="quicktabs-tab-tab_de_tipos_programas-<?php print $i; ?>" class="active jquery-once-3-processed" href="/<?php print $item_categoria->_field_data['tid']['entity']->field_path_programas['und'][0]['value']?>"><?php print $item_categoria->taxonomy_term_data_name ?></a>
    </li>


<?php
}
$i++;
}?>


</ul>
</div>
<div class="view-header">
      <ul class="quicktabs-tabs quicktabs-type">
 <li class="active">
  <a id="quicktabs-tab-tab_type" class="type_one"></a>
 </li>
 <li>
  <a id="quicktabs-tab-tab_type" class="type_two"></a>
 </li>
</ul>    
</div>
<?php
}
?>





					<p> <?php print $node->field_texto_corto_maestra4["und"][0]["value"] ?> </p>

					<?php

					if($programa){
						 $array = array($term_id);
                        $view = views_get_view('vista_lista_departamentos');
                        $view->set_display("block");
                        $view->set_arguments($array);
                        $view->pre_execute();
                        $view->execute();
                        print $view->render();
					}else{

					if ( (!empty($node->field_tipo_listado_m4) && $node->field_tipo_listado_m4["und"][0]["tid"] == 181) || (!empty($node->field_tipo_listado_m4) && $node->field_tipo_listado_m4["und"][0]["tid"] == 182)) {
						//print render($block['content']);
						?>

<div class="view-header">
      <ul class="quicktabs-tabs quicktabs-type">
 <li class="active">
  <a id="quicktabs-tab-tab_type" class="type_one"></a>
 </li>
 <li>
  <a id="quicktabs-tab-tab_type" class="type_two"></a>
 </li>
</ul>    
</div>
						<?php 
						$view = views_get_view('vista_directorio_redes_sociales_');
                        $view->set_display("block");
                        $view->pre_execute();
                        $view->execute();
                        print $view->render();

					}
					else if ($node->field_tipo_listado_m4["und"][0]["tid"] == 168){

						$block = module_invoke('quicktabs', 'block_view', 'tab_de_tipos_programas');
						print render($block['content']);
					}
					else{

                        $array = array($node->field_tipo_listado_m4["und"][0]["tid"]);
                        $view = views_get_view('vista_lista_departamentos');
                        $view->set_display("block_1");
                        $view->set_arguments($array);
                        $view->pre_execute();
                        $view->execute();
                        print $view->render();

                    }
                    }
					?>

				</div>
			</div>
		</div>
	</div>
	<?php /* if (!empty($node->field_tipo_pie_de_pagina_m4) && $node->field_tipo_pie_de_pagina_m4["und"][0]["value"] == 2) {?>
		<div class="container-fluid caja-centro">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8 center-block">
						<?php if (!empty($node->field_titulo_pie_de_pagina_m4)) { ?>
						<h3 class='title-border'> <?php print $node->field_titulo_pie_de_pagina_m4["und"][0]["value"] ?> </h3>
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<?php if (!empty($node->field_texto_1_pie_de_pagina_m4)){ ?>
						<p> <?php print $node->field_texto_1_pie_de_pagina_m4["und"][0]["value"] ?> </p>
						<?php } ?>
					</div>
					<div class="col-xs-12 col-md-6">
						<?php if (!empty($node->field_texto_2_pie_de_pagina_m4)){ ?>
							<p> <?php print $node->field_texto_2_pie_de_pagina_m4["und"][0]["value"] ?> </p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php /*if (!empty($node->field_tipo_pie_de_pagina_m4) && $node->field_tipo_pie_de_pagina_m4["und"][0]["value"] == 1) {?>
	<div class="container-fluid container-background-gray">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<?php if (!empty($node->field_titulo_pie_de_pagina_m4)) { ?>
						<h2><?php print $node->field_titulo_pie_de_pagina_m4["und"][0]["value"] ?></h2>
					<?php } ?>

					<div class='linea-h2'></div>
				</div>
				<div class="col-xs-12 col-md-6">
					<?php
					if (!empty($node->field_texto_1_pie_de_pagina_m4)){
						print $node->field_texto_1_pie_de_pagina_m4["und"][0]["value"];
					}
					?>

				</div>
				<div class="col-xs-12 col-md-6">
					<?php
					if (!empty($node->field_texto_2_pie_de_pagina_m4)){
						 print $node->field_texto_2_pie_de_pagina_m4["und"][0]["value"];
					 }
					 ?>
				</div>
			</div>
		</div>
	</div>
	<?php } */?>

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
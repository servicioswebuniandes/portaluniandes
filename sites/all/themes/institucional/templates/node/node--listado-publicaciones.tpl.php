<?php
global $language;
$tid=variable_get('taxonomy');
$term = taxonomy_term_load($tid);

if($language->language=="en"){
	$term = i18n_taxonomy_term_get_translation($term, "en");
}else{
	$term = i18n_taxonomy_term_get_translation($term, "es");	
}

$view = views_get_view('categorias_publicaciones');
$view->set_arguments(array($term->tid));
$view->set_display("block");
$view->pre_execute();
$view->execute();

global $base_root;
$path = current_path();
$path_alias = drupal_lookup_path('alias',$path);
$path= $base_root.'/'.$path_alias;
?>


<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "ItemList",
		"url": "<?php print $path; ?>",
		"numberOfItems": "<?php print count($view->result) ?>",
		"itemListElement": [

		<?php 
		$i=1;
		foreach ($view->result as $item ) {
			print "{";
			?>

			"@type": "Book",
			"image": "<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_publicaciones['und'][0]['uri']) ?>",
			<?php 
			if(isset($item->_field_data['nid']['entity']->field_isbn['und'][0]['value'])){
				?>
				"isbn": "<?php  print $item->_field_data['nid']['entity']->field_isbn['und'][0]['value'] ?>",

				<?php 
			}
			?>
			"url": "<?php print $item->_field_data['nid']['entity']->field_url_publicaciones['und'][0]['url']?>",
			"name": "<?php print $item->_field_data['nid']['entity']->title?>",
			"position": <?php print $i; ?>
			<?php

			if ($item === end($view->result)) {
				print "}";
			}else{
				print "},";
			}
			$i++;
		}

		?>


		]
	}
</script>










<section class="breadcrumb">
	<article class="container">
		<span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
		<span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
		<?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
	</article>
</section>



<div class="content-master-publication">
	<header class="title_master-publication container">
		<h1><?php print $node->title ?></h1>
		<h2><?php print $term->field_titulo_cifras['und'][0]['value'] ?></h2>
	</header>


	<?php

	print $view->render();
	print theme('pager'); 

	?>
	<?php 
	if (!empty($term->field_titulo_publicitario['und'][0])) {	
	?>
	<section class="related-publication">
		<figure class="bg-related-publication">
			<img class="img-desktop" src="<?php print file_create_url($term->field_imagen_fondo_cifras['und'][0]['uri']) ?>" alt="<?php print $term->field_imagen_fondo_cifras['und'][0]['alt']?>" title="<?php print $term->field_imagen_fondo_cifras['und'][0]['title']?>">
			<img class="img-mobile" src="<?php print file_create_url($term->field_imagen_banner_mob_maestra4['und'][0]['uri']) ?>" alt="<?php print $term->field_imagen_banner_mob_maestra4['und'][0]['alt']?>" title="<?php print $term->field_imagen_banner_mob_maestra4['und'][0]['title']?>">
		</figure>

		<article class="detail-related-publication">
			<h1><?php print $term->field_titulo_publicitario['und'][0]['value']?></h1>
			<section class="content_related-publication">
				<p><?php print $term->field_descripcion_publicitario['und'][0]['value']?></p>
				<a href="<?php  print $term->field_boton_anuncio['und'][0]['url'] ?>" target="_blank" class="btn-default btn-black btn-view-more-publication">
					<?php  print $term->field_boton_anuncio['und'][0]['title']   ?>
				</a>
			</section>
		</article>
	</section>

	<?php 
	}
	?>

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
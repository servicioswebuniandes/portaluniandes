<?php

$view = views_get_view('vista_eventos_interna');
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
		"description": "Listado de eventos universidad de los andes",
		"itemListElement": [
		<?php 
		$i=1;
		foreach ($view->result as $item ) {
			print "{";
			?>

			"@type": "ListItem",
			"position": "<?php print $i ?>",
			"item": {
				"@type": "Event",
				"name": "<?php print $item->_field_data['nid']['entity']->title?>",
				"image": "<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_eventos['und'][0]['uri'])?>",
				"description": "<?php print $item->_field_data['nid']['entity']->field_descripcion_eventos['und'][0]['value']?>",
				"startDate" : "<?php print $item->_field_data['nid']['entity']->field_fecha_evento_calendario['und'][0]['value']?>",
				"url" : "<?php print $item->_field_data['nid']['entity']->field_boton_evento['und'][0]['url']?>",
				"location" : {
					"@type" : "Place",
					"name" : "<?php print $item->_field_data['nid']['entity']->title?>",
					"address" : "<?php print $item->_field_data['nid']['entity']->field_lugar_eventos['und'][0]['value']?>"
				}
			}

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

<div class="content-master-events">

	<?php
	print $view->render();
	?>

	<section class="block-views-vista-anuncios internal-news">
		<div class="container">
			<?php
			if ($node->field_activar_anuncios_niciasot["und"][0]["value"] == 0){
				$view = views_get_view('vista_anuncios_home');
				print $view->render('block');
			}
			?>
		</div>
	</section> <!-- block-views-vista-anuncios-home-block -->


	<section class="share-social_network container">
		<p><?php print t("Share"); ?></p>
		<ul class="social_network">
			<li class="item-share-social-network">
				<figure>
					<a href=""><img id="btn_share_lk" alt="Logo Facebook" src="/sites/all/themes/uniandes_base/img/footer-facebook.png"/></a>
				</figure>
			</li>
			<li class="item-share-social-network">
				<figure>
					<a href=""><img  id="btn_share_fb" alt="Logo Twitter" src="/sites/all/themes/uniandes_base/img/footer-twitter.png"/></a>
				</figure>
			</li>
			<li class="item-share-social-network">
				<figure>
					<a href=""><img  id="btn_share_tw" alt="Logo Linkedin" src="/sites/all/themes/uniandes_base/img/footer-linkedin.png"/></a>
				</figure>
			</li>
		</ul>
	</section> <!-- share-social_network -->
</div>
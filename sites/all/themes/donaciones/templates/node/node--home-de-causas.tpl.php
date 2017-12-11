<?php 
global $language;
if ($language->language=="es") {
    $donaciones="/es/donaciones";
}else{
    $donaciones="/en/donations";
}


?>
<div class="miga-de-pan">
<div class="breadcrumb container contextual-links-region">
<span class="inline odd first">
			<a href="<?php print $donaciones ?>"><?php print t('Home')?></a>
</span> 
<span class="delimiter">/</span> 
			<span class="inline even last"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php print $node->title?></a></span>
</span>



</div>    

</div>
<section class="banner-testimonials container">
	<figure>
		<img  id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >
		<img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >
	</figure>

	<article>
		<h1><?php print $node->title ?></h1>
		<p><?php 
			print $node->field_texto_panel1_maestra2['und'][0]['value'];
			?></p>
		<?php 
			print $node->field_iframe['und'][0]['value'];
		?>

		</article>
	</section>

	<?php 


	$view = views_get_view('vista_home_causas_interna');
	$view->set_display("block");
	$view->init_handlers();
	?>
	<h1 class="title-cause"><?php print t('DISCOVER A CAUSE')?></h1>
	<section class="filtrer-causes container">
	<?php
	$exposed_form = $view->display_handler->get_plugin('exposed_form');
	print $exposed_form->render_exposed_form(true);
	?>
	</section>

	<?php
	print $view->render();
	print "<section class='pager container'>";
	print theme('pager'); 
	print "</section>";
	?>


	
<div class="container-fluid compartir-redes">
    <div class="container">
        <div class="linea-100"></div>
        <p><?php print t('Share')?></p>
        <ul>
        <li><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
        <li><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
        <li><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
        </ul>
    </div>
</div>
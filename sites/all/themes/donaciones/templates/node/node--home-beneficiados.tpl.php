<?php
global $language;
if ($language->language=="es") {
    $donaciones="/es/donaciones";
    $url="/beneficiarios";
}else{
    $donaciones="/en/donations";
    $url="/beneficiaries";
}

?>
<section class="miga-de-pan">
	<article class="breadcrumb container">
		<span class="inline odd first">
			<a href="<?php print $donaciones ?>"><?php print t('Home')?></a>
		</span> 
		<span class="delimiter">/</span> 
		<span class="inline even last">
			<span class="inline even last"><a href="<?php print $donaciones.$url ?>"><?php print t('Beneficiaries')?></a>
</span>
		</span>
	</article>    
</section>


<section class="banner-testimonials container">
	<figure>
		<img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >
		<img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >
	</figure>

	<article>
		<h1><?php print $node->title ?></h1>
		
		<p><?php print $node->field_texto_panel1_maestra2['und'][0]['value'] ?></p>
					<?php if (!empty($node->field_texto_panel_2_maestra2['und'][0]['value'])){?>
					<p><?php print $node->field_texto_panel_2_maestra2['und'][0]['value']  ?></p>
					<?php }?>

		</article>
	</section>

		



		<?php 
 	$view = views_get_view('vista_home_beneficiados_interna');
    $view->set_display("block");
    $view->pre_execute();
    $view->execute();

    print $view->render();

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



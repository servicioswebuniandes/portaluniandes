 <?php 
    global $language;
 ?>
 <section class="miga-de-pan">
    <h2 class="element-invisible">Usted está aquí</h2>
    <article class="breadcrumb container">
        <span class="inline odd first">
            <a href="/donaciones/">Home</a>
        </span> 
        <span class="delimiter">/</span> 
        <?php if( $language->language == "es" ){ ?>
            <span class="inline even last"><a href="/es/donaciones/donantes/">Donantes</a></span>
        <?php }else{ ?> 
            <span class="inline even last"><a href="/en/donations/donors/">Donors</a></span>
        <?php } ?>
    </article>    
</section>


<section class="banner-testimonials container">
	<figure>
        <img src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >
        <img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >
    </figure>

    <article>
      <h1><?php print $node->title ?></h1>
      <p><?php 
         print $node->field_texto_panel1_maestra2['und'][0]['value'];
         ?></p>
     </article>
 </section>

 <?php 

 $view = views_get_view('vista_home_testimonios_interna');
 $view->set_display("block");
 $view->pre_execute();
 $view->execute();
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
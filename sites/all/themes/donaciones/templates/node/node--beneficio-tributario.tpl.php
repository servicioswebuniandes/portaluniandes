<?php ?>


<section class="internal-banner">
	<article>
		<figure>
			<?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
      <img src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >

      <?php } ?>

      <?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
      <img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >

      <?php } ?>		</figure>

      <div class="txt-internal-banner">
       <h1><?php print $node->title ?></h1>
       <!--	<p><?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?> -->
     </p>
   </div>
 </article>
</section>

<section class="miga-de-pan">
  <h2 class="element-invisible">Usted está aquí</h2>
  <article class="breadcrumb container">
    <span class="inline odd first">
      <a href="/donaciones/">Home</a>
    </span> 
    <span class="delimiter">/</span> 
   <span class="inline even last"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php print $node->title?></a></span>

  </article>    
</section>

<section class="descriptive-bt">
  <div class="container">
    <article class="txt-description-bt">
      <p><?php print $node->field_texto_izquierda_especial['und'][0]['value'] ?></p>
      <?php 
      if (!empty($node->field_texto_derecha_especial['und'][0]['value'])){
        ?>
        <p><?php print $node->field_texto_derecha_especial['und'][0]['value'] ?></p>
        <?php
      }
      ?>

    </article>
  </div>
</section>



<section class="panel-group container" id="accordion" role="tablist" aria-multiselectable="true">
  <?php 
  for ($i=0; $i <count($node->field_titulo_tab_beneficio['und']) ; $i++) { 
    ?>
    <article class="panel panel-default">
      <section class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php print $i?>" aria-expanded="<?php if ($i!=0){ print 'false'; }else{ print 'true'; }?>" aria-controls="collapseOne" <?php if ($i!=0){?> class="collapsed" <?php } ?> >
            <?php print $node->field_titulo_tab_beneficio['und'][$i]['value']?>
          </a>
        </h4>
      </section>

      <section id="collapseOne<?php print $i?>" class="panel-collapse collapse <?php if ($i==0){print ' in';} ?>" role="tabpanel" aria-labelledby="headingOne" <?php if ($i!=0){?> aria-expanded="false" <?php }?> >
        <article class="panel-body">
         <figure>
          <img src="<?php print file_create_url($node->field_imagen_tab_beneficio['und'][$i]['uri']) ?>" alt="<?php print $node->field_imagen_tab_beneficio['und'][$i]['alt']?>" title="<?php print $node->field_imagen_tab_beneficio['und'][$i]['title'] ?>">
        </figure>
        <section class="item-txt-bt">
          <h1><?php print $node->field_titulo_tab_beneficio['und'][$i]['value']?></h1>
          <p><?php print $node->field_descripcion_beneficio['und'][$i]['value']?></p>
        </section>
      </article>
    </section>
  </article>

  <?php  
}
?>
</section>






<div class="container-fluid compartir-redes">
  <div class="container">
    <div class="linea-100"></div>
    <p><?php echo t( "Share" ) ?></p>
    <ul>
      <li><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
      <li><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
      <li><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
    </ul>
  </div>
</div>




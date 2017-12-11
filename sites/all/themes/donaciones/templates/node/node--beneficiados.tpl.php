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
      <a href="<?php print $donaciones.$url ?>"><?php print t('Beneficiaries')?></a>
    </span>
    <span class="delimiter">/</span> 
    <span class="inline even last">
      <a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php print $node->title?></a>
    </span>
  </article>    
</section>




<?php 

if($node->field_multimedia_noticias['und'][0]['value']==0){
  if (empty($node->field_codigo_causa['und'][0]['value'])){
    $codigo="PE20@SEQESGENUE";
  }else{
    $codigo=trim($node->field_codigo_causa['und'][0]['value']);
  }

  if($node->field__aplica_recurrencia_['und'][0]['value']==1){
    $rec=1;
  }else{
    $rec=0;
  }


}

?>



<section class="internal-detail">
<h1><?php print $node->title ?></h1>
<h2><?php print $node->field_comentario_1_noticias['und'][0]['value'] ?></h2>
  <article class="slider-internal-detail">
    <section class="slide-for-detail">
    

 <?php 
 foreach ($node->field_videos_noticias_v2["und"] as $video_individual){

  ?>
  <article class="item-slide-for-detail">

    <?php

    $cadena = $video_individual["image_field_caption"]["value"];

    $fuente = 0;

    $iframe = '';

    $identificador = '';

    if (strpos($cadena, 'youtu') !== false) {
      $fuente = 1;
    }
    if (strpos($cadena, 'vimeo') !== false) {
      $fuente = 2;
    }
    if (strpos($cadena, 'ustream') !== false) {
      $fuente = 3;
    }

    if (strpos($cadena, 'facebook') !== false) {
      $fuente = 4;
    }


    if ($fuente == 1){

      if (strpos($cadena,'youtu.be') !== false){
        $identificador = str_replace("https://youtu.be/","",$cadena);
      }
      if (strpos($cadena,'watch') !== false){
        $identificador = str_replace("https://www.youtube.com/watch?v=","",$cadena);
      }
      if (strpos($cadena,'embed') !== false){
        $identificador = str_replace("https://www.youtube.com/embed/","",$cadena);
      }

      $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '" allowfullscreen width="100%" height="500"></iframe>';
    }
    if ($fuente == 2){

      if (strpos($cadena,'player') !== false){
        $identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
      }
      else{
        $identificador = str_replace("https://vimeo.com/","",$cadena);
      }

      $iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="100%" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    }
    if ($fuente == 3){

      if (strpos($cadena,'channel') !== false){
        $identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);
      }
      else if (strpos($cadena,'recorded') !== false){
        $identificador = str_replace("http://www.ustream.tv/embed/recorded/","",$cadena);
      }

                                        //$iframe = '<iframe width="480" height="270" src="https://www.ustream.tv/embed/'. $identificador .'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>';
      $iframe = '<iframe width="100%" height="500" src="https://www.ustream.tv/embed/recorded/'.$identificador.'" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe><a href="https://www.ustream.tv/services" title="Video production powered by Ustream" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: left;" target="_blank">Video Production</a>';
    }

    if ($fuente == 4){
      $iframe = '<div class="fb-video" data-href="'.$cadena.'"  
      data-allowfullscreen="true" data-width="1024"></div>';
    }



    ?>

    <?php

    print $iframe;
    ?>

  </article>

    <?php }?>



<?php 
foreach ($node->field_imagenes_noticias["und"] as $imagen_grande){

  ?>

  <article class="item-slide-for-detail">
    <figure>


     <img src="<?php print file_create_url( $imagen_grande["uri"] ) ?>" alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" >
    <figcaption><?php print $imagen_grande["image_field_caption"]["value"]?></figcaption>
   </figure>

 </article>


 <?php 
}
?>

</section>



<?php 
  $cantidadImagenes=count($node->field_imagenes_noticias["und"]) + count($node->field_videos_noticias_v2["und"]);
  
  if ($cantidadImagenes>1) {


  ?>
<section class="slide-nav-detail">

  <?php 
  foreach ($node->field_videos_noticias_v2["und"] as $video_individual){

    ?>
    <article class="item-slide-nav-detail">
      <figure>


       <img src="<?php print file_create_url( $video_individual["uri"] ) ?>" alt="<?php print $video_individual["alt"] ?>" title="<?php print $video_individual["title"] ?>" >

     </figure>

   </article>
   <?php 
 }
 ?>

 <?php 
 foreach ($node->field_imagenes_noticias["und"] as $imagen_grande){

  ?>

  <article class="item-slide-nav-detail">
    <figure>


     <img src="<?php print file_create_url( $imagen_grande["uri"] ) ?>" alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" >

   </figure>

 </article>


 <?php 
}
?>
</section>

<?php 
}
?>
</article>

<article class="internal-description container">
  <section class="social-network">
    <li id="btn_share_fb_not" class="facebook"><a href=""></a></li>
    <li id="btn_share_tw_not" class="twitter"><a href=""></a></li>
    <li id="btn_share_lk_not" class="linkedin"><a href=""></a></li>
  </section>
  <section class="tags">
    <ul>
     <?php
     if (!empty($node->field_tags_donaciones)){
      foreach ($node->field_tags_donaciones["und"] as $tag_individual){
        if (!empty($tag_individual["taxonomy_term"])){
          ?>
          <li><a href="<?php print url('taxonomy/term/'.$tag_individual["tid"], array('absolute'=>true)); ?>"> <?php print $tag_individual["taxonomy_term"]->name ?> </a></li>
          <?php }}} ?>


        </ul>
      </section>
      <section class="txt-description-item">
        <p class="lead"><?php print $node->field_descripcion_experiencia['und'][0]['value']?></p>
        <p><?php print $node->field_texto_competo_noticias['und'][0]['value']?></p>
      </section>
    </article>
  </section>


  <div class="container-fluid compartir-redes">
    <div class="container">
      <div class="linea-100"></div>
      <p>Compartir</p>
      <ul>
        <li><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
        <li><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
        <li><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
      </ul>
    </div>
  </div>
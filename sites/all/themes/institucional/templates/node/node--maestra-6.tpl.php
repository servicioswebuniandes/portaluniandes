<script type="application/ld+json">

"@context": "http://schema.org",
"@type": "Article",
"author": "Universidad de los Andes",
"name": "<?php echo $node->title ?>",
"url": "<?php echo "https://" . $_SERVER[ "HTTP_HOST" ] . $_SERVER[ "REQUEST_URI" ] ?>",
<?php if( isset( $node->field_image[ "und" ] ) ){ ?>
"image": "<?php echo file_create_url( $node->field_image[ "und" ][ 0 ][ "uri" ] ) ?>",
<?php } ?>
<?php if( isset( $node->field_texto_panel1_maestra2[ "und" ] ) ){ ?>
"description" : "<?php echo trim( drupal_html_to_text( $node->field_texto_panel1_maestra2["und"][0]["value"] ) ) ?>",
<?php } ?>
"sponsor": "Universidad de los Andes"
	
</script>
<div class="contenedor-principal container-fluid">

 <div class="container-fluid miga-de-pan">
  <?php
  if (!empty($GLOBALS["breadcrumb"])){
   $breadcrumb = $GLOBALS["breadcrumb"];
   print $breadcrumb;
  }
  ?>
 </div>
 
 <div class="container-fluid">
  <div class="container">
   <div class="row">
    <figure>
     <div class="img-desktop">
      <img class="img-responsive" src= <?php print file_create_url( $node->field_imagen_maestra_1["und"][0]["uri"] ) ?> alt='<?php print $node->field_imagen_maestra_1["und"][0]["alt"] ?>' title='<?php print $node->field_imagen_maestra_1["und"][0]["title"] ?>'>
     </div>
     <div class="img-mobile">
      <img class="img-responsive" src= <?php print file_create_url( $node->field_imagen_mobile_maestra1["und"][0]["uri"] ) ?> alt="<?php print $node->field_imagen_mobile_maestra1["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_maestra1["und"][0]["title"] ?>">
     </div>
     <figcaption>
      <?php print $node->field_sub_titulo_maestra_1["und"][0]["value"] ?>
     </figcaption>
    </figure>
   </div>
   
  </div>
 </div>

 <div class="container-fluid">
  <div class="container">
   <div class="row">
    <div class="col-xs-12 col-md-12">
     <h2><?php print $node->title ?></h2>
     <div class='linea-h2'></div>
    </div>
    <div class="col-xs-12 col-md-6">
     <p>  <?php print $node->field_descripcion1_maestra_1["und"][0]["value"] ?> </p>
    </div>
    <div class="col-xs-12 col-md-6">
     <p> <?php print $node->field_descripcion_2_maestra_1["und"][0]["value"] ?> </p>
    </div>
   </div>
  </div>
 </div>

 <div class="container-fluid">
  <div class="container">
   <!-- Aqui puede ir una imagen o un video -->
   <?php

   if(!empty($node->field_videos_noticias)){
    $cadena = $node->field_videos_noticias[ "und" ][ 0 ][ "value" ];

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

     $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '"></iframe>';
    }
    if ($fuente == 2){

     if (strpos($cadena,'player') !== false){
      $identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
     }
     else{
      $identificador = str_replace("https://vimeo.com/","",$cadena);
     }

     $iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    }
    if ($fuente == 3){

     $identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);

     $iframe = '<iframe width="480" height="270" src="http://www.ustream.tv/embed/'. $identificador .'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>';
    }

    print $iframe;

    }
    else{
     if (!empty($node->field_image)){
     ?>
	<img src="<?php echo file_create_url( $node->field_image["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_image["und"][0]["alt"] ?>" title="<?php print $node->field_image["und"][0]["title"] ?>">
   <?php } }?>
  </div>
 </div>

 <div class="tabs-content">
 <div class="tabs-title">
 <ul>
 <?php
 
 foreach( $node->field_titulo_tab[ "und" ] as $title ){
	 
	 ?><li><?php echo $title[ "value" ] ?></li><?php
	 
 }
 
 ?>
 </ul>
 </div>
 <div class="tabs-body">
 <ul>
 <?php
 
 foreach( $node->field_body_tab[ "und" ] as $body ){
	 
	 ?><li><?php echo $body[ "value" ] ?></li><?php
	 
 }
 
 ?>
 </ul>
 </div>
 </div>
 
 <div class="container-fluid container-tabs">
  <div class="container">
  </div>
 </div>

</div>
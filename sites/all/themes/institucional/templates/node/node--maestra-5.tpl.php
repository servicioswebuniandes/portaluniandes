<?php

/*echo "<pre>";
print_r( $node );
echo "</pre>";
//exit( );*/

?>
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
			 <img src="<?php print file_create_url( $node->field_imagen_maestra_1["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print isset( $node->field_imagen_maestra_1["und"] ) ? $node->field_imagen_maestra_1["und"][0]["alt"] : $node->title ?>" title="<?php print $node->field_imagen_maestra_1["und"][0]["title"] ?>" >

		 </div>

		 <?php 

		 if( isset( $node->field_imagen_mobile_bannerh ) ){ ?>
			 <div class="img-mobile">
				 <img src="<?php print file_create_url( $node->field_imagen_mobile_bannerh["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mobile_bannerh["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_bannerh["und"][0]["title"] ?>" >
			 </div>
		 <?php } ?>
		 
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
		 <h1> <?php print $node->title ?> </h1>
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

 <div class="container-fluid content-mul-m5">
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
     else
         {
			 if (!empty($node->field_image)){
			 ?>
		 <img src="<?php print file_create_url( $node->field_image["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_image["und"][0]["alt"] ?>" title="<?php print $node->field_image["und"][0]["title"] ?>" >
	
	 <?php }} ?>
	</div>
 </div>
 
 			<section class="list-tabs container">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<?php foreach( $node->field_titulo_tab[ "und" ] as $key => $title ){ ?>
					<li role="presentation" <?php if( $key == 0 ){ ?> <?php } ?>><a href="#tab_<?php echo $key ?>" aria-controls="" role="tab" data-toggle="tab"><?php echo $title[ "value" ] ?></a></li>
					<?php } ?>
				</ul>

				<!-- Tab panes -->
				<article class="tab-content">
					<?php foreach( $node->field_body_tab[ "und" ] as $key => $body ){ ?>
					<div role="tabpanel" id="tab_<?php echo $key ?>" class="tab-pane <?php if( $key == 0 ){ ?> active<?php } ?>">
						<?php echo $body[ "value" ] ?>
					</div>
					<?php } ?>
				</article>
			</section> <!-- list-tabs -->

</div>
<?php 

$nodo=$element['#object'];
$field_videos=$nodo->field_videos['und'];






foreach ($field_videos as $video) {
    $cadena = $video['entity']->field_videos_noticias["und"][0]["value"];

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




  if ($slide === reset($field_slide)) {
    ?>
        
    <div>
        <?php print $iframe ?>
        <p><?php print $video['entity']->field_descripcion_corta_noticias['und'][0]['value'] ?></p>
    </div>





<?php
  }else{

    ?>
    <div>
    <figure>
        <img src="<?php print file_create_url($video['entity']->field_imagen_miniatura_noticias['und'][0]['uri'])   ?>" alt="<?php print $slide['entity']->field_imagen_miniatura_noticias['und'][0]['alt'] ?>" title="$slide['entity']->field_imagen_miniatura_noticias['und'][0]['title']">   
    </figure>
        <p><?php print $video['entity']->field_descripcion_corta_noticias['und'][0]['value'] ?></p>
    </div>

    <?php

  }



                            
	
		?>
	


	<?php
	
	?>
	

	<?php
}
 

?>

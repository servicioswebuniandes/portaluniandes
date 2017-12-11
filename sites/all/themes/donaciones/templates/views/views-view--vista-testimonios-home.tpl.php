    <div class="container">
        <h1><?php print t("DONOR TESTIMONIES")?></h1>
        
        <article class="slide-testimonials">
            <div class="list-testimonials">

                <?php 
                $resultados= $view->result;

                foreach ($resultados as $testimonio ) {
                    $entity=$testimonio->_field_data['nid']['entity'];

                    $imagen=file_create_url($entity->field_imagen_miniatura_noticias['und'][0]['uri']);
                    $imagen_alt=$entity->field_imagen_miniatura_noticias['und'][0]['alt'];
                    $imagen_title=$entity->field_imagen_miniatura_noticias['und'][0]['title'];
                    ?>        

                    <div class="item-list-testimonials">
                        <figure>
                            <a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>">
                            <img src="<?php print $imagen ?>" alt="<?php print $imagen_alt ?>" title="<?php print $imagen_title ?>">
                            </a>
                        </figure>

                        <div class="txt-testimonials">
                            <h1><a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>">
<?php print $entity->title ?> </a></h1>


                                

                                <?php 

                                if(strlen($entity->title)<=120){

                               if(strlen($entity->field_descripcion_corta_noticias['und'][0]['value'])>120){
                                    ?>
                                    <p>
                                    <a href="<?php print url("node/".$entity->nid, array("absolute"=>true))?>">
                                    <?php
                                    print drupal_substr($entity->field_descripcion_corta_noticias['und'][0]['value'],0,120)."...";
                                    ?>
                                    </a>
                                    </p>
        
                                    <?php
                                  }  else{
                                    ?>
                                    <p>
                                    <a href="<?php print url("node/".$entity->nid, array("absolute"=>true))?>">
                                    <?php
                                     print $entity->field_descripcion_corta_noticias['und'][0]['value'];
                                    ?>
                                    </a>
                                    </p>
        
                                    <?php
                              
                                 }


                                }

                            ?>     
                            </a> 



                            <p></p>
                        </div>
                    </div> <!-- item-list-testimonialss -->

                    <?php
                }
                ?>
            </div>

            <div class="btn-block">
            <?php 
            global $language;
            if ($language->language=="es") {
                $url="/es/donaciones/donantes";
            }else{
                $url="/en/donations/donors";
            }
            ?>
                <a href="<?php print $url ?>" class="btn-default btn-border-green btn-slide-testimonios"><?php print t("View all")?></a>
            </div>
        </article>

        <?php 


        $view2 = views_get_view("vista_testimonios_home");
        $view2->set_display("block_1");
        $view2->execute();
        $resultados_destacadas = $view2->result;

        $destacado=$view2->result[0];
        $destacado_entity=$destacado->_field_data['nid']['entity'];
        ?>

        <article class="selected-item">
            <?php 
            $video=false;

            if(!empty($destacado_entity->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"])){
            $video=true;

            $cadena = $destacado_entity->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];

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

                $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '?enablejsapi=1&showinfo=0"></iframe>';
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

            if(!$video && !empty($destacado_entity->field_imagenes_noticias['und'][0]['uri'])){
                $imagen=file_create_url($destacado_entity->field_imagenes_noticias['und'][0]['uri']);
                $imagen_alt=$destacado_entity->field_imagenes_noticias['und'][0]['alt'];
                $imagen_title=$destacado_entity->field_imagenes_noticias['und'][0]['title'];
                ?>
                        <figure>
                            <a href="<?php print url('node/'.$destacado_entity->nid, array('absolute'=>true)); ?>">
                            <img src="<?php print $imagen ?>" alt="<?php print $imagen_alt ?>" title="<?php print $imagen_title ?>">
                            </a>
                        </figure>

                <?php

            }

            ?>


            <div class="txt-selected-item">
                <h1> <a href="<?php print url('node/'.$destacado_entity->nid, array('absolute'=>true)); ?>"><?php print $destacado_entity->title ?> </a></h1>
                <p>        
                    <?php 
                            if(strlen($destacado_entity->field_descripcion_corta_noticias['und'][0]['value'])>170){
                                print drupal_substr($destacado_entity->field_descripcion_corta_noticias['und'][0]['value'],0,170)."...";
                            }
                        
                    ?>

                </p>
            </div>

            <div class="btn-block">
                <a href="<?php print url('node/'.$destacado_entity->nid, array('absolute'=>true)); ?>" class="btn-default btn-border-green btn-testimonios-destacado"><?php print t('View more')?></a>
                
            </div>
        </article>
    </div>






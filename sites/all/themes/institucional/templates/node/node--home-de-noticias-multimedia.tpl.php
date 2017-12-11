<?php
global $language;
$array_mul_destacada = array();
$view_mul_destacada = views_get_view('vista_noticias_home_multimedia_destacada');
$view_mul_destacada->set_display("block");
$view_mul_destacada->set_arguments($array_mul_destacada);
$view_mul_destacada->pre_execute();
$view_mul_destacada->execute();
if (!empty($view_mul_destacada->result)){
    $noticia_destacada = $view_mul_destacada->result[0]->_field_data["nid"]["entity"];
}else{
    $view2 = views_get_view('vista_noticias_multimedia_home');
    $view2->set_display( 'block_2' );
    $view2->execute();
    $noticia_destacada = $view2->result[0]->_field_data["nid"]["entity"];
}

?>
</div>
    <div class="container-fluid miga-de-pan">
        <?php
        if (!empty($GLOBALS["breadcrumb"])){
            $breadcrumb = $GLOBALS["breadcrumb"];
            print $breadcrumb;
        }
        ?>
    </div>
        <div class="container">

<div class="contenedor-principal container-fluid">


    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="title-bloques"><h1 id="title"> <span></span><?php print $node->title ?></h1></div>
                </div>
            </div>
            <div class="row noticia-multimedia-principal">
                <?php
                if (!empty($noticia_destacada->field_imagenes_noticias)){
                    ?>
                    <img id="img_desktop" src="<?php print file_create_url( $noticia_destacada->field_imagenes_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["title"] ?>" >
                <?php }
                else {
                    if ($noticia_destacada->field_videos_noticias_v2) {

                        $cadena = $noticia_destacada->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];

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
                }
                ?>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 noticia-multimedia-carousel">
                    <ul>
                        <?php
                        if (!empty($noticia_destacada->field_imagenes_noticias)){
                            foreach ($noticia_destacada->field_imagenes_noticias["und"] as $imagen_grande){
                                $style_name = "preview_noticia";
                                //$url = str_replace($base_url.'/sites/default/files/','public://',image_style_url($style_name,$imagen_grande["uri"]));
                                ?>
                                <li>
                                    <img class='img-responsive' src="<?php print image_style_url($style_name, $imagen_grande["uri"]); ?>" alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" />
                                    <div>
                                        <img src="<?php print file_create_url( $imagen_grande["uri"] ) ?>" class='img-responsive' alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" >
                                    </div>
                                </li>
                            <?php }} ?>
                        <?php
                        if (!empty($noticia_destacada->field_videos_noticias_v2)){
                            foreach ($noticia_destacada->field_videos_noticias_v2["und"] as $video_individual){

                                ?>
                                <li>
                                    <img src="<?php print file_create_url( $video_individual["uri"] ) ?>" class='img-responsive' alt="<?php print $video_individual["alt"] ?>" title="<?php print $video_individual["title"] ?>" >
                                    <div>
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
                                        ?>
                                    </div>
                                </li>
                            <?php }} ?>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-6 informacion-principal">
                    <p class='multi-titulo'><?php print $noticia_destacada->title?></p>
                    <div class="linea-titulo"></div>
                    <?php if (!empty($noticia_destacada->field_descripcion_corta_noticias)) { ?>
                    <p id="description" class='multi-descripcion'><?php print $noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"]?></p>
                    <?php } ?>
                    <a href="<?php print url( 'node/' . $noticia_destacada->nid, array('absolute' => true)) ?>" class='multi-enlace'><?php print t("View more"); ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid box-especiales">
        <div class="container">
            <div class="title-bloques"><h2> <span></span> <?php print t("Specials"); ?></h2></div>
            <section>
                <?php
                $block = module_invoke('views', 'block_view', '0e3d035165e07bcd23988b3f9c02a711');
                print render($block['content']);
                ?>
            </section>
            <div class="btn-ver-mas">
                <ul>
                <?php 
                    $info_nodos=translation_path_get_translations("node/135");

            if ($language->language=="es"){

               $url_idioma=url($info_nodos['es'], array('absolute' => true));
            }else{
               $url_idioma=url($info_nodos['en'], array('absolute' => true));
            }



                ?>
                



                    <li class="boton-ver-mas-1"><a href="<?php print $url_idioma; ?>"><?php print t("View all Specials"); ?></a></li>
                </ul>
                <span class="linea-ver-mas"></span>
            </div>
        </div>

    </div>

    <div class="container-fluid box-videos-y-galerias">
        <div class="container">
            <div class="title-bloques"><h2> <span></span><?php print t("Videos and Galleries"); ?></h2></div>
            <section>
                <?php
                $block = module_invoke('views', 'block_view', '2fc54fd23a06d5eeeefc6f006e7b389f');
                print render($block['content']);
                ?>
            </section>
        </div>
    </div>

</div>
<div class="container-fluid block-views-vista-anuncios-home-block">
    <div class="container">
        <?php
            $block = module_invoke('views', 'block_view', 'vista_anuncios_home-block');
            print render($block['content']);
        ?>
    </div>
</div>
<div class="container-fluid compartir-redes">
    <div class="container">
        <div class="linea-100"></div>
        <?php
        $block = module_invoke('block', 'block_view', '3');
        print render($block['content']);
        ?>
        <?php
        /*if ($service_links_rendered):
            print $service_links_rendered;
        endif;*/
        ?>
    </div>
</div>

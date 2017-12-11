<?php

$resultados = $view->result;
$campaña=$resultados[0];


?>
<div class="container">
    <article class="block-principal-campaign">

        <h1 id="title"><?php print $campaña->node_title?></h1>

        <div class="item-campaing-figure">

            <?php 
                $existe_video=false;
            if(!empty($campaña->_field_data['nid']['entity']->field_videos_noticias)){
                $existe_video=true;

                $cadena = $campaña->_field_data['nid']['entity']->field_videos_noticias['und'][0]['value'];

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

                    $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '?rel=0&amp;controls=1&amp;showinfo=0" allowfullscreen></iframe>';
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

                if ($fuente == 4){
                    $iframe = '<div class="fb-video" data-href="'.$cadena.'"  
                    data-allowfullscreen="true" data-width="1024"></div>';
                }


                if ($fuente == 3){

                    if (strpos($cadena,'channel') !== false){
                        $identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);
                    }
                    else if (strpos($cadena,'recorded') !== false){
                        $identificador = str_replace("http://www.ustream.tv/embed/recorded/","",$cadena);
                    }



                    $iframe = '<iframe width="480" height="270" src="https://www.ustream.tv/embed/recorded/'.$identificador.'" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe><a href="https://www.ustream.tv/services" title="Video production powered by Ustream" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: left;" target="_blank">Video Production</a>';
                }

                print $iframe;                        
            }


            ?>
            <figure <?php if ($existe_video){ print 'style="display:none"'; }?> > 
            <img id="img_desktop" src="<?php print file_create_url($campaña->_field_data['nid']['entity']->field_imagen_eventos['und'][0]['uri'])?>" alt="<?php print $campaña->_field_data['nid']['entity']->field_imagen_eventos['und'][0]['alt']?>" title="<?php print $campaña->_field_data['nid']['entity']->field_imagen_eventos['und'][0]['title'] ?>">
            </figure>




        </div>

        <div class="block-txt-campaign">
            <h2><?php print $campaña->_field_data['nid']['entity']->field_titulo_campana['und'][0]['value']?></h2>
            <p id="description"><?php print $campaña->_field_data['nid']['entity']->field_texto_auxiliar['und'][0]['value']?></p>
            <?php 
            global $language;
            $url=url('node/'.$campaña->nid, array('absolute'=>true));
            $pos=strpos($url, "formulario");

            if ($language->language=="es") {
                $pos=strpos($url, "formulario");
                $form="formulario";
            }else{
                $pos=strpos($url, "form");
                $form="#form";
            }

            if ($pos === false) {                
                $url=$url.$form;
            }else{
                $url2=str_replace($form."/", "", $url);
            }

            if(empty($url2)){
                $url2=str_replace("/".$form, "", $url);                
            }


            ?>
            <div class="btn-block x2">
                <a href="<?php print $url ?>" class="btn-default btn-border-green"><?php print t('Donate')?></a>
                <a href="<?php print $url2 ?>" class="btn-default btn-border-green"><?php print t('View more')?></a>
            </div> <!-- block-btn -->

            <div class="social-network">
                <p><?php print t('Share')?></p>
                <ul>
                    <li><a href=""><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></a> </li>
                    <li><a href=""><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></a> </li>
                    <li><a href=""><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></a> </li>
                </ul>
            </div> <!-- social-network -->
        </div> <!-- block-txt-campaign -->
    </article> <!-- block-principal-campaign -->
</div>



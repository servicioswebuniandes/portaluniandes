<?php

$resultados = $view->result;
?>
<header class="title_featured_news">
    <h2><?php print t('News')?></h2>
</header>

<section class="list_featured_news">
    <?php
    if (!empty($resultados)){
        foreach ($resultados as $resultado_ind){
            $noticia = $resultado_ind->_field_data["nid"]["entity"];
            ?>
            <?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
                if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
                    ?>
                    <article class="list-item_featured_news news-text">
                        <?php }
                        else { ?>
                        <article class="list-item_featured_news">
                            <?php }}?>
                            <a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" >

                               <figure class="img-featured_news">
                                   <img class="img-responsive" src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"]?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"]?>">
                               </figure>

                           </a>

                           <section class="txt-featured_news">

                            <?php
                            $fecha_imp = "";
                            if (!empty($noticia->field_fecha_creacion_noticias)) {
                                $fecha_imp = $noticia->field_fecha_creacion_noticias["und"][0]["value"];
                            }
                            else{
                                $fecha_imp = $noticia->created;
                            }
                            ?>
                            <p class="date_featured_news"><?php print date( "d/m/Y", str_replace( "T", " ", strtotime($fecha_imp )))?></p>

                            <h1 class="title-featured_news">
                               <a href="<?php  print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>"><?php print $noticia->title?></a>
                           </h1>

                           <?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
                            if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
                                ?>
                                <p class="txt-featured_news">
                                    <?php 

                                    if(strlen($noticia->field_descripcion_corta_noticias["und"][0]["value"])>140){
                                        print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,140)."...";
                                    }  else{
                                        print $noticia->field_descripcion_corta_noticias["und"][0]["value"];
                                    }


                                    ?> 



                                </p>
                                <?php }
                                else { ?>
                                <p class="txt_featured_news">
                                    <?php 

                                    if(strlen($noticia->field_descripcion_corta_noticias["und"][0]["value"])>140){
                                        print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,140)."...";
                                    }  else{
                                        print $noticia->field_descripcion_corta_noticias["und"][0]["value"];
                                    }


                                    ?> 

                                </p>
                                <?php }}?>

                                <?php if (!empty($noticia->field_boton_noticia)){ ?>
                                <a class="btn-default btn-border-orange view-featured_news" href="<?php  print $noticia->field_boton_noticia["und"][0]["url"] ?>" ><?php print $noticia->field_boton_noticia["und"][0]["title"]?></a>
                                <?php }
                                else {?>
                                <a class="btn-default btn-border-orange view-featured_news" href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" ><?php print t( "View more" )?></a>
                                <?php } ?>

                            </section>

                        </article>

                        <?php }}?>
                    </article>

                    <?php
                    global $language;
                    ?>
                    <?php
                //Obtenemos la informacion de los nodos para cada idioma
                //$info_nodos=translation_path_get_translations("node/134");
                    if ($language->language=="es"){
                    //$url_es=drupal_get_path_alias($info_nodos['es'], 'es');
                    //$url_idioma=url($url_es, array('alias' => TRUE));
                        $url_idioma=url("/noticias", array('alias' => TRUE));
                    }else{
                    //$url_en=drupal_get_path_alias($info_nodos['en'], 'en');
                    //$url_idioma=url($url_en, array('alias' => TRUE));
                        $url_idioma=url("/news", array('alias' => TRUE));
                    }
                    ?>
                </section>
                <section class="btn-block line-orange">
                 <a href="<?php print $url_idioma ?>" class="btn-default btn-border-orange btn-featured_news"><?php print t( "View all news" )?></a>
             </section>



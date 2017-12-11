<?php
global $language;
if ($language->language=="es") {
    $id="descubre-una-causa";
}else{
    $id="discover-a-cause";
}
$resultados = $view->result;
?>
<section class="block-views-vista-causas" id="<?php print $id ?>">

    <h1><?php print t('DISCOVER A CAUSE')?></h1>

    <section class="list-causes container">
        <?php
        if (!empty($resultados)){
            foreach ($resultados as $resultado_ind){
                $noticia = $resultado_ind->_field_data["nid"]["entity"];
                ?>           

                <article class="item-causes">
                    <a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" >
                        <h2><?php print $resultado_ind->node_title ?></h2>
                        <figure>
                            <img class="img-responsive" src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"]?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"]?>">
                        </figure>
                    </a>

                    <div class="block-info_news">                                        
                    <p class="text_news"">
                        <?php 

                        if(strlen($noticia->field_descripcion_corta_noticias["und"][0]["value"])>140){
                            print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,140)."...";
                        }  else{
                            print $noticia->field_descripcion_corta_noticias["und"][0]["value"];
                        }


                        ?> 
                    </p>

                    <?php if (!empty($noticia->field_boton_noticia)){ ?>
                    <a class="btn-default"  href="<?php  print $noticia->field_boton_noticia["und"][0]["url"] ?>"><?php print $noticia->field_boton_noticia["und"][0]["title"]?></a>
                    <?php }
                    else {?>
                    <a class="btn-default btn-causes"  href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" ><?php print t( "View more" )?></a>
                    <?php } ?>
                </div>
            </article>

            <?php }}?>
        </section>

    <div class="btn-block line-green">
    <?php 
        global $language;
        if ($language->language=="es") {
            $url="/es/donaciones/causas";
        }else{
            $url="/en/donations/causes";
        }

        ?>
        <a class="btn-default btn-border-green btn-view-causes" href="<?php print $url ?>"><?php print t("View all causes")?></a>
    </div>
</section>



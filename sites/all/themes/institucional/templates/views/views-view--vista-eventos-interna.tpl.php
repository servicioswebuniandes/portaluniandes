<?php
global $language;
$resultados = $view->result;
?>



<section class="events_views featured_events only_list">
<header class="title_featured_events">
    <h2>
	<?php 

		global $language;
           $english=t('Featured Events', array(), array('langcode' => 'en'));
           $spanish= t('Featured Events', array(), array('langcode' => 'es'));
           $idioma=$language->language;

           if ($idioma=="es") {
            if($english==$spanish){
              print "Eventos Destacados";
            }else{
              print $spanish;
            }
            }else{
              print $english;
            }
	?>
	</h2>
</header>
    <?php
    if (!empty($resultados)){
        
        foreach ($resultados as $resultado_ind){
            $evento = $resultado_ind->_field_data["nid"]["entity"];
            ?>


            <article class="list_featured_events">
                <section class="list-item_featured_events">
                    <header class="title-featured_events">
                        <h3><?php print $evento->title ?></h3>
                    </header>

                    <figure class="img-featured_events">
                        <img src="<?php print file_create_url($evento->field_imagen_eventos['und'][0]['uri'])?>" alt="<?php print $evento->field_imagen_eventos['und'][0]['alt'] ?>" title="<?php print $evento->field_imagen_eventos['und'][0]['title'] ?>"  >
                    </figure>

                    <article class="txt-featured_events">
                        <p class="place_event"><span class="label-place_event">Lugar:</span><?php print $evento->field_lugar_eventos['und'][0]['value'] ?></p>
                        <p class="date_event"><span class="label-date_event">Fecha:</span><?php print $evento->field_fecha_evento['und'][0]['value']?></p>

                        <?php 
                        if(!empty($evento->field_boton_evento['und'])){
                            ?>
                            <a href="<?php print $evento->field_boton_evento['und'][0]['url'] ?>" target="<?php print $evento->field_boton_evento['und'][0]['attributes']['target'] ?>" class="btn-default btn-border-blue view-featured_events"><?php print $evento->field_boton_evento['und'][0]['title'] ?></a>
                            <?php
                        }else{
                            ?>
                            <a href="<?php print url( 'node/' . $evento->nid, array('absolute' => true)) ?>" class="btn-default btn-border-blue view-featured_events"><?php print t('View more')?></a>
                            <?php
                        }
                        ?>

                    </article>  
                </section>
            </article>
            <?php 
            
        }
    }   

    ?>

    <?php
    global $language;

    $info_nodos=translation_path_get_translations("node/5852");

    if ($language->language=="es"){
        $url_es=drupal_get_path_alias($info_nodos['es'], 'es');
        $url_idioma=url($url_es, array('alias' => TRUE));
    }else{
        $url_en=drupal_get_path_alias($info_nodos['en'], 'en');
        $url_idioma=url($url_en, array('alias' => TRUE));
    }
    ?>
</section>




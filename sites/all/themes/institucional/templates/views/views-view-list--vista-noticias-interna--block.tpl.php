<?php
global $language;
?>
<div class="noticias-destacadas-internas">
    <?php
    foreach ($view->result as $item){
        $noticia = $item->_field_data["nid"]["entity"];
        ?>
    <?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
    if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
    ?>
    <section class='noticia-reciente solo-texto'>
        <?php }
        else { ?>
        <section class='noticia-reciente'>
        <?php }}?>



            <?php if (!empty($noticia->field_imagen_miniatura_noticias)){ ?>
            <a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>">
            <img src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"] ?>" >
                </a> 
            <?php } ?>
            <div class="views-field views-field-field-fecha-modificacion-noticia">
                <div class="field-content">
                    <?php
                    $fecha_imp = "";
                    if (!empty($noticia->field_fecha_creacion_noticias)) {
                        $fecha_imp = $noticia->field_fecha_creacion_noticias["und"][0]["value"];
                    }
                    else{
                        $fecha_imp = $noticia->created;
                    }
                    ?>
                    <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" ><?php print date( "d/m/Y", str_replace( "T", " ", strtotime($fecha_imp )))?></span>
                </div>
            </div>
            <div>
                <div class="noticia-titulo">
                    <h2><a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>"> <?php print $noticia->title ?> </a> </h2>
                </div>
                <div class="noticia-copy">
                    <p> <?php /*print drupal_substr($noticia->field_sub_titulo_noticias["und"][0]["value"],0,150)*/ ?> 
						<?php if (!empty($noticia->field_mostrar_solotexto_noticias)){
                        if ($noticia->field_mostrar_solotexto_noticias["und"][0]["value"] == 1){
                        ?>
                            <?php print drupal_substr($noticia->	field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
						<?php }
						else { ?>
							<?php print drupal_substr($noticia->	field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
						<?php }}?>
					</p>
                </div>
                <?php if (!empty($noticia->field_boton_noticia)){ ?>
                <a class='noticia-enlace' href="<?php print $noticia->field_boton_noticia["und"][0]["url"] ?>" > <?php print $noticia->field_boton_noticia["und"][0]["title"] ?> </a>
                <?php }
                else {?>
                    <a href= "<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" class='noticia-enlace'> <?php print t("View more") ?> </a>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
    <section class='otras-noticias'>
        <p><?php print t("Other News"); ?></p>
        <ul>
        <?php

            $my_view_name = 'vista_noticias_interna';
            $my_display_name = 'block_1';

            $my_view = views_get_view($my_view_name);
            if ( is_object($my_view) ) {

                $view = views_get_view( $my_view_name );
                $view->set_display( $my_display_name );
                $view->execute();
                $item_multimedia = $view->result;

                foreach ($item_multimedia as $individual){
                   /* echo "<pre>";
                    print_r($individual);
                    echo "</pre>";*/
        ?>

            <li><a href="<?php print url( 'node/' . $individual->nid, array('absolute'=>true)); ?>"><?php print $individual->node_title ?></a></li>
            <?php }} ?>
        </ul>
    </section>

</div>

<div class="btn-ver-mas">
    <ul>
        <?php if ($language->language == 'en'){?>
        <li class='boton-ver-mas-1'><a href="<?php print url('news', array('absolute'=>true)); ?>"><?php print t("View all news"); ?></a></li>
        <?php }
        else {?>
            <li class='boton-ver-mas-1'><a href="<?php print url('noticias', array('absolute'=>true)); ?>"><?php print t("View all news"); ?></a></li>
        <?php }?>
    </ul>
    <span class="linea-ver-mas"></span>
</div>
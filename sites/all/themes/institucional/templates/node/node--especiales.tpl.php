<?php

?>
<div class="contenedor-principal container-fluid">
    <div class="container-fluid banner-superior-especiales">
        <div class="row row-principal">
            <div class="col-xs-12 col-md-12">
                <div class="container-fluid">
                    <div class="img-desktop">
                        <?php if (!empty($node->field_imagen_especial)){ ?>
                            <img src="<?php print file_create_url( $node->field_imagen_especial["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_especial["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_especial["und"][0]["title"] ?>" >
                        <?php } ?>
                    </div>
                    <div class="img-mobile">
                        <?php if (!empty($node->field_imagen_mobile_especiales)){ ?>
                            <img src="<?php print file_create_url( $node->field_imagen_mobile_especiales["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_mobile_especiales["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_mobile_especiales["und"][0]["title"] ?>" >
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-12 content-slides">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 info-banner">
                                <div class="redes">
                                    <span></span>
                                    <ul>
                                        <li ><img id="btn_share_fb_not" src="/sites/default/files/facebook_int.jpg"></li>
                                        <li ><img id="btn_share_tw" src="/sites/default/files/twitter_int.jpg"></li>
                                        <li ><img id="btn_share_lk" src="/sites/default/files/linkedin_int.jpg"></li>
                                    </ul>
                                </div>
                                <?php if (!empty($node->field_titulo_sup_peq_especiales)){
                                    $titulo_sup = $node->field_titulo_sup_peq_especiales["und"][0]["value"];
                                    ?>
                                <p class="texto1"><?php print $titulo_sup ?></p>
                                <?php } ?>
                                <h1><?php print $node->title ?></h1>
                                <?php if (!empty($node->field_titulo_inf_peq_especiales)){
                                    $titulo_inf = $node->field_titulo_inf_peq_especiales["und"][0]["value"];
                                    ?>
                                <p class="texto2"><?php print $titulo_inf ?></p>
                                <?php } ?>
                                <?php if (!empty($node->field_subtitulo_especial)) {

                                    $cadena = drupal_substr($node->field_subtitulo_especial["und"][0]["value"],0,200);
                                    ?>
                                <p class="descripcion-corta"><?php print $cadena ?></p>
                                <?php } ?>
                            </div>
                            <div class="scroll-item">
                                <p>Scroll</p>
                                <img src="/sites/default/files/scroll-icon.png" class='scroll-icon'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <div class="col-xs-12 col-md-6">
                    <?php if (!empty($node->field_texto_izquierda_especial)){ ?>
                    <p> <?php print $node->field_texto_izquierda_especial["und"][0]["value"] ?> </p>
                    <?php }?>
                </div>
                 <div class="col-xs-12 col-md-6">
                    <?php if (!empty($node->field_texto_derecha_especial)){ ?>
                    <p>  <?php print $node->field_texto_derecha_especial["und"][0]["value"] ?> </p>
                    <?php }?>
                </div>
                <div class="col-xs-12 col-md-12">
                    <ul class='tags-list-especiales'>
                        <?php
                        if (!empty($node->field_tag_especial)){
                            $array_tags = $node->field_tag_especial["und"];
                            $tags_finales = array();
                                foreach ($array_tags as $tag_ind){
                                    array_push($tags_finales,$tag_ind);
                                }                                                      

                            foreach ($tags_finales as $tag_ind_fin){
                                $tag = $tag_ind_fin["taxonomy_term"];
                        ?>
                        <li><?php print $tag->name ?></li>
                        <?php } } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
	
	$titles = $node->field_titulos_meta_tags["und"][0]["value"];
	$titles = explode( ",", $titles );

	
    if (!empty($tags_finales)){

		$i=0;
        foreach ($tags_finales as $tag_ind_fin){

            $tag = $tag_ind_fin["taxonomy_term"];

			
    ?>
    <div class="container-fluid">
        <div class="container">
            <div class="row tabs-especiales">
               <p><?php print $titles[$i]; $i++; ?></p>
            </div>
            <div class="row listado-especiales">
                <?php

                $numero = 0;
                if (count($tags_finales) == 1){
                    $numero = 12;
                }
                if (count($tags_finales) == 2){
                    $numero = 4;
                }
                if (count($tags_finales) == 3){
                    $numero = 4;
                }
                if (count($tags_finales) > 3){
                    $numero = 4;
                }
                $array_tag_1 = array($tag->tid);
                $view_tag_1 = views_get_view('noticias_tag_especiales');
                $view_tag_1->set_display("block");
                $view_tag_1->set_arguments($array_tag_1);
                $view_tag_1->set_items_per_page($numero);
                $view_tag_1->pre_execute();
                $view_tag_1->execute();

                print $view_tag_1->render();
                ?>

            </div>
        </div>
    </div>
    <?php } }?>

</div>
<div class="container-fluid block-views-vista-anuncios-home-block">
    <div class="container">

        <?php
        if ($node->field_activar_anuncios_especiale["und"][0]["value"] == 1){
            $block = module_invoke('views', 'block_view', 'vista_anuncios_home-block');
            print render($block['content']);
        }
        ?>

    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function(){

        var uri=window.location.pathname.substr(1);

        if(uri=="es/noticias" || uri=="es/noticias/"){
            uri="noticias/arte-cultura-y-humanidades";
        }

        if(uri=="en/news" || uri=="en/news/"){
            uri="en/news/art-culture-and-humanity";
        }

        var i=0;
        var tipo='&t=r';
        jQuery('.pagination li').each(function(){

          if(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next') || jQuery(this).hasClass('pager-first') || jQuery(this).hasClass('pager-last') ) {

          }else{
            if(i==0){
               jQuery(this).find('a').attr('href', '/'+uri);

           }else{
            var obje=jQuery(this).find('a');
            var num=obje.text();
            jQuery(this).find('a').attr('href', '/'+uri+'?page='+(num-1)+tipo);
        }
        i++;

    }

    if(jQuery(this).hasClass('pager-last') ) {
        tipo='&t=v';
        i=0;
    }





});




    })


</script>
<?php 
global $language;
if ($language->language=="es") {
    $donaciones="/es/donaciones";
    $urlStory="/historias-increibles";
}else{
    $donaciones="/en/donations";
    $urlStory="/story-telling";
}


?>
<div class="miga-de-pan">
<div class="breadcrumb container contextual-links-region">
<span class="inline odd first">
<a href="<?php print $donaciones ?>"><?php print t('Home')?></a>
</span> 
<span class="delimiter">/</span> 
<span class="inline even last"><a href="<?php print $donaciones.$urlStory ?>"><?php print t('Story telling')?></a></span>
</span>



</div>    

</div>
<?php
if (isset($_GET['t'])) {
    $tipo_vista=$_GET['t'];
}else{
    $tipo_vista="r";
}

$view_no_destacadas = views_get_view('vista_home_story_telling');
$view_no_destacadas->set_display("block");
$view_no_destacadas->pre_execute();
$view_no_destacadas->execute();
$resultados_no_destacadas = $view_no_destacadas->result;


$view_destacadas = views_get_view('vista_home_story_telling');
$view_destacadas->set_display("block_1");
$view_destacadas->pre_execute();
$view_destacadas->execute();
$resultados_destacadas = $view_destacadas->result;
?>
<header class="container title">
<h1><?php print $node->title ?></h1>    
</header>

<section class="story-telling container">
    <article class="selected-item">

        <?php 
        $destacado_entity=$resultados_destacadas[0]->_field_data['nid']['entity'];
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


        <section class="txt-selected-item">
            <h1><?php print $destacado_entity->title ?></h1>
            <p>        
                <?php 
                print $destacado_entity->field_descripcion_corta_noticias['und'][0]['value'];
                ?>

            </p>
            <section class="btn-block ">
                <a href="<?php print url('node/'.$destacado_entity->nid, array('absolute'=>true)); ?>" class="btn-default btn-border-green"><?php print t('View more')?></a>

            </section>
        </section>
    </article>

    <article class="slide-testimonials">
        <div class="list-landing-testimonials">

            <?php 
            $resultados= $resultados_no_destacadas;

            foreach ($resultados as $story ) {


                $entity=$story->_field_data['nid']['entity'];

                $imagen=file_create_url($entity->field_imagen_miniatura_noticias['und'][0]['uri']);
                $imagen_alt=$entity->field_imagen_miniatura_noticias['und'][0]['alt'];
                $imagen_title=$entity->field_imagen_miniatura_noticias['und'][0]['title'];
                ?>        

                <div class="item-landing-testimonials">
                    <figure>
                    <a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>">
                        <img src="<?php print $imagen ?>" alt="<?php print $imagen_alt ?>" title="<?php print $imagen_title ?>">
                        </a>
                    </figure>

                    <div class="txt-testimonials">
 <h1><a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>">
<?php print $entity->title ?> </a></h1>                        <?php 
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



                    <p></p>
                </div>
            </div> <!-- item-list-testimonialss -->

            <?php
        }
        ?>
    </div>
</article>
</section>


<section class="year-filter container">

    <?php 
    $view_mas_recientes = views_get_view('story_telling_mas_vistos_mas_recientes');
    $view_mas_recientes->set_display("block");
    if($tipo_vista!='r'){
        $view_mas_recientes->set_current_page(0);
    }
    $view_mas_recientes->init_handlers();

    $exposed_form = $view_mas_recientes->display_handler->get_plugin('exposed_form');
    print $exposed_form->render_exposed_form(true);
    $view_mas_recientes->execute();
    $resultados=$view_mas_recientes->result;

    ?>

</section>







    <section class="filter-tag container">
        <ul class="filter_tag">
            <li class="mas-recientes <?php if ($tipo_vista=='r'){print 'active';}?>"><?php print t("More Recent")?></li>
            <li class="mas-vistas <?php if ($tipo_vista=='v'){print 'active';}?>"><?php print t("More Views")?></li>
        </ul>    
    </section>

    <section class="block-views-vista-causas recent-container" <?php if($tipo_vista=='r'){ print "style='display:block;'"; } ?>>
        <div class="container">
            <h1>MÁS RECIENTES</h1>
            <article class="list-causes-internal">
                <?php

                foreach ($resultados as $resultado_ind){
                    $noticia = $resultado_ind->_field_data["nid"]["entity"];
                    ?>           

                    <div class="item-causes">
                        <a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" >
                            <h2><?php print $resultado_ind->node_title ?></h2>
                            <?php if($noticia->field_mostrar_solotexto_noticias['und'][0]['value']==0)
                            {
                                ?>
                                <figure>
                                    <img class="img-responsive" src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"]?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"]?>">
                                </figure>
                                <?php 
                            }
                            ?>
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
                        <a class="btn-default"  href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" ><?php print t( "View more" )?></a>
                        <?php } ?>
                    </div>
                </div>

                <?php }?>

            </article>
        </div>

    </section>


 <?php 
    $view_mas_vistos = views_get_view('story_telling_mas_vistos_mas_recientes');
    $view_mas_vistos->set_display("block_1");
    if($tipo_vista!='v'){
        $view_mas_vistos->set_current_page(0);
    }
    $view_mas_vistos->init_handlers();

    $exposed_form = $view_mas_vistos->display_handler->get_plugin('exposed_form');
    //print $exposed_form->render_exposed_form(true);
    $view_mas_vistos->execute();
    $resultados=$view_mas_vistos->result;

    ?>
        <section class="block-views-vista-causas view-container" <?php if($tipo_vista=='v'){ print "style='display:block;'"; } ?>>
        <div class="container">
            <h1>MÁS VISTAS</h1>
            <article class="list-causes-internal">
                <?php

                foreach ($resultados as $resultado_ind){
                    $noticia = $resultado_ind->_field_data["nid"]["entity"];
                    ?>           

                    <div class="item-causes">
                        <a href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" >
                            <h2><?php print $resultado_ind->node_title ?></h2>
                            <?php if($noticia->field_mostrar_solotexto_noticias['und'][0]['value']==0)
                            {
                                ?>
                                <figure>
                                    <img class="img-responsive" src="<?php print file_create_url( $noticia->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" alt="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["alt"]?>" title="<?php print $noticia->field_imagen_miniatura_noticias["und"][0]["title"]?>">
                                </figure>
                                <?php 
                            }
                            ?>
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
                        <a class="btn-default"  href="<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" ><?php print t( "View more" )?></a>
                        <?php } ?>
                    </div>
                </div>

                <?php }?>

            </article>
        </div>

    </section>
<div class="container-fluid compartir-redes">
  <div class="container">
    <div class="linea-100"></div>
    <p><?php print t('Share')?></p>
    <ul>
      <li><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
      <li><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
      <li><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
    </ul>
  </div>
</div>





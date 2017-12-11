<?php
global $base_url;
global $user;
global $language;


$user_fields = user_load($node->uid);
$descripcion_nodo=trim( drupal_html_to_text( $node->field_texto_competo_noticias["und"][0]["value"] ) );
$descripcion_limpio=str_replace('"', "'", $descripcion_nodo);

?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "author": "Universidad de los Andes",  
  "publisher": "Universidad de los Andes",  
  "name": "<?php echo $node->title ?>",
  "headline": "<?php echo $node->title ?>",
<?php if( isset( $node->field_texto_competo_noticias[ "und" ] ) ){ ?>
"description" : "<?php print $descripcion_limpio;  ?>",
<?php } ?>

  "datePublished": "<?php print format_date($node->created ,'custom','Y-m-d') ?>",
<?php if( isset( $node->field_imagenes_noticias[ "und" ] ) ){ ?>
"image": "<?php echo file_create_url( $node->field_imagenes_noticias[ "und" ][ 0 ][ "uri" ] ) ?>"
<?php } ?>
}
</script>

<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_LA/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</div>
<div class="container-fluid miga-de-pan">
        <?php
        /*
        if (!empty($GLOBALS["breadcrumb"])){
            $breadcrumb = $GLOBALS["breadcrumb"];
            print $breadcrumb;
        }
        */
        $term_parent = taxonomy_term_load( $node->field_subcategoria_noticias[ "und" ][ 0 ][ "tid" ] );
        $parent = taxonomy_term_load( $term_parent->field_categoria[ "und" ][ 0 ][ "tid" ] );

        ?>

        <div class="breadcrumb">
            <div class="container">
                <span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
                <?php if( $node->language == es ){ ?>
                    <span class="inline odd first"><?php print l( "Noticias", "noticias" ) ?></span> <span class="delimiter">/</span>
                <?php }else{ ?>
                    <span class="inline odd first"><?php print l( "News", "news" ) ?></span> <span class="delimiter">/</span>
                <?php } ?>
                <span class="inline odd first"><a href="/<?php echo $parent->field_path_noticias["und"][0]["value"] ?>"><?php echo $parent->name ?></a></span> <span class="delimiter">/</span>
                <span class="inline odd first"><a href="/<?php echo $term_parent->field_path_noticias["und"][0]["value"] ?>"><?php print $term_parent->name ?></a></span> <span class="delimiter">/</span>
                <?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
            </div>
        </div>




    </div>
    <div class="container">
<section class="internal-detail">

    


                    <header class="container title_news">
                    <h1><?php print $node->title ?></h1>
                    </header>
                    <?php if (!empty($node->field_subcategoria_noticias)){ ?>
                        <div class="noticia-subcategoria">
                            <ul>
                                <?php
                                foreach ($node->field_subcategoria_noticias["und"] as $subcategoria_ind){
                                    $sub_cat = $subcategoria_ind["taxonomy_term"];
                                    ?>
                                    <li><?php print l( $sub_cat->name, "taxonomy/term/" . $subcategoria_ind["tid"] ) ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php if (!empty($node->field_mostrar_autor_noticias) && $node->field_mostrar_autor_noticias["und"][0]["value"] == 1 ){ ?>

                        <div class="noticia-autor">
                            <section>
                                <?php if (!empty($user_fields->picture)){ ?>
                                    <img src="<?php print file_create_url( $user_fields->picture->uri ) ?>" class='img-responsive'>
                                <?php } ?>
                            </section>
                            <section>
                                <?php if (!empty($user_fields->name)){ ?>
                                    <p class="noticia-autor-nombre"><?php print $user_fields->name?></p>
                                <?php } ?>
                                <?php if (!empty($user_fields->field_cargo)){ ?>
                                    <p class="noticia-autor-cargo"><?php print $user_fields->field_cargo["und"][0]["value"]?></p>
                                <?php } ?>
                                <?php if (!empty($user_fields->mail)){ ?>
                                    <p class="noticia-autor-mail"><?php print $user_fields->mail?></p>
                                <?php } ?>
                            </section>
                        </div>

                    <?php }
                    else {
                        ?>
                        <?php if (!empty($node->field_tercero_noticias) && $node->field_tercero_noticias["und"][0]["value"] == 1 ){ ?>
                            <div class="noticia-autor">
                                <section>
                                    <?php if (!empty($node->field_imagen_tercero_noticias)){ ?>
                                        <img src="<?php print file_create_url( $node->field_imagen_tercero_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $node->field_imagen_tercero_noticias["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_tercero_noticias["und"][0]["title"] ?>" >
                                    <?php } ?>
                                </section>
                                <section>
                                    <?php if (!empty($node->field_nombre_tercero_noticias)){ ?>
                                        <p class="noticia-autor-nombre"><?php print $node->field_nombre_tercero_noticias["und"][0]["value"]?></p>
                                    <?php } ?>
                                    <?php if (!empty($node->field_cargo_tercero_noticias)){ ?>
                                        <p class="noticia-autor-cargo"><?php print $node->field_cargo_tercero_noticias["und"][0]["value"]?></p>
                                    <?php } ?>
                                    <?php if (!empty($node->field_correo_elec_ter_noticias)){ ?>
                                        <p class="noticia-autor-mail"><?php print $node->field_correo_elec_ter_noticias["und"][0]["value"]?></p>
                                    <?php } ?>
                                </section>
                            </div>
                        <?php } }?>


    <article class="slider-internal-detail-institucional">
    <section class="slide-for-detail-institucional">
    

 <?php 
 foreach ($node->field_videos_noticias_v2["und"] as $video_individual){

  ?>
  <article class="item-slide-for-detail-institucional iframe">

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

      $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '" allowfullscreen width="100%" height="500"></iframe>';
    }
    if ($fuente == 2){

      if (strpos($cadena,'player') !== false){
        $identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
      }
      else{
        $identificador = str_replace("https://vimeo.com/","",$cadena);
      }

      $iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="100%" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    }
    if ($fuente == 3){

      if (strpos($cadena,'channel') !== false){

        $identificador = explode("/", $cadena);
        $identificador= end($identificador)."?=html5ui";    
      }
      else if (strpos($cadena,'recorded') !== false){

            if (strpos($cadena,'highlight') !== false){
            $cadena=explode("/highlight", $cadena);
            $cadena=$cadena[0];
            }
        $identificador = str_replace("//www.ustream.tv/recorded/","",$cadena);
        $identificador="recorded/".$identificador;
        
      }

      $iframe = '<iframe width="100%" height="500" src="https://www.ustream.tv/embed/'.$identificador.'" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe><a href="https://www.ustream.tv/services" title="Video production powered by Ustream" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: left;" target="_blank">Video Production</a>';
     
    }

    if ($fuente == 4){
      $iframe = '<div class="fb-video" data-href="'.$cadena.'"  
      data-allowfullscreen="true" data-width="1024"></div>';
    }



    ?>

    <?php

    print $iframe;
    ?>

  </article>

    <?php }?>



<?php 
foreach ($node->field_imagenes_noticias["und"] as $imagen_grande){

  ?>

  <article class="item-slide-for-detail-institucional">
    <figure>


     <img src="<?php print file_create_url( $imagen_grande["uri"] ) ?>" alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" >
    <figcaption><?php print $imagen_grande["image_field_caption"]["value"]?></figcaption>
   </figure>

 </article>


 <?php 
}
?>

</section>



<?php 
  $cantidadImagenes=count($node->field_imagenes_noticias["und"]) + count($node->field_videos_noticias_v2["und"]);
  
  if ($cantidadImagenes>1) {


  ?>
<section class="slide-nav-detail-institucional">

  <?php 
  foreach ($node->field_videos_noticias_v2["und"] as $video_individual){

    ?>
    <article class="item-slide-nav-detail-institucional iframe">
      <figure>


       <img src="<?php print file_create_url( $video_individual["uri"] ) ?>" alt="<?php print $video_individual["alt"] ?>" title="<?php print $video_individual["title"] ?>" >

     </figure>

   </article>
   <?php 
 }
 ?>

 <?php 
 foreach ($node->field_imagenes_noticias["und"] as $imagen_grande){

  ?>

  <article class="item-slide-nav-detail-institucional">
    <figure>


     <img src="<?php print file_create_url( $imagen_grande["uri"] ) ?>" alt="<?php print $imagen_grande["alt"] ?>" title="<?php print $imagen_grande["title"] ?>" >

   </figure>

 </article>


 <?php 
}
?>
</section>

<?php 
}
?>
</article>

    <div class="container-fluid noticia-texto">
        <div class="container">
            <div class="noticia-texto-tags">
                <span class="linea"></span>
                <ul>
                    <?php
                    if (!empty($node->field_tag_noticias)){
                        foreach ($node->field_tag_noticias["und"] as $tag_individual){
                            if (!empty($tag_individual["taxonomy_term"])){
                                ?>
                                <li><a href="<?php print url('taxonomy/term/'.$tag_individual["tid"], array('absolute'=>true)); ?>"> <?php print $tag_individual["taxonomy_term"]->name ?> </a></li>
                            <?php }}} ?>
                </ul>
            </div>
            <div class="views-field views-field-field-fecha-modificacion-noticia">
                <div class="field-content">
                    <?php
                    $fecha_imp = "";
                    if (!empty($node->field_fecha_creacion_noticias)) {
                        $fecha_imp = $node->field_fecha_creacion_noticias["und"][0]["value"];
                    }
                    else{
                        $fecha_imp = $node->created;
                    }
                    ?>
                    <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" ><?php print date( "d/m/Y", str_replace( "T", " ", strtotime($fecha_imp )))?></span>
                </div>
            </div>
            <!--<div class="compartir-redes">
                <ul>
                    <li>
                        <img id="btn_share_lk_not" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png" />
                    </li>
                    <li>
                        <img  id="btn_share_fb_not" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png" />
                    </li>
                    <li>
                        <img  id="btn_share_tw_not" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png" />
                    </li>
                </ul>
            </div> -->

            <ul class="noticia-texto-redes-sociales">
                <li><img id="btn_share_fb_not" alt='facebook' title='facebook' src="/sites/default/files/facebook_int.jpg"></li>
                <li><img id="btn_share_tw_not" alt='twitter' title='twitter' src="/sites/default/files/twitter_int.jpg"></li>
                <li><img id="btn_share_lk_not" alt='linkedin' title='linkedin' src="/sites/default/files/linkedin_int.jpg"></li>
            </ul>

            <div class="noticia-texto-principal">
                <?php if (!empty($node->field_comentario_1_noticias)){ ?>
                    <div class='noticia-texto-comentario'><?php print $node->field_comentario_1_noticias["und"][0]["value"]?></div>
                <?php } ?>
                <?php if (!empty($node->field_texto_competo_noticias)){ ?>
                    <div class='noticia-texto-largo'><?php print $node->field_texto_competo_noticias["und"][0]["value"]?></div>
                <?php } ?>
                <?php if (!empty($node->field_comentario_2_noticias)){ ?>
                    <div class='noticia-texto-comentario'><?php print $node->field_comentario_2_noticias["und"][0]["value"]?></div>
                <?php } ?>
                <?php if (!empty($node->field_texto_noticia_noticias)){ ?>
                    <div class='noticia-texto-largo'><?php print $node->field_texto_noticia_noticias["und"][0]["value"]?></div>
                <?php } ?>
                <?php if (!empty($node->field_comentario_3_noticias)){ ?>
                    <div class='noticia-texto-comentario'><?php print $node->field_comentario_3_noticias["und"][0]["value"]?></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php
    $cantidad=count ($node->field_subcategoria_noticias[ "und" ]);
    $random= rand(0,($cantidad-1));

    $term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
    $view = views_get_view('vista_noticias_interna');
    $view->set_display("block");
    $view->set_arguments($term_id);
    $view->pre_execute();
    $view->execute();
   

    ?>

    <?php
    if ($node->field_activar_not_rel_noticias["und"][0]["value"] == 1 && !empty($view->result)){
        ?>
        <div class="container-fluid container-noticias-fluid">
            <div class="container">
                <div class="title-bloques"><h2> <span></span><?php echo t( "Related news" ) ?></h2></div>
                <div class="container-noticias">


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
                                <div class="views-field views-field-created">
      <span class="date-display-single">
      <?php
      $fecha_imp = "";
      if (!empty($noticia->field_fecha_creacion_noticias)) {
          $fecha_imp = $noticia->field_fecha_creacion_noticias["und"][0]["value"];
      }
      else{
          $fecha_imp = $noticia->created;
      }

      ?>
      <?php print date( "d/m/Y", str_replace( "T", " ", strtotime($fecha_imp )))?>

      </span>
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
                                                    <?php print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
                                                <?php }
                                                else { ?>
                                                    <?php print drupal_substr($noticia->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?>
                                                <?php }}?>
                                        </p>
                                    </div>
                                    <?php if (!empty($noticia->field_boton_noticia)){ ?>
                                        <a href= <?php print $noticia->field_boton_noticia["und"][0]["url"] ?> class='noticia-enlace'> <?php print $noticia->field_boton_noticia["und"][0]["title"] ?> </a>
                                    <?php }
                                    else {?>
                                        <a href= "<?php print url( 'node/' . $noticia->nid, array('absolute'=>true)); ?>" class='noticia-enlace'> <?php print "Ver más" ?> </a>
                                    <?php } ?>
                                </div>
                            </section>
                            <?php } ?>
                            <section class='otras-noticias'>
                                <p>Otras noticias</p>
                                <ul>
                                    <?php

                                    $my_view_name = 'vista_noticias_interna';
                                    $my_display_name = 'block_1';

                                    $my_view = views_get_view($my_view_name);
                                    if ( is_object($my_view) ) {

                                        $term_id = array($node->field_subcategoria_noticias[ "und" ][ $random ][ "tid" ]);
                                        $view = views_get_view('vista_noticias_interna');
                                        $view->set_display("block_1");
                                        $view->set_arguments($term_id);
                                        $view->pre_execute();
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
                            <?php
                            $info_nodos=translation_path_get_translations("node/134");

                            if ($language->language=="es"){
                                $url_es=drupal_get_path_alias($info_nodos['es'], 'es');
                                $url_idioma="/es/noticias";
                            }else{
                                $url_en=drupal_get_path_alias($info_nodos['en'], 'en');
                                $url_idioma="/en/news";
                            }


                            ?>
                            <li class='boton-ver-mas-1'><a href="<?php print $url_idioma ?>"><?php print t("View all news"); ?></a></li>
                        </ul>
                        <span class="linea-ver-mas"></span>
                    </div>



                </div>
            </div>
        </div>
        <?php
    }
    ?>




    <div class="container-fluid block-views-vista-anuncios-home-block">
        <div class="container">

            <?php
            if ($node-> field_activar_anuncios_niciasot["und"][0]["value"] == 1){
                $block = module_invoke('views', 'block_view', 'vista_anuncios_home-block');
                print render($block['content']);
            }
            ?>

        </div>
    </div>
    <div class="container-fluid compartir-redes">
        <div class="container">
            <div class="linea-100"></div>
            <p><?php //print t("Share"); ?></p>
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

</section>
















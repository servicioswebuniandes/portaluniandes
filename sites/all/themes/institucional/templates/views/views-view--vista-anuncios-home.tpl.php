  <section class="views_notice featured_notice">
    <?php
    $resultados = $view->result;

    foreach ($resultados as $anuncio) {
      $title=$anuncio->node_title;
      $anuncio=$anuncio->_field_data['nid']['entity'];

      ?>
      <article class="list_featured_notice">
        <figure class="img-featured_notice">
          <img src="<?php print file_create_url($anuncio->field_imagenes['und'][0]['uri'])  ?>" alt="<?php print $anuncio->field_imagenes['und'][0]['alt']  ?>" title="<?php print $anuncio->field_imagenes['und'][0]['title']  ?>">
        </figure>

        <article class="txt-featured_notice">
         <h1 class="title-featured_notice"><?php print $title ?></h1>
         <p class="txt_featured_notice"><?php print $anuncio->field_descripcion_corta_anuncios['und'][0]['value'] ?></p>
         <a target="_blank" href="<?php print $anuncio->field_boton_anuncio['und'][0]['url'] ?>" class="btn-default btn-white btn-featured_slide"><?php print $anuncio->field_boton_anuncio['und'][0]['title'] ?></a>
       </article>  
     </article>
     <?php  
   }
   ?>
 </section>


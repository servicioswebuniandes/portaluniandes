<?php

$ranking=$view->result[0]->_field_data['nid']['entity'];
?>

<section class="views_accreditation featured_accreditation">
  <article class="list_featured_accreditation mobile">
    <article class="txt-featured_accreditation">
      <h1 class="title-featured_accreditation"><?php print $view->result[0]->node_title ?></h1>
      <p class="txt_featured_accreditation"><?php print $ranking->field_descripcion_ranking['und'][0]['value']?></p>
    </article>

    <figure class="img-featured_accreditation">
      <img src="<?php print file_create_url($ranking->field_imagen_acredita_ranking['und'][0]['uri'])  ?>" alt="">
    </figure>
  </article>

  <article class="list_featured_accreditation only-figures">
    <figure class="img-featured_accreditation">
      <img src="<?php print file_create_url($ranking->field_imagen_ranking['und'][0]['uri'])  ?>" alt="">
    </figure>
    
    <figure class="img-featured_accreditation">
      <img src="<?php print file_create_url($ranking->field_imagen2_ranking['und'][0]['uri'])  ?>" alt="">
    </figure>
  </article>
</section>




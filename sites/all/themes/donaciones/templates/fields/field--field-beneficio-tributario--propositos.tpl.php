<?php 

$nodo=$element['#object'];
$field_beneficio=$nodo->field_beneficio_tributario['und'];

 $icono=file_create_url($field_beneficio[0]['entity']->field_icono_en_proposito['und'][0]['uri']);
 $icono_alt=file_create_url($field_beneficio[0]['entity']->field_icono_en_proposito['und'][0]['alt']);
 $icono_title=file_create_url($field_beneficio[0]['entity']->field_icono_en_proposito['und'][0]['title']);

?>

<section class="slide-bt container">
  <article class="item-slide-bt">
    <figure>
      <img src="<?php print $icono ?>" alt="<?php print $icono_alt ?>" title="<?php print $icono_title ?>">
    </figure>

    <section class="text-item-slide-bt">
      <h2><?php print $field_beneficio[0]['entity']->title?></h2>
      <p><?php print $field_beneficio[0]['entity']->field_descripcion_img_maestra4['und'][0]['value']?></p>
    </section>
  </article>

  <section class="btn-block line-green">
    <a class="btn-default btn-border-green btn-bt" href="<?php print url('node/'.$field_beneficio[0]['entity']->nid, array('absolute'=>true)); ?>"><?php print t('View more')?></a>
  </section>
</section>
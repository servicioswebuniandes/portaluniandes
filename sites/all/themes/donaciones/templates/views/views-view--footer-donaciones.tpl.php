<footer class="links-uniandes">

<?php
$resultados = $view->result;

foreach ($resultados as $footer) {

    $icono= file_create_url($footer->_field_data['nid']['entity']->field_imagen_footer['und'][0]['uri']);
    $icono_alt=$footer->_field_data['nid']['entity']->field_imagen_footer['und'][0]['alt'];
    $icono_title=$footer->_field_data['nid']['entity']->field_imagen_footer['und'][0]['title'];
  ?>
  <article>
    <figure>
      <img src="<?php print $icono ?>" alt="<?php print $icono_alt ?>" title="<?php print $icono_title ?>">
    </figure>
    <section class="txt-links">
      <a class="link-footer_top" target="_blank"  href="<?php print  $footer->_field_data['nid']['entity']->field_url_footer['und']['0']['value'] ?>">
      <p class="title"><?php print  $footer->_field_data['nid']['entity']->title  ?></p>
      <p class="sub-title"><?php print  $footer->_field_data['nid']['entity']->field_sub_titulo_footer['und'][0]['value']  ?></p>
      </a>
      <span class="color-bar" style="background-color: <?php print $footer->_field_data['nid']['entity']->field_barra_de_color_footer['und'][0]['rgb']?>"></span>
    </section>
  </article>

  <?php  
}
?>

</footer>


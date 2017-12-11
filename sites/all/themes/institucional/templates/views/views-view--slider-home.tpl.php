<?php


$resultados = $view->result;

foreach ($resultados as $slider ) {
    $img_mobile=file_create_url($slider->_field_data['nid']['entity']->field_imagen_mobile_bannerh['und'][0]['uri']);
    $img_desktop=file_create_url($slider->_field_data['nid']['entity']->field_imagen['und'][0]['uri']);
    $posicion=$slider->_field_data['nid']['entity']->field_posicion_texto['und'][0]['value'];
    if ($posicion){
        $posicion="position-right";
    }else{
        $posicion="position-left";
    }
    ?>
<article class="item-banner">
            <?php 
                $porcentaje=$slider->_field_data['nid']['entity']->field_porcentaje_transparencia['und'][0]['value']/100;
                if ($slider->_field_data['nid']['entity']->field_color_transparencia['und'][0]['value']==0) {
                    $color="white";
                }else{
                    $color="black";
                }
                
             //print_r($slider->_field_data['nid']['entity']->field_porcentaje_transparencia['und'][0]['value']);
            ?>
            <div class="item-opacity" style="background: <?php print $color ?>;opacity: <?php print $porcentaje?>"></div>
            <img src="<?php print $img_mobile ?>" class="mobile-img">
            <img src="<?php print $img_desktop ?>" class="desktop-img">
    
            <div class="txt-item-banner <?php print $posicion ?>">
                <h1 class="txt-white"><?php print $slider->_field_data['nid']['entity']->title ?></h1>
                <p  class="txt-yellow"><?php print $slider->_field_data['nid']['entity']->field_sub_titulo['und'][0]['value'] ?></p>
                <a 
                    <?php if (!empty($slider->_field_data['nid']['entity']->field_url_boton_banner['und'][0]['attributes']['target']))
                    {
                        print 'target="'.$slider->_field_data['nid']['entity']->field_url_boton_banner['und'][0]['attributes']['target'].'"';
                        } ?>
                href="<?php print $slider->_field_data['nid']['entity']->field_url_boton_banner['und'][0]['url'] ?>" class="btn-default btn-yellow btn-banner"><?php print $slider->_field_data['nid']['entity']->field_url_boton_banner['und'][0]['title'] ?></a>
            </div> <!-- txt-item-banner -->
        </article> <!-- item-banner -->

    <?php


}
?>


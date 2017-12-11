<section class="slider-landing">
<?php 
$nodo=$element['#object'];
$resultados=$nodo->field_slide_donaciones['und'];
uasort($field_slide, 'sort_by_orden');
function sort_by_orden ($a, $b) {
    return $a['entity']->field_posicion_multimedia['und'][0]['value'] - $b['entity']->field_posicion_multimedia['und'][0]['value'];
}



foreach ($resultados as $slider ) {

    $posicion=$slider['entity']->field_posicion_texto['und'][0]['value'];
    if ($posicion){
        $posicion="position-right";
    }else{
        $posicion="position-left";
    }
    
     $porcentaje=$slider['entity']->field_porcentaje_transparencia['und'][0]['value']/100;
                if ($slider['entity']->field_color_transparencia['und'][0]['value']==0) {
                    $color="white";
                }else{
                    $color="black";
                }
                

    $img_mobile=file_create_url($slider['entity']->field_imagen_banner_mob_maestra4['und'][0]['uri']);
    $img_desktop=file_create_url($slider['entity']->field_image['und'][0]['uri']);
    ?>
<article class="item-banner">
            <div class="item-opacity" style="background: <?php print $color ?>;opacity: <?php print $porcentaje?>"></div>

            <img src="<?php print $img_mobile ?>" class="mobile-img">
            <img src="<?php print $img_desktop ?>" class="desktop-img">

            <div class="txt-item-banner <?php print $posicion ?>">
                <h1 class="txt-white"><?php print $slider['entity']->title ?></h1>
                <p  class="txt-yellow"><?php print $slider['entity']->field_descripcion_slider_campana['und'][0]['value'] ?></p>
                <a 
                    <?php if (!empty($slider['entity']->field_boton_noticia['und'][0]['attributes']['target']))
                    {
                        print 'target="'.$slider['entity']->field_boton_noticia['und'][0]['attributes']['target'].'"';
                        } ?>
                href="<?php print $slider['entity']->field_boton_noticia['und'][0]['url'] ?>" class="btn-default btn-yellow btn-slide-landing"><?php print $slider['entity']->field_boton_noticia['und'][0]['title'] ?>                                    
                </a>
            </div> <!-- txt-item-banner -->
        </article> <!-- item-banner -->

    <?php


}
?>

</section>
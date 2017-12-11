<?php 

$nodo=$element['#object'];
$field_informes=$nodo->field_informes_anuales['und'];

foreach ($field_informes as $informe) {
    ?>
        <div class="item-slide-report">
            <a target="_blank" href="<?php print file_create_url($informe['entity']->field_documento_anual['und'][0]['uri'])?>"><?php print $informe['entity']->title?></a>
        </div> <!-- item-slide-report -->
    


    <?php
}
 

?>

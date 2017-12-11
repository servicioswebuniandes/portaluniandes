<?php
global $base_url;
global $language;
$resultados = $view->result;


?>
<ul>
    <?php
    if (!empty($resultados)){
       foreach ($resultados as $resultado){
           $caja = $resultado->_field_data["nid"]["entity"];

    ?>
    <li class="views-row" style="background-image: url(<?php print file_create_url( $caja->field_img_background_caja_list1["und"][0]["uri"] ) ?>);">
        <?php
           if (!empty($caja->field_url_caja_list1)) {

               $target = $caja->field_url_caja_list1["und"][0]["attributes"]["target"];
               $cadena = $caja->field_url_caja_list1["und"][0]["url"];

               if (strpos($cadena,'https') !== false || strpos($cadena,'http') !== false || strpos($cadena,'pdf') !== false){

               }
               else{
                   $target = "";
               }
           }

        ?>

        <div class="views-field views-field-title-1">
			<?php if (!empty($caja->field_url_caja_list1)) {
                $target = $caja->field_url_caja_list1["und"][0]["attributes"]["target"];
                ?>
				<a target="<?php print $target?>" href="<?php print $caja->field_url_caja_list1["und"][0]["url"]?>"><span class="field-content"><?php print $caja->title ?></span></a>
			<?php }else{ ?>
				<a href="<?php url( 'node/' . $caja->nid, array('absolute'=>true) );?>"><div class="field-content"><?php echo t( "View more" ); ?></div></a>
			<?php } ?>
        </div>

        <div class="views-field views-field-field-img-background-caja-list1">
        </div>
        <div class="views-field views-field-field-url-caja-list1">
            <?php if (!empty($caja->field_url_caja_list1)) {

                $target = $caja->field_url_caja_list1["und"][0]["attributes"]["target"];

                $cadena = $caja->field_url_caja_list1["und"][0]["url"];

                if (strpos($cadena,'https') !== false || strpos($cadena,'http') !== false || strpos($cadena,'pdf') !== false){ ?>
                    <a target="<?php print $target?>" href="<?php print $cadena ?>"><div class="field-content"><?php print $caja->field_url_caja_list1["und"][0]["title"]?></div></a>
                    <?php
                }
                else { $target = ""; ?>

                    <a target="<?php print $target?>" href=" <?php print $base_url . $cadena?>"><div class="field-content"><?php print $caja->field_url_caja_list1["und"][0]["title"]?></div></a>
                    <?php

                }

                ?>

            <?php }
            else{ ?>
                <a href="<?php url( 'node/' . $caja->nid, array('absolute'=>true) );?>"><div class="field-content"><?php echo t( "View more" ); ?></div></a>
            <?php }?>
        </div>

        <div class="views-field views-field-field-descrip-corta-caja-list1">
            <?php if (!empty($caja->field_descrip_corta_caja_list1)) { ?>
            <div class="field-content"><?php print $caja->field_descrip_corta_caja_list1["und"][0]["value"]?></div>
               <?php } ?>
        </div>

        <div class="views-field views-field-field-descrip-larga-caja-list1">
            <div class="field-content">
           <?php if (!empty($caja->field_descrip_larga_caja_list1)) { ?>
                <p><?php print $caja->field_descrip_larga_caja_list1["und"][0]["value"]?></p>
           <?php } ?>
            </div>
        </div>
        <a target="<?php print $target?>" href="<?php print $cadena ?>">
        <div class="views-field views-field-nothing-1">
		<span class="field-content opacidad-content">
			<div class="opacidad"></div>
		</span>
        </div>
            </a>


    </li>
    <?php }} ?>
</ul>

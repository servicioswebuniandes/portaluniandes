<?php
$resultados = $view->result;
?>
<ul>
    <?php
    if (!empty($resultados)){
    foreach ($resultados as $resultado){
    $caja = $resultado->_field_data["nid"]["entity"];
    ?>
    <li class="views-row" style="background-image: url(<?php print file_create_url( $caja->field_img_background_caja_list2["und"][0]["uri"] ) ?>);">
        <div class="views-field views-field-title-1">
           <a href="<?php url( 'node/' . $caja->nid, array('absolute'=>true) )?>"> <span class="field-content"><?php print $caja->title?></span></a>
        </div>
        <div class="views-field views-field-nothing">
		<span class="field-content">
			<ul class="redes">
                <?php if (!empty($caja->field_url_facebook_caja_list2)){ ?>
				<li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_facebook_caja_list2["und"][0]["value"]?>"><img src="/sites/default/files/facebook_int.jpg"></a>
				</li>
                <?php }?>
                <?php if (!empty($caja->field_url_twitter_caja_list2)){ ?>
                    <li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_twitter_caja_list2["und"][0]["value"]?>"><img src="/sites/default/files/twitter_int.jpg"></a>
				</li>
                <?php }?>
                <?php if (!empty($caja->field_url_linkedin_caja_list2)){ ?>
                    <li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_linkedin_caja_list2["und"][0]["value"]?>"><img src="/sites/default/files/linkedin_int.jpg"></a>
				</li>
                <?php }?>
                <?php if (!empty($caja->field_url_instagram_caja_list2)){ ?>
                    <li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_instagram_caja_list2["und"][0]["value"]?>"><img src="/sites/default/files/instagram_int.jpg"></a>
				</li>
                <?php }?>
                <?php if (!empty($caja->field_url_snapchat_caja_list2)){ ?>
                    <li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_snapchat_caja_list2["und"][0]["value"]?>"><img src="/sites/default/files/snapchat_int.jpg"></a>
				</li>
                <?php }?>
                <?php if (!empty($caja->field_url_vimeo_cala_list2)){ ?>
                    <li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_vimeo_cala_list2["und"][0]["value"]?>"><img src="/sites/default/files/vimeo_int.jpg"></a>
				</li>
                <?php }?>
                <?php if (!empty($caja->field_url_youtube_caja_list2)){ ?>
                    <li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_youtube_caja_list2["und"][0]["value"]?>"><img src="/sites/default/files/youtube_int.jpg"></a>
				</li>
                <?php }?>
                <?php if (!empty($caja->field_url_googleplus_caja_list2)){ ?>
                    <li class="red-ind">
					<a target="_blank" href="<?php print $caja->field_url_googleplus_caja_list2["und"][0]["value"]?>"><img src="/sites/default/files/google_int.jpg"></a>
				</li>
                <?php }?>
			</ul>
		</span>
        </div>
        <div class="views-field views-field-nothing-1">
		<span class="field-content opacidad-content">
			<div class="opacidad">
			</div>
		</span>
        </div>

    </li>
    <?php }} ?>
</ul>

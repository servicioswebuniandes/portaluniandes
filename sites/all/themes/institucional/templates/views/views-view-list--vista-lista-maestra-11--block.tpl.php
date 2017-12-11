<?php
global $base_url;
global $language;
$resultados = $view->result;
?>
<ul>
<?php
    if (!empty($resultados)){
        foreach ($resultados as $resultado_ind){
            $item = $resultado_ind->_field_data["nid"]["entity"];
?>
    <li>
        <h2><?php print $item->title ?></h2>
        <img src="<?php print file_create_url( $item->field_imagen_principal_im11["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $item->field_imagen_principal_im11["und"][0]["alt"] ?>" title="<?php print $item->field_imagen_principal_im11["und"][0]["title"] ?>" >
        <section>
            <p><?php print drupal_substr($item->field_texto_principal_im11["und"][0]["value"],0,150)?></p>
            <?php
            $url_boton = "";
            $texto_boton = "Ver más";
            $target = "";
            if (!empty($item->field_boton_im11)){
                $url_boton = $item->field_boton_im11["und"][0]["url"];
                $texto_boton = $item->field_boton_im11["und"][0]["title"];


            if (strpos($url_boton,'https') !== false || strpos($url_boton,'http') !== false){
                $target = $item->field_boton_im11["und"][0]["attributes"]["target"];
            }
            else{
                $url_boton = $base_url ."/".$language->language . "/" . $url_boton . "/";

            }
            }
            else{
                $url_boton = url( 'node/' . $item->nid, array('absolute'=>true));
            }
            ?>
            <a target="<?php print $target?>" href="<?php print $url_boton?>"><?php print t($texto_boton) ?></a>
        </section>
    </li>
    <?php }} ?>
</ul>
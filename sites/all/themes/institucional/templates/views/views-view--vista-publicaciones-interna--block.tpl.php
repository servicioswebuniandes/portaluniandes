<?php 
if (isset($_GET['update'])){


$inicio=$_GET['start'];
$cantidad=$_GET['cantidad'];
$tipo=$_GET['type'];

switch ($tipo) {
    case 'maestra4':
        $result = db_select('node', 'u')->fields('u', array(
    'nid',
    'type'
    ))
->condition('type', 'maestra_4', '=')
->range($inicio,$cantidad)
->execute();


while($record = $result->fetchAssoc()) {

print "Nodo actualizado: ".$record['nid']. "<br>";
$nodo=node_load($record['nid']);
$nodo->field_imagen_banner_maestra4['und'][0]['image_field_caption']['format']="full_html";
$nodo->field_imagen_banner_mob_maestra4['und'][0]['image_field_caption']['format']="full_html";
$nodo->field_texto_1_pie_de_pagina_m4['und'][0]['format']="full_html";
$nodo->field_texto_2_pie_de_pagina_m4['und'][0]['format']="full_html";
node_save($nodo);

}
        break;

    
    
    default:
        # code...
        break;
}



}


$resultados=$view->result;

?>
<div class="container container-publicaciones">
<ul>            <?php
    if (!empty($resultados)){
        $i = 1;
        foreach ($resultados as $resultado_ind){
            $noticia = $resultado_ind->_field_data["nid"]["entity"];
            ?>

            <li>
                <a target="_blank" href="<?php  print $noticia->field_url_publicaciones["und"][0]["url"] ?>">
                 <img src="<?php print file_create_url( $noticia->field_imagen_publicaciones["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia->field_imagen_publicaciones["und"][0]["alt"] ?>" title="<?php print $noticia->field_imagen_publicaciones["und"][0]["title"] ?>" >
                 
                 <h2><?php print $noticia->title ?></h2>
                 <section>
                    <p><?php 

                    $lenght=strlen($noticia->field_sub_titulo_publicaciones["und"][0]["value"]);
                    if($lenght>=150){
                        $add="...";
                    }else{
                        $add="";
                    }
                    print drupal_substr($noticia->field_sub_titulo_publicaciones["und"][0]["value"],0,150).$add;



                    ?></p>
                    
                    
                </section>


                
            </a>
        </li>
        <?php
    }
}
?>
</ul>    


       </div>
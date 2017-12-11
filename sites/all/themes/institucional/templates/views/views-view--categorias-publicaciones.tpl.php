<?php 
$resultados=$view->result;

?>
<div class="container container-publicaciones">
<ul>            <?php
    if (!empty($resultados)){
        $i = 1;
        foreach ($resultados as $resultado_ind){
            $noticia = $resultado_ind->_field_data["nid"]["entity"];
            if (!empty($noticia->field_url_publicaciones["und"][0])) {
               $url=$noticia->field_url_publicaciones["und"][0]["url"];
               $target="target='_blank'";
            }else{
                $url=url( 'node/' . $noticia->nid, array('absolute' => true));
                $target="";
            }

            ?>

            <li>
                <a <?php print $target; ?> href="<?php  print $url ?>">
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
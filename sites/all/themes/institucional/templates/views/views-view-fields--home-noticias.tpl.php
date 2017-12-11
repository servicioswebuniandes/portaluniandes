<?php
$array_no_destacadas = array($row->tid);
$view_no_destacadas = views_get_view('vista_noticias_home_noticias');
$view_no_destacadas->set_display("block");
$view_no_destacadas->set_arguments($array_no_destacadas);
$view_no_destacadas->pre_execute();
$view_no_destacadas->execute();
$resultados_no_destacadas = $view_no_destacadas->result;


$array_destacadas = array($row->tid);
$view_destacadas = views_get_view('vista_noticias_home_noticias');
$view_destacadas->set_display("block_1");
$view_destacadas->set_arguments($array_destacadas);
$view_destacadas->pre_execute();
$view_destacadas->execute();
$resultados_destacadas = $view_destacadas->result;
?>
<div class="container-fluid">
    <div class="container">
        <div class="row multimedia-desktop">
            <?php if (!empty($resultados_destacadas)){
                $noticia_destacada = $resultados_destacadas[0]->_field_data["nid"]["entity"];
            ?>
            <div class='col-xs-12 col-md-7 media-principal'>
                <div class="container-fluid">
                    <section>
                        <div class="multi-img">
                            <?php
                            if (!empty($noticia_destacada->field_imagenes_noticias)){
                            ?>
                            <img src="<?php print file_create_url( $noticia_destacada->field_imagenes_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["title"] ?>" >
                            <?php }
                            else {
                                if ($noticia_destacada->field_videos_noticias_v2) {
                                    print $noticia_destacada->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];
                                }
                            }
                            ?>
                        </div>
                    </section>
                    <section>
                        <div class="row">
                            <div class='col-md-8'>

                                <p class='multi-titulo'><?php print $noticia_destacada->title?></p>
                                <div class="linea-titulo"></div>
                                <?php if (!empty($noticia_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'><?php print $noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"] ?></p>
                                <?php } ?>
                            </div>
                            <div class='col-md-4'>
                                <?php if (!empty($noticia_destacada->field_fecha_creacion_noticias)){ ?>

                                    <p class='multi-fecha'><?php echo date( "d/m/Y", $noticia_destacada->created ) ?></p>
                                <?php } ?>
                                <?php if (!empty($noticia_destacada->field_boton_noticia)){ ?>
                                <a href="<?php print $noticia_destacada->field_boton_noticia["und"][0]["url"]?>" class='multi-enlace'><?php print $noticia_destacada->field_boton_noticia["und"][0]["title"]?></a>
                                <?php }
                                else {
                                    $url_boton = url('node/'.$noticia_destacada->nid, array('absolute'=>true));
                                ?>
                                <a href="<?php print $url_boton ?>" class='multi-enlace'>Ver Más</a>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php } ?>
            <div class='col-xs-12 col-md-5 slider-vectical'>
                <ul>
                    <?php
                    if (!empty($resultados_no_destacadas)){
                      
                        foreach ($resultados_no_destacadas as $item_individual){
                            $noticia_no_destacada = $item_individual->_field_data["nid"]["entity"];
                    ?>
                    <li>
                        <section>
                            <div>
                                <?php if (!empty($noticia_no_destacada->field_imagen_miniatura_noticias)) { ?>
                                    <img src="<?php print file_create_url( $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["title"] ?>" >
                                <?php } ?>
                            </div>
                        </section>
                        <section>
                            <?php if (!empty($noticia_no_destacada->field_fecha_creacion_noticias)){ ?>
                                <p class='multi-fecha'><?php echo date( "d/m/Y", $noticia_no_destacada->created ) ?></p>
                            <?php } ?>
                            <p class='multi-titulo'> <?php print $noticia_no_destacada->title?> </p>
                            <?php if (!empty($noticia_no_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'><?php print $noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"] ?></p>
                            <?php } ?>
                        </section>
                    </li>
                    <?php }} ?>
                </ul>
            </div>
    </div>

        <div class="row multimedia-mobile">
            <div class="col-xs-12 col-md-12">
                <ul>
                    <?php if (!empty($resultados_destacadas)){
                    $noticia_destacada = $resultados_destacadas[0]->_field_data["nid"]["entity"];
                    ?>
                    <li>
                        <section>
                            <div class="multi-img">
                                <?php
                                if (!empty($noticia_destacada->field_imagenes_noticias)){
                                    ?>
                                    <img src="<?php print file_create_url( $noticia_destacada->field_imagenes_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["title"] ?>" >
                                <?php }
                                else {
                                    if ($noticia_destacada->field_videos_noticias_v2) {
                                        print $noticia_destacada->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];
                                    }
                                }
                                ?>
                            </div>
                        </section>
                        <section>
                            <?php if (!empty($noticia_destacada->field_fecha_creacion_noticias)){ ?>
                                <p class='multi-fecha'><?php echo date( "d/m/Y", $noticia_destacada->created) ?></p>
                            <?php } ?>
                            <a class="multi-titulo" href="<?php print url('node/'.$noticia_destacada->nid, array('absolute'=>true)); ?>"> <?php print $noticia_destacada->title?> </a>
                            <?php if (!empty($noticia_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'><?php print $noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"] ?></p>
                            <?php } ?>
                        </section>
                    </li>
                    <?php } ?>
                    <?php
                    if (!empty($resultados_no_destacadas)){
                    foreach ($resultados_no_destacadas as $item_individual){
                    $noticia_no_destacada = $item_individual->_field_data["nid"]["entity"];
                    ?>
                    <li>
                        <section>
                            <div>
                                <?php if (!empty($noticia_no_destacada->field_imagen_miniatura_noticias)) { ?>
                                    <img src="<?php print file_create_url( $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["title"] ?>" >
                                <?php } ?>
                            </div>
                        </section>
                        <section>
                            <?php if (!empty($noticia_no_destacada->field_fecha_creacion_noticias)){ ?>
                                <p class='multi-fecha'><?php echo date( "d/m/Y", $noticia_no_destacada->created ) ?></p>
                            <?php } ?>
                            <a class="multi-titulo" href="<?php print url('node/'.$noticia_no_destacada->nid, array('absolute'=>true)); ?>"> <?php print $noticia_no_destacada->title?> </a>
                            <?php if (!empty($noticia_no_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'><?php print $noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"] ?></p>
                            <?php } ?>
                        </section>
                    </li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="botones-filtros">
            <ul>
                <li class="mas-recientes">Más recientes</li>
                <li class="mas-vistas">Más vistas</li>
            </ul>
        </div>

        <div class="container-fluid vista_noticias_mas_recientes">
            <div class="container">
                <?php
                $array_mas_recientes = array($row->tid);
                $view_mas_recientes = views_get_view('home_noticias_mas_vistos_y_mas_recientes');
                $view_mas_recientes->set_display("block");
                $view_mas_recientes->set_arguments($array_mas_recientes);
                $view_mas_recientes->pre_execute();
                $view_mas_recientes->execute();
                print $view_mas_recientes->render();
                ?>
            </div>
        </div>
        <div class="container-fluid vista_noticias_mas_vistas">
            <div class="container">
                <?php
                $array_mas_vistas = array($row->tid);
                $view_mas_vistas = views_get_view('home_noticias_mas_vistos_y_mas_recientes');
                $view_mas_vistas->set_display("block");
                $view_mas_vistas->set_arguments($array_mas_vistas);
                $view_mas_vistas->pre_execute();
                $view_mas_vistas->execute();
                print $view_mas_vistas->render();
                ?>
            </div>
        </div>
    </div>
</div>


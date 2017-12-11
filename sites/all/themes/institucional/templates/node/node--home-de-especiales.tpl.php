<?php
/*echo "<pre>";
print_r($node);
echo "</pre>";*/

$array_mas_recientes = array();
$view_mas_recientes = views_get_view('home_especiales_mas_vistos_y_mas_recientes');
$view_mas_recientes->set_display("block");
$view_mas_recientes->set_arguments($array_mas_recientes);
$view_mas_recientes->pre_execute();
$view_mas_recientes->execute();
//$especiales_recientes = $view_mas_recientes->result;



$array_mas_vistas = array();
$view_mas_vistas = views_get_view('home_especiales_mas_vistos_y_mas_recientes');
$view_mas_vistas->set_display("block_1");
$view_mas_vistas->set_arguments($array_mas_vistas);
$view_mas_vistas->pre_execute();
$view_mas_vistas->execute();
//$especiales_vistas = $view_mas_vistas->result;


?>
<div class="contenedor-principal container-fluid">
    <div class="container-fluid miga-de-pan">
        <?php
        if (!empty($GLOBALS["breadcrumb"])){
            $breadcrumb = $GLOBALS["breadcrumb"];
            print $breadcrumb;
        }
        ?>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="title-bloques"> 
						<h1>
							<span></span><?php print $node->title ?></div>
						</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <ul class='tags-especiales'>
                        <li><?php echo t( 'Most recent' ); ?></li>
                        <li><?php echo t( 'Most views' ); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid cajas-especiales tab-recientes">
        <div class="container">
           <?php print $view_mas_recientes->render()?>
        </div>
    </div>

    <div class="container-fluid cajas-especiales tab-mas-vistas">
        <div class="container">
            <?php print $view_mas_vistas->render()?>
        </div>
    </div>
</div>
<div class="container-fluid block-views-vista-anuncios-home-block">
    <div class="container">
        <?php
        $block = module_invoke('views', 'block_view', 'vista_anuncios_home-block');
        print render($block['content']);
        ?>
    </div>
</div>

<div class="container-fluid compartir-redes">
    <div class="container">
        <div class="linea-100"></div>
        <?php
        $block = module_invoke('block', 'block_view', '3');
        print render($block['content']);
        ?>
        <?php
        /*if ($service_links_rendered):
            print $service_links_rendered;
        endif;*/
        ?>
    </div>
</div>

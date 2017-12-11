<div class="container-fluid miga-de-pan">
    <div class="breadcrumb"> <div class="container">
            <span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span>
            <span class="delimiter">/</span>
        </div>
    </div>
</div>
<div class="container-fluid tag-titulo">
    <div class="container">
        <p class='tag-resultado'><?php print t("Contents with the tag:")?></p>
        <h1 class='tag-nombre'><?php print $term->name ?></h1>
    </div>
</div>
<div class="container-fluid container-tags">
    <div class="container">
        <?php
        $array = array( $term->tid );
        $view = views_get_view('vista_lista_maestra_8');
        $view->set_display("block_1");
        $view->set_arguments($array);
        $view->pre_execute();
        $view->execute();
        print $view->render();
        ?>
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

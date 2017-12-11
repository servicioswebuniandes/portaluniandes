<div class="miga-de-pan">
<h2 class="element-invisible">Usted está aquí</h2>
<div class="breadcrumb container contextual-links-region">
<span class="inline odd first">
<a href="/donaciones/">Home</a>
</span> 
<span class="delimiter">/</span> 
<?php 
$term = taxonomy_term_load($tid);
$name = $term->name;
?>
<span class="inline even last"><a href="<?php print url('taxonomy/term/'.$tid, array('absolute'=>true)); ?>"><?php print $name; ?></a></span>
</span>



</div>    

</div>

<section class="container tag-titulo">
    <p class='tag-resultado'><?php print t("Contents with the tag:")?></p>
    <h1 class='tag-nombre'><?php print $term->name ?></h1>
</section>

<section class="container-tags">
    <?php
    
    $array = array( $term->tid );
    $view = views_get_view('tags_donaciones');
    $view->set_display("block");
    $view->set_arguments($array);
    $view->pre_execute();
    $view->execute();
    ?>

    <section class="tag-content container">

        <?php
        foreach ($view->result as $tag) {
            $entity=$tag->_field_data['nid']['entity'];
            $img=file_create_url($entity->field_imagen_miniatura_noticias['und'][0]['uri']);
            $img_alt=$entity->field_imagen_miniatura_noticias['und'][0]['alt'];
            $img_title=$entity->field_imagen_miniatura_noticias['und'][0]['title'];
            ?>

            <article class="item-tag">
                <figure>
                    <a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>">
                    <img src="<?php print $img ?>" alt="<?php print $img_alt?>" title="<?php print $img_title?>">
                    </a>
                </figure>

                <section class="tag-description">
                    <p class="date-tag"><?php print date("j/m/Y",$entity->created) ?></p>
                    <h1 class="title-tag"><a href="<?php print url('node/'.$entity->nid, array('absolute'=>true)); ?>"><?php print $entity->title?></a> </h1>
                    <p class="txt-tag">
                        <?php 
                        if (isset($entity->field_descripcion_experiencia)){
                            print $entity->field_descripcion_experiencia['und'][0]['value'];
                        }else{
                            print $entity->field_descripcion_corta_noticias['und'][0]['value'];
                        }

                        ?>

                    </p>
                </section>
            </article>

            <?php

        }

print "<section class='pager container'>";
    print theme('pager'); 
    print "</section>";        ?>
    </section>

    <?php

    $view = views_get_view('vista_causas_integradas');
    $view->set_display("block");
    $view->pre_execute();
    $view->execute();
    print $view->render();


    ?>
</section>


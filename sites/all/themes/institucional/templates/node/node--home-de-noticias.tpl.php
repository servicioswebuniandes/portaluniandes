<?php
global $language;

$idioma=$language->language;
?>

<script type="text/javascript">
    
jQuery(document).ready(function(){

var uri=window.location.pathname.substr(1);

if(uri=="es/noticias" || uri=="es/noticias/"){
    uri="noticias/arte-cultura-y-humanidades";
}

if(uri=="en/news" || uri=="en/news/"){
    uri="en/news/art-culture-and-humanity";
}

var i=0;
var tipo='&t=r';
jQuery('.pagination li').each(function(){

      if(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next') || jQuery(this).hasClass('pager-first') || jQuery(this).hasClass('pager-last') ) {

      }else{
        if(i==0){
             jQuery(this).find('a').attr('href', '/'+uri);

        }else{
            var obje=jQuery(this).find('a');
            var num=obje.text();
            jQuery(this).find('a').attr('href', '/'+uri+'?page='+(num-1)+tipo);
        }
        i++;

      }

if(jQuery(this).hasClass('pager-last') ) {
    tipo='&t=v';
    i=0;
      }


 


});




})


</script>

<div class="container-fluid miga-de-pan">
    <?php
    if (!empty($GLOBALS["breadcrumb"])){
        $breadcrumb = $GLOBALS["breadcrumb"];
        print $breadcrumb;
    }
    ?>
</div>

<div class="title-bloques"><h1> <span></span><?php print t( "News" )?></h1></div>
<div class="container-fluid contenedor-tabs">
    <div class="container">
                <?php 

$vista_categorias = views_get_view('home_noticias_categorias');
$vista_categorias->set_display("block");
$vista_categorias->pre_execute();
$vista_categorias->execute();
$result_categorias=$vista_categorias->result;
	
$request= $_SERVER['REQUEST_URI'];
if (isset($_GET['t'])) {
    $tipo_vista=$_GET['t'];
}else{
    $tipo_vista="r";
}

$request=str_replace("/es/", "/", $request);
$request=str_replace("/en/", "/", $request);

if ($idioma=="es") {
    $noticias="/noticias";
}else{
    $noticias="/news";
}




$explorar=true;
if($request==$noticias || $request==($noticias."/")){
   $explorar=false;


}

if(!$explorar){
	$i=0;
	foreach ($result_categorias as $item_categoria) {
		if($i==0){
		   $ruta=$item_categoria->field_field_path_noticias[0]['raw']['value'];
		   $padre=$item_categoria->field_field_path_noticias[0]['raw']['value'];
		   $i++;
		}   
	}
}else{
	$exp1=explode($noticias, $request);
	$exp_page=explode("?", $exp1[1]);

	if(count($exp_page)==2){
		$exp1[1]=$exp_page[0];
	}


	$exp2=explode("/",$exp1[1]);

    if ($idioma=="es") {
            $ruta="noticias/".$exp2[1];
    }else{
            $ruta="news/".$exp2[1];
    }


	if(!empty($exp2[2])){
		$ruta.="/".$exp2[2];
	}


    if ($idioma=="es") {
    $padre="noticias/".$exp2[1];
    }else{
    $padre="news/".$exp2[1];
    }


	for ($i=0; $i <= count($exp2) ; $i++) { 
		if ($exp2[$i]==""){
			unset($exp2[$i]);
		}
	}
	array_values($exp2);

	if(count($exp2)==2){
		$term_search=$exp2[1];
	}else{
		$term_search=$exp2[0];
	}
}

if ($idioma=="en"){
    $ruta="en/".$ruta;
if($request!=$noticias && $request!=($noticias."/")){
    $padre="en/".$padre;
    
}
}






//---------------//
$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'taxonomy_term')
    ->fieldCondition('field_path_noticias', 'value',$ruta , '=');
$result = $query->execute();

foreach ($result['taxonomy_term'] as $key) {
$childer_term=$key->tid;
}


$padre_query = new EntityFieldQuery();
$padre_query->entityCondition('entity_type', 'taxonomy_term')
    ->fieldCondition('field_path_noticias', 'value',$padre , '=');
$result_padre = $padre_query->execute();


foreach ($result_padre['taxonomy_term'] as $key) {
	$padre_term=$key->tid;
}

$info_taxonomy= taxonomy_term_load($childer_term);
$info_taxonomy_padre= taxonomy_term_load($padre_term);

$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'taxonomy_term')
    ->fieldCondition('field_categoria', 'tid',$padre_term , '=')
    ->propertyOrderBy('name', 'ASC')
	->propertyCondition('language', $language->language, '=');;
$hijos = $query->execute();



?>

<div id="quicktabs-tab_home_noticias" class="quicktabs-wrapper quicktabs-style-nostyle jquery-once-2-processed">
	<ul class="quicktabs-tabs quicktabs-style-nostyle">
	<?php 
	foreach ($result_categorias as $item_categoria) {
		?>
		<li class="<?php 
		if ($item_categoria->taxonomy_term_data_name==$info_taxonomy_padre->name) {
			print "active";
		}
		 ?>">
			<a class="active ajax-processed quicktabs-loaded jquery-once-3-processed" href="/<?php print $item_categoria->_field_data['tid']['entity']->field_path_noticias['und'][0]['value']?>"><?php print $item_categoria->taxonomy_term_data_name ?></a>
		</li>

	<?php
	}
	?>

	</ul>
</div>


<div id="quicktabs-tab_home_noticias" class="quicktabs-wrapper quicktabs-style-nostyle jquery-once-2-processed">
	<ul class="quicktabs-tabs-second">
	<?php 
	$subcategoria=false;
	$i=0;
	$existe=false;
	foreach ($hijos['taxonomy_term'] as $hijo) {
	 $taxonomy= taxonomy_term_load($hijo->tid);
	  if ($taxonomy->name==$info_taxonomy->name) {
			$existe=true;
		}

	}

	foreach ($hijos['taxonomy_term'] as $hijo) {
		if($i==0){
			$primer_hijo=$hijo->tid;
		}
		$taxonomy= taxonomy_term_load($hijo->tid);

		?>
		  <li class="<?php 
		  if($existe){
			if ($taxonomy->name==$info_taxonomy->name) {
			$subcategoria=true;
			print "active";
			 }
		  }else{
			if($i==0){
				print "active";
			}

		  }

		
		 ?>">
			<a class="active ajax-processed quicktabs-loaded jquery-once-3-processed" href="/<?php print $taxonomy->field_path_noticias['und'][0]['value']?>"><?php print $taxonomy->name ?></a>
		</li>


	<?php
	 $i++;
	}?>

	</ul>
</div>



<?php
if($subcategoria){
     $tid_actual=$childer_term;
}else{
    $tid_actual=$primer_hijo;
}

$array_no_destacadas = array($tid_actual);
$view_no_destacadas = views_get_view('vista_noticias_home_noticias');
$view_no_destacadas->set_display("block");
$view_no_destacadas->set_arguments($array_no_destacadas);
$view_no_destacadas->pre_execute();
$view_no_destacadas->execute();
$resultados_no_destacadas = $view_no_destacadas->result;


$array_destacadas = array($tid_actual);
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
			<?php
				//Validamos si existe estacados			
				if (empty($resultados_destacadas)){
					$array_destacadas = array($tid_actual);
					$view_destacadas_temp = views_get_view('vista_noticias_home_noticias');
					$view_destacadas_temp->set_display("block_2");
					$view_destacadas_temp->set_arguments($array_destacadas);
					$view_destacadas_temp->pre_execute();
					$view_destacadas_temp->execute();
					$resultados_destacadas = $view_destacadas_temp->result;
					//$resultados_destacadas=$resultados_no_destacadas;
				}
            ?>
			
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
                            <a href="/<?php print drupal_get_path_alias( 'node/' . $noticia_destacada->nid)?>">
                            <img src="<?php print file_create_url( $noticia_destacada->field_imagenes_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_destacada->field_imagenes_noticias["und"][0]["title"] ?>" >
                            </a>
                            <?php }
                            else {
                                if ($noticia_destacada->field_videos_noticias_v2) {

                                    $cadena = $noticia_destacada->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];

                                    $fuente = 0;

                                    $iframe = '';

                                    $identificador = '';

                                    if (strpos($cadena, 'youtu') !== false) {
                                        $fuente = 1;
                                    }
                                    if (strpos($cadena, 'vimeo') !== false) {
                                        $fuente = 2;
                                    }
                                    if (strpos($cadena, 'ustream') !== false) {
                                        $fuente = 3;
                                    }

                                    if ($fuente == 1){

                                        if (strpos($cadena,'youtu.be') !== false){
                                            $identificador = str_replace("https://youtu.be/","",$cadena);
                                        }
                                        if (strpos($cadena,'watch') !== false){
                                            $identificador = str_replace("https://www.youtube.com/watch?v=","",$cadena);
                                        }
                                        if (strpos($cadena,'embed') !== false){
                                            $identificador = str_replace("https://www.youtube.com/embed/","",$cadena);
                                        }

                                        $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '"></iframe>';
                                    }
                                    if ($fuente == 2){

                                        if (strpos($cadena,'player') !== false){
                                            $identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
                                        }
                                        else{
                                            $identificador = str_replace("https://vimeo.com/","",$cadena);
                                        }

                                        $iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                                    }
                                    if ($fuente == 3){

                                        $identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);

                                        $iframe = '<iframe width="480" height="270" src="http://www.ustream.tv/embed/'. $identificador .'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>';
                                    }

                                    print $iframe;
                                }
                            }
                            ?>
                        </div>
                    </section>
                    <section>
                        <div class="row">
                            <div class='col-md-8'>


                                <a class='multi-titulo' href="<?php print url( 'node/' . $noticia_destacada->nid, array('absolute' => true)) ?>"><?php print $noticia_destacada->title ?></a>
                                <div class="linea-titulo"></div>
                                <?php if (!empty($noticia_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'><?php 
                                  if(strlen($noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"])>150){
                                    print drupal_substr($noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"],0,150)."...";
                                  }  else{
                                    print $noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"];
                                  }

                                



                                ?></p>
                                <?php } ?>
                            </div>
                            <div class='col-md-4'>
                                <?php if (!empty($noticia_destacada->field_fecha_creacion_noticias)){ ?>

                                    <p class='multi-fecha'><?php echo date( "d/m/Y", $noticia_destacada->created ) ?></p>
                                <?php } ?>
                                <?php if (!empty($noticia_destacada->field_boton_noticia)){ ?>
                                <a href="/<?php print $noticia_destacada->field_boton_noticia["und"][0]["url"]?>" class='multi-enlace'><?php print $noticia_destacada->field_boton_noticia["und"][0]["title"]?></a>
                                <?php }
                                else {
                                    $url_boton = url( 'node/' . $noticia_destacada->nid, array('absolute' => true));
                                ?>
                                <a href="<?php print $url_boton ?>" class='multi-enlace'>Ver más</a>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php 
			}
			?>
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
                                    <a href="/<?php print drupal_get_path_alias( 'node/' . $noticia_no_destacada->nid)?>">
                                    <img src="<?php print file_create_url( $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["uri"] ) ?>" class='img-responsive' alt="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["alt"] ?>" title="<?php print $noticia_no_destacada->field_imagen_miniatura_noticias["und"][0]["title"] ?>" >
                                    </a>
                                <?php } ?>
                            </div>
                        </section>
                        <section>
                            <?php if (!empty($noticia_no_destacada->field_fecha_creacion_noticias)){ ?>
                                <p class='multi-fecha'><?php echo date( "d/m/Y", $noticia_no_destacada->created ) ?></p>
                            <?php } ?>
                            <a class='multi-titulo' href="<?php print url( 'node/' . $noticia_no_destacada->nid, array('absolute' => true)) ?>"> <?php print $noticia_no_destacada->title?> </a>
                            <?php if (!empty($noticia_no_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'>
                                <?php 
                                  if(strlen($noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"])>150){
                                    print drupal_substr($noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"],0,150)."...";
                                  }  else{
                                    print $noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"];
                                  }




                                ?>
                                    
                                </p>
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

                                        $cadena = $noticia_destacada->field_videos_noticias_v2["und"][0]["image_field_caption"]["value"];

                                        $fuente = 0;

                                        $iframe = '';

                                        $identificador = '';

                                        if (strpos($cadena, 'youtu') !== false) {
                                            $fuente = 1;
                                        }
                                        if (strpos($cadena, 'vimeo') !== false) {
                                            $fuente = 2;
                                        }
                                        if (strpos($cadena, 'ustream') !== false) {
                                            $fuente = 3;
                                        }

                                        if ($fuente == 1){

                                            if (strpos($cadena,'youtu.be') !== false){
                                                $identificador = str_replace("https://youtu.be/","",$cadena);
                                            }
                                            if (strpos($cadena,'watch') !== false){
                                                $identificador = str_replace("https://www.youtube.com/watch?v=","",$cadena);
                                            }
                                            if (strpos($cadena,'embed') !== false){
                                                $identificador = str_replace("https://www.youtube.com/embed/","",$cadena);
                                            }

                                            $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '"></iframe>';
                                        }
                                        if ($fuente == 2){

                                            if (strpos($cadena,'player') !== false){
                                                $identificador = str_replace("https://player.vimeo.com/video/","",$cadena);
                                            }
                                            else{
                                                $identificador = str_replace("https://vimeo.com/","",$cadena);
                                            }

                                            $iframe = '<iframe src="https://player.vimeo.com/video/'.$identificador.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                                        }
                                        if ($fuente == 3){

                                            $identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);

                                            $iframe = '<iframe width="480" height="270" src="http://www.ustream.tv/embed/'. $identificador .'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>';
                                        }

                                        print $iframe;
                                    }
                                }
                                ?>
                            </div>
                        </section>
                        <section>
                            <?php if (!empty($noticia_destacada->field_fecha_creacion_noticias)){ ?>
                                <p class='multi-fecha'><?php echo date( "d/m/Y", $noticia_destacada->created) ?></p>
                            <?php } ?>
                            <a class="multi-titulo" href="<?php print url( 'node/' . $noticia_destacada->nid, array('absolute' => true)) ?>"> <?php print $noticia_destacada->title?> </a>
                            <?php if (!empty($noticia_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'><?php print drupal_substr($noticia_destacada->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?></p>
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
                            <a class="multi-titulo" href="<?php print url( 'node/' . $noticia_no_destacada->nid, array('absolute' => true)) ?>"> <?php print $noticia_no_destacada->title?> </a>
                            <?php if (!empty($noticia_no_destacada->field_descripcion_corta_noticias)){ ?>
                                <p class='multi-descripcion'><?php print drupal_substr($noticia_no_destacada->field_descripcion_corta_noticias["und"][0]["value"],0,150) ?></p>
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
                <li class="mas-recientes <?php if ($tipo_vista=='r'){print 'active';}?>"><?php print t("More Recent")?></li>
                <li class="mas-vistas <?php if ($tipo_vista=='v'){print 'active';}?>"><?php print t("More Views")?></li>
            </ul>
        </div>

        <div class="container-fluid vista_noticias_mas_recientes" <?php if($tipo_vista=='r'){ print "style='display:block;'";} ?> >
            <div class="container">
            <div class="view view-home-noticias-mas-vistos-y-mas-recientes view-id-home_noticias_mas_vistos_y_mas_recientes view-display-id-block view-dom-id-77f70d5e7da844540753e0456f79737c">
            <div class="view-content">
                <?php
                $array_mas_recientes = array($tid_actual);
                $view_mas_recientes = views_get_view('home_noticias_mas_vistos_y_mas_recientes');
                $view_mas_recientes->set_display("block");
                $view_mas_recientes->set_arguments($array_mas_recientes);
                if($tipo_vista!='r'){
                $view_mas_recientes->set_current_page(0);
                }
                $view_mas_recientes->pre_execute();
                $view_mas_recientes->execute();
                $result_recientes=$view_mas_recientes->result;


                $i=0;
                foreach ($result_recientes as $item) {

                ?>
<?php 
$url_noticia=url( 'node/' . $item->nid, array('absolute'=>true));
$imagen_miniatura=file_create_url($item->_field_data['nid']['entity']->field_imagen_miniatura_noticias['und'][0]['uri']);
?> 

                <div class="views-row views-row-<?php print $i;?> views-row-odd views-row-first solo-texto-<?php print $item->_field_data['nid']['entity']->field_mostrar_solotexto_noticias['und'][0]['value']?> es-multimedia-<?php print $item->_field_data['nid']['entity']->field_multimedia_noticias['und'][0]['value']?>  es-not-destacada-<?php print $item->_field_data['nid']['entity']->field_es_not_des_noticias['und'][0]['value']?> ">
      
  <div class="views-field views-field-nothing">        <span class="field-content"><div class="solo-texto-0 es-multimedia-0 es-not-destacada-0">
   <div class="views-field views-field-field-imagen-miniatura-noticias">
      <span class="views-label views-label-field-imagen-miniatura-noticias">Imagen miniatura: </span>
      <div class="field-content">
<a href="<?php print $url_noticia; ?>"><img typeof="foaf:Image" class="img-responsive" src="<?php print $imagen_miniatura; ?>" width="416" height="258" alt="Campus, arquitectura, universidad" title="Campus, arquitectura, universidad"></a>         
      </div>
   </div>
   <div class="views-field views-field-created">
      <span class="views-label views-label-created">Post date: </span>
      <span class="field-content"><?php 
      $date = new DateTime($item->_field_data['nid']['entity']->field_fecha_creacion_noticias['und'][0]['value']);
      print $date->format('d/m/Y');

      ?></span> 
   </div>
   <div class="views-field views-field-title">  
      <a href="<?php print $url_noticia; ?>"><?php print $item->_field_data['nid']['entity']->title   ?></a> 
   </div>
   <div class="views-field views-field-field-sub-titulo-noticias">
      <span class="views-label views-label-field-sub-titulo-noticias">Subtitulo: </span>  
      <div class="field-content">
      <?php

        if(strlen($item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'])>150){
                                    print drupal_substr($item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'],0,150)."...";
                                  }  else{
                                    print $item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value'];
                                  }

       ?>
           


       </div>
   </div>
   <div class="views-field views-field-field-boton-noticia">
      <span class="views-label views-label-field-boton-noticia">Boton: </span>   
      <div class="field-content">

     <?php 
    if(isset($item->_field_data['nid']['entity']->field_boton_noticia['und'])){
    ?>

      <a href="<?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['url']?>">
      <?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['title']?></a>
    <?php 
    }else{?>
 <a href="<?php print $url_noticia; ?>">
      <?php print t("View more"); ?></a>
    <?php 
    }
    ?>


      </div>
   </div>  
</div></span>  </div>  </div>




				<?php
                $i++;
                }















                print theme('pager'); 
                ?>
            </div>
            </div>
            </div>
        </div>


        <div class="container-fluid vista_noticias_mas_vistas" <?php if($tipo_vista=='v'){ print "style='display:block;'";} ?> >
                   <div class="container">
            <div class="view view-home-noticias-mas-vistos-y-mas-recientes view-id-home_noticias_mas_vistos_y_mas_recientes view-display-id-block view-dom-id-77f70d5e7da844540753e0456f79737c">
            <div class="view-content">
                <?php

                $array_mas_vistas = array($tid_actual);
                $view_mas_vistas = views_get_view('home_noticias_mas_vistos_y_mas_recientes');
                $view_mas_vistas->set_display("block_1");
                $view_mas_vistas->set_arguments($array_mas_vistas);
                if($tipo_vista!='v'){
                $view_mas_vistas->set_current_page(0);
                }
                $view_mas_vistas->pre_execute();
                $view_mas_vistas->execute();
                $result_vistas=$view_mas_vistas->result;


                $i=0;
                foreach ($result_vistas as $item) {

                ?>
<?php 
$url_noticia=url( 'node/' . $item->nid, array('absolute'=>true));

$imagen_miniatura=file_create_url($item->_field_data['nid']['entity']->field_imagen_miniatura_noticias['und'][0]['uri']);
?> 

                <div class="views-row views-row-<?php print $i;?> views-row-odd views-row-first solo-texto-<?php print $item->_field_data['nid']['entity']->field_mostrar_solotexto_noticias['und'][0]['value']?> es-multimedia-<?php print $item->_field_data['nid']['entity']->field_multimedia_noticias['und'][0]['value']?>  es-not-destacada-<?php print $item->_field_data['nid']['entity']->field_es_not_des_noticias['und'][0]['value']?> ">
      
  <div class="views-field views-field-nothing">        <span class="field-content"><div class="solo-texto-0 es-multimedia-0 es-not-destacada-0">
   <div class="views-field views-field-field-imagen-miniatura-noticias">
      <span class="views-label views-label-field-imagen-miniatura-noticias">Imagen miniatura: </span>
      <div class="field-content">
<a href="<?php print $url_noticia; ?>"><img typeof="foaf:Image" class="img-responsive" src="<?php print $imagen_miniatura; ?>" width="416" height="258" alt="Campus, arquitectura, universidad" title="Campus, arquitectura, universidad"></a>         
      </div>
   </div>
   <div class="views-field views-field-created">
      <span class="views-label views-label-created">Post date: </span>
      <span class="field-content"><?php 
      $date = new DateTime($item->_field_data['nid']['entity']->field_fecha_creacion_noticias['und'][0]['value']);
      print $date->format('d/m/Y');

      ?></span> 
   </div>
   <div class="views-field views-field-title">  
      <a href="<?php print $url_noticia; ?>"><?php print $item->_field_data['nid']['entity']->title   ?></a> 
   </div>
   <div class="views-field views-field-field-sub-titulo-noticias">
      <span class="views-label views-label-field-sub-titulo-noticias">Subtitulo: </span>  
      <div class="field-content"><?php print $item->_field_data['nid']['entity']->field_descripcion_corta_noticias['und'][0]['value']   ?></div>
   </div>
   <div class="views-field views-field-field-boton-noticia">
      <span class="views-label views-label-field-boton-noticia">Boton: </span>   
      <div class="field-content">

     <?php 
    if(isset($item->_field_data['nid']['entity']->field_boton_noticia['und'])){
    ?>

      <a href="<?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['url']?>">
      <?php print $item->_field_data['nid']['entity']->field_boton_noticia['und'][0]['title']?></a>
    <?php 
    }else{?>
 <a href="<?php print $url_noticia; ?>">
      <?php print t("See more"); ?></a>
    <?php 
    }
    ?>


      </div>
   </div>  
</div></span>  </div>  </div>




                <?php
                $i++;
                }















                print theme('pager'); 
                ?>
            </div>
            </div>
            </div>



        </div>








    </div>
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


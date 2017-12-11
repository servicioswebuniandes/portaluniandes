<?php 




$modulos = array($node->field_modulo_slider['und'][0]['value'] =>  "slider",
	$node->field_modulo_descriptivo['und'][0]['value'] =>  "descriptivo",
	$node->field_modulo_banner_informativo['und'][0]['value'] =>  "cifras",
	$node->field_modulo_informativo['und'][0]['value'] =>  "informativo",
	$node->field_modulo_multimedia['und'][0]['value'] =>  "multimedia",
	$node->field_modulo_formulario['und'][0]['value'] => "formulario"
	);
ksort($modulos);
unset($modulos[0]);


foreach ($modulos as $key ) {

	switch ($key) {

		case 'formulario':
		formulario_module($node);
		break;	
		case 'slider':
		print render(field_view_field('node', $node, 'field_slide_donaciones'));		

		break;		
		
		case 'descriptivo':
		descriptivo_module($node);
		break;

		case 'cifras':		
		cifras_module($node);
		break;
		
		case 'multimedia':
		print '<section class="section-multimedia">';
		print '<h1 class="container">'.$node->field_titulo_multimedia['und'][0]['value']."</h1>";
		print render(field_view_field('node', $node, 'field_videos'));	
		print '</section>';			
		break;
		
		case 'informativo':
		print "<section class='container informativo'>";
		print "<h1>".$node->field_titulo_informativo_centrad['und'][0]['value']."</h1>";
		print render(field_view_field('node', $node, 'field_bloques_informativos'));		
		print "</section>";	
		break;
		
		default:
		break;
	}
	
	
}


function formulario_module($node){
if (empty($node->field_codigo_causa['und'][0]['value'])){
    $codigo="PE20@SEQESGENUE";
  }else{
    $codigo=trim($node->field_codigo_causa['und'][0]['value']);
  }

  if($node->field__aplica_recurrencia_['und'][0]['value']==1){
    $rec=1;
  }else{
    $rec=0;
  }
?>
  <section class="donate-form" id="hacer-la-donacion">
      <article class="container">
        <h1>Donar a <?php print $node->title?></h1>
        <iframe  id="myIframe" scrolling=“no” src="<?php print $node->field_url_formulario['und'][0]['value']?>" width="100%" height=""></iframe>

<script type="text/javascript">
window.addEventListener('message', function(e) {
  var iframe = jQuery("#myIframe");
  var eventName = e.data[0];
  console.log("data:"+e.data);
  var data = e.data[1];
	switch(eventName) {
		case 'setHeight':
			console.log('setHeight: ' + data);
			iframe.height(data);
		break;
		/*jholguin - INI*/
		case 'scrollTo':
			console.log('scroll');
			jQuery('html,body').animate({scrollTop: jQuery(".donate-form h1").offset().top},'slow');
		break
		/*jholguin - FIN*/
	}
}, false);



</script>

      </article>
    </section>
      </article>
    </section>
<?php
}



function cifras_module($node){
	$imagen=$node->field_imagen_fondo_cifras['und'][0];
print '<section class="section-nuestros-programas" style="background: url('.file_create_url($imagen['uri']).') ">		
		<article class="container content-cifras">
				<section class="col-lg-6 col-md-6 col-sm-6">
		<h2>'.$node->field_titulo_cifras['und'][0]['value'].'</h2>
		<p>'.$node->field_descripcion_cifras['und'][0]['value'].'</p>';
	foreach ($node->field_imagenes_cifras['und'] as $imagen) {
		print "<figure><img src='".file_create_url($imagen['uri'])."' alt='".$imagen['alt']."' title='".$imagen['title']."'>
		<figcaption><p>
			".$imagen['image_field_caption']['value']."
		</p></figcaption>


	</figure>";


}

print "</section>";
print '<section class="col-lg-6 col-sm-6 col-md-6 article-site">';
print '<ul class="list-campanas">';
for ($i=0; $i <count($node->field_etiqueta_cifras['und']) ; $i++) { 	
	print "<li><span>".$node->field_cifra['und'][$i]['value']."</span><p>".$node->field_etiqueta_cifras['und'][$i]['value']."</p></li>";
}
print '</ul>';
print '</section>';
print '</article>';
print '</section>';



}

function descriptivo_module($node){
	print '<section class="container">';
	print '<section class="section-Banner-mobile">';
	
	for ($i=0; $i <count($node->field_titulo_descriptivo['und']) ; $i++) {
		print '<article class="col-lg-6 col-md-6 col-sm-6 article-campanas">';
		$existe_video=false;
		if (!empty($node->field_url_video_descriptivo['und'][$i])){
			$existe_video=true;

			$cadena = $node->field_url_video_descriptivo["und"][$i]["value"];

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

			if (strpos($cadena, 'facebook') !== false) {
				$fuente = 4;
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

				$iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '" allowfullscreen></iframe>';
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

			if ($fuente == 4){
				$iframe = '<div class="fb-video" data-href="'.$cadena.'"  
				data-allowfullscreen="true" data-width="1024"></div>';
			}


			if ($fuente == 3){

				if (strpos($cadena,'channel') !== false){
					$identificador = str_replace("http://www.ustream.tv/channel/","",$cadena);
				}
				else if (strpos($cadena,'recorded') !== false){
					$identificador = str_replace("http://www.ustream.tv/embed/recorded/","",$cadena);
				}



				$iframe = '<iframe width="480" height="270" src="https://www.ustream.tv/embed/recorded/'.$identificador.'" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe><a href="https://www.ustream.tv/services" title="Video production powered by Ustream" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: left;" target="_blank">Video Production</a>';
			}
			print $iframe;
			if (!empty($node->field_imagen_descriptivo['und'][$i])) {
				if ($i==1){
					$id_img="id='img_desktop2'";
				}else{
					$id_img="id='img_desktop'";
				}
print "<img ".$id_img." src='".file_create_url($node->field_imagen_descriptivo['und'][$i]['uri'])."' alt='".$node->field_imagen_descriptivo['und'][$i]['alt']."' style='display:none' title='".$node->field_imagen_descriptivo['und'][$i]['title']."'>";
			}
		}

		if (!empty($node->field_imagen_descriptivo) && $existe_video==false ){
			
			print "<figure><img src='".file_create_url($node->field_imagen_descriptivo['und'][$i]['uri'])."' alt='".$node->field_imagen_descriptivo['und'][$i]['alt']."' title='".$node->field_imagen_descriptivo['und'][$i]['title']."'>";

		}
		if ($i==1){
	$fb="btn_share_fb_campaign";
	$lk="btn_share_lk_not";
	$tw="btn_share_tw_not";
	$desc="description2";
}else{
	$fb="btn_share_fb";
	$lk="btn_share_lk";
	$tw="btn_share_tw";
	$desc="description";
}



	print "<h2>".$node->field_titulo_descriptivo['und'][$i]['value']."</h2>";
	print "<p id=".$desc." >".$node->field_descripcion_descriptivo['und'][$i]['value']."</p>";

print '
		<ul class="redes-sociales">
		<li class="Title">Compartir</li>
        <li><img id='.$fb.' alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
        <li><img id='.$tw.' alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
        <li><img id='.$lk.' alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
        </ul>
		';
		print "</article>";

		
	}
	print '</section>';
print '</section>';

}

?>

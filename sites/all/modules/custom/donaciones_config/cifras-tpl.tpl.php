<?php 
global $language;

if($language->language=="en"){

$nombre_metas=variable_get('nombre_metas_ingles');
$texto_cifras=variable_get('texto_cifras_ingles');	
$nombre_beneficiados=variable_get('nombre_beneficiados_ingles');
$nombre_donaciones=variable_get('nombre_donaciones_ingles');	
$texto_interna_subtitulo=variable_get('texto_interna_subtitulo_ingles');
$texto_interna_titulo=variable_get('texto_interna_titulo_ingles');

}else{

$nombre_metas=variable_get('nombre_metas');
$texto_cifras=variable_get('texto_cifras');	
$nombre_beneficiados=variable_get('nombre_beneficiados');
$nombre_donaciones=variable_get('nombre_donaciones');	
$texto_interna_subtitulo=variable_get('texto_interna_subtitulo');
$texto_interna_titulo=variable_get('texto_interna_titulo');

}

?>


	<article class="txt-quantity">
		<div class="container">
			<h1><?php print t("Numbers") ?></h1>
			
			<p><?php print t($texto_cifras)?></p>
			<div class="list-quantity">

				<?php if ($check_donaciones){?>
				<div class="item-list-quantity">
					<p class="txt-list-quantity">
						<span class="txt-number"><?php print $numero_donaciones?></span>
					</p>
					<p class="title-list-quantity"><?php print $nombre_donaciones?></p>
				</div>
				<?php 
				}
				?>

				<?php if ($check_beneficiados){?>									
				<div class="item-list-quantity">
					<p class="txt-list-quantity">
						<span class="txt-number"><?php print $numero_beneficiados?></span>
					</p>
					<p class="title-list-quantity"><?php print $nombre_beneficiados?></p>
				</div>
				<?php 
				}
				?>

				<?php if ($check_metas){?>									
				<div class="item-list-quantity">
					<p class="txt-list-quantity">
						<span class="txt-number"><?php print $numero_metas?></span>
					</p>
					<p class="title-list-quantity"><?php print $nombre_metas?></p>
				</div>
				<?php 
				}
				?>

			</div>

			<div class="btn-block">
			<?php 
			  if ($language->language=="es") {
                $url="/es/donaciones/impacto";
            }else{
                $url="/en/donations/impact";
            }



			?>
				<a class="btn-default btn-white btn-cifras" href="<?php print $url ?>"><?php print t('View more')?></a>
				

			</div>

		</div> <!-- container -->
	</article>




<?php
global $language;
$resultados = $view->result;


if (!empty($resultados)){
	?>
		<article class="people_benefited container">
			<h1><?php print t('Beneficiaries')?></h1>

			<section class="list-people-benefited">

				<?php 
				foreach ($resultados as $item) {
					$beneficiado=$item->_field_data['nid']['entity'];
					$foto=file_create_url($beneficiado->field_foto_donante['und'][0]['uri']);


					?>

					<article class="item-list-people-benefited">
						<figure>
							<a href="<?php print url( 'node/' . $beneficiado->nid, array('absolute'=>true)); ?>">
							<img src="<?php print $foto; ?>" alt="<?php print $beneficiado->field_foto_donante['und'][0]['alt'] ?>" title="<?php print $beneficiado->field_foto_donante['und'][0]['title'] ?>" caption="<?php print $beneficiado->field_foto_donante['und'][0]['image_field_caption']['value'] ?>">
							</a>		
						</figure>
					
						<div class="txt-people-benefited">
											<a href="<?php print url( 'node/' . $beneficiado->nid, array('absolute'=>true)); ?>">
							<p class="name-benefited"><?php print $beneficiado->title ?></p>
							</a>
							<p class="testimony-benefited">						
								<?php 
								if(strlen($beneficiado->field_descripcion_experiencia['und'][0]['value'])>140){
									print drupal_substr($beneficiado->field_descripcion_experiencia['und'][0]['value'],0,430)."...";
								}  else{
									print $beneficiado->field_descripcion_experiencia['und'][0]['value'];
								}
								?>
							</p>
						</div> <!-- txt-people-benefited -->
					</article> <!-- item-list-people-benefited -->

					<?php 
				}
			}
			?>
		</section>
	</article> <!-- block-principal-campaign -->


<div class="btn-block line-green">
	<?php
	  if ($language->language=="es") {
                $url="/es/donaciones/beneficiarios";
            }else{
                $url="/en/donations/beneficiaries";
            }

	?>
	<a class="btn-default btn-border-green btn-view-beneficiarios" href="<?php print $url ?>"><?php echo t( "View more beneficiaries" ) ?> </a>
</div>



<?php 

$nodo=$element['#object'];
$field_bloque=$nodo->field_bloques_informativos['und'];


?>
<section class="slider-informativo">

	<?php
	foreach ($field_bloque as $bloque) {

		?>

		<article class="item-slide-informativo">
			<h2><?php print $bloque['entity']->title ?></h2>

			<figure>
				<img src="<?php print file_create_url($bloque['entity']->field_asset_image['und'][0]['uri'])   ?>" alt="<?php print $bloque['entity']->field_asset_image['und'][0]['alt'] ?>" title="$bloque['entity']->field_asset_image['und'][0]['title']">	
			</figure>

			<section class="block-slide_informative">
				<p>
					<?php 
					print $bloque['entity']->field_descripcion_experiencia['und'][0]['value'];
					?> 
				</p>
			</section>
		</article>


		<?php
	}?>
</section>
<?php
?>

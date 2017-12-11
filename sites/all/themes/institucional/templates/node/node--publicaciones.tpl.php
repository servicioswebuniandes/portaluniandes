
<section class="breadcrumb">
	<article class="container">
		<span class="inline odd first"><?php print l( "Home", "<front>" ) ?></span> <span class="delimiter">/</span>
		<?php if( $node->language == es ){ ?>
		<span class="inline odd first"><?php print l( "Publicaciones", "publicaciones" ) ?></span> <span class="delimiter">/</span>
		<?php }else{ ?>
		<span class="inline odd first"><?php print l( "Publications", "publications" ) ?></span> <span class="delimiter">/</span>
		<?php } ?>
		<span class="inline odd first"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php echo $node->title ?></a></span> 
		<?php /* <span class="inline odd first"><?php print $node->title ?></span> */ ?>
	</article>
</section>

<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Book",
		"bookEdition": "<?php print $node->field_edicion['und'][0]['value'] ?>",  
		"bookFormat": "<?php print $node->field_formato_libro['und'][0]['value'] ?>",  
		"illustrator": "<?php echo $node->field_autor['und'][0]['value'] ?>",
		"author": "<?php echo $node->field_autor['und'][0]['value'] ?>",
		"isbn": "<?php print $node->field_isbn['und'][0]['value'] ?>",
		"numberOfPages": "<?php print $node->field_numero_paginas['und'][0]['value'] ?>"
		<?php if (!empty($node->field_about['und'][0])) {?>
		,"about":"<?php print $node->field_about['und'][0]['value']?>"
		<?php
		}?>
		<?php if (!empty($node->field_award['und'][0])) {?>
		,"award":"<?php print $node->field_award['und'][0]['value']?>"
		<?php
		}?>
		<?php if (!empty($node->field_character['und'][0])) {?>
		,"character":"<?php print $node->field_character['und'][0]['value']?>"
		<?php
		}?>
		<?php if (!empty($node->field_citation['und'][0])) {?>
		,"citation":"<?php print $node->field_citation['und'][0]['value']?>"
		<?php
		}?>

	}
</script>
<div class="container">
<section class="publication-detail">
	<header class="publication-detail_title">
		<h1><?php print $node->title ?></h1>
	</header>
	
	<aside class="publication_book-detail">
		<figure class="book-cover">
			<?php 
			$url_imagen=file_create_url($node->field_imagen_publicaciones['und'][0]['uri']);

			?>
			<img src="<?php print $url_imagen ?>" alt="<?php print $node->field_imagen_publicaciones['und'][0]['alt'] ?>" title="<?php  print $node->field_imagen_publicaciones['und'][0]['title'] ?>">
		</figure>

		<?php 
		if (!empty($node->field_boton_noticia['und'][0])){

			?>
			<footer class="book-price">
				<p><?php print t("Price :")?><span class="book_price"><?php print $node->field_precio_libro['und'][0]['value']?></span></p>
				<a href="<?php  print $node->field_boton_noticia['und'][0]['url'] ?>" target="_blank" class="btn-default btn-border-grey">
					<?php  print $node->field_boton_noticia['und'][0]['title']   ?>
				</a>
			</footer>

			<?php 
		}
		?>
	</aside>

	<article class="publication_book-txt">
		<header>
			<p class="book-author"><?php print t('Author:')?><span class="book-author_name"><?php print $node->field_autor['und'][0]['value'] ?></span></p>
			<p class="thematic-area"><?php print t('Thematic area:')?> <span class="thematic-area_title"><?php print $node->field_tematica['und'][0]['value'] ?></span></p>
			<p class="book-isbn">ISBN: <span class="book-isbn_number"><?php print $node->field_isbn['und'][0]['value'] ?></span></p>
		</header>

		<section class="book-detail_txt">
			<p>
				<?php 
				print $node->field_descripcion1_maestra_1['und'][0]['value'];
				?>
			</p>
		</section>

		<section class="book-content_txt">
			<h2><?php print t('Content:')?></h2>
			<p>
				<?php 
				print $node->field_texto_competo_noticias['und'][0]['value'];
				?>

			</p>

			<footer class="bibliographic-reference">
				<?php 
				if(!empty($node->field_editorial['und'][0])){
					?>
				<p class="book_editorial">Editorial : <?php print $node->field_editorial['und'][0]['value'] ?> </p>
				<?php 
				}
				?>
					<?php 
				if(!empty($node->field_edicion['und'][0])){
					?>
				<p class="book_edition"> <?php print t('Edition: ').$node->field_edicion['und'][0]['value'] ?></p>
				<?php 
				}
				?>
					<?php 
				if(!empty($node->field_fecha_publicacion_libro['und'][0])){
					?>
				<p class="book-publication_date"> <?php print t('Publication date: ').$node->field_fecha_publicacion_libro['und'][0]['value'] ?></p>
				<?php 
				}
				?>
					<?php 
				if(!empty($node->field_cubierta['und'][0])){
					?>
				<p class="book_cover"> <?php print t('Cover: ').$node->field_cubierta['und'][0]['value'] ?></p>
				<?php 
				}
				?>
					<?php 
				if(!empty($node->field_formato_libro['und'][0])){
					?>
				<p class="book_format"> <?php print t('Format: ').$node->field_formato_libro['und'][0]['value'] ?></p>
				<?php 
				}
				?>
					<?php 
				if(!empty($node->field_numero_paginas['und'][0])){
					?>
				<p class="book_pages"> <?php print t('Pages: ').$node->field_numero_paginas['und'][0]['value'] ?></p>
				<?php 
				}
				?>
					<?php 
				if(!empty($node->field_idioma_libro['und'][0])){
					?>
				<p class="book_language"> <?php print t('Language: ').$node->field_idioma_libro['und'][0]['value'] ?></p>
				<?php 
				}
				?>
					<?php 
				if(!empty($node->field_disponibilidad['und'][0])){
					?>
				<p class="book_availability"> <?php print t('Availability: ').$node->field_disponibilidad['und'][0]['value'] ?></p>
				<?php 
				}
				?>
			</footer>
		</section>
	</article>
</section>

</div>
<?php 
if (!empty($node->field_titulo_publicitario['und'][0])) {
?>
<section class="related-publication">
	<figure class="bg-related-publication">
		<img class="img-desktop" src="<?php print file_create_url($node->field_imagen_fondo_cifras['und'][0]['uri']) ?>" alt="<?php print $node->field_imagen_fondo_cifras['und'][0]['alt']?>" title="<?php print $node->field_imagen_fondo_cifras['und'][0]['title']?>">
		<img class="img-mobile" src="<?php print file_create_url($node->field_imagen_banner_mob_maestra4['und'][0]['uri']) ?>" alt="<?php print $node->field_imagen_banner_mob_maestra4['und'][0]['alt']?>" title="<?php print $node->field_imagen_banner_mob_maestra4['und'][0]['title']?>">
	</figure>

	<article class="detail-related-publication">
		<h1><?php print $node->field_titulo_publicitario['und'][0]['value']?></h1>
		<section class="content_related-publication">
			<p><?php print $node->field_descripcion_publicitario['und'][0]['value']?></p>
			<a href="<?php  print $node->field_boton_anuncio['und'][0]['url'] ?>" target="_blank" class="btn-default btn-black btn-view-more-publication">
				<?php  print $node->field_boton_anuncio['und'][0]['title']   ?>
			</a>
		</section>
	</article>
</section>

<?php 
}

?>


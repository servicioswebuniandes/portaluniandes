<?php $pseResp = (isset($_GET, $_GET['polTransactionState'], $_GET['polResponseCode'], $_GET['referenceCode'], $_SERVER['REDIRECT_QUERY_STRING']));?>
<section class="internal-banner gracias-donar">
	<article class="internal-txt-description">
		<?php
		if($pseResp){
			?>
			<h1><?php print $node->title ?></h1>
			<p><?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?></p>
			<?php 
			$frameUrl = variable_get('url_pse_callback',"") . "?{$_SERVER['REDIRECT_QUERY_STRING']}";
			echo "<iframe id='myIframe' scrolling='no' src='{$frameUrl}' style='margin: 0 auto;' width='100%' height=''></iframe>";?>
			<div class="btn-block ">
				<?php if (!empty($node->field_boton_noticia)){ ?>
					<a  
						<?php if(!empty($node->field_url_boton_banner['und'][0]['attributes']['target'])){
						print 'target="'.$node->field_url_boton_banner['und'][0]['attributes']['target'].'"';
						} ?> 
					class="btn-border-green btn-default"  
					href="<?php  print $node->field_boton_noticia["und"][0]["url"] ?>">
					<?php print $node->field_boton_noticia["und"][0]["title"]?>
					</a>
			<?php }
			else {?>
				<a class="btn-border-green btn-default"  href="/donaciones/causas" >Conoce más causas</a>
			<?php } ?>
			</div>
		<?php }else{?>
		<figure>
			<?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
				<img  id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >
			<?php } ?>
			<?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
				<img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >
			<?php } ?>		
		</figure>
		<div class="txt-internal-banner">
			<h1><?php print $node->title ?></h1>
			<p><?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?></p>
			<?php //verifica si tiene un token para mostrar le enlace de descarga de PDF
			if(isset($_GET, $_GET['token'], $_GET['pdf']) && $_GET['pdf']):?>
				<p>Puedes descargar tu recibo de pago <a href="<?php echo variable_get('url_pdf_download',"");?>?token=<?php echo $_GET['token']?>">aquí</a>.</p>
			<?php endif;?>
			<div class="btn-block ">
				<?php if (!empty($node->field_boton_noticia)){ ?>
					<a  
						<?php if(!empty($node->field_url_boton_banner['und'][0]['attributes']['target'])){
						print 'target="'.$node->field_url_boton_banner['und'][0]['attributes']['target'].'"';
						} ?> 
					class="btn-border-green btn-default"  
					href="<?php  print $node->field_boton_noticia["und"][0]["url"] ?>">
					<?php print $node->field_boton_noticia["und"][0]["title"]?>
					</a>
			<?php }
			else {?>
				<a class="btn-border-green btn-default"  href="/donaciones/causas" >Conoce más causas</a>
			<?php } ?>
			</div>
		</div>
		<?php }?>
	</article>
</section>
<script type="text/javascript">
window.addEventListener('message', function(e) {
	var iframe = jQuery("#myIframe");
	var eventName = e.data[0];
	console.log("data:"+e.data);
	var data = e.data[1];
	switch(eventName) {
		case 'setHeight':
		iframe.height(data);
		console.log(iframe.height(data));
		break;
	}
}, false);
<?php if($pseResp){ ?>
window.addEventListener('load',function(event){
	jQuery('body').addClass('ispse');
},false);
<?php } ?>
</script>

  <section class="internal-banner">
   <article>
    <figure>
     <?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
     <img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >

     <?php } ?>

     <?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
     <img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >

     <?php } ?>		</figure>

     <div class="txt-internal-banner">
       <h1><?php print $node->title ?></h1>
       <p id="description"><?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?>
       </p>
     </div>
   </article>
 </section>
<?php 
global $language;
if ($language->language=="es") {
    $donaciones="/es/donaciones";
    $id1="como-donar";
    $id2="hacer-la-donacion";    
    $id3="dona-en-el-exterior";    

}else{
    $donaciones="/en/donations";
    $id1="how-to-donate";
    $id2="make-a-donation";
    $id3="donate-from-outside-colombia";
}


?>
 <div class="miga-de-pan">
<div class="breadcrumb container contextual-links-region">
<span class="inline odd first">
      <a href="<?php print $donaciones ?>"><?php print t('Home')?></a>
</span> 
<span class="delimiter">/</span> 
<span class="inline even last"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php print $node->title?></a></span>
</span>



</div>    

</div>


 <section class="title-donate container" id="<?php print $id1  ?>">
   <h1><?php print $node->field_titulo_pequeno ['und'][0]['value']?></h1>
 </section>

<section class="txt-donate container" >
  <p><?php print $node->field_texto_principal_m7['und'][0]['value']?></p>
</section>

 <section class="list-donate container">
   <?php 
   for ($i=0; $i <count($node->field_titulo_donar_largo['und']); $i++) { 
    $icono=file_create_url($node->field_icono_donar['und'][$i]['uri']);
    $alt=$node->field_icono_donar['und'][$i]['alt'];
    $title=$node->field_icono_donar['und'][$i]['title'];
    if($i==(count($node->field_titulo_donar_largo['und'])-1)  ){
      $string=$id3;
    }
    ?>
    <article class="icon-list-item" id="<?php print $string; ?>">
      <figure>
        <img src="<?php print $icono ?>" alt="<?php print $alt ?>" title="<?php print $title ?>">
      </figure>
      <div class="txt-list-item">
        <h3>
        <?php 
        if($i==0){
          print "<a onclick=actualizarUrl('hacer-la-donacion') href='#' >";
          print $node->field_titulo_donar_largo['und'][$i]['value'];
          print "</a>";
        }else{
          print $node->field_titulo_donar_largo['und'][$i]['value'];
        }
        

        ?>
          
        </h3>
        <p><?php print $node->field_descripcion_donar_largo['und'][$i]['value']?></p>
      </div>
    </article> 

    <?php
  }
  ?>
</section>



<section class="donate-form" id="<?php print $id2  ?>">
  <article class="container">
    <h1><?php print $node->field_titulo_formulario['und'][0]['value'] ?></h1>
          <iframe  id="myIframe" scrolling=“no” src="<?php print $node->field_url_formulario['und'][0]['value']?>" width="100%" height=""></iframe>

<script type="text/javascript">
window.addEventListener('message', function(e) {
  var iframe = jQuery("#myIframe");
  var eventName = e.data[0];
  console.log("data:"+e.data);
  var data = e.data[1];
  switch(eventName) {
	console.log('setHeight: ' + data);
    case 'setHeight':
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





<?php 
$view = views_get_view('vista_causas_integradas');
$view->set_display("block");
$view->pre_execute();
$view->execute();
print $view->render();

?>



<div class="container-fluid compartir-redes">
  <div class="container">
    <div class="linea-100"></div>
    <p><?php print t('Share')?></p>
    <ul>
      <li><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
      <li><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
      <li><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
    </ul>
  </div>
</div>


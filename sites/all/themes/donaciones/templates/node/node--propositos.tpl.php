<section class="internal-banner">
  <article>
    <figure>
      <?php if (!empty($node->field_imagen_banner_maestra4)){ ?>
      <img id="img_desktop" src="<?php print file_create_url( $node->field_imagen_banner_maestra4["und"][0]["uri"] ) ?>" class='desktop-img' alt="<?php print $node->field_imagen_banner_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_maestra4["und"][0]["title"] ?>" >

      <?php } ?>

      <?php if (!empty($node->field_imagen_banner_mob_maestra4)){ ?>
      <img src="<?php print file_create_url( $node->field_imagen_banner_mob_maestra4["und"][0]["uri"] ) ?>" class='mobile-img' alt="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_banner_mob_maestra4["und"][0]["title"] ?>" >

      <?php } ?>        </figure>

      <div class="txt-internal-banner">
       <h1><?php print $node->title ?></h1>
       <p><?php print $node->field_descripcion_img_maestra4["und"][0]["value"] ?>
       </p>
     </div>
   </article>
 </section>

<?php 
global $language;
if ($language->language=="es") {
    $donaciones="/es/donaciones";
    $propositoUrl="/proposito";
    $id1="que-buscamos";
    $id2="a-quien-beneficia";
    $id3="beneficio-del-donante";
}else{
    $donaciones="/en/donations";
    $propositoUrl="/purpose";

    $id1="what-are-we-looking-for";
    $id2="who-does-your-donation-benefit";
    $id3="donating-also-benefits-you";
}


?>
 <div class="miga-de-pan">
  <div class="breadcrumb container contextual-links-region">
    <span class="inline odd first">
    <a href="<?php print $donaciones ?>"><?php print t('Home')?></a>
    </span> 
    <span class="delimiter">/</span> 
    <span class="inline even last"><a href="<?php print $donaciones.$propositoUrl?>"><?php print t('Purpose')?></a></span>
  </span>



</div>    

</div>


<section class="block-target-view" id="<?php print $id1 ?>">
 <div class="container">
  <article class="block-principal-target-view">

    <div class="item-target-view-figure">

      <?php 
      if(!empty($node->field_url_youtube_caja_list2)){
        $existe_video=true;

        $cadena = $node->field_url_youtube_caja_list2["und"][0]["value"];

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

          $iframe = '<iframe src="https://www.youtube.com/embed/'. $identificador . '?rel=0&amp;controls=1&amp;showinfo=1" allowfullscreen></iframe>';
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
      }

      if (!empty($node->field_imagen_maestra_1) && $existe_video==false ){
        $imagen=file_create_url($node->field_imagen_maestra_1["und"][0]["uri"]);
        ?>
        <figure>
          <img src="<?php print $imagen ?>" alt="<?php print $node->field_imagen_maestra_1["und"][0]["alt"] ?>" title="<?php print $node->field_imagen_maestra_1["und"][0]["title"] ?>">
        </figure>

        <?php


      }



      ?>


    </div>

    <div class="block-txt-target-view">
      <h2><?php print $node->field_titulo_objetivo['und'][0]['value']?></h2>
      <p><?php print $node->field_descripcion1_maestra_1['und'][0]['value']?></p>




    </div> <!-- block-txt-campaign -->
  </article> <!-- block-principal-campaign -->
</div>
</section>    


<section class="benefited-profile" id="<?php print $id2 ?>"> 
  <div class="container">
   <article class="txt-benefited-profile">
    <h1><?php print t('Who does your donation benefit?')?></h1>
    <p>
     <?php 
     print $node->field_texto_panel1_maestra2['und'][0]['value'];
     ?>
   </p>

   <?php    
   if (!empty($node->field_texto_panel_2_maestra2['und'][0]['value'])) {
    ?>

    <p>
     <?php 
     print $node->field_texto_panel_2_maestra2['und'][0]['value'];
     ?>
   </p>
   <?php
 }
 ?>







</article> 

<div class="list-benefited-people">

 <?php 
 for ($i=0; $i < count($node->field_titulo_tab['und']) ; $i++) { 

   ?>

   <div class="item-list-benefited-people">
     <figure>
      <img src="<?php print file_create_url($node->field_icono_proposito['und'][$i]['uri'] )?>" alt="<?php print file_create_url($node->field_icono_proposito['und'][$i]['alt'] )?>">
    </figure>
    <div class="txt-list-benefited-people">
      <p class="title-benefited-people"><?php print $node->field_titulo_tab['und'][$i]['value']  ?></p>
      <p class="txt-benefited-people"><?php print $node->field_body_tab['und'][$i]['value']  ?></p>

    </div>
  </div> <!-- item-list-benefited-people -->
  <?php 
}
?>

</div>
</section>




<section class="donor-benefits" id="<?php print $id3 ?>">
  <div class="container">
   <h1><?php print t('Donating also benefits you')?></h1>
   <div class="list-donor-benefits">

     <?php 
     for ($i=0; $i < count($node->field_titulo_1['und']) ; $i++) { 
       ?>
       <div class="item-donor-benefited">
         <h2><?php print $node->field_titulo_1['und'][$i]['value']?></h2>
         <p><?php print $node->field_descripcion_2_maestra_1['und'][$i]['value']?></p>
       </div> <!-- item-donor-benefited -->
       <?php
     }
     ?>
   </div>

 </div>  
</section>

<?php 
print render(field_view_field('node', $node, 'field_beneficio_tributario'));        

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



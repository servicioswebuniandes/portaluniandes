<?php

?>

<script type="application/ld+json">

"@context": "http://schema.org",
"@type": "Article",
"author": "Universidad de los Andes",
"name": "<?php echo $node->title ?>",
"url": "<?php echo "https://" . $_SERVER[ "HTTP_HOST" ] . $_SERVER[ "REQUEST_URI" ] ?>",
	
</script>
<div class="container-fluid page-404">
     <div class="container">

      <div class="bg-404">
        <img src="/sites/default/files/img-404.png">
      </div>

      <div class="text-404">
       <p class="subtuitle-text">ooops!</p>
       <p><?php print t("El contenido que usted busca no puede ser encontrado.")?></p>

     </div>
         <form id="buscador" method="post" action="/node/189" >
         <div class="search-content">
           <div class="form-item-search">
            <input id="parametro" class="form-control form-text" type="text">
          </div>

          <div class="form-submit-button">
            <button type="submit" class="btn btn-info form-submit">Buscar</button>
          </div>
        </div>
         </form>
    </div>
</div>

<div class="container-fluid container-noticias-fluid">
  <div class="container">
   <div class="title-bloques"><h2> <span></span> Noticias Recientes</h2></div>
   <div class="container-noticias">

    <?php    
    $block = module_invoke('views', 'block_view', 'vista_noticias_interna-block');
    print render($block['content']);    
    ?>

  </div>
</div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#buscador").bind("submit", function(){
            jQuery( this ).attr( "action", jQuery( this ).attr( "action") + "?query=" + jQuery( "#parametro" ).val() )

        } )
    });
</script>

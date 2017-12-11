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
       <p class="subtuitle-text">ooops</p>
<p><?php print t("The content you are looking for can not be found.")?></p>
     </div>
         <form id="buscador2" method="gest" action="/donaciones/buscador" >
         <div class="search-content">
           <div class="form-item-search">
            <input id="parametro_404" class="form-control form-text" name="query" type="text">
          </div>

          <div class="form-submit-button">
            <button type="submit" class="btn btn-info form-submit" id="404btn"><?php print t("Search")?></button>
          </div>
        </div>
         </form>
    </div>
</div>

<?php 
  $view = views_get_view('vista_causas_integradas');
    $view->set_display("block");
    $view->pre_execute();
    $view->execute();
    print $view->render();

?>


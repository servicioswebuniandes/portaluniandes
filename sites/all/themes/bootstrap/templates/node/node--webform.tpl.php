<?php 
global $user;
$roles=$user->roles;
$permisoEspecial=false;
foreach ($roles as $autenticacion) {
	if ($autenticacion=="administrator" || $autenticacion=="Creador de formularios") {
		$permisoEspecial=true;
	}
}
$sitioActual=$_SERVER['HTTP_REFERER'];
$sitios=explode(',', variable_get('sitios_permitidos'));
$sitio_permitido=false;
if ($sitioActual=="") {
	$sitio_permitido=true;
}
foreach ($sitios as $sitio ) {
	$esta=strpos($sitioActual, $sitio);
	if ($esta!==false) {
		$sitio_permitido=true;
	}
}

if (($sitio_permitido && $node->field_conectar_con_salesforce['und'][0]['value']==1) || ($sitio_permitido && $permisoEspecial)    ) {


$date1 = new DateTime($node->field_fecha_publicacion['und'][0]['value']);
$date2 = new DateTime($node->field_fecha_publicacion['und'][0]['value2']);
$date3 = new DateTime("now");
	if($date3>=$date1 && $date3<=$date2){
	print render($content['webform']); 	
}else{
	?>

    <style>
       body{
        height: auto;
    }
</style>

<div id="thanks-id" class="thanks-title">    
    <h1 style="text-align:center;text-transform: none;font-family: 'Crimson_textroman',serif;font-weight: normal;font-size: 4rem;margin: 0;padding-bottom: 20px;"><?php print $node->field_titulo_cerrado['und'][0]['value']?></h1>
    <p style="font-family: 'Latolight', sans-serif;font-style: italic;font-size: 1.3rem;text-align: center;
    padding-bottom: 25px;margin: 0;"><?php print $node->field_descripcion_cerradi['und'][0]['value']?></p>
</div>

<script type="text/javascript">
    function resize() {
      var elemento = document.getElementById("thanks-id");
      var height= elemento.scrollHeight;
      window.parent.postMessage(["setHeight", height], "*");

  }
  resize();

</script>

	<?php
}
	
}

?>


<script type="text/javascript">

function resize() {	
  var height = document.getElementsByTagName("html")[0].scrollHeight;
  window.parent.postMessage(["setHeight", height], "*");   
}
resize();

</script>
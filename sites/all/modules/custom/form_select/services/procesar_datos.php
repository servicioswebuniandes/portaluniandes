<?php 
//header('Access-Control-Allow-Origin: https://uniandes.ariadna.co', false);
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include('../db/config.php');
//$hora_actual $fecha_actual

$errores=array();

if(isset($_GET['traer_info'])){
	$sql=$db->prepare("select * from  donantes_registrados order by id_donante DESC");
	$sql->execute();
	$test=$sql->fetchAll();


	foreach ($test as $item ) {
		print "<pre>";
		print_r($test).'<br>';
		print "</pre>";
	}

}

/*foreach ($_REQUEST as $campo) {

	if(empty($campo)){
		array_push($errores, "Por favor ingrese todos los campos");	
		break;
	}else{
		addslashes($campo);
	}
}*/

if(!is_numeric($_REQUEST["telefono"])){
	array_push($errores,"EL número fijo no es válido" );
}

	$valorTotal	= str_replace(".","",$_REQUEST["valor"]);
	if ($valorTotal<"10000") {
	array_push($errores,"EL monto debe ser mayor a $10.000" );
	}




if(!is_numeric($_REQUEST["telefonoMovil"])){
	array_push($errores,"EL número fijo no es válido" );
}

if (!filter_var($_REQUEST["emailComprador"], FILTER_VALIDATE_EMAIL)) {
	array_push($errores,"EL Correo electrónico es inválido" );
}



if (!isset($_REQUEST['don_accept_terms'])){
	array_push($errores,"Debe aceptar los términos y condiciones" );
}





if (count($errores)!=0){
?>
<ul>
<?php foreach ($errores as $error) {
		?>
	<li>
		<p><?php print utf8_encode($error) ?></p>
	</li>

		<?php
	}?>

	</ul>
<button onclick="goBack()">Volver</button>

<script>
function goBack() {
    window.history.back(1);
}
</script><?php

die();
}

$nombreComprador				= $_REQUEST["nombreComprador"];
$apellidoComprador				= $_REQUEST["apellidoComprador"];

$nombreComprador				= strtoupper($nombreComprador);
$nombreComprador				= str_replace(utf8_encode("á"),"a",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("é"),"e",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("í"),"i",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("ó"),"o",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("ú"),"u",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("ñ"),"n",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("Á"),"A",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("É"),"E",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("Í"),"I",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("Ó"),"O",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("Ú"),"U",$nombreComprador);
$nombreComprador				= str_replace(utf8_encode("Ñ"),"N",$nombreComprador);

$apellidoComprador				= str_replace(utf8_encode("á"),"a",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("é"),"e",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("í"),"i",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("ó"),"o",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("ú"),"u",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("ñ"),"n",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("Á"),"A",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("É"),"E",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("Í"),"I",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("Ó"),"O",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("Ú"),"U",$apellidoComprador);
$apellidoComprador				= str_replace(utf8_encode("Ñ"),"N",$apellidoComprador);





$tipoDocumentoIdentificacion	= $_REQUEST["tipoDocumentoIdentificacion"];
$documentoIdentificacion 		= $_REQUEST["documentoIdentificacion"];
$telefono						= $_REQUEST["telefono"];
$telefonoMovil					= $_REQUEST["telefonoMovil"];
$direccionCorrespondencia		= $_REQUEST["direccionCorrespondencia"];
$ciudadCorrespondencia			= $_REQUEST["pais"].'-'.$_REQUEST['estado'].'-'.$_REQUEST['ciudadCorrespondencia'];
$emailComprador					= $_REQUEST["emailComprador"];
$valor							= $_REQUEST["valor"];
$designacion					= $_REQUEST["designacion"];


if($valor <> ""){
	$valorTotal	= str_replace(".","",$valor);
}






date_default_timezone_set('America/Bogota');

$comentarios="";
if(isset($_POST['comentarios'])){
	if ($_POST['comentarios']=="null") {
		$comentarios="";
	}else{		
	$comentarios= $_POST['comentarios'];
	}
}else{
	$comentarios="";
}


$tiposDoc = array();
$tiposDoc[1] = "C";
$tiposDoc[2] = "N";
$tiposDoc[3] = "E";
$tiposDoc[4] = "T";
$tiposDoc[5] = "P";
$tiposDoc[6] = "S";

$_datos = array();
$_datos["donante"]["email_egr"] = "";
$_datos["donante"]["login"] = "";
$_datos["donante"]["usuarioautenticado"] = "N";
$_datos["donante"]["codigo"] = "";
$_datos["donante"]["prospecto"] = "";
$_datos["donante"]["id_banner"] = "";
$_datos["donante"]["categ_egresado"] = "";
$_datos["donante"]["codigo_zip"] = "";
$_datos["donante"]["tipodocumento"] = @$tiposDoc[$_POST["tipoDocumentoIdentificacion"]];
$_datos["donante"]["documento"] = $_POST["documentoIdentificacion"];
$_datos["donante"]["nombres"] = strtoupper($nombreComprador);
$_datos["donante"]["apellidos"] = strtoupper($apellidoComprador);
$_datos["donante"]["correo"] = $_POST["emailComprador"];
$_datos["donante"]["idioma"] = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

$_datos["promesadonacion"]["valor"] = $valorTotal;
$_datos["promesadonacion"]["codigocampana"] = $_REQUEST["designacion"]; // <-- Código Campaña
$_datos["promesadonacion"]["formapago"] =  $_POST["forma_pago"];  //"PLIN";
$_datos["promesadonacion"]["frecuencia"] = $_POST['frecuencia'];
/*$_datos["promesadonacion"]["comentarios"] = $_POST["descripcion"];*/

$comentarios				= str_replace(utf8_encode("á"),"a",$comentarios);
$comentarios				= str_replace(utf8_encode("é"),"e",$comentarios);
$comentarios				= str_replace(utf8_encode("í"),"i",$comentarios);
$comentarios				= str_replace(utf8_encode("ó"),"o",$comentarios);
$comentarios				= str_replace(utf8_encode("ú"),"u",$comentarios);
$comentarios				= str_replace(utf8_encode("ñ"),"n",$comentarios);
$comentarios				= str_replace(utf8_encode("Á"),"A",$comentarios);
$comentarios				= str_replace(utf8_encode("É"),"E",$comentarios);
$comentarios				= str_replace(utf8_encode("Í"),"I",$comentarios);
$comentarios				= str_replace(utf8_encode("Ó"),"O",$comentarios);
$comentarios				= str_replace(utf8_encode("Ú"),"U",$comentarios);
$comentarios				= str_replace(utf8_encode("Ñ"),"N",$comentarios);


$_datos["promesadonacion"]["comentarios"] = utf8_decode($comentarios);

if(isset($_REQUEST['ticket'])){
	$_datos["promesadonacion"]["certificado"] = "Si";
}else{
	$_datos["promesadonacion"]["certificado"] = "No";
}
//$_datos["promesadonacion"]["pidm"] = "";
if(isset($_POST['duracionM'])){
	if ($_POST['duracionM']=="null") {
		$duracion_m="";
	}else{		
	$duracion_m= $_POST['duracionM'];
	}
}else{
	$duracion_m="";
}


$_datos["promesadonacion"]["duracion"] = $duracion_m;

$_datos["promesadonacion"]["fechainicio"] = date("Y-m-d");
$_datos["promesadonacion"]["idcampanas"] = ""; 
$_datos["promesadonacion"]["comentarios2"] ="";
$_ciu = explode("-", $ciudadCorrespondencia);
$paisCodNum = $_ciu[0];


$sql_iso=$db->prepare("Select cod_pais2 from crowd_paises where codigoPais= ?");
$sql_iso->bindParam(1,$_ciu[0]);
$sql_iso->execute();
$iso=$sql_iso->fetch();

$_iso=$iso['cod_pais2'];


$_datos["direccion"]["expedicion"] = date("Y");
$_datos["direccion"]["principal"] = $_POST["direccionCorrespondencia"];
$_datos["direccion"]["pais"] = @$_ciu[0];
$_datos["direccion"]["otropais"] = utf8_encode($_POST["pais"]);
$_datos["direccion"]["iso"] = $_iso;
$_datos["direccion"]["departamento"] = @$_ciu[1];
$_datos["direccion"]["otrodepartamento"] = utf8_encode($_POST["estado"]);
$_datos["direccion"]["ciudad"] = @$_ciu[2];
$_datos["direccion"]["otraciudad"] = utf8_encode($_POST["ciudad"]);
$_datos["direccion"]["telefono"] = $_POST["telefono"];
$_datos["direccion"]["telefonomovil"] = $_POST["telefonoMovil"];

$_datos["campaniaNombre"] = "P";
$_datos["duracionNombre"] = "P";
$_datos["frecuenciaNombre"] = "P";

if($_POST['frecuencia']=="M"){
$_datos["duracionM"] = 1; 
}else{
$_datos["duracionM"] = ""; 
}


$_datos["duracionU"] = ""; 



$_datos["caracteres"] = "0";
$_datos["accion"] = "Enviar";
$_datos["auxiliarFrecuencia"] = "U";
$_datos["num_caracteres_permitidos"] = "1000";
$_datos["autenticacion"]["usuario"] = "";
$_datos["autenticacion"]["clave"] = "";

$_datos["buscaciudad"] = utf8_encode($_POST["ciudad"]);
$_datos["condicionesuso"] = "S";
$_datos["caracteres2"] = "0";

$_datos["sitioOrigen"] = "DONACION"; //EVENT_5K  - DONCROWD 'DONCROWD'; 
$host= $_SERVER["HTTP_HOST"];
$url= "/donaciones/gracias-por-donar";
$url="https://" . $host . $url;
$_datos["id_donacion"] = $url;


$_datos = json_encode($_datos);

//echo var_dump($_datos);

/*try {
$sql=$db->prepare("insert into donantes_registrados values (DEFAULT,?,?,?,?,?,?,?,?,?,?,?,?,?,DEFAULT)");
$sql->bindParam(1,$valorTotal);
$sql->bindParam(2,$_REQUEST["designacion"]);
$sql->bindParam(3,$_POST["forma_pago"]);
$sql->bindParam(4,$_POST["tipoDocumentoIdentificacion"]);
$sql->bindParam(5,$_POST["documentoIdentificacion"]);
$sql->bindParam(6,$nombreComprador);
$sql->bindParam(7,$apellidoComprador);
$sql->bindParam(8,$_ciu[0]);
$sql->bindParam(9,$_ciu[1]);
$sql->bindParam(10,$_ciu[2]);
$sql->bindParam(11,$_POST["telefono"]);
$sql->bindParam(12,$_POST["telefonoMovil"]);
$sql->bindParam(13,$_POST["emailComprador"]);
$sql->execute();	
} catch (Exception $e) {
	print $e->getMessage();
}*/
?>


<img src="load.svg" alt="load icon" style="position: absolute;
    left: 0;
    right: 0;
    text-align: center;
    padding: 40px 0;
    margin: 0 auto;">
<form action="https://donacionespp.uniandes.edu.co/scripts/donaciones.php" <?php if ($_POST["forma_pago"]=="PLIN"){?> target="_parent" <?php } ?> method="POST" id="frmCROWD">
	<input type="hidden" name="crowdPOST" value='<?php echo $_datos; ?>' />
</form>
<script type="text/javascript">
	document.getElementById("frmCROWD").submit();
</script>


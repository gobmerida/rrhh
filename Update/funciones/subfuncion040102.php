<?php
include("../config/config00.php");
function fecha_anio($fecha){
	$fecha = substr($fecha, 0, -9);
	list($anio, $mes, $dia) = explode("-",$fecha);
	return $fecha = $dia."/".$mes."/".$anio;
}
function datesT($fecha_i,$fecha_f){
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
$idSQL = $_POST['noticiasMesAnio'];
$noticiaSQL = "SELECT * FROM data02 WHERE id='$idSQL'";
$noticiaSQL = mysql_query($noticiaSQL);
$notiCount=0;
$noticiasROW = mysql_fetch_array($noticiaSQL);
	$id = $noticiasROW['id'];
	$printer="ver_noticiamesanio";
	$qp = $noticiasROW['QuienPublica'];
	$quienSQL = "SELECT * FROM data04 WHERE id='$qp'";
	$quienSQL = mysql_query($quienSQL);
	$quienROW = mysql_fetch_array($quienSQL);
	$nocache=md5(date("Y-m-s H:i:s"));
	echo "
<p style='float:right'>";
$comprobarfecha = datesT($noticiasROW['FechaPublicacion'],date("Y-m-d H:i:s"));
if($comprobarfecha<1){
echo "<a onclick='editarNoticiaAnio(\"$id\")' style='cursor:pointer'>Editar</a>";
}
echo "<a onclick=\"ThumNoticesOc()\" style='cursor:pointer'>volver</a></p>
<br><h3>$noticiasROW[TituloNoticia]</h3>
<br><br><span class='cabecera-noticia'>Fecha de publicación ".fecha_anio($noticiasROW['FechaPublicacion'])." <span class='imprimir' onclick='imprimir(\"$printer\")' title='Imprimir Noticia'>&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
<img src='./funciones/notices.php?id=$id?$nocache'>
<p><br>$noticiasROW[ContenidoNoticia]&nbsp;
<b>($quienROW[Nombres] $quienROW[Apellidos])</b></p>
";

?>
<script>
function editarNoticiaAnio(id) {
datos="funciones/subfuncion0402.php?noticia=" + id;
window.open(datos, "popupId",'_blank','fullscreen=yes'); 
}
</script>

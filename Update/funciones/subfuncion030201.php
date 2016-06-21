<link rel="stylesheet" href="../css/jquery-ui-tema.css">
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/funciones.js"></script>
<?php
require("../config/config00.php");
function comprobar($palabra){
	if(strlen($palabra)==0){
		echo "<div id='error_vac' style='text-align:center'><span style='color:red'>¡No dejes campos en blanco!</span></div>";
		echo "<script>
		dialogos('#error_vac');
		</script>";
		$numero_error=1;
	}
	if(strlen($palabra)!=0){
		$ipalabra=strlen($palabra);
		$nopermitidos = "¿?&\\$%'`´[]{}*";
		$inopermitidos = strlen($nopermitidos);
		$i=0;
		$y=0;
		$error_palabra=0;
		while($error_palabra==0 and $i<$ipalabra){
			while($error_palabra==0 and $y<$inopermitidos){
				$caracterc=utf8_encode(substr($palabra,$i,1));
				$caracternopermitido=utf8_encode(substr($nopermitidos,$y,1));
				if($caracterc==$caracternopermitido){
					$error_palabra=1;
				}
				if($caracterc!=$caracternopermitido){
					$error_palabra=0;
				}
				$y++;
			}
			$y=0;
			$i++;
		}
		return $error_palabra;
	}
}
$archivo_c=$_POST['selima'];
$IdNoticia=$_POST['IdNoticia'];
$TituloNoticia=$_POST['titulo_no'];
$ContenidoNoticia=$_POST['contenido_no'];
$relevancia=$_POST['relevancia'];

$error_titulo = comprobar($TituloNoticia);
$error_contenido = comprobar($ContenidoNoticia);

$contenidoar=0;
$archivo="../c_noti/noticia_ppal.jpg"; 
$tipoar="image/jpeg";
$nombrear="noticia_ppal.jpg";
if($archivo!=""){
	$fp = fopen($archivo, "rb");
	$contenidoar = fread($fp,filesize($archivo));
	$contenidoar = addslashes($contenidoar);
	fclose($fp);
}
$ThumbNoticia=0;
$archivo_thum="../c_noti/noticia_thum.jpg"; 
if($archivo!=""){
	$fp = fopen($archivo_thum, "rb");
	$ThumbNoticia = fread($fp,filesize($archivo_thum));
	$ThumbNoticia = addslashes($ThumbNoticia);
	fclose($fp);
}

if($error_titulo==1 || $error_contenido==1){
	echo "<div id='errores' style='text-align:center'>No uses caracteres especiales<br> <span style='color:red'>¿ ? & \\ $ % ' ` ´ [ ] { } * </span></div>";
	echo "<script>
	dialogos('#errores');
	</script>
	";
	$numero_error=1;
}
if($archivo_c==1){
$editarSQL = "UPDATE data02 SET
TituloNoticia='$TituloNoticia',
ContenidoNoticia='".nl2br($ContenidoNoticia)."',
FotoNoticia='$contenidoar',
ThumbNoticia='$ThumbNoticia',
TipoArchivo='$tipoar',
NombreArchivo='$nombrear',
InternaExterna='$relevancia'
WHERE id='$IdNoticia'
";
}
if($archivo_c==0){
$editarSQL = "UPDATE data02 SET
TituloNoticia='$TituloNoticia',
ContenidoNoticia='".nl2br($ContenidoNoticia)."',
InternaExterna='$relevancia'
WHERE id='$IdNoticia'";
}
if($error_titulo==0 && $error_contenido==0){
$ingreso_noticia = mysql_query($editarSQL);
$error_mysql = mysql_errno($con) . ": " . mysql_error($con). "\n";
$numero_error = mysql_errno($con);
if($numero_error!="0"){
	echo "<div id='error'>$error_mysql $cuenta</div>";
	echo "<script>//mensajes('#error');
	dialogos('#error');
	</script>";
}

}
if($numero_error=="0"){
?>

<div id="msj_guardado" style="display:none"><img src="../img/check.png" width="20px">Cambios guardados con éxito</div>
<script>
	dialogos("#msj_guardado");
</script>
<?php
function fecha_anio($fecha){
	$fecha = substr($fecha, 0, -9);
	list($anio, $mes, $dia) = explode("-",$fecha);
	return $fecha = $dia."/".$mes."/".$anio;
}
$idSQL = $IdNoticia;
$noticiaSQL = "SELECT * FROM data02 WHERE id='$idSQL'";
$noticiaSQL = mysql_query($noticiaSQL);
$notiCount=0;
$printer="ver_noticiames";
$noticiasROW = mysql_fetch_array($noticiaSQL);
	$id = $noticiasROW['id'];
	$nocache=md5(date("Y-m-s H:i:s"));
	echo "
<p style='float:right'><a onclick='editarNoticiaMes(\"$id\")' style='cursor:pointer'>Editar</a><a onclick=\"ThumNoticesOc()\" style='cursor:pointer'>volver</a></p>
<br><h3>$noticiasROW[TituloNoticia] (".fecha_anio($noticiasROW['FechaPublicacion']).")</h3>
<br><br><span class='cabecera-noticia'>Fecha de publicación ".fecha_anio($noticiasROW['FechaPublicacion'])." <span class='imprimir' onclick='imprimir(\"$printer\")' title='Imprimir Noticia'>&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
<img src='funciones/notices.php?id=$id?$nocache'>
<p><br>$noticiasROW[ContenidoNoticia]</p>
";
}
?>


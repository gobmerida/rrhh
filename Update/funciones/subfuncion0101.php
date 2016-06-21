<?php
header("Content-Type:text/html;charset=utf-8");
$h="localhost";
$u="root";
$p="infor1234";
$con=mysql_connect($h,$u,$p) or die (mysql_error());
mysql_select_db("PaginaMeridaGob_rrhh",$con) or die (mysql_error());
mysql_query("SET NAMES 'utf8'");
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

$TituloNoticia=$_POST['titulo_no'];
$ContenidoNoticia=$_POST['contenido_no'];
$relevancia=$_POST['relevancia'];
$quienp=$_POST['quienp'];

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
	echo "<div id='error' style='text-align:center'>No uses caracteres especiales<br> <span style='color:red'>¿ ? & \\ $ % ' ` ´ [ ] { } * </span></div>";
	echo "<script>
	dialogos('#error');
	</script>";
	$numero_error=1;
}

$insertar = "INSERT INTO
data02(
TituloNoticia,
ContenidoNoticia,
FotoNoticia,
ThumbNoticia,
TipoArchivo,
NombreArchivo,
QuienPublica,
InternaExterna
)
value(
'$TituloNoticia',
'".nl2br($ContenidoNoticia)."',
'$contenidoar',
'$ThumbNoticia',
'$tipoar',
'$nombrear',
'$quienp',
'$relevancia'
)";
if($error_titulo==0 && $error_contenido==0){
$ingreso_noticia = mysql_query($insertar);
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
<script>
	$("#ingreso_noticia").fadeOut(300);
	$("#ver_noticia").fadeIn(300);
	dialogos("#msj_guardado");
</script>
<div id="msj_guardado" style="display:none"><img src="./img/check.png" width="20px">Se ha guardo la noticia con éxito</div>
<?php
}
?>
<div id="ver_noticia" class="noticias">
<?php
function fecha_anio($fecha){
	$fecha = substr($fecha, 0, -9);
	list($anio, $mes, $dia) = explode("-",$fecha);
	return $fecha = $dia."/".$mes."/".$anio;
}
$idSQL = mysql_insert_id();
$noticiaSQL = "SELECT * FROM data02 WHERE id='$idSQL'";
$noticiaSQL = mysql_query($noticiaSQL);
$notiCount=0;
$noticiasROW = mysql_fetch_array($noticiaSQL);
	$id = $noticiasROW['id'];
	echo "
<p style='float:right'><a onclick='editarNoticia(\"$id\")' style='cursor:pointer'>Editar</a><a onclick=\"$('#trabajador_c').css('display','none');$('#ingreso_noticia').fadeIn(200);clearl();\" style='cursor:pointer'>volver</a></p>
<br><h3>$noticiasROW[TituloNoticia] (".fecha_anio($noticiasROW['FechaPublicacion']).")</h3>
<br><br>
<img src='./funciones/notices.php?id=$id'>
<p>$noticiasROW[ContenidoNoticia]</p>
";

?>
</div>
<script>
function editarNoticia(id) {
datos="funciones/subfuncion0102.php?noticia=" + id;
window.open(datos, "popupId",'_blank','fullscreen=yes'); 
}

</script>

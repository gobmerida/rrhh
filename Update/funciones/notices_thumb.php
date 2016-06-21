<?php
include("../config/config00.php");
$id=$_GET['id'];
$res = mysql_query("SELECT * FROM data02 WHERE id='$id'");

$tipo = mysql_result($res, 0, "TipoArchivo");
$contenido = mysql_result($res, 0, "ThumbNoticia");
$nombre = mysql_result($res, 0, "NombreArchivo");

header("Content-type: $tipo");
print $contenido;
?>

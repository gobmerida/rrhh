<?php
require("../config/config00.php");

$data=$_GET['data'];
$sql01 = "SELECT * FROM data07 WHERE Id='$data'";
$sql01 = mysql_query($sql01);

$tipo = mysql_result($sql01, 0, "TipoFoto");
$contenido = mysql_result($sql01, 0, "ContenidoFoto");
$nombre = mysql_result($sql01, 0, "NombreFoto");

header("Content-type: $tipo");
print $contenido;
 
?>

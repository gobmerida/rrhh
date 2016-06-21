<?php
/*for($i=0;$i<230000000;$i++){
}*/
require("../config/config00.php");
if(array_key_exists("NombreAlbum",$_POST)){
	
$data01 = $_POST['NombreAlbum'];
$data02 = $_POST['BackgroundAlbum'];
$IdAlbum=md5(date("Y/m/d H:i:s"));
$sql01 = "INSERT INTO data08(Id, NombreAlbum) values('$IdAlbum','$data01')";
$sql01 = mysql_query($sql01) or die ("Error: ".mysql_error());
$i=1;
while($i!=0){
	$imagen = "imagen".$i;
	$IdFoto = "FOT".date("YmdHis")."-".$i;
	$contenidoar=0;
	$archivo=$_FILES[$imagen]['tmp_name']; 
	$tamanio=$_FILES[$imagen]['size'];
	$tipoar=$_FILES[$imagen]['type'];
	$nombrear=$_FILES[$imagen]['name'];
	if($archivo!=""){
		$fp = fopen($archivo, "rb");
		$contenidoar = fread($fp, $tamanio);
		$contenidoar = addslashes($contenidoar);
		fclose($fp);
		$sql02 = "INSERT INTO data07(Id, IdAlbum, NombreFoto, ContenidoFoto, TipoFoto) values('$IdFoto','$IdAlbum','$nombrear','$contenidoar','$tipoar')";
		$sql02 = mysql_query($sql02) or die ("Error: ".mysql_error());
		if($i==$data02){
			$sql03 = "UPDATE data08 SET IdFotoPortada='$IdFoto' WHERE Id='$IdAlbum'";
			$sql03 = mysql_query($sql03) or die ("Error: ".mysql_error());
		}
		$i++;
	}
	else $i=0;
}
}
?>
<script>
$("#GaleriaRRHH").fadeOut(0);
$("#checking").fadeIn(0);
</script>

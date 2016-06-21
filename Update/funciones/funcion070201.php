<?php
require("../config/config00.php");
$data00 = $_POST['data00'];

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
		$sql02 = "INSERT INTO data07(Id, IdAlbum, NombreFoto, ContenidoFoto, TipoFoto) values('$IdFoto','$data00','$nombrear','$contenidoar','$tipoar')";
		$sql02 = mysql_query($sql02) or die ("Error: ".mysql_error());
		$i++;
	}
	else $i=0;
}
?>
<script>
$("#checkingadd").dialog({
	modal:true,
	close: function(){
		funcion02("<?php echo $data00; ?> ");
	}
});
$("#NewPic").remove();
</script>

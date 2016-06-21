<?php
require("../config/config00.php");
$data01 = $_POST['album'];
$sql01 = "SELECT * FROM data08 WHERE Id='$data01'";
$sql01 = mysql_query($sql01);
$row01 = mysql_fetch_array($sql01);
$sql02 = "SELECT * FROM data07 WHERE IdAlbum='$data01'";
$sql02 = mysql_query($sql02);
?>
<div id="selectfondomodal" title="Selecciona la Portada del albúm">
<label>Fotos del Albúm</label>
<table>
<?php
while($row02 = mysql_fetch_array($sql02)){
echo "<tr><td><img src='funciones/funcion050101.php?data=$row02[Id]' class='TableAlbumEdit' onclick='funcion07(\"$row02[Id]\",\"$data01\")' />";
if($row01['IdFotoPortada']==$row02['Id']){
	echo " <- Foto de portada";
}

echo "</td></tr>";
}
?>
</table>
</div>
<div id="loadingback"></div>
<script>
$("#selectfondomodal").dialog({
	modal:true,
	width:600,
	close:function(){
		$(this).remove();
	}
});
</script>

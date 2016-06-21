<?php
require("../config/config00.php");
$data01 = $_POST['album'];
$sql01 = "SELECT * FROM data08 WHERE Id='$data01'";
$sql01 = mysql_query($sql01);
$row01 = mysql_fetch_array($sql01);
$sql02 = "SELECT * FROM data07 WHERE IdAlbum='$data01'";
$sql02 = mysql_query($sql02);
?>
<style>
.TableAlbumEdit{width:120px;height:80px;border-radius:5px;border:2px solid blue;border-radius:5px}
.TableAlbumEdit:hover{border:2px solid #c00}
#addfoto{width:10%;border:2px solid #007E86;border-radius:5px}
#addfoto:hover{border:2px solid black;background-color:#FF6868;cursor:pointer}
</style>
<div id="ModificarAlbum" title="Modificar Albúm (<?php echo $row01['NombreAlbum'];?>) ">
<label>Nombre del Album</label>
<input type="text" id="data00" name="data00" autocomplete="off" class="noti-in text-cont" value="<?php echo $row01['NombreAlbum']; ?>" placeholder="Nombre del Albúm" />
<input type="hidden" name="data01" id="data01" value="<?php echo $row01['Id'];?>" />
<br>
<br>
<center><img id="addfoto" src="img/img/t01.png" title="Añadir Foto"><br><button id="SelctAlbum">Seleccionar Portada Albmún</button></center>
<br>
<label>Fotos del Albúm</label>
<table>
<?php
while($row02 = mysql_fetch_array($sql02)){
echo "<tr><td><img src='funciones/funcion050101.php?data=$row02[Id]' class='TableAlbumEdit' />";
if($row01['IdFotoPortada']==$row02['Id']){
	echo " <- Foto de portada";
}
if($row01['IdFotoPortada']!=$row02['Id']){
echo "<img src='img/trash.png' title='Eliminar Foto/Imagen' style='width:50px;cursor:pointer' onclick='funcion03(\"$row02[Id]\")' />";
}
echo "</td></tr>";
}
?>
</table>
</div>
<div id="selectfondo"></div>
<div id="nombregaleria"></div>
<script>
var datast="<?php echo $data01;?>";

$("#addfoto").tooltip();
$("#addfoto").click(function(){
	funcion04(datast);
});
$("#SelctAlbum").click(function(){
	funcion06(datast);
});
$("#ModificarAlbum").dialog({modal:true,width:600,height:480,close:function(){$(this).remove();},
	buttons:{
		Guardar: function(){
			alb=$("#data00").val();
			albs=$("#data01").val();
			funcion08(alb,albs);
		},
		Cerrar: function(){
			$( this ).dialog( "close" );
		}
	},
	close:function(){
		funcion01(datast);
		$(this).remove();
	}
	});
</script>

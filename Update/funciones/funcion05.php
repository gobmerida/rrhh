<style>
.TableAlbum{border:1px solid silver;box-shadow: 6px 6px 6px 5px silver;margin:0 auto;border-radius:5px}
.TableAlbum td{border:2px solid white;cursor:pointer;padding:5px;text-align:center}
.TableAlbum td:hover{border:2px solid #c00;border-radius:5px}
.TableAlbum td img{width:120px;height:80px;border-radius:5px}
</style>
<?php
require("../config/config00.php");
$sql01 = "SELECT * FROM data08 ORDER BY FechaCreacion DESC";
$sql01 = mysql_query($sql01);
echo "<table class='TableAlbum'>";
$i=1;
echo "<tr>";
while($row01 = mysql_fetch_array($sql01)){
	echo "<td id='$row01[Id]' onclick='funcion01(\"$row01[Id]\")'><img u='image' src='funciones/funcion050101.php?data=$row01[IdFotoPortada]' /><br><span id='".$row01['Id']."-Edit'>".$row01['NombreAlbum']."</span></td>";
	if($i%6==0){
		echo "</tr><tr>";
	}
	$i++;
}
echo "</tr>";
echo "</table>";
?>
<div id="albums"></div>
<div id="albumselimi"></div>

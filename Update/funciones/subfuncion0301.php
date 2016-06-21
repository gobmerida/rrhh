<style>
.relevantes{
	margin:0 auto;
	border-spacing: 3px;
	border-collapse: separate;
}
.relevantes td{
padding:5px;
border:2px solid silver;
border-radius:5px;
width:600px;
cursor:pointer;
}
@keyframes noti-hovr{
    from {border-color: silver;}
    to {border-color: red;}
}
.relevantes td:hover{
animation-name: noti-hovr;
animation-duration: 0.5s;
border:2px solid red;
}
.relevantes td img{
	width:175px;
	height:60px;
	float:left;
}
.relevantes td span{
	width:400px;
	height:60px;
	font-size:12px;
	float:right;
	overflow:hidden;
	text-align:justify;
}
.relevantes td span b{
	font-size:15px;
}
.adv{
	cursor:default;
	padding:5px;
	border:2px solid red;
	border-radius:5px;
	background:linear-gradient(#FF8080,#FF4E4E);
	color:white;
	font-weight:bold;
}
</style>
<script>
function ThumNotices(id){
	$('#noticias_mes').fadeOut(25);
	$('.controles').fadeOut(25);
	verNot(id);
}
</script>
<?php
include("../config/config00.php");
include("../config/config02.php");
$mesactual=$_POST['noticiasMes'];
$FechaNoticias=date("Y-").$mesactual."-01";;
$FechaNoticiasp=date("Y-").$mesactual."-31";;
$nohaynot=0;
$UltimasNoticiasSQL = "SELECT id,TituloNoticia,ContenidoNoticia FROM data02 WHERE FechaPublicacion>='$FechaNoticias' and FechaPublicacion<'$FechaNoticiasp' ORDER BY FechaPublicacion ASC";
$UltimasNoticiasSQL = mysql_query($UltimasNoticiasSQL);
echo "<table class='relevantes'>";
while($UltimasNoticiasROW = mysql_fetch_array($UltimasNoticiasSQL)){
	$idT=$UltimasNoticiasROW['id'];
	$TituloNoticiaThumb=substr($UltimasNoticiasROW['TituloNoticia'], 0, 50);
	$contenidoTrun=substr($UltimasNoticiasROW['ContenidoNoticia'], 0, 200);
	$sincache=md5(date("Y-m-s H:i:s"));
	echo "<tr><td onclick='ThumNotices(\"$idT\");'><img src='./funciones/notices_thumb.php?id=$idT?$sincache'><span><b>$TituloNoticiaThumb...</b><br>$contenidoTrun...</span></td></tr>";
	$nohaynot++;
}
echo "</table>";
if($nohaynot==0) echo "
<center><span class='adv'>¡No hay noticias para el mes de ".fechaMes($mesactual)."!</span></center>
";
?>

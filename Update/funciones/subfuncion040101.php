<style>
.aniomesbs{
	margin:0 auto;
	border-spacing: 3px;
	border-collapse: separate;
}
.aniomesbs td{
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
.aniomesbs td:hover{
animation-name: noti-hovr;
animation-duration: 0.5s;
border:2px solid red;
}
.aniomesbs td img{
	width:175px;
	height:60px;
	float:left;
}
.aniomesbs td span{
	width:400px;
	height:60px;
	font-size:12px;
	float:right;
	overflow:hidden;
	text-align:justify;
}
.aniomesbs td span b{
	font-size:15px;
}
.advanimes{
	cursor:default;
	padding:5px;
	border:2px solid red;
	border-radius:5px;
	background:linear-gradient(#FF8080,#FF4E4E);
	color:white;
	font-weight:bold;
}
.top-enlace img{
	background-color:white;
	box-shadow:0 0 2px black;
	border:1px solid silver;
	border-radius:5px;
}
.top-enlace{
	position:fixed;
	left:7%;
	top:20%;
	display:none;
}

</style>
<script>
$(document).ready(function(){
	$("#contenido").scroll(function(){
		if( $("#contenido").scrollTop() > 0 ){
			$('.top-enlace').slideDown(300);
		} else {
			$('.top-enlace').slideUp(300);
		}
	});
	$('.top-enlace').click(function(){
		$('#contenido').scrollTop(0);
	});
});
function ThumNotices(id){
	$('#noticias_mesanio').fadeOut(25);
	$('.controlesaniomes').fadeOut(25);
	$('.controlesanio').fadeOut(25);
	verNotics(id);
}
</script>
<?php
include("../config/config00.php");
include("../config/config02.php");
$noticiasanio=$_POST['noticiasMesAnio'];
$FechaNoticias=$noticiasanio."-01";;
$FechaNoticiasp=$noticiasanio."-31";;
$nohaynot=0;
$UltimasNoticiasSQL = "SELECT id,TituloNoticia,ContenidoNoticia FROM data02 WHERE FechaPublicacion>='$FechaNoticias' and FechaPublicacion<'$FechaNoticiasp' ORDER BY FechaPublicacion ASC";
$UltimasNoticiasSQL = mysql_query($UltimasNoticiasSQL);
echo "<table class='aniomesbs'>";
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
<center><span class='advanimes'>¡No hay noticias para el mes de ".fechaMesAnio($FechaNoticias)."!</span></center>
";
?>

<a style='cursor:pointer' class='top-enlace'><img src="./img/flecha-arriba.png"></a>

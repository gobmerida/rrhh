
<style>
.aniomesselected{
	cursor:pointer;
	padding:5px;
	border:2px solid red;
	border-radius:5px;
	background:linear-gradient(#FF8080,#FF4E4E);
	color:white;
	font-weight:bold;
	color:white;
}
.controcmesanio{
	cursor:pointer;
	font-family:"Comic Sans";
	font-weight:bold;
	color:red;
}
</style>
<?php
$aniomesactivo=$_POST['noticiasanio'];
$mesdanio="01";
echo "<script>
var noticiasMesAnio = $aniomesactivo;
var mesdanio = $mesdanio;
</script>";
require("../config/config00.php");
require("../config/config02.php");
?>
<script type='text/javascript'>
	function buscarmesanio(not,ms){
		var noticiasMesAnio = not + "-" + ms;
			var dataString = 'noticiasMesAnio='+noticiasMesAnio;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion040101.php',
				data: dataString,
				beforeSend: function () {
					$("#noticias_mesanio").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('#noticias_mesanio').fadeIn(0);
					$('#noticias_mesanio').html(data);
				}
			});
	}
	function verNotics(noti){
		var noticiasMesAnio = noti;
			var dataString = 'noticiasMesAnio='+noticiasMesAnio;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion040102.php',
				data: dataString,
				beforeSend: function () {
					$("#ver_noticiamesanio").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('.controlesmes').fadeOut(0);
					$('#ver_noticiamesanio').fadeIn(0);
					$('#ver_noticiamesanio').html(data);
				}
			});
	}
	buscarmesanio(noticiasMesAnio,mesdanio);
	function ChangeNoticesMes(aniomes,mda,mesdoc){
		$(".controlesaniomes span").removeClass("aniomesselected");
		$(".controlesaniomes span").addClass("controcmesanio");
		$(mesdoc).removeClass("controcmesanio");
		$(mesdoc).addClass("aniomesselected");
		buscarmesanio(aniomes,mda);
	}
	function ThumNoticesOc(){
		$('#noticias_mesanio').fadeIn(25);
		$('#ver_noticiamesanio').fadeOut(25);
		$('.controlesaniomes').fadeIn(25);
		$('.controlesanio').fadeIn(25);
	}
</script>

<?php
$ActivoMes="1";
$ContarMeses=12;
echo "<center class='controlesaniomes'>";
while($ContarMeses>=$ActivoMes){
	$cfrc=$aniomesactivo."-".$ActivoMes."-01";
	$cfrf=$aniomesactivo."-".$ActivoMes."-31";
	$cfrpfSQL = "SELECT id FROM data02 WHERE FechaPublicacion>='$cfrc' and FechaPublicacion<'$cfrf' ORDER BY FechaPublicacion ASC";
	$cfrpfSQL = mysql_query($cfrpfSQL);
	$cfrpfROW = mysql_fetch_array($cfrpfSQL);
	if($cfrpfROW['id']!=""){
	if($ActivoMes=="01"){
		echo "<span onclick='ChangeNoticesMes(\"$_POST[noticiasanio]\",\"0$ActivoMes\",\".controldelmes".$ActivoMes."\");' class='aniomesselected controldelmes".$ActivoMes."'>".fechaMes($ActivoMes)."</span>";
	}
	else echo " - <span onclick='ChangeNoticesMes(\"$_POST[noticiasanio]\",\"0$ActivoMes\",\".controldelmes".$ActivoMes."\");' class='controcmesanio controldelmes".$ActivoMes."'>".fechaMes($ActivoMes)."</span>";
	}
	$ActivoMes++;
}
echo "</center>";
?><br>
<div id="noticias_mesanio"></div>
<div id="ver_noticiamesanio" class="noticias thumb-notices">
</div>

<style>
#prev, #sig{
	cursor:pointer;
	font-family:"Comic Sans";
	font-weight:bold;
	color:red;
}
.page-number, .messelected{
	cursor:pointer;
	padding:5px;
	border:2px solid red;
	border-radius:5px;
	background:linear-gradient(#FF8080,#FF4E4E);
	color:white;
	font-weight:bold;
}
.messelected{
	color:white;
}
.controcm{
	cursor:pointer;
	font-family:"Comic Sans";
	font-weight:bold;
	color:red;
}
</style>
<?php
$mesact=date("m");
echo "<script>
var noticiasMes = $mesact;
var PrevMes = 0;
</script>";
require("../config/config00.php");
require("../config/config02.php");
?>
<script type='text/javascript'>
	var pagina = 1;
	document.getElementById("numero_pagina").innerHTML = pagina;
	function buscar(not){
		var noticiasMes = not;
			var dataString = 'noticiasMes='+noticiasMes;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion0301.php',
				data: dataString,
				beforeSend: function () {
					$("#noticias_mes").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('#noticias_mes').fadeIn(0);
					$('#noticias_mes').html(data);
				}
			});
	}
	function verNot(noti){
		var noticiasMes = noti;
			var dataString = 'noticiasMes='+noticiasMes;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion030101.php',
				data: dataString,
				beforeSend: function () {
					$("#ver_noticiames").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('.controlesmes').fadeOut(0);
					$('#ver_noticiames').fadeIn(0);
					$('#ver_noticiames').html(data);
				}
			});
	}
	buscar(noticiasMes);
	function ChangeNotices(mescal,mesdoc){
		$(".controlesmes span").removeClass("messelected");
		$(".controlesmes span").addClass("controcm");
		$(mesdoc).removeClass("controcm");
		$(mesdoc).addClass("messelected");
		buscar(mescal);
	}
	function ThumNoticesOc(){
		$('#noticias_mes').fadeIn(25);
		$('#ver_noticiames').fadeOut(25);
		$('.controlesmes').fadeIn(25);
	}
</script>

<?php
$ActualMes=date("m");
$ContarMes=1;
echo "<center class='controlesmes'>";
while($ContarMes<=$ActualMes){
	$cfrc=date("Y")."-".$ContarMes."-01";
	$cfrf=date("Y")."-".$ContarMes."-31";
	$cfrpfSQL = "SELECT id FROM data02 WHERE FechaPublicacion>='$cfrc' and FechaPublicacion<'$cfrf' ORDER BY FechaPublicacion ASC";
	$cfrpfSQL = mysql_query($cfrpfSQL);
	$cfrpfROW = mysql_fetch_array($cfrpfSQL);
	if($cfrpfROW['id']!=""){
	if($ContarMes==$ActualMes){
		echo "<span onclick='ChangeNotices(".$ContarMes.",\".controldelmes".$ContarMes."\");' class='messelected controldelmes".$ContarMes."'>".fechaMes($ContarMes)."</span> ";
	}
	else echo "<span onclick='ChangeNotices(".$ContarMes.",\".controldelmes".$ContarMes."\");' class='controcm controldelmes".$ContarMes."'>".fechaMes($ContarMes)."</span> - ";
	}
	$ContarMes++;
}
echo "</center>";
?><br>
<div id="noticias_mes"></div>
<div id="ver_noticiames" class="noticias thumb-notices">
</div>
<a style='cursor:pointer' class='top-enlace'><img src="./img/flecha-arriba.png"></a>
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
});</script>

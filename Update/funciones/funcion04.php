<style>
.anioselected{
	cursor:pointer;
	padding:5px;
	border:2px solid red;
	border-radius:5px;
	background:linear-gradient(#FF8080,#FF4E4E);
	color:white;
	font-weight:bold;
	color:white;
}
.controcmanio{
	cursor:pointer;
	font-family:"Comic Sans";
	font-weight:bold;
	color:red;
}
</style>
<?php
$anioact=date("Y");
echo "<script>
var noticiasanio = $anioact;
</script>";
require("../config/config02.php");
?>
<script type='text/javascript'>
	function buscaranio(not){
		var noticiasanio = not;
			var dataString = 'noticiasanio='+noticiasanio;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion0401.php',
				data: dataString,
				beforeSend: function () {
					$("#noticias_anio").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('#noticias_anio').fadeIn(0);
					$('#noticias_anio').html(data);
				}
			});
	}
	function verNotAnio(noti){
		var noticiasanio = noti;
			var dataString = 'noticiasanio='+noticiasanio;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion040101.php',
				data: dataString,
				beforeSend: function () {
					$("#ver_noticiaanio").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('.controlesanio').fadeOut(0);
					$('#ver_noticiaanio').fadeIn(0);
					$('#ver_noticiaanio').html(data);
				}
			});
	}
	buscaranio(noticiasanio);
	function ChangeNoticesAnio(aniocal,aniodoc){
		$(".controlesanio span").removeClass("anioselected");
		$(".controlesanio span").addClass("controcmanio");
		$(aniodoc).removeClass("controcmanio");
		$(aniodoc).addClass("anioselected");
		buscaranio(aniocal);
	}
	function ThumNoticesOc(){
		$('#noticias_anio').fadeIn(25);
		$('#ver_noticiaanio').fadeOut(25);
		$('.controlesanio').fadeIn(25);
	}
</script>

<?php
$Actualanio=date("Y");
$Contaranio=2015;
echo "<center id='top_año' class='controlesanio'>";
while($Actualanio>=$Contaranio){
	if($Actualanio==date("Y")){
		echo "<span onclick='ChangeNoticesAnio(".$Actualanio.",\".controldelanio".$Actualanio."\");' class='anioselected controldelanio".$Actualanio."'>$Actualanio</span> ";
	}
	else echo " - <span onclick='ChangeNoticesAnio(".$Actualanio.",\".controldelanio".$Actualanio."\");' class='controcmanio controldelanio".$Actualanio."'>$Actualanio</span> ";
	$Actualanio--;
}
echo "</center>";
?><br>
<div id="noticias_anio"></div>
<div id="ver_noticiaanio" class="noticias">
</div>


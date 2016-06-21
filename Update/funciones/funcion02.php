<style>
#prev, #sig{
	cursor:pointer;
	font-family:"Comic Sans";
	font-weight:bold;
	color:red;
}
.page-number{
	cursor:pointer;
	padding:5px;
	border:2px solid red;
	border-radius:5px;
	background:linear-gradient(#FF8080,#FF4E4E);
	color:white;
	font-weight:bold;
}
</style>
<?php
$IdUlNoti=0;
include("../config/config00.php");
$BuscarIdSQL = "SELECT id FROM data02 ORDER BY FechaPublicacion DESC";
$BuscarIdSQL = mysql_query($BuscarIdSQL);
$en=0;
while($BuscarIdROW = mysql_fetch_array($BuscarIdSQL) and $en!=1){
	$IdUlNoti = $BuscarIdROW['id'];
	$en++;
}
echo "<script>
var noticias = $IdUlNoti;
var noticiasPrev = $IdUlNoti;
</script>";
?>
<script type='text/javascript'>
	var pagina = 1;
	document.getElementById("numero_pagina").innerHTML = pagina;
	function buscar(not){
		var noticia = not;
			var dataString = 'noticia='+noticia;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion0201.php',
				data: dataString,
				beforeSend: function () {
					$("#noticias_rel").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('#noticias_rel').fadeIn(0);
					$('#noticias_rel').html(data);
				}
			});
	}
	function verNot(noti){
		var noticia = noti;
			var dataString = 'noticia='+noticia;
			$.ajax({
				type: 'POST',
				url: './funciones/subfuncion020101.php',
				data: dataString,
				beforeSend: function () {
					$("#ver_noticias").html("Procesando, espere por favor...");
				},
				success: function(data) {
					$('#ver_noticias').fadeIn(0);
					$('#ver_noticias').html(data);
				}
			});
	}
	buscar(noticias);
	function nmostrar(){
		$('#buscador').fadeIn(0);
		$('#trabajador').fadeOut(0);
		$('#v_b').fadeOut(0);
	}
	function noticiasCambiar(contar,operacion){
		if(operacion=="-"){
			noticias=contar-5;
			buscar(noticias);
			if(noticias<=1) PrevSig("#sig","-");
			if(noticias<noticiasPrev) PrevSig("#prev","+");
			pagina++;
			document.getElementById("numero_pagina").innerHTML = pagina;
		}
		if(operacion=="+"){
			noticias=contar+5;
			buscar(noticias);
			if(noticias>=noticiasPrev) PrevSig("#prev","-");
			if(noticias>1) PrevSig("#sig","+");
			pagina--;
			document.getElementById("numero_pagina").innerHTML = pagina;
		}
	}
	function PrevSig(showenl,apa){
		if(apa=="-")
		$(showenl).fadeOut(0);
		if(apa=="+")
		$(showenl).fadeIn(0);
	}
	function ThumNoticesOc(){
		$('#noticias_rel').fadeIn(25);
		$('#ver_noticias').fadeOut(25);
		$('.controles').fadeIn(25);
	}
	function reset(){
		pagina=1;
		noticias=noticiasPrev;
		PrevSig('#prev',"-");
		PrevSig('#sig',"+");
		document.getElementById("numero_pagina").innerHTML = pagina;
		buscar(noticias);
	}
</script>
<div id="noticias_rel"></div><br>
<center class="controles"><a id="prev" onclick="noticiasCambiar(noticias,'+');"><<-</a>&nbsp;<span class="page-number" onclick="reset();" alt="Volver a la primera página" title="Volver a la primera página">Página <span id="numero_pagina" ></span></span>&nbsp;<a id="sig" onclick="noticiasCambiar(noticias,'-');">->></a></center>
<script>
PrevSig('#prev',"-");
</script>
<div id="ver_noticias" class="noticias thumb-notices">
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

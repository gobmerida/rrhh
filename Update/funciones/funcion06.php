<script>
var nId=2;
function funcionG01(campo){
	$(campo).removeAttr("onchange");
	$(".bck").removeAttr("disabled");
	if(nId<=20){
	$("#addca").before("<tr><td><input type='file' class='ImagenGaleria' id='imagen"+nId+"' name='imagen"+nId+"' accept='image/*' onchange='funcionG01(\"#imagen"+nId+"\")' /></td><td><input type='radio' class='bck' name='BackgroundAlbum' value='"+nId+"' disabled='off' /></td></tr>");
	nId++;
	}
}
function funcionG02(){
}
</script>
<style>
	.IdForm{margin:0 auto}
</style>
<form id="GaleriaRRHH" enctype="multipart/form-data" onsubmit="return evitar(this)">
	<table class="IdForm">
		<tr><td colspan="2"><label>Nombre del Albúm</label></td></tr>
		<tr><td colspan="2"><input type="text" class="noti-in text-cont" name="NombreAlbum" id="NombreAlbum" autocomplete="off" /></td></tr>
		<tr><td colspan="2"><hr></td></tr>
		<tr><td colspan="2"><label>Fotos a cargar (Límite de carga 20 fotos)</label></td></tr>
		<tr><td><input type="file" class="ImagenGaleria" id="imagen1" name="imagen1" accept="image/*" onchange="funcionG01('#imagen1')" /></td><td><input type="radio" name="BackgroundAlbum" checked="checked" value="1" /></td></tr>
		<tr id="addca"><td colspan="2"><hr></td></tr>
		<tr><td><button id="add">Cargar</button></td></tr>
	</table>
</form>
<div id="checking" style="display:none">
	Albúm Cargado
</div>
<script>
function evitar(eventos){
	return false;
}
$("#add").button().on("click",function(){
	funcion00();
});
</script>
<div id="cargara"></div>

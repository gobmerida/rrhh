<?php
$data01 = $_POST['album'];
?>
<script>
var nIds=2;
function funcionG02(campo){
	$(campo).removeAttr("onchange");
	if(nIds<=20){
	$("#addcae").before("<tr><td><input type='file' class='ImagenGaleria' id='imagen"+nIds+"' name='imagen"+nIds+"' accept='image/*' onchange='funcionG02(\"#imagen"+nIds+"\")' /></td></tr>");
	nIds++;
	}
}
</script>
<style>
	.IdForm{margin:0 auto}
</style>
<div id="NewPic" title="Agregar nuevas fotos">
<form id="GaleriaRRHHFoto" enctype="multipart/form-data" onsubmit="return evitar(this)">
	<input type="hidden" name="data00" value="<?php echo $data01;?>" />
	<table class="IdForm">
		<tr><td><label>Fotos a cargar (Límite de carga 20 fotos)</label></td></tr>
		<tr><td><input type="file" class="ImagenGaleria" id="imagen1" name="imagen1" accept="image/*" onchange="funcionG02('#imagen1')" /></td></tr>
		<tr id="addcae"><td><hr></td></tr>
		<tr><td><button id="adds">Cargar</button></td></tr>
	</table>
</form>
</div>
<div id="checkingadd">
	Fotos Cargadas al Albúm
</div>
<script>
function evitar(eventos){
	return false;
}
$("#NewPic").dialog({
	modal:true,
	width:650,
	close: function(){
		$(this).remove();
		funcion02("<?php echo $data01; ?>");
	}
	});
$("#adds").button().on("click",function(){
	funcion05();
});
</script>
<div id="subirnuevasfotos"></div>

<script src="./js/function01.js"></script>
<div id="ingreso_noticia" class="content-noticia" >
<div class="ui-tabs ui-corner-all content-principal">Ingresar nueva noticia</div>

<div style="padding:10px">
<form id='g_noticia' enctype="multipart/form-data" method="post"  onsubmit="return validar(this);">
	<table class="carga-noticias">
		<tr>
			<td>Título</td><td><input type="text" name="titulo_no" id="titulo_no" class="noti-in text-cont" autocomplete="off" onkeyup="c_sel(this,'#Error_Titulo')" onkeypress='return permite(event, "esp")'/><div class='error-noti' id='Error_Titulo'>Introduzca el título de la noticia</div></td>
		</tr>
		<tr>	
			<td>Contenido</td><td><textarea type="text" id="contenido_no" name="contenido_no" class="noti-in cont-text" autocomplete="off" onkeyup="c_sel(this,'#Error_Contenido')" onkeypress='return permite(event, "esp")'></textarea><div class='error-noti' id='Error_Contenido'>Introduzca el contenido de la noticia</div></td>
		</tr>
		<tr>
			<td>Foto</td><td><input type="file" id="imagem" name="imagem" accept="image/*" onclick="c_sel(this,'#Error_Imagen')" onchange="return ShowImagePreview(this.files);" /><div class='error-noti' id='Error_Imagen'>Seleccione la imagen</div></td>
		</tr>
		<tr>	
			<td>Proviene</td><td>
			<select name="relevancia" id="relevancia" onclick="c_sel(this,'#Error_relevancia')">
				<option value="">Proviene</option>
				<option value="0">De RRHH</option>
				<option value="1">Otras</option>
			</select>
			<div class='error-noti' id='Error_relevancia'>Seleccione de donde proviene</div>
			</td>
		</tr>
		<?php
			$QuienPublica = $_SESSION['IdRol_pagerrhh'];
			echo "<input type='hidden' name='quienp' id='quienp' value='$QuienPublica'/>";
		?>
		<tr><td colspan="2"><input type="submit" value="Publicar" id="PubSub"/></td></tr>
	</table>
</form>
<br>

<center>
<div class="progress">
<div id="progresso" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
</div>
</center>

<div id="previewcanvascontainer" class="previewcanvascontainer">
<canvas id="previewcanvas">
</canvas>
</div>
</div>
</div>
<div id="trabajador_c" class="trabajador_c"></div>


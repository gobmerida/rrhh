<?php
require("../config/config00.php");
//~ funcion00();
$id = $_GET['noticia'];
$editNoticiaSQL = "SELECT * FROM data02 WHERE id='$id'";
$editNoticiaSQL = mysql_query($editNoticiaSQL);
$editNoticiaROW = mysql_fetch_array($editNoticiaSQL);
$idnotedi = $editNoticiaROW['id'];
$nocache=md5(date("Y-m-s H:i:s"));
//~ echo $editNoticiaROW['id'];
?>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Recursos Humanos</title>
	<link rel="shortcut icon" href="../img/icono.png" type="image/ico" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/jquery-ui-tema.css">
	<link rel="stylesheet" href="../css/tema.css">
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/menu.css">
	<script src="../js/jquery-1.10.2.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/canvas-to-blob.min.js"></script>
    <script src="../js/resize.js"></script>
    <script src="../js/preview.js"></script>
    <script src="../js/resize.config.js"></script>
    <style>
    body{
		background:url("../img/back_notices.png");
	}
	#editar_noticia{
		overflow:auto;
		border:none;
	}
	img.prew,canvas{
		width:320px;
		height:200px;
		border-radius:5px;
	}
	.previewcanvascontainer{
		display:inline;
	}
    </style>
</head>
<body>
<script src="../js/function02.js"></script>
<div id="editar_noticia" class="content-noticia" >
<div class="ui-tabs ui-corner-all content-principal">Editar noticia</div>

<div style="padding:10px">
<form id='g_noticia' enctype="multipart/form-data" method="post"  onsubmit="return validar(this);">
	<table class="carga-noticias">
		<input type="hidden" name="IdNoticia" value="<?php echo $idnotedi; ?>">
		<input type="hidden" id="selima" name="selima" value="0">
		<tr>
			<td>Título</td><td><input type="text" name="titulo_no" id="titulo_no" class="noti-in text-cont" autocomplete="off" onkeyup="c_sel(this,'#Error_Titulo')" onkeypress='return permite(event, "esp")' value="<?php echo $editNoticiaROW['TituloNoticia'];?>"/><div class='error-noti' id='Error_Titulo'>Introduzca el título de la noticia</div></td>
		</tr>
		<tr>	
			<td>Contenido</td><td><textarea type="text" id="contenido_no" name="contenido_no" class="noti-in cont-text" autocomplete="off" onkeyup="c_sel(this,'#Error_Contenido')" onkeypress='return permite(event, "esp")'><?php echo str_replace("<br />","",$editNoticiaROW['ContenidoNoticia']);?></textarea><div class='error-noti' id='Error_Contenido'>Introduzca el contenido de la noticia</div></td>
		</tr>
		<tr>
			<td>Foto</td><td><input type="file" id="imagem" name="imagem" accept="image/*" onclick="c_sel(this,'#Error_Imagen');selimag();" onchange="return ShowImagePreview(this.files);" /><div class='error-noti' id='Error_Imagen'>Seleccione la imagen</div></td>
		</tr>
		<tr>	
			<td>Proviene</td><td>
			<select name="relevancia" id="relevancia" onclick="c_sel(this,'#Error_relevancia')">
				<option value="">Proviene</option>
				<?php
				if($editNoticiaROW['InternaExterna']=="0"){
					echo "
					<option value='0' selected>De RRHH</option>
					<option value='1'>Otras</option>
					";
				}
				if($editNoticiaROW['InternaExterna']=="1"){
					echo "
					<option value='0'>De RRHH</option>
					<option value='1' selected>Otras</option>
					";
				}
				
				?>
			</select>
			<div class='error-noti' id='Error_relevancia'>Seleccione de donde proviene</div>
			</td>
		</tr>
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
<center>
	<?php
echo "<img class='prew' src='notices.php?id=$idnotedi?$nocache'>";
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<canvas id="previewcanvas">
</canvas>
</center>
</div>
</div>
</div><br>
<div id="cargaeditada"></div>
</body>
</html>


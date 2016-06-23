<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>D.E.P.P. de Recursos Humanos del Estado Mérida</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
		      	<a class="navbar-brand" href="#">RRHH</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    	<ul class="nav navbar-nav">
			        <li class="active"><a href="/rrhh/">Inicio <span class="sr-only">(current)</span></a></li>
			        <li><a href="/rrhh/">Salir <span class="sr-only">(current)</span></a></li>
			        
		        </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
			<img src="../img/header3.png" class="img-responsive" alt="">
			</div>
		
	</header>
	<div class="hidden-xs col-sm-2 col-md-2"></div>

	<div class="col-sm-8 col-md-8" id="main">
			<div class="hidden-xs col-sm-3 col-md-3"></div>
				<div class="col-sm-6	 col-md-6	">
				
					<form id='g_noticia' enctype="multipart/form-data" method="post"  onsubmit="return validar(this);" action="recepcion.php">
						<div class="form-group">
							<label for="">Título</label>
							<input type="text" name="titulo" id="titulo_no" class="form-control" autocomplete="off" />
						</div>
						<div class="form-grup">
							<label for="">Contenido</label>
							<textarea type="text" id="contenido" name="contenido" class="form-control" autocomplete="off" rows="10"></textarea>
						</div>
						
						<div class="form-grup">
							<label>Foto</label>
							<input type="file" id="imagen" name="imagen"/>
						</div>
						
						<div class="form-grup">
							<label for="">Proviene</label>
							<select name="relevancia" id="relevancia" class="form-control">
								<option value="">Proviene</option>
								<option value="0">De RRHH</option>
								<option value="1">Otras</option>
							</select>
						</div>
							
						<?php
							$QuienPublica = $_SESSION['IdRol_pagerrhh'];
							echo "<input type='hidden' name='quienp' id='quienp' value='$QuienPublica'/>";
						?>
						<center><input type="submit" value="Publicar" id="PubSub" class="btn btn-danger  btn-lg" /></center>
						
					</form>
				</div>
			<div class="hidden-xs col-sm-3 col-md-3"></div>	
	</div>

	<div class="hidden-xs col-sm-2 col-md-2"></div>

	<footer class="boot">
		<br>
		<br>
		<div class="container ">
			<b> Sitio Web Desarrollo y Administrado por el Departamento de Informatica de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b>
		</div>
		<br>
	</footer>
	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/magicslideshow.js"></script>
</body>
</html>
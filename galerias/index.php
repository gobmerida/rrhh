<?php
session_start();
@$nombre  = $_SESSION['name'];
@$usuario = $_SESSION['usr'];

	if(!isset($nombre)){
		echo "<script>alert('No tienes derecho a ver esta pagína');window.location='login.php';</script>"; /* Si no ha iniciado la sesion, vamos a user.php */
	}else{
	require_once '../db/conexion.php';	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=960">
	<title>D.E.P.P. de Recursos Humanos del Estado Mérida</title>
	<link rel="shortcut icon" href="../img/icono.png" type="image/ico" />
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
			        <li><a href="../index.php">Salir <span class="sr-only">(current)</span></a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
					<img src="../img/header4.jpg" class="img-responsive" alt="">
			</div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<dvi class="col-sm-2 col-md-2"></dvi>
			<div class="col-sm-8 col-md-8" id="main">
          <form action="crear.php" method="post" class="col-sm-6 col-md-offset-3" id="form-galeria" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="nombre">Nombre de la galeria</label>
                  <input type="text" name="nombre" class="form-control input-lg" placeholder="Nombre de la galeria" autocomplete="off">
              </div>
              <div class="form-group">
                  <label for="foto">Fotos del album</label>
                  <input type="file" name="foto[]" value="Subir foto"  multiple="multiple">
              </div>
              <button type="submit" class="btn btn-danger btn-sm">Guardar galeria</button>
          </form>
          
			</div>
			<dvi class="col-sm-2 col-md-2"></dvi>
		</div>
	</div>

	<footer>
			<b> Sitio Web Desarrollo y Administrado por el Departamento de Informatica de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b>
	</footer>
	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/magicslideshow.js"></script>
</body>
</html>

<?php } ?>
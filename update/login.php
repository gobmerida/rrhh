<?php

	extract($_GET);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=960">
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
			        <li><a href="../index.php">Inicio <span class="sr-only">(current)</span></a></li>
		        </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
				<img src="../img/header3.png" class="img-responsive" alt="">
			</div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<dvi class="col-sm-2 col-md-2">
				
			</dvi>
			<div class="col-sm-8 col-md-8" >
				<form action="Login.php" method="post" class="col-sm-6 col-md-offset-3" id="form-galeria">
					<div class="form-group">
						<label for="">Usuario</label>
						<input type="text" name="usuario" class="form-control input-lg" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="">Contraseña</label>
						<input type="password" name="pass" class="form-control input-lg" >
					</div>
					<?php if (@$q==1) { ?>
						<div class="alert alert-danger" role="alert">ERROR: Debe ingresar los datos</div>
					<?php }elseif (@$q==2) { ?>
						<div class="alert alert-danger" role="alert">ERROR: Usuario no registrado en el sistema</div>
					<?php } ?>
					
					<input type="hidden" name="submit" value="1">
					<center><button type="submit" class="btn btn-danger btn-lg ">Ingresar</button></center>

				</form>
			</div>
			<dvi class="col-sm-2 col-md-2"></dvi>
		</div>

	</div>

	<footer>
			<b> Sitio Web Desarrollo y Administrado por el Departamento de Informatica de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b><br><br>
			<a href="https://twitter.com/rrhh_gob_merida" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @rrhh_gob_merida</a>
			<div class="fb-follow color" data-href="https://www.facebook.com/zuck" data-layout="button" data-size="large" ></div>
	</footer>
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/magicslideshow.js"></script>
</body>
</html>

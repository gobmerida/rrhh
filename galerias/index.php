<?php
session_name("loginUsuario");
session_start();
$self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
header("refresh:600; url=$self"); //Refrescamos cada 300 segundos

//antes de hacer los cálculos, compruebo que el usuario está logueado
//utilizamos el mismo script que antes
if ($_SESSION["autentificado"] != "SI") {
    //si no está logueado lo envío a la página de autentificación
    header("Location: login.php");
} else {
    //sino, calculamos el tiempo transcurrido
    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
     if($tiempo_transcurrido >= 100) {
     //si pasaron 10 minutos o más
      session_destroy(); // destruyo la sesión
      echo "<script>alert('Su session a caducado por inactividad');window.location='login.php';</script>";

      //header("Location: login.php"); //envío al usuario a la pag. de autenticación
      //sino, actualizo la fecha de la sesión
    }else {
    $_SESSION["ultimoAcceso"] = $ahora;
   }

   extract($_GET);
}
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
			        <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><span class="caret"></span></a>
				        <ul class="dropdown-menu">
				           	<li><a href="logaout.php" class="reseña">Salir</a></li>
				        </ul>
			        </li>
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
                  <input type="text" name="nombre" class="form-control input-lg" placeholder="Nombre de la galeria" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label for="foto">Fotos del album</label>
                  <input type="file" name="foto[]" value="Subir foto"  multiple="multiple" required>
              </div>
              <?php if (@$q==1) { ?>
						<div class="alert alert-success" role="alert">Galeria creada correctamente</div>
					<?php }elseif (@$q==2) { ?>
						<div class="alert alert-danger" role="alert">ERROR: Usuario no registrado en nuestra base de datos</div>
					<?php } ?>
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
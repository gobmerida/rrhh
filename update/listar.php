<?php 
session_name("loginUsuario");
session_start();

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
   require_once '../db/conexion.php';

   $query = "select * from data02";
   $result = mysql_query($query);
   
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="refresh" content="300" />
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
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?><span class="caret"></span></a>
				        <ul class="dropdown-menu">
				           	<li><a href="logaout.php" class="reseña">Salir</a></li>
				           	<li><a href="listar.php" class="reseña">Editar</a></li>
				        </ul>
			        </li>
			        <li><a href="index.php" class="reseña">Inicio</a></li>
		        </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
			<img src="../img/header4.jpg" class="img-responsive" alt="">
			</div>

	</header>
	<div class="hidden-xs col-sm-2 col-md-2"></div>

	<div class="col-sm-8 col-md-8" id="main">
			<div class="hidden-xs col-sm-2 col-md-2"></div>
				<div class="col-sm-8 col-md-8">
					<div class="table-responsive ">
					<?php if (@$q==1) { ?>
						<div class="alert alert-success" role="alert">Noticia editada con exito </div>
						<?php }elseif (@$q==2) { ?>
							<div class="alert alert-success" role="alert">ERROR: no se pudo editar la noticia</div>
						<?php } ?>
					  <table class="table table-bordered " id="editar">
					  	<tr>
					  		<th>#</th>
					  		<th>Titulo de noticia</th>
					  		<th>Contenido</th>
					  		<th>Fecha de publicacion</th>
					  		<th>Editar</th>
					  	</tr>
					  	
					  		<?php while ($noticia = mysql_fetch_array($result)) { ?>
					  		<tr <?php if($noticia[0]==@$n)echo 'class="alert alert-success"' ?>>
					  			<td><?php echo $noticia[0]; ?></td>
					  			<td><?php echo $noticia[1]; ?></td>
					  			<td><?php echo substr($noticia[2], 0,50)."..."; ?></td>
					  			<td><?php echo $noticia[3]; ?></td>
					  			<td><a class="btn btn-danger" href="editar.php?Q=<?php echo $noticia[0]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>					  		
					  		</tr>
					  		<?php } ?>
					  	
					  	
					  </table>

					  <center>
					  	<a class="btn btn-danger" href="index.php" role="button">Volver</a>
					  </center>
					  
					</div>
				</div>
			<div class="hidden-xs col-sm-3 col-md-3"></div>
	</div>

	<div class="hidden-xs col-sm-2 col-md-2"></div>

<footer >
			<b>© 2016 D.E.P.P. de Recursos Humanos del Estado Mérida.</b><br>
			<a href="https://twitter.com/rrhh_gob_merida" target="_blank" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @rrhh_gob_merida</a>
			<div class="fb-follow color" target="_blank" data-href="https://www.facebook.com/zuck" data-layout="button" data-size="large" ></div>
	</footer>
	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/magicslideshow.js"></script>
</body>
</html>
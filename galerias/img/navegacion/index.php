<?php

	require_once 'db/conexion.php';

	$query = "select max(id) from data02";
	$result = mysql_query($query);
	$res   = mysql_fetch_array($result);


	$querynot = "select * from data02 where id= '$res[0]'";
	$resultnot = mysql_query($querynot);
	$resnot   = mysql_fetch_array($resultnot);

	$querygal = "select max(id) from galeria";
	$resultgal = mysql_query($querygal);
	$resgal   = mysql_fetch_array($resultgal);


	$querygaleria = "select * from galeria where id= '$resgal[0]'";
	$resultgaleria = mysql_query($querygaleria);
	$resgaleria   = mysql_fetch_array($resultgaleria);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=960">
	<title>D.E.P.P. de Recursos Humanos del Estado Mérida</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">


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
			        <li><a href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
			        <li><a href="#" class="noticias">Noticias</a></li>
			        <li><a href="#" class="galeria">Galeria</a></li>
							<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sobre Nosotros<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				           	<li><a href="#" class="reseña">Reseña Historica</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="#" class="myv">Misión Y visión</a></li>
				             <li role="separator" class="divider"></li>
				            <li><a href="#" class="objetivos">Objetivos</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="#" class="funciones">Funciones RRHH</a></li>
				        </ul>
			        </li>
							<li><a href="#" class="contacto">Contacto</a></li>
			        <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Constancias y Recibos<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				           	<li><a href="#">Constancias y Recibos</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="#">Verificar Constancia</a></li>
				        </ul>
			        </li>

		        </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
					<img src="img/header4.jpg" class="img-responsive" alt="">
			</div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<dvi class="col-sm-2 col-md-2">
				<div id="timeline-twitter" class="timeline-twitt">
					<h4 class="h">TWITTER DEPPRH</h4>
						<a class="twitter-timeline enlace-twitter" style="z-index: 2;" width="240" height="320" data-theme="light" data-link-color="#0084b4" data-chrome="   " data-border-color="#e8e8e8" data-tweet-limit="0" data-related="" data-screen-name="rrhh_gob_merida" data-show-replies="false" data-aria-polite="Polite" lang="ES" href="https://twitter.com/rrhh_gob_merida" data-widget-id="332093127265484800"><img src="./img/loading.gif" style="width:8%"> Cargando Twitter</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</dvi>
			<div class=" col-xs-12 col-sm-12 col-md-8" id="main">
					<div id="slider-wrapper">
				      <div id="slider">
				        <a href="noticiasf.php?id=<?php echo $resnot[0]; ?>"><img src="update/img/<?php echo $resnot[6]; ?>" /><p ><?php echo "<span class='text'>". ucwords($resnot[1])."</span></br><span class='text2'>".substr($resnot[2], 0, 100)."...</span>"; ?></p></a>
				        <a href="galerias/img/<?php echo $resgaleria[1]."/"; ?>"><img src="galerias/img/<?php echo $resgaleria[1]."/".$resgaleria[2]; ?>" /><p ><?php echo "<span class='text'>". ucwords($resgaleria[1]); ?></p></a>
				        <a href="#"><img src="update/img/images3.jpeg" /><p>MENSAJES</p></a>

				      </div>

				      <a href="javascript:void();" class="mas">&rsaquo;</a>
				      <a href="javascript:void();" class="menos">&lsaquo;</a>
				  </div>


			</div>
			<dvi class="col-sm-2 col-md-2">

			</dvi>
		</div>
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">
			<marquee class="hidden-xs" direction="right" scrollamount="4">
					<a href=""><img src="img/insti/171.png" alt=""></a>
					<a href=""><img src="img/insti/bomberos.png" alt=""></a>
					<a href=""><img src="img/insti/fundacite.jpg" alt=""></a>
					<a href=""><img src="img/insti/gobernacion.jpg" alt=""></a>
					<a href=""><img src="img/insti/gobierno_linea.jpg" alt=""></a>
					<a href=""><img src="img/insti/logo_merida1.png" alt=""></a>
					<a href=""><img src="img/insti/ona.jpg" alt=""></a>
					<a href=""><img src="img/insti/pcmerida.jpg" alt=""></a>
					<a href=""><img src="img/insti/polcia.png" alt=""></a>
					<a href=""><img src="img/insti/saime.png" alt=""></a>
			</marquee>
		</div>
		<div class="col-sm-2 col-md-2"></div>

	</div>

	<footer>
			<b> Sitio Web Desarrollo y Administrado por el Departamento de Informatica de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b>
	</footer>
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/magicslideshow.js"></script>
	<script>
		$(function(){

			$(".reseña").click(function(){
				$("#main").load("reseña.html");
			});
			$(".funciones").click(function(){
				$("#main").load("funciones.html");
			});
			$(".myv").click(function(){
				$("#main").load("myv.html");
			});
			$(".objetivos").click(function(){
				$("#main").load("objetivos.html");
			});
			$(".noticias").click(function(){
				$("#main").load("noticias.php");
			});
			$(".galeria").click(function(){
				$("#main").load("galeria.php");
			});
		});

	</script>

	<script>
			$(function(){
				$('#slider a:gt(0)').hide();
				var interval = setInterval(changeDiv, 6000);
				function changeDiv(){
				$('#slider a:first-child').fadeOut(1000).next('a').fadeIn(1000).end().appendTo('#slider');
				};
				$('.mas').click(function(){
				changeDiv();
				clearInterval(interval);
				interval = setInterval(changeDiv, 6000);
				});
				$('.menos').click(function(){
				$('#slider a:first-child').fadeOut(1000);
				$('#slider a:last-child').fadeIn(1000).prependTo('#slider');
				clearInterval(interval);
				interval = setInterval(changeDiv, 6000);
				});
			});
	</script>

	<script>
	    $(document).ready(function(){
	        $('.myCarousel').carousel()
	    });
	</script>



</body>
</html>

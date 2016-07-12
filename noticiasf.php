<?php 

  require_once 'db/conexion.php';
              extract($_GET);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>D.E.P.P. de Recursos Humanos del Estado Mérida</title>
  <link rel="shortcut icon" href="img/icono.png" type="image/ico" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--script para botones de twitter  -->

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

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
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quienes somos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#" class="reseña">Reseña Histórica</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" class="myv">Misión Y visión</a></li>
                     <li role="separator" class="divider"></li>
                    <li><a href="#" class="objetivos">Objetivos</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" class="funciones">Funciones RRHH</a></li>
                </ul>
              </li>
              <li><a href="noticias.php">Noticias</a></li>
              <li><a href="#" class="galeria">Galería  </a></li>
          <li><a href="#" class="contacto">Contacto</a></li>
            <li><a href="/constancias/">Constancias y Recibos</a></li>
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
      <div class="hidden-xs col-sm-2 col-md-2">
        <div id="timeline-twitter" class="timeline-twitt">
          <h4 class="h">TWITTER DEPPRH</h4>
            <a class="twitter-timeline enlace-twitter" style="z-index: 2;" width="240" height="320" data-theme="light" data-link-color="#0084b4" data-chrome="   " data-border-color="#e8e8e8" data-tweet-limit="0" data-related="" data-screen-name="rrhh_gob_merida" data-show-replies="false" data-aria-polite="Polite" lang="ES" href="https://twitter.com/rrhh_gob_merida" data-widget-id="332093127265484800"><img src="./img/loading.gif" style="width:8%"> Cargando Twitter</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        
      </div>
      <div class="col-sm-8 col-md-8" id="main">
          <?php
              
              $ids=$id;

              $sql   = "select * from data02 where id='$ids' order by FechaPublicacion ";
              $query = mysql_query($sql);
              $res = mysql_fetch_array($query);
          ?>

              <div class="noti">

                  <div class="caption text-justify">
                    <a href="noticias.php" class="regresar">X</a>
                    <h3><?php echo $res[1]; ?></h3> <h5><?php echo "<b>Fecha de publicacion (".$res[3].")</b>"; ?></h5>
                    <p><img src="<?php echo 'update/img/'.$res[6]; ?>" alt="" class="img"><?php echo $res[2]; ?></p>
                  </div>
              </div>
              <br>
              <br>

      </div>
      <div class="hidden-xs col-sm-2 col-md-2"></div><br>
    
      
    </div>
		<div class="col-sm-2 col-md-2"></div>
    
  </div>
  <div class="col-sm-2 col-md-2"></div>
  <div class="col-sm-8 col-md-8">
      <br>
<br>
<br>
<br>
<br>
<br>
<br>
  <marquee class="hidden-xs marq" direction="left" onmouseout="this.start();" onmouseover="this.stop();" scrollamount="4">
          <a href="http://171.merida.gob.ve/" target="_blank"><img src="img/insti/171.png" alt=""></a>
          <a href="http://bomberosmerida.gob.ve/" target="_blank"><img src="img/insti/bomberos.png" alt=""></a>
          <a href="http://www.fundacite-merida.gob.ve/" target="_blank"><img src="img/insti/fundacite.jpg" alt=""></a>
          <a href="http://www.gobiernoenlinea.ve/home/homeG.dot" target="_blank"><img src="img/insti/gobierno_linea.jpg" alt=""></a>
          <a href="" target="_blank"><img src="img/insti/logo_merida1.png" alt=""></a>
          <a href="http://www.ona.gob.ve/"><img src="img/insti/ona.jpg" alt=""></a>
          <a href="http://www.pcmerida.gob.ve/" target="_blank"><img src="img/insti/pcmerida.jpg" alt=""></a>
          <a href="http://www.polimer.gob.ve/" target="_blank"><img src="img/insti/polcia.png" alt=""></a>
          <a href="https://pasaporte.saime.gob.ve/" target="_blank"><img src="img/insti/saime.png" alt=""></a>
        </marquee><br><br><br>
  </div>
  <div class="col-sm-2 col-md-2"></div>


 <footer >
      <b>Sitio Web Desarrollo y Administrado por el Departamento de Informática de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b><br>
      <a href="https://twitter.com/rrhh_gob_merida" target="_blank" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @rrhh_gob_merida</a>
      <div class="fb-follow color" target="_blank" data-href="https://www.facebook.com/zuck" data-layout="button" data-size="large" ></div>
  </footer>
  <script src="js/jquery-1.12.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/magicslideshow.js"></script>
  <script>
    $(function(){
      $(".inicio").click(function(){
        $("#main").load("inicio.php");
      });

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
        $("#main").load("noticias.php#main");
      });

      $(".galeria").click(function(){
        $("#main").load("galeria.php");
      });

    });

  </script>
</body>
</html>

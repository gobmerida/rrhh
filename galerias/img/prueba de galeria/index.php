<?php

    header("Content-Type:text/html;charset=utf-8");
    require_once '../../../db/conexion.php';

    extract($_GET);

    $query   = "select * from fotos where directorio = '$id'";
    $result  = mysql_query($query); 
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>D.E.P.P. de Recursos Humanos del Estado Mérida</title>
  <link rel="shortcut icon" href="../../../img/icono.png" type="image/ico" />
  <link rel="stylesheet" href="../../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../css/estilos.css">


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
              <li><a href="../../../">Inicio <span class="sr-only">(current)</span></a></li>
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
              <li><a href="../../../noticias.php">Noticias</a></li>
              <li><a href="#" class="galeria">Galería  </a></li>
          <li><a href="#" class="contacto">Contacto</a></li>
            <li><a href="/constancias/">Constancias y Recibos</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
      <div class="jumbotron">
          <img src="../../../img/header4.jpg" class="img-responsive" alt="">
      </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <dvi class="col-sm-2 col-md-2">
        <div id="timeline-twitter" class="hidden-xs hidden-sm timeline-twitt">
          <h4 class="h">TWITTER DEPPRH</h4>
            <a class="twitter-timeline" href="https://twitter.com/rrhh_gob_merida">Tweets by rrhh_gob_merida</a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57879f4419594413516f1fd6/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
      </dvi>
      <div class="col-sm-8 col-md-8 col-md-offset-1 body " id="main">
          <div id="slider-wrapper" >
              <div id="slider" >
                <?php while ($foto = mysql_fetch_array($result)) { ?>
                    <a href="#"><img src="<?php echo $foto[2]; ?>" /></a>
                <?php } ?>
              </div>

              <a href="javascript:void();" class="mas">&rsaquo;</a>
              <a href="javascript:void();" class="menos">&lsaquo;</a>
              <div >
                <center><h1 ><?php echo ucwords($id); ?></h1></center>
              </div>
              
          </div>

          <marquee class="hidden-xs marq" direction="left" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="4">
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
      <dvi class="col-sm-2 col-md-2">

      </dvi>
    </div>

  </div>

<footer >
      <b> Sitio Web Desarrollo y Administrado por el Departamento de Informatica de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b><br>
      <a href="https://twitter.com/rrhh_gob_merida" target="_blank" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @rrhh_gob_merida</a>
      <div class="fb-follow color" target="_blank" data-href="https://www.facebook.com/zuck" data-layout="button" data-size="large" ></div>
  </footer>
  <script src="../../../js/jquery-1.12.3.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/magicslideshow.js"></script>
  <script>
    $(function(){

      $(".inicio").click(function(){
        $("#main").load("/");
      });

      $(".reseña").click(function(){
        $("#main").load("../navegacion/resena.html");
      });
      $(".funciones").click(function(){
        $("#main").load("../navegacion/funciones.html");
      });
      $(".myv").click(function(){
        $("#main").load("../navegacion/myv.html");
      });
      $(".objetivos").click(function(){
        $("#main").load("../navegacion/objetivos.html");
      });
      $(".noticias").click(function(){
        $("#main").load("../navegacion/noticias.php#main");
      });

      $(".galeria").click(function(){
        $("#main").load("../navegacion/galeria.php");
      });
      $(".contacto").click(function(){
        $("#main").load("../navegacion/contacto.php");
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

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
              <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sobre Nosotros<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Reseña Historica</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Misión</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Visión</a></li>
                     <li role="separator" class="divider"></li>
                    <li><a href="#">Objetivos</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Funciones RRHH</a></li>
                </ul>
              </li>
              <li><a href="#" class="noticias">Noticias</a></li>
              <li><a href="#">Galeria</a></li>
              <li><a href="#">Contacto</a></li>

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
      <img src="img/header3.png" class="img-responsive" alt="">
      </div>
    
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="hidden-xs col-sm-2 col-md-2">
        Redes Sociales: Twitter, Facebook e Instagram
      </div>
      <div class="col-sm-8 col-md-8" id="main">
          <?php  
              require_once 'db/conexion.php';
              extract($_GET);
              $ids=$id;

              $sql   = "select * from data02 where id='$ids' order by FechaPublicacion ";
              $query = mysql_query($sql);
              $res = mysql_fetch_array($query);
          ?>
      
              <div class="noti">
                  
                  <div class="caption text-justify scroll">
                    <a href="#" class="noticiasf regresar">X</a>
                    <h3><?php echo $res[1]; ?></h3> <h5><?php echo "<b>Fecha de publicacion (".$res[3].")</b>"; ?></h5>
                    <p><img src="<?php echo 'update/img/'.$res[6]; ?>" alt="" class="img"><?php echo $res[2]; ?></p>
                  </div>
              </div>
              <br>
              <br>
      </div>
      <div class="hidden-xs col-sm-2 col-md-2">
        <aside>
          <div class="list-group">
            <a href="#" class="list-group-item active inicio">
              Inicio
            </a>
            <a href="#" class="list-group-item reseña">Reseña Histórica</a>
            <a href="#" class="list-group-item myv">Misión y Visón</a>
            <a href="#" class="list-group-item objetivos">Objetivos</a>
            <a href="#" class="list-group-item funciones" >Funciones RRHH</a>
            <a href="#" class="list-group-item noticias">Noticias</a>
            <a href="#" class="list-group-item">Galeria</a>
            <a href="#" class="list-group-item">Contacto</a>
            <a href="#" class="list-group-item">Constancias y Recibos</a>
            <a href="#" class="list-group-item">Verificar Constancia</a>
        </div>
        </aside>
      </div>
    </div>
  </div>

  <footer class="boot">
    <br>
    <br>
    <div class="container ">
      <b> Sitio Web Desarrollo y Administrado por el Departamento de Informatica de la D.E.P.P. de Recursos Humanos del Estado Mérida.</b>
    </div>
    <br>
  </footer>
  <script src="js/jquery-1.12.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/magicslideshow.js"></script>
  <script>
    $(function(){
      $(".inicio").click(function(){
        $("#main").load("inicio.html");
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
        $("#main").load("noticias.php");
      });

      $(".noticiasf").click(function(){
        $("#main").load("noticias.php");
      });

    });
      
  </script>
</body>
</html>







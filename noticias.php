<?php
    header("Content-Type:text/html;charset=utf-8");
    
    //conexion a la base de datos
    require_once 'db/conexion.php';

    //conectamos con la base de datos


    //establecemos condiciones de paginacion
    $registros = 3;

    @$pagina = $_GET ['pagina'];

    if (!isset($pagina))
    {
    $pagina = 1;
    $inicio = 0;
    }
    else
    {
    $inicio = ($pagina-1) * $registros;
    }

    //realizamos la busqueda en la base de datos
    $pegar = "SELECT * FROM data02 ORDER BY id DESC LIMIT ".$inicio." , ".$registros." ";
    $cad = mysql_query($pegar) or die ( 'error al listar, $pegar' .mysql_errno());

    //calculamos las paginas a mostrar

    $contar = "SELECT * FROM data02";
    $contarok = mysql_query($contar);
    $total_registros = mysql_num_rows($contarok);
    //$total_paginas = ($total_registros / $registros);
    $total_paginas = ceil($total_registros / $registros);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="viewport" content="width=960">
  <title>D.E.P.P. de Recursos Humanos del Estado Mérida</title>
  <link rel="shortcut icon" href="img/icono.png" type="image/ico" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<!-- script para botones de facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--script para botones de twitter  -->

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>


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
<!--End of Tawk.to Script-->
        
      </dvi>
      <div class="col-sm-8 col-md-8 " id="main">
        <table class="table1 ">
        <tr>
          <?php
              while ($array = mysql_fetch_array($cad))

              { ?>
                  <div class="col-sm-12 col-md-4">
                    <div class="thumbnail">
                    <h4 class="text-center"><b><?php echo $array[1]; ?></b></h4>
                      <div class="caption text-justify">
                        
                          <img src="<?php echo 'update/img/'.$array[6]; ?>" alt="" class="imgnot">
                          <p><?php echo substr($array[2], 0,250)."...."; $array[2];  ?></p>
                          <a href="noticiasf.php?id=<?php echo $array[0]; ?>" class="btn btn-danger" roll="boton  ">
                          Leer mas</a>
                      </div>
                    </div>
                  </div>      

          <?php }

          echo "</tr> </table>";
          //creando los enlaces de paginacion de resultados

              echo "<center> <nav><ul class='pagination pagination-lg'>";

              if($total_registros>$registros){
              if(($pagina - 1) > 0) {
              echo "<li> <a href='?pagina=".($pagina-1)."' aria-label='Previous'> <span aria-hidden='true'>&laquo;</span> </a> </li>";
              }
              // Numero de paginas a mostrar
              $num_paginas=10;
              //limitando las paginas mostradas
              $pagina_intervalo=ceil($num_paginas/2)-1;

              // Calculamos desde que numero de pagina se mostrara
              $pagina_desde=$pagina-$pagina_intervalo;
              $pagina_hasta=$pagina+$pagina_intervalo;

              // Verificar que pagina_desde sea negativo
              if($pagina_desde<1){ // le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados $pagina_hasta-=($pagina_desde-1); $pagina_desde=1; } // Verificar que pagina_hasta no sea mayor que paginas_totales if($pagina_hasta>$total_paginas){
              $pagina_desde-=($pagina_hasta-$total_paginas);
              $pagina_hasta=$total_paginas;
              if($pagina_desde<1){
              $pagina_desde=1;
              }
              }

              for ($i=$pagina_desde; $i<=$pagina_hasta; $i++){
              if ($pagina == $i){
                echo "<li class='pnumero active'><a href='#'>".$pagina."</a></li>";
              }else{
                echo "<li class='pnumero'><a href='?pagina=$i'>$i</a></li>";
              }
              }

              if(($pagina + 1)<=$total_paginas) {

                echo "<li>
                  <a href='?pagina=".($pagina+1)."' aria-label='Next'>
                    <span aria-hidden='true'>&raquo;</span>
                  </a>
                </li>";
              
              }
              } echo "</ul>
            </nav> </center>";
              ?>
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
              </marquee>
      </div>

    </div>
  </div>
  
  <footer >
      <b>© 2016 D.E.P.P. de Recursos Humanos del Estado Mérida.</b><br>
      <a href="https://twitter.com/rrhh_gob_merida" target="_blank" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @rrhh_gob_merida</a>
      <div class="fb-follow color" target="_blank" data-href="https://www.facebook.com/zuck" data-layout="button" data-size="large" ></div>
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

  <script>
  $(document).ready(function(){
    load(1);
  });

  function load(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'paises_ajax.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='loader.gif'>");
      },
      success:function(data){
        $(".outer_div").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }
  </script>



</body>
</html>
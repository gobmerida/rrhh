<?php

    header("Content-Type:text/html;charset=utf-8");
    require_once '../db/conexion.php';

    extract($_POST);
    $archivo = $_FILES["foto"]["name"][0];
    $dir = "img/".$nombre;
    $query  = "insert into galeria (`nombreDIR`, `fotoDIR`) values ('$nombre','$archivo')";
    $res = mysql_query($query) or die(mysql_error());

    $query2 = "select max(id) from galeria";
    $res2   = mysql_query($query2);
    $id2    = mysql_fetch_array($res2);

    echo $id2[0];

    umask(011);
    mkdir("img/".$_POST["nombre"], 0777);
    chmod("img/".$_POST["nombre"], 0777);
    chmod("var/www/html/", 777);

    foreach ($_FILES["foto"]["error"] as $key => $error) {
      $nombre_archivo = $_FILES["foto"]["name"][$key];
      $tipo_archivo = $_FILES["foto"]["type"][$key];
      $tamano_archivo = $_FILES["foto"]["size"][$key];
      $temp_archivo = $_FILES["foto"]["tmp_name"][$key];


          $nom_img = $nombre_archivo;
          
          echo $queryfotos = "INSERT INTO `fotos`(`foto`, `directorio`) VALUES ('$nom_img','$id2[0]')";
          mysql_query($queryfotos);

          if (!move_uploaded_file($temp_archivo,$dir . "/" . $nom_img))
          {
              echo "No se pudo cargar las fotos";
        }
    }

    //header('Location: index.php');

?>

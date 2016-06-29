<?php

    header("Content-Type:text/html;charset=utf-8");
    require_once '../db/conexion.php';

    extract($_POST);
    $archivo = $_FILES["foto"]["name"][0];

    $dir = "img/".$nombre;
    $dirpegar = "img/".$nombre."/index.php";
    $dirar = "iGaleria.php";


    $query  = "insert into galeria (`nombreDIR`, `fotoDIR`) values ('$nombre','$archivo')";
    $res = mysql_query($query) or die(mysql_error());

    

    umask(011);
    mkdir("img/".$_POST["nombre"], 0777);
    chmod("img/".$_POST["nombre"], 0777);

    if(isset($_FILES['foto'])){

      //almacenamos las propiedades de las imagenes
      $name_array = $_FILES['foto']['name'];
      $tmp_name_array = $_FILES['foto']['tmp_name'];
      $type_array = $_FILES['foto']['type'];
      $size_array = $_FILES['foto']['size'];
      $error_array = $_FILES['foto']['error'];

      //recorremos el array de imagenes para subirlas al simultaneo
      for($i = 0; $i < count($tmp_name_array); $i++){
          if(move_uploaded_file($tmp_name_array[$i],$dir."/".$name_array[$i])){

              //guardamos en la base de datos el nombre
              $act = "INSERT INTO fotos (directorio, foto) values ('$nombre','$name_array[$i]')";
              mysql_query($act);
          }
      }
    }
    
    copy($dirar, $dirpegar);

  header('Location: index.php');

?>


<?php  
  
    header("Content-Type:text/html;charset=utf-8");
    $h="localhost";
    $u="root";
    $p="infor1234";
    $con=mysql_connect($h,$u,$p) or die (mysql_error());
    mysql_select_db("PaginaMeridaGob_rrhh",$con) or die (mysql_error());
    mysql_query("SET NAMES 'utf8'");


    $sql   = "select * from data02 order by FechaPublicacion  LIMIT 0,3";
    $query = mysql_query($sql);


    while ($res = mysql_fetch_array($query)) { ?>

      <div class="col-sm-7 col-md-4">
        <div class="thumbnail">
        <img src="<?php echo 'update/img/'.$res[6]; ?>" alt="" class="imgnot">
          <div class="caption text-justify">
            <h3><?php echo $res[1]; ?></h3> <h5><?php echo "<b>Fecha de publicacion (".$res[3].")</b>"; ?></h5>
            <p><?php echo substr($res[2], 0,410)."....."; ?></p>
            <a href="noticiasf.php?id=<?php echo $res[0]; ?>" class="btn btn-danger" roll="boton  ">Leer mas</a>
          </div>
        </div>
      </div>

   <?php }


?>

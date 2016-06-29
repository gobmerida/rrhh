

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
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail">
          <div class="caption text-justify">
            <h4><b><?php echo $res[1]; ?></b></h4>
              <img src="<?php echo 'update/img/'.$res[6]; ?>" alt="" class="imgnot">
              <p><?php echo substr($res[2], 0,250)."...."; $res[2];  ?></p>
              <a href="noticiasf.php?id=<?php echo $res[0]; ?>" class="btn btn-danger" roll="boton  ">
              Leer mas</a>
          </div>
        </div>
      </div>

   <?php }

?>
<nav>
  <ul class="pagination col-sm-4 col-md-offset-3">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
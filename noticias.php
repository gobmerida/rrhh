
<?php  
  
    header("Content-Type:text/html;charset=utf-8");
    $h="localhost";
    $u="root";
    $p="infor1234";
    $con=mysql_connect($h,$u,$p) or die (mysql_error());
    mysql_select_db("PaginaMeridaGob_rrhh",$con) or die (mysql_error());
    mysql_query("SET NAMES 'utf8'");


    $sql   = "select * from data02 order by FechaPublicacion";
    $query = mysql_query($sql);


    while ($res = mysql_fetch_array($query)) { ?>

      <div class="col-sm-7 col-md-4">
        <div class="thumbnail">
        <img src="<?php echo 'update/img/'.$res[6]; ?>" alt="" class="imgnot">
          <div class="caption text-justify">
            <h3><?php echo $res[1]; ?></h3> <h5><?php echo "<b>Fecha de publicacion (".$res[3].")</b>"; ?></h5>
            <p><?php echo substr($res[2], 0,410)."....."; ?></p>
            <input type="hidden" class="id" value="<?php echo $res[0]; ?>">
            <button type="button" class="btn btn-primary boton" data-toggle="modal" data-target=".bs-example-modal-lg">Leer mas</button> 
          </div>
        </div>
      </div>

   <?php }


?>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="thumbnail">
      <?php 

        $sql   = "select * from data02 where id='<script>id2.val;</script>' order by FechaPublicacion ";
        $query = mysql_query($sql);
        $res = mysql_fetch_array($query);

      ?>
          
          <div class="caption text-justify">

            <h3><?php echo $res[1]; ?></h3> <h5><?php echo "<b>Fecha de publicacion (".$res[3].")</b>"; ?></h5>
            <p><img src="<?php echo 'update/img/'.$res[6]; ?>" alt="" class="img"><?php echo $res[2]; ?></p>
          </div>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function(){
      $('.boton').click(function(){
        var id3 = $('.id').val();
        var ol=$('#id2').value=id3;
        console.log(ol);
      });
  

  });
</script>
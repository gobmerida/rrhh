<?php
    header("Content-Type:text/html;charset=utf-8");
    require_once '../../../db/conexion.php';

    $query   = "select * from galeria";
    $result  = mysql_query($query);

?>

<div class=" wrapper col-ms-12">
    <div>
      <?php
            while ($galeria = mysql_fetch_array($result)) {
                $rout ="../../../galerias/img/".$galeria[1]."/".$galeria[2];
                $rout2 ="../../../galerias/img/".$galeria[1]."/index.php?id=".$galeria[1];
      ?>

                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail thumbnail2">
                      <div class="caption text-justify">
                        <h4><b><?php echo ucwords($galeria[1]); ?></b></h4>
                          <a href="<?php echo $rout2; ?>"><img src="<?php echo $rout; ?>" title="<?php echo ucwords($galeria[1]); ?>" class="img-rounded" /></a>
                      </div>
                    </div>
                </div>   


    <?php   }
    ?>
    </div>
</div>

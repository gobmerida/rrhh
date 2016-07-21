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
               <div class=" imagen "><a href="<?php echo $rout2; ?>"><img src="<?php echo $rout; ?>" title="<?php echo ucwords($galeria[1]); ?>"/></a><br>
                <div class="titulo"><?php echo ucwords($galeria[1]); ?></div></div>


    <?php   }
    ?>
    </div>
</div>

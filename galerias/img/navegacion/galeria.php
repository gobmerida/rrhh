<?php
    header("Content-Type:text/html;charset=utf-8");
    require_once '../../../db/conexion.php';

    $query   = "select * from galeria";
    $result  = mysql_query($query);

?>

<div class="wrapper">
    <div id="zoom">
      <?php
            while ($galeria = mysql_fetch_array($result)) {
                $rout ="../".$galeria[1]."/".$galeria[2];
                $rout2 ="../".$galeria[1]."/index.php?id=".$galeria[1];
      ?>
                <a href="<?php echo $rout2; ?>"><img src="<?php echo $rout; ?>" title="<?php echo ucwords($galeria[1]); ?>"/></a>


    <?php   }
    ?>
    </div>
</div>

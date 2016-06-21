<?php
require("../config/config00.php");
$data01 = $_POST['album'];
$data02 = $_POST['nombre'];
$sql01 = "UPDATE data08 SET NombreAlbum='$data02' WHERE Id='$data01'";
$sql01 =mysql_query($sql01);
?>
<script>
$("#<?php echo $data01;?>-Edit").html("<?php echo $data02;?>");
</script>

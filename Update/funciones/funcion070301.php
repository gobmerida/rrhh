<?php
require("../config/config00.php");
$data01 = $_POST['album'];
$data02 = $_POST['foto'];
$sql01 = "UPDATE data08 SET IdFotoPortada='$data02' WHERE Id='$data01'";
$sql01 =mysql_query($sql01);
?>
<script>
	$("#ModificarAlbum").remove();
funcion02("<?php echo $data01; ?>");
</script>

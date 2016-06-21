<?php
require("../config/config00.php");
$data01 = $_POST['album'];
$sql01 = "DELETE FROM data07 WHERE IdAlbum='$data01'";
$sql01 = mysql_query($sql01);
$sql02 = "DELETE FROM data08 WHERE Id='$data01'";
$sql02 = mysql_query($sql02);
?>
<script>
$("#<?php echo $data01; ?>").remove();
</script>

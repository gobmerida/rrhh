<?php
include("../config/config00.php");
$data01 = $_POST['delete'];
$sql01 = "DELETE FROM data07 WHERE Id='$data01'";
$sql01 = mysql_query($sql01);
?>

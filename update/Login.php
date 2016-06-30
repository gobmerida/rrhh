<?php  
session_start();

	require_once '../db/conexion.php';

	extract($_POST);

	$query   = "select * from usuario where Usuario='$usuario'";
	$result  = mysql_query($query);
	$usuario = mysql_fetch_array($result);

	$query2   = "select count(*) from usuario where Usuario='$usuario'";
	$result2  = mysql_query($query2);
	$count = mysql_fetch_array($result2);

	$nombre  = $usuario['Nombres'];
	$user    = $usuario['Usuario'];

	if (isset($_POST) && isset($submit)) {
		
		if (empty($usuario) || empty($pass)) {
			header ("Location: login.php?q=1");
		}elseif ($usuario !=$usuario['Usuario'] || md5($pass)!=$usuario['Pass']) {
			header ("Location: login.php?q=2");
		}else{
			$_SESSION['name']=$nombre;
			$_SESSION['usr']=$user;
			echo "<script>window.location='index.php';</script>";
		}
	}
?>	
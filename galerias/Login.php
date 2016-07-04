<?php  
session_start();

	require_once '../db/conexion.php';

	extract($_POST);

	$query   = "select * from usuario where Usuario='$usuario'";
	$result  = mysql_query($query);
	$usuario = mysql_fetch_array($result);

	$nombre  = $usuario['Nombres'];
	$user    = $usuario['Usuario'];

	if (isset($_POST) && isset($submit)) {
		
		if ($usuario=="" || $pass=="") {
			echo "<script>alert('No ingreso ningun dato');window.location='login.php';</script>";
		}else{

			$_SESSION['name']=$nombre;
			$_SESSION['usr']=$user;
			echo "<script>window.location='index.php';</script>";
		}
	}
?>
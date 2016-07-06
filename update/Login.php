<?php  
	require_once '../db/conexion.php';

	extract($_POST);

	$query   = "select * from usuario where Usuario='$usuario'";
	$result  = mysql_query($query);
	$usuario1 = mysql_fetch_array($result);

	if ($usuario==$usuario1['Usuario'] && md5($pass)==$usuario1['Pass']){
    //usuario y contraseña válidos
	    session_name("loginUsuario");
	    //asigno un nombre a la sesión para poder guardar diferentes datos
	  	session_start();
	    // inicio la sesión
	    $_SESSION["autentificado"]= "SI";
	    //defino la sesión que demuestra que el usuario está autorizado
	    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
	    //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
	    $_SESSION['name']=$usuario1['Nombres'];
		$_SESSION['usr']=$usuario1['Usuario'];

	    header ("Location: index.php");
	}else {
	    //si no existe le mando otra vez a la portada
	    header("Location: login.php?q=2");
	}

?>	
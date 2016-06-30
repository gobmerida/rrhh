<?php  
	session_start();

	require_once '../db/conexion.php';

	extract($_POST);

	if (isset($_POST) && $submit == 1) {

		if ($usuario=="" or $pass=="") {
			
			header("location: login.php");


		}

		$query   = "select * from usuario where Usuario= '$usuario' ";
		$result  = mysql_query($query);
		$ingreso = mysql_fetch_array($result);

		if($usuario==$ingreso['Usuario'] && md5($pass)==$ingreso['Pass']){

			$_SESSION["nombre_usuario"]=$ingreso['Nombres'];
			if ($ingreso['Usuario']==1) {
				$_SESSION["usuario"]="Administrador";
			}elseif($ingreso['Usuario']==2){
				$_SESSION["usuario"]="Periodista";
			}
			header("location: index.php?p='$usuario'");
		}else{
			header("location: login.php");
		}
			
	}else{

		header("location: login.php");

	}


	

?>
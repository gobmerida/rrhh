<?php  

	require_once '../db/conexion.php';

	extract($_POST);

	if (isset($_POST) && $submit == 1) {

		if ($usuario=="" or $pass=="") {
			
			header("location: login.php");


		}

		md5($pass);

		$query   = "select * from usuario where Usuario= '$usuario' ";
		$result  = mysql_query($query);
		$ingreso = mysql_fetch_array($result);

		if($usuario==$ingreso['Usuario'] && md5($pass)==$ingreso['Pass']){
			header("location: index.php");
		}else{
			header("location: login.php");
		}
			
	}else{

		header("location: login.php");

	}


	

?>
<!--Autor 
Edgar Carrizalez
C.I. V-19.3522.988
Correo: edg.sistemas@gmail.com
-->

<?php
	include("config00.php");
	$user=$_POST['sesion00'];
	$pass=$_POST['sesion01'];
	function checkchart($nombre_usuario){
		//compruebo que el tamaño del string sea válido.
		if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
			echo $nombre_usuario . " no es válido<br>";
			return false;
		}
		
		//compruebo que los caracteres sean los permitidos
		$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_";
		for ($i=0; $i<strlen($nombre_usuario); $i++){
			if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
				echo $nombre_usuario . " no es válido<br>";
				return false;
			}
		}
	
		echo $nombre_usuario . " es válido<br>";
		return true;
	}
	function numberchk($nombre_usuario){
		//compruebo que el tamaño del string sea válido.
		if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
			echo $nombre_usuario . " no es válido<br>";
			return false;
		}
		
		//compruebo que los caracteres sean los permitidos
		$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
		for ($i=0; $i<strlen($nombre_usuario); $i++){
			if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
				echo $nombre_usuario . " no es válido<br>";
				return false;
			}
		}
		echo $nombre_usuario . " es válido<br>";
		return true;
	}
	$user=$_POST['sesion00'];
	$pass=$_POST['sesion01'];
	$chk1 = checkchart($user);
	$chk2 = numberchk($pass);
	if($chk1==false || $chk2==false){
		header("location: ../index.php?error=5");
	}
	if($chk1==true && $chk2==true){
	$sql=mysql_query("SELECT * FROM vista00 WHERE Usuario='$user'") or die (mysql_error());
	$row = mysql_fetch_array($sql);
	
	if($user==$row['Usuario'] and md5($pass)==$row['Pass'] and $row['Estado']=='1'){
			session_start();
			$_SESSION['user_pagerrhh']=$_REQUEST['sesion00'];
			$_SESSION['IdRol_pagerrhh']=$row['IdRol'];
			$_SESSION['estado_pagerrhh']=$row['Estado'];
			header("location: ../");
	}
	if($user!=$row['Usuario'] or md5($pass)!=$row['Pass']){
		header("location: ../index.php?error=1");
	}
	}
	
	if($row['Estado']=='0'){
		header("location: ../index.php?error=2");
	}
	
	if($user=="" or $pass==""){
		header("location: ../index.php?error=4");
	}

?>


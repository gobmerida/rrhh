<?php
	require_once 'funciones.php';
	require_once '../db/conexion.php';

	extract($_POST);

	if (!empty($_POST)) {
		$foto=subir_fichero('img','imagen');
		$fecha = date('Y-m-d');
		if ($foto=='') {
			$foto = $fotoactual;
		}
		echo $query = "update`data02` SET `TituloNoticia`='$titulo', `ContenidoNoticia`='$contenido', `QuienPublica`='$quienp', `InternaExterna`='$relevancia', `FotoNoticia`='$foto' where id='$id'";
		mysql_query($query);
	}
		header("Location: listar.php?q=1&n=$id");
?>

<?php
	require_once 'funciones.php';
	require_once '../db/conexion.php';

	extract($_POST);

	if (!empty($_POST)) {
		$foto=subir_fichero('img','imagen');
		$fecha = date('Y-m-d');

		$query = "INSERT INTO `data02`(`TituloNoticia`, `ContenidoNoticia`, `FechaPublicacion`, `QuienPublica`, `InternaExterna`, `FotoNoticia`) VALUES ('$titulo','$contenido','$fecha','$quienp','$relevancia','$foto')";
		mysql_query($query);
	}
		header('Location: index.php?q=1');
?>

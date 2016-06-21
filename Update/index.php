<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<?php
	include("./config/config00.php");
	include("./config/config01.php");
	include("./config/config02.php");
?>
<body>
	
	<div id="contenedor">
		<div id="cabecera"></div>
		<hr>
		<?php
			funcion00();
			funcion01();
			menu();
			option();
			footer();
			errores();
		?>
		<script>
		mostrar("#a01");selected("#aa01")
		</script>
	</div><?php timeline();?>
</body>
</html>

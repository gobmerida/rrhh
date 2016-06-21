<?php
function funcion00(){
	session_start();
	if (!isset($_SESSION['user_pagerrhh'])){
	}
}
function funcion01(){
	if (!isset($_SESSION['user_pagerrhh'])){
		echo "
		<div class='sesion'>
			<form action='./config/config03.php' method='post' >
				<table class='ini_sesion'>
					<thead>
						<tr><th colspan='2'><center>Iniciar sesión</center></th></tr>
					</thead>
					<tr>
						<td>Usuario</td><td><input type='text' name='sesion00' id='sesion00' class='i_sesion' autocomplete='off' onkeypress='return permite(event, \"car\")' onpaste='return false' /></td>
					</tr>
					<tr>
						<td>Contraseña</td><td><input type='password' name='sesion01' id='sesion01' class='i_sesion' autocomplete='off' onkeypress='return permite(event, \"esp\")' onpaste='return false'/></td>
					</tr>
					<tr>
						<td colspan='2'><center><input type='submit' value='Entrar' disabled id='InS'/></center></td>
					</tr>
				</table>
			</form>
		</div>
		<script>
		$('.ini_sesion').fadeOut(350);
		</script>
		<script src='js/other.js'></script>
		";
	}
}
function menu(){
	if(isset($_SESSION['user_pagerrhh'])){
	$idRol=$_SESSION['IdRol_pagerrhh'];
	echo "<div id='panel_iz'>";
	$MenuSQL = "SELECT * FROM vista01 WHERE Niveles='1' and IdRol='$idRol' ORDER BY id";
	$MenuSQL = mysql_query($MenuSQL) or die ("<h3>No se pudo cargar el menu:</h3><b style='color:red'>(".mysql_error().")</b>");
	echo "<ul class='menu-principal'>";
	while($MenuROW = mysql_fetch_array($MenuSQL)){
		echo "<li onclick='mostrar($MenuROW[id]);selected(this)' class='unselected'>$MenuROW[NombreModulo]</li>";
	}
	echo "<li onclick='location.href=\"./funciones/funcionA01.php\"' class='unselected'>Salir</li>";
	echo "</ul>";
	echo "</div>";
	}
}
function option(){
	if(isset($_SESSION['user_pagerrhh'])){
	$mes=date("m");
	$idRol=$_SESSION['IdRol_pagerrhh'];
	echo "<div id='contenido'>";
	$OpcionesSQL = "SELECT * FROM vista01 WHERE Niveles='1' and IdRol='$idRol' ORDER BY id";
	$OpcionesSQL = mysql_query($OpcionesSQL) or die ("<h3>No se pudo cargar la opción:</h3><b style='color:red'>(".mysql_error().")</b>");
	while($OpcionesROW = mysql_fetch_array($OpcionesSQL)){
		if($OpcionesROW['Modulo']!=""){
			$funcion=$OpcionesROW['Modulo'];
			echo "<div id='$OpcionesROW[id]' class='opcion'>";
			include("./funciones/$funcion");
			echo "</div>";
		}
		if($OpcionesROW['Modulo']==""){
		echo "<div id='$OpcionesROW[id]' class='opcion'>";
		$id_o=$OpcionesROW['id'];
		$OpcionSQL = "SELECT *
						FROM vista01
						WHERE id LIKE '$id_o%' and id!='$id_o' and Niveles='2' and IdRol='$idRol'
						";
		$OpcionSQL = mysql_query($OpcionSQL) or die ("<h3>No se pudo cargar la opción:</h3><b style='color:red'>(".mysql_error().")</b>");
		echo "
			<script>
			$(function() {
			$( '#tabs$OpcionesROW[id]' ).tabs({
			beforeLoad: function( event, ui ) {
			ui.jqXHR.fail(function() {
			ui.panel.html(
			'No se ha podido cargar su petición. ' +
			'Notifique sobre el problema para solucionarlo los más pronto posible.' );
			});
			}
			});
			});
			</script>
			";
		echo "<div id='tabs$OpcionesROW[id]' class='tabFp'>
			  <ul>";
		while($OpcionROW = mysql_fetch_array($OpcionSQL)){
			
			echo "<li><a href='./funciones/$OpcionROW[Modulo]'>$OpcionROW[NombreModulo]</a></li>";
		}
		echo "</ul>
			  </div>";
		echo "</div>";
		}
	}
	echo "</div>";
	}
}
function footer(){
	echo "
	<div class='shadow-footer'></div>
	<div id='footer'>
	<marquee direction='right' onmouseout='this.start()' onmouseover='this.stop()'>
	<a href='http://171.merida.gob.ve/' target='blank'><img src='./img/footer/171.png' class='img_footer' alt='171' title='Emergencias 171'></a>
	<a href='http://www.bomberosmerida.gob.ve/' target='blank'><img src='./img/footer/bomberos.png' alt='Cuerpo de Bomberos de Mérida' title='Cuerpo de Bomberos de Mérida' class='img_footer'></a>
	<a href='http://www.polimer.gob.ve/' target='blank'><img src='./img/footer/policia.png' alt='Policia del Estado Mérida' title='Policia del Estado Mérida' class='img_footer'></a>
	<a href='http://www.saime.gob.ve/' target='blank'><img src='./img/footer/saime.png'  alt='Servicio Administrativo de Identificación, Migración y Extranjería' title='Servicio Administrativo de Identificación, Migración y Extranjería' class='img_footer'></a>
	<a href='http://www.merida.gob.ve/' target='blank'><img src='./img/footer/gobernacion.jpg' alt='Gobernación del Estado Mérida' title='Gobernación del Estado Mérida' class='img_footer'></a>
	</marquee>
	<div id='carga'></div>
	</div>
	
	";
}
function a_fecha($fecha){
	list($anio, $mes, $dia) = explode("-",$fecha);
	return $fecha = $dia."/".$mes."/".$anio;
}
function anio_fecha($fecha){
	$fecha = substr($fecha, 0, -9);
	list($anio, $mes, $dia) = explode("-",$fecha);
	return $fecha = $dia."/".$mes."/".$anio;
}
function timeline(){
?>
<script>
	function redesSociales(redes){
		$(redes).toggle("swing");
		$('#panel-boton').toggle("swing");
	}
</script>
<div class="boton-time" id="panel-boton">
	<img src="./img/redes/twitter.png" style="width:90%;cursor:pointer" onclick="redesSociales('#timeline-twitter');"><br>
<!--
	<img src="./img/redes/facebook.png" style="width:90%;cursor:pointer" onclick="redesSociales('#facebook-muro');">
-->
</div>
<div id="timeline-twitter" class="timeline-twitter">
	<img src="./img/redes/oc.png" class="ocultar-red" onclick="redesSociales('#timeline-twitter');">
<a class="twitter-timeline enlace-twitter" style="z-index: 2;" width="240" height="320" data-theme="light" data-link-color="#0084b4" data-chrome="   " data-border-color="#e8e8e8" data-tweet-limit="0" data-related="" data-screen-name="rrhh_gob_merida" data-show-replies="false" data-aria-polite="Polite" lang="ES" href="https://twitter.com/rrhh_gob_merida" data-widget-id="332093127265484800"><img src="./img/loading.gif" style="width:8%"> Cargando Twitter</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<div class="facebook-muro" id="facebook-muro">
	<img src="./img/redes/oc.png" class="ocultar-red" onclick="redesSociales('#facebook-muro');">
</div>
<?php
}
function fechaMes($mes){
	if($mes=='1'){
		$mes_l = "Enero";
	}
	if($mes=='2'){
		$mes_l = "Febrero";
	}
	if($mes=='3'){
		$mes_l = "Marzo";
	}
	if($mes=='4'){
		$mes_l = "Abril";
	}
	if($mes=='5'){
		$mes_l = "Mayo";
	}
	if($mes=='6'){
		$mes_l = "Junio";
	}
	if($mes=='7'){
		$mes_l = "Julio";
	}
	if($mes=='8'){
		$mes_l = "Agosto";
	}
	if($mes=='9'){
		$mes_l = "Septiembre";
	}
	if($mes=='10'){
		$mes_l = "Octubre";
	}
	if($mes=='11'){
		$mes_l = "Noviembre";
	}
	if($mes=='12'){
		$mes_l = "Diciembre";
	}
	return $mes_l;
}
function fechaMesAnio($fecha){
	list($anio, $mes, $dia) = explode("-",$fecha);
	if($mes=='1'){
		$mes_l = "Enero";
	}
	if($mes=='2'){
		$mes_l = "Febrero";
	}
	if($mes=='3'){
		$mes_l = "Marzo";
	}
	if($mes=='4'){
		$mes_l = "Abril";
	}
	if($mes=='5'){
		$mes_l = "Mayo";
	}
	if($mes=='6'){
		$mes_l = "Junio";
	}
	if($mes=='7'){
		$mes_l = "Julio";
	}
	if($mes=='8'){
		$mes_l = "Agosto";
	}
	if($mes=='9'){
		$mes_l = "Septiembre";
	}
	if($mes=='10'){
		$mes_l = "Octubre";
	}
	if($mes=='11'){
		$mes_l = "Noviembre";
	}
	if($mes=='12'){
		$mes_l = "Diciembre";
	}
	return $fecha = "$mes_l del $anio";
}
function errores(){
	if(array_key_exists('error',$_GET) and $_GET['error']=='1'){
		echo "
		<script>
		alert('¡Usuario o Contraseña inválidos!');
		</script>
		";
	}
	if(array_key_exists('error',$_GET) and $_GET['error']=='4'){
		echo "
		<script>
		alert('¡No dejes valores en blanco!');
		</script>
		";
	}
	if(array_key_exists('error',$_GET) and $_GET['error']=='5'){
		echo "
		<script>
		alert('¡No uses caracteres especiales (< > \' * # @ | ` ´ { })');
		</script>
		";
	}
	echo "
		<noscript>
			<div class='dialogos'>
				<p class='title'>Bienvenido</p>
				<p class='noticia'>La aplicación que estás intentando acceder requiere para su funcionamiento el uso de JavaScript. 
				Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo o informa el error para corregirlo de lo contrario no podrás ingresar.</p>
			</div>
		</noscript>
	";
}
?>

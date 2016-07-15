<div class="organigrama">
	<ul>
		<li>
			<a href="#" onclick="mostrar('jefe');"><img src="img/contacto/jefe.jpg" alt=""><br><b>Director</b></a>	
			<ul>
				<li>
					<a href="#" onclick="Cordinadora('coor');"><img src="img/contacto/DSCN7509.jpg" alt=""><br><b>Cordinadora general</b></a>
					<ul>
				        <li><a href="#"><img src="img/contacto/DSCN7552.jpg" alt=""><br><b>Unidad de registro <br>y control de aporte</b></a></li>
				        <li><a href="#"><img src="img/contacto/DSCN7564.jpg" alt=""><br><b>Unidad de <br>asesoria legal</b></a></li>

				        <li><a href="#"><img src="img/contacto/DSCN7526.jpg" alt=""><br><b>Unidad de <br>planificacíon y <br>presupuesto</b></a></li>
			    	</ul>
				</li>	
			</ul>
		</li>
	</ul><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<ul class="dpto">
		<li><a href="#"><img src="img/contacto/16316852.jpg" alt=""><br><b>Dpto. <br>informatica</b></a></li>

		<li><a href="#"><img src="img/contacto/DSCN7543.jpg" alt=""><br><b>Dpto. <br>Personal obrero</b></a></li>
		<li><a href="#"><img src="img/contacto/DSCN7586.jpg" alt=""><br><b>Dpto. <br>Empleados</b></a></li>

		<li><a href="#"><img src="img/contacto/DSCN7553.jpg" alt=""><br><b>Dpto. <br>Jubilados y pensionados</b></a></li>
		<li><a href="#"><img src="img/contacto/DSCN7636.jpg" alt=""><br><b>Dpto. <br>Pasivos laborales</b></a></li>

		<li><a href="#"><img src="img/contacto/DSCN7517.jpg" alt=""><br><b>Dpto. <br>Administración</b></a></li>		
	</ul>
</div>
<marquee class="hidden-xs marq" direction="left" onmouseout="this.start();" onmouseover="this.stop();" scrollamount="4">
	<a href="http://171.merida.gob.ve/" target="_blank"><img src="img/insti/171.png" alt=""></a>
	<a href="http://bomberosmerida.gob.ve/" target="_blank"><img src="img/insti/bomberos.png" alt=""></a>
	<a href="http://www.fundacite-merida.gob.ve/" target="_blank"><img src="img/insti/fundacite.jpg" alt=""></a>
	<a href="http://www.gobiernoenlinea.ve/home/homeG.dot" target="_blank"><img src="img/insti/gobierno_linea.jpg" alt=""></a>
	<a href="" target="_blank"><img src="img/insti/logo_merida1.png" alt=""></a>
	<a href="http://www.ona.gob.ve/"><img src="img/insti/ona.jpg" alt=""></a>
	<a href="http://www.pcmerida.gob.ve/" target="_blank"><img src="img/insti/pcmerida.jpg" alt=""></a>
	<a href="http://www.polimer.gob.ve/" target="_blank"><img src="img/insti/polcia.png" alt=""></a>
	<a href="https://pasaporte.saime.gob.ve/" target="_blank"><img src="img/insti/saime.png" alt=""></a>
</marquee><br><br><br>




<!--VENTANAS MODALES INFORMACION DE ORGANIGRAMA-->

<div onclick="ocultar()" id="jefe" class="modal" style="display:none">
  	<div class="media" id="contenido-interno">
	  <div class="media-left media-middle">
	    <a href="#">
	    <img src="img/contacto/jefe.jpg" alt="" class="media-object">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading">Director</h4>
	    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam fuga harum dolores quos maxime nihil consectetur officiis fugiat, reiciendis eveniet, nobis ullam quaerat vel eos quam adipisci perspiciatis nostrum fugit.
	  </div>
	</div>
</div>


<div onclick="ocultar()" id="coor" class="modal" style="display:none">
  	<div class="media" id="contenido-interno">
	  <div class="media-left media-middle">
	    <a href="#">
	    <img src="img/contacto/jefe.jpg" alt="" class="media-object">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading">Director</h4>
	    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam fuga harum dolores quos maxime nihil consectetur officiis fugiat, reiciendis eveniet, nobis ullam quaerat vel eos quam adipisci perspiciatis nostrum fugit.
	  </div>
	</div>
</div>



<script type="text/javascript">
function mostrar(img) {
document.getElementById(img).style.display = "block" ; // permite asignar display:block al elemento #modal
}
function ocultar() {
document.getElementById('jefe').style.display = "none" ; // permite ocultar el contenedor al hacer clic en alguna parte de éste mediante display:none en el elemento #modal
}

</script>
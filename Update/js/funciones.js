function ocultar(){
$('#contenido div.opcion').fadeOut(0);
}

function mostrar(mostrar){
$('#contenido div.opcion').fadeOut(0);
//~ $(mostrar).toggle(800,"swing");
$(mostrar).show("drop",1200);
//~ $(mostrar).fadeIn(800);
}

function selected(doc){
$("ul li").removeClass("selected");
$("ul li").addClass("unselected");
$(doc).removeClass("unselected");
$(doc).addClass("selected");
}
function unselected(){
	$('ul li').addClass("unselected");
}
var cedula=0;
function v_publicas(tipo,valor){
	if(tipo=="cedula"){
		cedula=valor.value;
	}
}

function mensajes(mensaje){
	$(mensaje).fadeIn(600);
	$(mensaje).delay(3000).fadeOut(600);
}
function dialogos(dialogo){
	$(dialogo).dialog({
		modal: true,
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
}
function permite(elEvento, permitidos) {
var numeros = "0123456789";
var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
var especilaes = "<>=-+,_@\"";
var numeros_caracteres = numeros + caracteres;
var espe_car_nume = numeros + caracteres + especilaes;
var teclas_especiales = [8, 9, 13, 37, 46];
switch(permitidos) {
	case 'num':
		permitidos = numeros;
		break;
	case 'car':
		permitidos = caracteres;
		break;
	case 'num_car':
		permitidos = numeros_caracteres;
		break;
	case 'esp':
		permitidos = espe_car_nume;
		break;
}
var evento = elEvento || window.event;
var codigoCaracter = evento.charCode || evento.keyCode;
var caracter = String.fromCharCode(codigoCaracter);
var tecla_especial = false;
for(var i in teclas_especiales) {
	if(codigoCaracter == teclas_especiales[i]) {
		tecla_especial = true;
		break;
	}
}
return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
function imprimir(id){
var objeto=document.getElementById(id);
var ventana=window.open('','_blank','fullscreen=yes');
ventana.document.write("<link rel='stylesheet' href='./css/print.css'>");
ventana.document.write(objeto.innerHTML);
ventana.document.close();
ventana.print();
ventana.close();
}
function funcion00(){
	var formData = new FormData($("#GaleriaRRHH")[0]);
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion0601.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function(){
			$('#cargara').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#cargara').html(data);
		}
	});
}
function funcion01(data){
	var formData="album="+data;
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion0501.php',
		data: formData,
		beforeSend: function(){
			$('#albums').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#albums').html(data);
		}
	});
}
function funcion02(data){
	var formData="album="+data;
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion07.php',
		data: formData,
		beforeSend: function(){
			$('#carga').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#carga').html(data);
		}
	});
}
function funcion03(data){
	var datastring="delete="+data;
	var r = confirm("¿Desea eliminar la foto?");
	if(r==true){
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion0701.php',
		data: datastring,
		beforeSend: function(){
			$('#carga').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#carga').html(data);
			$("#AlbumGaleria").remove();
			$("#ModificarAlbum").remove();
			funcion02(datast);
		}
	});
	}
}
function funcion04(data){
	var datastring = "album="+data;
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion0702.php',
		data: datastring,
		beforeSend: function(){
			$('#carga').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#carga').html(data);
			$("#AlbumGaleria").remove();
			$("#ModificarAlbum").remove();
		}
	});
}
function funcion05(){
	var formData = new FormData($("#GaleriaRRHHFoto")[0]);
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion070201.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function(){
			$('#subirnuevasfotos').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#subirnuevasfotos').html(data);
		}
	});
}
function funcion06(data){
	var string = "album="+data;
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion0703.php',
		data: string,
		beforeSend: function(){
			$('#selectfondo').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#selectfondo').html(data);
		}
	});
}
function funcion07(data01,data02){
	var string = "album="+data02+"&&foto="+data01;
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion070301.php',
		data: string,
		beforeSend: function(){
			$('#loadingback').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#loadingback').html(data);
			$("#selectfondomodal").remove();
		}
	});
}
function funcion08(data00,data01){
	var string = "album="+data01+"&&nombre="+data00;
	$.ajax({
		type: 'POST',
		url: 'funciones/funcion0704.php',
		data: string,
		beforeSend: function(){
			$('#nombregaleria').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$("#ModificarAlbum").remove();
			$('#nombregaleria').html(data);
			funcion02(data01);
			alert("Cambios Guardados");
		}
	});
}
function funcion09(data00,data01){
	var string = "album="+data00;
	var r = confirm("¿Desea eliminar el albúm \""+data01+"\"?");
	if(r==true){$.ajax({
		type: 'POST',
		url: 'funciones/funcion050102.php',
		data: string,
		beforeSend: function(){
			$('#albumselimi').html('<div class="full"><div class="load"><img src="./img/loading.gif" width="100px"></div></div>');
			$(".load").draggable();
		},
		success: function(data){
			$('#albumselimi').html(data);
			alert("Albúm Eliminado");
		}
	});
	}
}

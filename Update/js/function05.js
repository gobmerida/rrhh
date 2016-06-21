var detener=0;
function editado(data){
var data;
window.opener.document.getElementById('ver_noticiamesanio').innerHTML = data;
}
function selimag(){
	document.getElementById("selima").value="1";
}
function validar(formulario){
	document.getElementById("PubSub").disabled=true;
	document.getElementById("PubSub").value='Publicando';
	var comprobar=1;
	if(formulario.titulo_no.value.length!=0){
		comprobar=1;
	}
	if(formulario.contenido_no.value.length!=0){
		comprobar=1;
	}
	if(formulario.imagem.value.length!=0){
		comprobar=1;
	}
	if(formulario.relevancia.value.length!=0){
		comprobar=1;
	}
	if(formulario.titulo_no.value.length==0){
		comprobar=0;
		document.getElementById("titulo_no").style.border = "1px solid red";
		document.getElementById("titulo_no").focus();
		$("#Error_Titulo").toggle("drop");
		return false;
	}
	if(formulario.contenido_no.value.length==0){
		comprobar=0;
		document.getElementById("contenido_no").style.border = "1px solid red";
		document.getElementById("contenido_no").focus();
		$("#Error_Contenido").toggle("drop");
		return false;
	}
	if(formulario.relevancia.value.length==0){
		comprobar=0;
		document.getElementById("relevancia").style.border = "1px solid red";
		document.getElementById("relevancia").focus();
		$("#Error_relevancia").toggle("drop");
		return false;
	}
	if(comprobar==1){
		$.ajax({
			type: 'POST',
			url: 'subfuncion040201.php',
			data: $('#g_noticia').serialize(),
			beforeSend: function(){
				$('#cargaeditada').fadeIn(0);
				$('#cargaeditada').html('<div class="full"><div class="load"><img src="../img/loading.gif" width="100px"></div></div>');
			},
			success: function(data){
				$('#cargaeditada').fadeIn(0);
				$('#cargaeditada').html(data);
				editado(data);
			}
		});
	}
	return false;
}
function c_sel(restablecer,ocultar){
	$(ocultar).fadeOut(0);
	$(restablecer).css("border","1px solid silver");
	document.getElementById("PubSub").disabled=false;
	document.getElementById("PubSub").value='Publicar';
}

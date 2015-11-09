<?php include ("seguridad.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Preguntas</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<script>
		
		function InsertarDatos() {
			var pregunta=document.getElementById("pregunta").value;
			var respuesta=document.getElementById("respuesta").value;
			var complejidad=document.getElementById("complex").value;
			var tema=document.getElementById("tema").value;
			
			if((pregunta!="")&&(respuesta!="")&&(tema!="")){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				}		
				xmlhttp.open("POST","InsertarPregunta.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("pregunta="+pregunta+"&respuesta="+respuesta+"&complex="+complejidad+"&tema="+tema);
			}else{
				document.getElementById("txtHint").innerHTML = "<p><b>Rellenar los campos obligatorios</b></p>";
			}
		}
		
		function VerMisPreguntas() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
				}
			}		
			xmlhttp.open("GET","VerPreguntasUsuario.php",true);
			xmlhttp.send();
		}
	
		
		function RefrescarNumeros(){
			VerNumeroPreguntas1();
			setInterval(VerNumeroPreguntas1, 5000);
		}
		
		//Usando Ajax con Jquery
		function VerNumeroPreguntas1(){
			$.ajax({   
				type: "GET",
				url:"ObtenerNumPreguntas.php",
				success: function(result){
					$("#numPreguntas").html(result);
				}
			});
		}
		
		$(window).load(function(){
			RefrescarNumeros();
		});
		
</script>

<body>
	<h2>Editar Preguntas con Jquery</h2><br>


	<div class="centro">
	
	<div id="numPreguntas"></div>

	<p><b>Los campos con * son obligatorios.</b></p><br>

	<form action="" id='insertar' name='insertar' method="POST">
	  
	  Texto de la Pregunta:*
	  <input title="Pregunta" type="text" name="pregunta" id="pregunta" required><br><br>

	  Texto de la Respuesta:*
	  <input title="Respuesta" type="text" name="respuesta" id="respuesta" required><br><br>
	
	  Complejidad:
	  <select name="complex" id="complex">
		<option value=""></option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	  </select><br><br>
	  
	  Subject:*
	  <input title="Tema" type="text" name="tema" id="tema" required><br><br>
	  
	  <button type="button" onclick="InsertarDatos()">Insertar Pregunta</button>
	  
	  <button type="button" onclick="VerMisPreguntas()">Ver Preguntas</button>
	  
	  <p style="text-align:center"><a href='menu_usuario.php'>Volver atrás</a></p>
	</form>
	
	<br>
	<div id="txtHint"></div>

	</div>
</body>
</html>
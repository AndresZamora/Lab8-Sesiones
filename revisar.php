<?php 
	include ("seguridad.php");
	if($_SESSION['rol']!="Profesor"){
		header('location:layout.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Revisar Preguntas</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<script>
		var num=0;
		function ObtenerDatos() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("lista").innerHTML= xmlhttp.responseText;
					if(num==0){
						RellenarDatos();
					}
					num++;
				}
			}		
			xmlhttp.open("GET","VerTodasPreguntas.php",true);
			xmlhttp.send();	
			
		}
		
		function RellenarDatos() {
			var numId=document.getElementById("numeroId").value;
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("id").value= xmlhttp.responseText.split(",")[0];
					document.getElementById("email_autor").value= xmlhttp.responseText.split(",")[1];
					document.getElementById("pregunta").value= xmlhttp.responseText.split(",")[2];
					document.getElementById("respuesta").value= xmlhttp.responseText.split(",")[3];
					document.getElementById("complex").value= xmlhttp.responseText.split(",")[4];
					document.getElementById("prueba").innerHTML = "";
				}
			}		
			xmlhttp.open("POST","ObtenerPregunta.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("numId="+numId);
		}
		
		function ModificarDatos() {
			var numId=document.getElementById("id").value;
			var pregunta=document.getElementById("pregunta").value;
			var respuesta=document.getElementById("respuesta").value;
			var complejidad=document.getElementById("complex").value;
			
			if((pregunta!="")&&(respuesta!="")){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						ObtenerDatos();
						document.getElementById("prueba").innerHTML = xmlhttp.responseText;
					}
				}		
				xmlhttp.open("POST","ModificarPregunta.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("numId="+numId+"&pregunta="+pregunta+"&respuesta="+respuesta+"&complex="+complejidad);
			}else{
				document.getElementById("prueba").innerHTML = "<p><b>Rellenar los campos obligatorios</b></p>";
			}
		}

</script>

<body onload="ObtenerDatos()">
	<h2>Revisar Preguntas</h2><br>	
	
	<div style='text-align:center' id="lista"></div></br>
	
	<div class="centro">
		
		<p><b>Los campos con * son obligatorios.</b></p><br>
	
		<form action="" id='insertar' name='insertar' method="POST">
		  
		  ID:
		  <input title="ID" type="text" name="id" id="id" disabled><br><br>
		  
		  Autor:
		  <input title="Autor" type="text" name="email_autor" id="email_autor" disabled><br><br>
		  
		  Texto de la Pregunta*:
		  <input title="Pregunta" type="text" name="pregunta" id="pregunta" required><br><br>

		  Texto de la Respuesta*:
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
		  
		  <button type="button" onclick="ModificarDatos()">Modificar Pregunta</button></br>
		  
		  <div id="prueba"></div></br>
		  
		  <p style="text-align:center"><a href='layout.php'>Volver atrás</a></p>
		</form>
	
	
	</div>
	
</body>
</html>
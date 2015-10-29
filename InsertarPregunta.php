<?php include ("seguridad.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar Preguntas</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

</head>
<body>

	<?php
	
	if (isset($_POST["pregunta"]) && isset($_POST["respuesta"])){
		
		$email=$_SESSION['usuarioactual'];
		
		$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
		//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
	
		mysqli_set_charset($enlace, "utf8");

		if (!$enlace) {
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		
		if (!isset($_POST['complex'])){
			
				if (!mysqli_query($enlace,"INSERT INTO preguntas(Email,Pregunta,Respuesta) 
					VALUES('$email','".$_POST['pregunta']."','".$_POST['respuesta']."')")) {
					echo "<script>alert('ERROR: Fallo en la inserción de la pregunta');</script>";
				}else{
					echo "<div class='centro'>";
					echo "<p><b>EXITO: Se ha insertado correctamente la pregunta en la BD</p></b><br> ";
					echo "<p><a href='menu_usuario.php'>Volver al menu de usuario</a></p></div><br><br>";
					
				}
		}else{
			if (!mysqli_query($enlace,"INSERT INTO preguntas(Email,Pregunta,Respuesta,Complejidad) 
					VALUES('$email','".$_POST['pregunta']."','".$_POST['respuesta']."','".$_POST['complex']."')")) {
					echo "<script>alert('ERROR: Fallo en la inserción de la pregunta');</script>";
			}else{
					echo "<div class='centro'>";
					echo "<p><b>EXITO: Se ha insertado correctamente la pregunta en la BD</p></b><br> ";
					echo "<p><a href='menu_usuario.php'>Volver al menu de usuario</a></p></div><br><br>";
			}
			
		}
		
		if (!mysqli_query($enlace,"INSERT INTO acciones(IdConexion,Email,TipoAccion,IpConexion) 
					VALUES('".$_SESSION['ID']."','".$_SESSION['usuarioactual']."','Insertar pregunta','".$_SERVER['REMOTE_ADDR']."')")) {
					echo "<script>alert('ERROR: Fallo en la inserción de la accion');</script>";
		}		
		
		$preguntas = simplexml_load_file("preguntas.xml");
								
			$nuevo = $preguntas->addChild("assessmentItem");
			$nuevo->addAttribute('complexity', $_POST['complex']);
			$nuevo->addAttribute('subject', $_POST['tema']);
			$itemBody = $nuevo->addChild("itemBody");
			$itemBody->addChild("p", $_POST['pregunta']);
			$correctResponse = $nuevo->addChild("correctResponse");
			$correctResponse->addChild("value", $_POST['respuesta']);
				
		if($preguntas->asXML("preguntas.xml")){
			echo "<div class='centro'>";
			echo "<p><b>EXITO: Se ha insertado correctamente la pregunta en Xml</p></b><br> ";
			echo "<p><a href='VerPreguntasXML.php'>Visualizar preguntas del Xml</a></p></div>";
		}else{
			echo "<div class='centro'>";
			echo "<p><b>ERROR: Ha ocurrido un error en la inserción de preguntas en el Xml</p></b><br> ";
			echo "<p><a href='menu_usuario.php'>Volver al menu de usuario</a></p></div>";
		}
		
			
			mysqli_close($enlace);	
	}else{
	?>
	<h2>Insertar Preguntas</h2><br>


	<div class="centro">

	<p><b>Los campos con * son obligatorios.</b></p><br><br>

	<form action="InsertarPregunta.php" enctype="multipart/form-data" id='insertar' name='insertar' method="POST">
	  
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
	 
	  <input type="submit" id="btn_ins" value="Insertar Pregunta"/>
	  
	  <p style="text-align:center"><a href='menu_usuario.php'>Volver atrás</a></p>
	</form>

	</div>
	<?php
	 }
	 ?>
</body>
</html>
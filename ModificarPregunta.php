<?php
	if (isset($_POST["numId"]) && isset($_POST["pregunta"]) && isset($_POST["respuesta"])){
				
		$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
		//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
	
		mysqli_set_charset($enlace, "utf8");

		if (!$enlace) {
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		
		if (!mysqli_query($enlace,"UPDATE preguntas SET Pregunta='".$_POST['pregunta']."',Respuesta='".$_POST['respuesta']."',Complejidad='".$_POST['complex']."' WHERE Numero='".$_POST['numId']."'")) {
				echo "<p><b>ERROR: Fallo en la modificación de la pregunta</b></p>";
		}else{
				echo "<p><b>EXITO: Se ha modificado correctamente la pregunta en la BD</p></b> ";
		}		
			
		mysqli_close($enlace);	
	}
?>
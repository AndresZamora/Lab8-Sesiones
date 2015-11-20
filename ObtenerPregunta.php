<?php
	if (isset($_POST["numId"])){
				
		$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
		//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
	
		mysqli_set_charset($enlace, "utf8");

		if (!$enlace) {
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		
		$resultado = $enlace->query("SELECT * FROM preguntas WHERE Numero = '".$_POST["numId"]."'");	
		$resultado->data_seek(0);
		$fila = $resultado->fetch_assoc();
		
		echo($fila['Numero'].",".$fila['Email'].",".$fila['Pregunta'].",".$fila['Respuesta'].",".$fila['Complejidad']);	

		mysqli_close($enlace);	
	}
?>
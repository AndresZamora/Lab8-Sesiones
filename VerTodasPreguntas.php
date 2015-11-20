
<?php 
	
	$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
		
	mysqli_set_charset($enlace, "utf8");
	
	if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
		
	$resultado = $enlace->query("SELECT * FROM preguntas");
	
	echo("<select id='numeroId' onchange='RellenarDatos()'>");
	
	for ($num_fila = 0; $num_fila <= $resultado->num_rows - 1; $num_fila++) {
		$resultado->data_seek($num_fila);
		$fila = $resultado->fetch_assoc();		
		echo("
			<option value='".$fila['Numero']."'>".$fila['Pregunta']."</option>
			");
	}
	
	echo("</select></br>");
	
	mysqli_close($enlace);
?>
</body>
</html>
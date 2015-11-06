<?php include ("seguridad.php");?>
<?php 
	
	$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
		
	mysqli_set_charset($enlace, "utf8");
	
	if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	//Codigo para añadir accion de ver preguntas en la BD.	
/*	if (!mysqli_query($enlace,"INSERT INTO acciones(IdConexion,Email,TipoAccion,IpConexion) 
		VALUES('".$_SESSION['ID']."','".$_SESSION['usuarioactual']."','Ver preguntas','".$_SERVER['REMOTE_ADDR']."')")) {
		echo "<script>alert('ERROR: Fallo en la inserción de la accion');</script>";
	}*/
		
	$resultado = $enlace->query("SELECT * FROM preguntas WHERE Email = '".$_SESSION['usuarioactual']."'");
	
	for ($num_fila = 0; $num_fila <= $resultado->num_rows - 1; $num_fila++) {
		$resultado->data_seek($num_fila);
		$fila = $resultado->fetch_assoc();		
		echo("
			<div class='bloque1'>
				<p><b>PREGUNTA ".$fila['Numero']."</b></p>
				<p><b>Pregunta:</b> ".$fila['Pregunta']."</p>
				<p><b>Complejidad:</b> ".$fila['Complejidad']."</p>
			</div></br>
			");
	}
	
	mysqli_close($enlace);
?>
</body>
</html>
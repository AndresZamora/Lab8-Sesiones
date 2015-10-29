<html>
<head>
	<title>Preguntas</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
</head>
<body>
<h1>Preguntas Almacenadas</h1>

<?php 
	session_start();
	if (!isset($_SESSION['conectado'])){
		echo "<p style='text-align:center'><a href='layout.html'>Volver a Inicio</a></p></br>";
		
		$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
	//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
		
		mysqli_set_charset($enlace, "utf8");
		
		if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
		}
		
		
		if (!mysqli_query($enlace,"INSERT INTO acciones(TipoAccion,IpConexion) 
					VALUES('Ver preguntas','".$_SERVER['REMOTE_ADDR']."')")) {
					echo "<script>alert('ERROR: Fallo en la inserción de la accion');</script>";
		}
					
		}
		
	else{
		echo "<p style='text-align:center'><a href='menu_usuario.php'>Volver a Menu Usuario</a></p>";
		
		$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
	//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
		
		mysqli_set_charset($enlace, "utf8");
		
		if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
		}
		
		if (!mysqli_query($enlace,"INSERT INTO acciones(IdConexion,Email,TipoAccion,IpConexion) 
					VALUES('".$_SESSION['ID']."','".$_SESSION['usuarioactual']."','Ver preguntas','".$_SERVER['REMOTE_ADDR']."')")) {
					echo "<script>alert('ERROR: Fallo en la inserción de la accion');</script>";
		}
		
	}
?>

<?php
	//$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
	
	mysqli_set_charset($enlace, "utf8");

	if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	$resultado = $enlace->query("SELECT * FROM preguntas");
	
	for ($num_fila = 0; $num_fila <= $resultado->num_rows - 1; $num_fila++) {
		$resultado->data_seek($num_fila);
		$fila = $resultado->fetch_assoc();		
		echo("
			<div class='bloque'>
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
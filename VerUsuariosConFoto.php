<html>
<head>
	<title>Tabla de Usuarios</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
</head>
<body>
<H1>Usuarios Registrados</H1>

<?php
	$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
	
	mysqli_set_charset($enlace, "utf8");

	if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	$resultado = $enlace->query("SELECT * FROM usuario");

	echo("<table style='width:100%'>
		<tr>
			<td><b>Email</b></td>
			<td><b>Nombre</b></td>		
			<td><b>Password</b></td>
			<td><b>Teléfono</b></td>
			<td><b>Especialidad</b></td>		
			<td><b>Interés</b></td>
			<td><b>Imagen</b></td>
		</tr>");
	
	for ($num_fila = 0; $num_fila <= $resultado->num_rows - 1; $num_fila++) {
		$resultado->data_seek($num_fila);
		$fila = $resultado->fetch_assoc();		
		echo("<tr>
			<td>".$fila['Email']."</td>
			<td>".$fila['Nombre']."</td>		
			<td>".$fila['Password']."</td>
			<td>".$fila['Telefono']."</td>
			<td>".$fila['Especialidad']."</td>		
			<td>".$fila['Interes']."</td>
			<td><img src='data:image/;base64,".base64_encode($fila['Imagen'])."'></td>
		</tr>");
	}
	echo("</table>");
	
	mysqli_close($enlace);
?>
</body>
</html>
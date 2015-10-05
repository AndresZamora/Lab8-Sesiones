<html>
<head> <title>Lado Servidor de PHP</title> </head>
<body>
<H1>Uso del Lado Servidor</H1>

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
	
	if(!empty($_GET['interes'])){
		if (!mysqli_query($enlace,"INSERT INTO usuario(Email,Nombre,Password,Telefono,Especialidad,Interes) 
			VALUES('".$_GET['email']."','".$_GET['firstname']."','".$_GET['password']."',".$_GET['telephone'].",'".$_GET['especialidad']."','".$_GET['interes']."' )")) {
			echo "<h2>ERROR: Falló en la inserción en la tabla</h2>";
		}else{
			echo ("<h2>EXITO: Se ha insertado correctamente los datos en la tabla</h2><br>
					<a href='VerUsuarios.php'>Usuarios Insertados</a>");
		}
	}else{
		if (!mysqli_query($enlace,"INSERT INTO usuario(Email,Nombre,Password,Telefono,Especialidad) 
			VALUES('".$_GET['email']."','".$_GET['firstname']."','".$_GET['password']."',".$_GET['telephone'].",'".$_GET['especialidad']."' )")) {
			echo "<h2>ERROR: Falló en la inserción en la tabla</h2>";
		}else{
			echo ("<h2>EXITO: Se ha insertado correctamente los datos en la tabla</h2><br>
					<a href='VerUsuarios.php'>Usuarios Insertados</a>");
		}
	}

	mysqli_close($enlace);
?>


</body>
</html>
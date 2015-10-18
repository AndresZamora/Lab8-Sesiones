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
	
	if (filter_var($_GET['email'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z])+(\d{3})+\@ikasle.ehu.e(u)?s$/")))&&
		filter_var($_GET['firstname'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+\s[a-zA-ZñÑáéíóúÁÉÍÓÚ]+\s[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/")))&&
		filter_var($_GET['password'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z\d]){6,}$/")))&&
		filter_var($_GET['telephone'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(\d{9})$/")))&&
		filter_var($_GET['especialidad'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z ñÑáéíóúÁÉÍÓÚ]+$/")))&&
		filter_var($_GET['interes'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z ñÑáéíóúÁÉÍÓÚ]+$/")))		
		){
		if (!mysqli_query($enlace,"INSERT INTO usuario(Email,Nombre,Password,Telefono,Especialidad,Interes) 
			VALUES('".$_GET['email']."','".$_GET['firstname']."','".$_GET['password']."',".$_GET['telephone'].",'".$_GET['especialidad']."','".$_GET['interes']."' )")) {
			echo "<h2>ERROR: Falló en la inserción en la tabla</h2>";
		}else{
			echo ("<h2>EXITO: Se ha insertado correctamente los datos en la tabla</h2><br>
					<a href='VerUsuarios.php'>Usuarios Insertados</a>");
		}
	}else if (filter_var($_GET['email'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z])+(\d{3})+\@ikasle.ehu.e(u)?s$/")))&&
		filter_var($_GET['firstname'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+\s[a-zA-ZñÑáéíóúÁÉÍÓÚ]+\s[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/")))&&
		filter_var($_GET['password'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z\d]){6,}$/")))&&
		filter_var($_GET['telephone'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(\d{9})$/")))&&
		filter_var($_GET['especialidad'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z ñÑáéíóúÁÉÍÓÚ]+$/")))
		){
		$message = "<h2>Mensaje: Todo Correcto</h2>";
		echo $message;
		if (!mysqli_query($enlace,"INSERT INTO usuario(Email,Nombre,Password,Telefono,Especialidad) 
			VALUES('".$_GET['email']."','".$_GET['firstname']."','".$_GET['password']."',".$_GET['telephone'].",'".$_GET['especialidad']."' )")) {
			echo "<h2>ERROR: Falló en la inserción en la tabla</h2>";
		}else{
			echo ("<h2>EXITO: Se ha insertado correctamente los datos en la tabla</h2><br>
					<a href='VerUsuarios.php'>Usuarios Insertados</a>");
		}
	}else{
		$message = "<h2>ERROR: Algún campo es incorrecto</h2></br>";
		echo $message;
		if(filter_var($_GET['email'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z])+(\d{3})+\@ikasle.ehu.e(u)?s$/")))){
			echo "<h2><font color=green>Mensaje: Email Correcto</font></h2></br>";
		}else{
			echo "<h2><font color=red>ERROR: Email incorrecto</font></h2></br>";
		}
		if(filter_var($_GET['firstname'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+\s[a-zA-ZñÑáéíóúÁÉÍÓÚ]+\s[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/")))){
			echo "<h2><font color=green>Mensaje: Nombre Correcto</font></h2></br>";
		}else{
			echo "<h2><font color=red>ERROR: Nombre incorrecto</font></h2></br>";
		}
		if(filter_var($_GET['password'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z\d]){6,}$/")))){
			echo "<h2><font color=green>Mensaje: Password Correcto</font></h2></br>";
		}else{
			echo "<h2><font color=red>ERROR: Password incorrecto</font></h2></br>";
		}
		if(filter_var($_GET['telephone'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(\d{9})$/")))){
			echo "<h2><font color=green>Mensaje: Telefono Correcto</font></h2></br>";
		}else{
			echo "<h2><font color=red>ERROR: Telefono incorrecto</font></h2></br>";
		}
		if(filter_var($_GET['especialidad'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z ñÑáéíóúÁÉÍÓÚ]+$/")))){
			echo "<h2><font color=green>Mensaje: Especialidad Correcto</font></h2></br>";
		}else{
			echo "<h2><font color=red>ERROR: Especialidad incorrecto</font></h2></br>";
		}
		if(!empty($_GET['interes'])){
			if(filter_var($_GET['interes'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z ñÑáéíóúÁÉÍÓÚ]+$/")))){
				echo "<h2><font color=green>Mensaje: Interes Correcto</font></h2></br>";
			}else{
				echo "<h2><font color=red>ERROR: Interes incorrecto</font></h2></br>";
			}
		}	
	}

	mysqli_close($enlace);
?>


</body>
</html>
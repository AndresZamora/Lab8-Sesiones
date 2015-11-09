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
		
	$resultado = $enlace->query("SELECT Email FROM preguntas");
	$cont= mysqli_num_rows($resultado);

	$res = $enlace->query("SELECT Count(Email) FROM preguntas WHERE Email='".$_SESSION['usuarioactual']."'"); 
	$res->data_seek(0);
	$r=$res->fetch_assoc();
	$cont1=implode("", $r);
	
	echo  ("<div style='border:2px solid black'>
				<p><b>Mis preguntas/Todas las preguntas: ".$cont1."/".$cont."</b></p>
			</div>");
	mysqli_close($enlace);

?>
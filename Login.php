<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>

<?php	
	if (isset($_POST["email"]) && isset($_POST["password"])){
		$esta=0;
		$user = $_POST["email"];
		$pass = $_POST["password"];
		
		$enlace = mysqli_connect("localhost", "root", "", "Quiz");   //Conexion con la base de datos en local.
	//	$enlace = mysqli_connect("mysql.hostinger.es", "u465939494_root", "quizes", "u465939494_quiz");		// Conexión con la base de datos en Hostinger.
	
		mysqli_set_charset($enlace, "utf8");
		
		if (!$enlace) {
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		
		$resultado = $enlace->query("SELECT Email, Password FROM usuario WHERE Email='$user' AND Password='$pass' ");
		$cont= mysqli_num_rows($resultado);
		
		if($cont==1){			
			$esta=1;
			session_start();
			include ("conexiones.php");
			$_SESSION['conectado']=1 ;
			$_SESSION['usuarioactual'] = $user; //nombre del usuario logueado.
			echo "<script>alert('Usuario conectado correctamente')</script>";
			
			if((strpbrk($user, '@')=="@ikasle.ehu.es")||(strpbrk($user, '@')=="@ikasle.ehu.eus")){
				$_SESSION['rol'] = "Estudiante";
				header("Location: layout.php"); /* Redirección del navegador */
				exit;
			}else if(strpbrk($user, '@')=="@ehu.es"){
				$_SESSION['rol'] = "Profesor";
				header("Location: layout.php"); /* Redirección del navegador */
				exit;
			}
			
		}
		
		if ($esta==0){
			echo"<script>alert('El Usuario no existe, contraseña o email incorrectos.');window.location.href=\"Login.php\"</script>";	
		}
	}else{
	?>

		<h2>Login</h2><br>
		<p style="text-align:center"><a href='layout.php'>Volver inicio</a></p>
		<div class="centro">

			<p><b>Los campos con * son obligatorios.</b></p><br><br>

			<form action="Login.php" enctype="multipart/form-data" id='login' name='login' method="POST">
			  Email:*
			  <input title="Se necesita un email de la ehu/upv" type="text" name="email" id="email" pattern="(^([a-zA-Z])+(\d{3})+\@(ikasle.)?ehu.e(u)?s$)" required><br><br>
			  Password:*
		<!-- pattern="^([a-zA-Z\d]){6,}$" required-->
			  <input title="Se necesita una contraseña de 6 caracteres" type="password" name="password" id="password" pattern="^([a-zA-Z\d]){6,}$" required><br><br>
			  
			  <input type="submit" id="btn_env" value="Conectarse"/>
			  
			</form>

		</div>
	<?php
	 }
	 ?>
</body>
</html>

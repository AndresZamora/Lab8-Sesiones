<?php
	include ("seguridad.php");
?>
<html>
<head>
	<title>Menu Usuarios</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
</head>
<body>

<H1>Menu Usuario: <?php echo $_SESSION['usuarioactual'];?></H1>

	<header class='main' id='h1'>
		<span class="right"><a href="InsertarPregunta.php">Insertar Pregunta</a></span>
      	<span class="right"><a href="VerPreguntas.php">Ver Preguntas</a></span>
		<span class="right"><a href="cerrar.php">Logout</a></span>
    </header>
</body>
</html>
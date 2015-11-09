<?php
	include ("seguridad.php");
?>
<html>
<head>
	<title>Menu Usuarios</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
</head>
<body>
	<H1>Menu Usuario: <?php echo $_SESSION['usuarioactual'];?></H1></br>
	
	<div class='centro'>		
		<span class="right"><a href="GestionPreguntas.php">Editar Pregunta</a></span>
		<span class="right"><a href="GestionPreguntasJquery.php">Editar Pregunta Jquery</a></span>
		<span class="right"><a href="cerrar.php">Logout</a></span>
	</div></br>
</body>
</html>
<head>
	<title>Tabla de Preguntas</title>
	<link rel='stylesheet' type='text/css' href='estilos/estilo_personal.css' />
</head>
<body>
<H1>Tabla del fichero preguntas.xml</H1>

<?php

	session_start();
	if (!isset($_SESSION['conectado'])){
		echo "<p style='text-align:center'><a href='layout.html'>Volver a Inicio</a></p></br>";
	}else{
		echo "<p style='text-align:center'><a href='menu_usuario.php'>Volver a Menú Usuario</a></p></br>";
	}

	echo("<table style='width:100%'>
		<tr>
			<td><b>Pregunta</b></td>
			<td><b>Complejidad</b></td>		
			<td><b>Tema</b></td>
		</tr>");
		
	$preguntas = simplexml_load_file('preguntas.xml');
	
	foreach($preguntas->assessmentItem as $pregunta){	
		$cuerpoPregunta= $pregunta->itemBody->p;
		$complejidad= $pregunta['complexity'];
		$tema= $pregunta['subject'];
			
		echo("<tr>
			<td>".$cuerpoPregunta."</td>
			<td>".$complejidad."</td>		
			<td>".$tema."</td>
		</tr>");
	}
	echo("</table>");
?>
</body>
</html>
﻿<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
<!--		<span class="right"><a href="registro2.html">Registro</a></span>
      		<span class="right"><a href="Login.php">Login</a></span>-->
			
		<?php
			session_start();
			if (!isset($_SESSION['conectado'])){				
					echo ("
						<span class='right'><a href='registro2.html'>Registro</a></span>
						<span class='right'><a href='Login.php'>Login</a></span>
						<span class='right'><p>Usuario: Anonimo</p></span>
					");
			}else{
				if($_SESSION['rol']=="Estudiante"){
					echo ("
						<span class='right'><p>Usuario Alumno: '".$_SESSION['usuarioactual']."'</p></span>
						<span class='right'><a href='cerrar.php'>Logout</a></span>
					");
				}else if($_SESSION['rol']=="Profesor"){
					echo ("
						<span class='right'><p>Usuario Profesor: '".$_SESSION['usuarioactual']."'</p></span>
						<span class='right'><a href='cerrar.php'>Logout</a></span>
					");
				}
			}
		?>
			
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='VerPreguntas.php'>Preguntas</a></span>
		<span><a href='creditos.html'>Creditos</a></span>
		<?php
			if (isset($_SESSION['conectado'])){				
				if($_SESSION['rol']=="Estudiante"){
					echo("
						<span><p><b>---Sección Estudiantes---</b></p></span>
						<span><a href='GestionPreguntas.php'>Gestionar Preguntas</a></span>
						");
				}else if($_SESSION['rol']=="Profesor"){
					echo("
						<span><p><b>---Sección Profesor---</b></p></span>
						<span><a href='revisar.php'>Revisar Preguntas</a></span>
						");
				}			
			}
		?>
	</nav>
    <section class="main" id="s1">
    
	<div>
	Aqui se visualizan las preguntas y los creditos ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

<?php
	include ("seguridad.php");
	session_unset();
	session_destroy();
	header("Location: layout.html");
?>
<?php
	
	// Inserción de conexiones en la Base de Datos
	if (!mysqli_query($enlace,"INSERT INTO conexiones(Email) VALUES('$user')")) {
		echo "<script>alert('ERROR: Fallo en la inserción de conexiones');</script>";
	}else{
		echo "<script>alert('EXITO: Se ha insertado correctamente las conexiones');</script>";
	}
	
	$res = $enlace->query("SELECT MAX(Identificador) FROM conexiones WHERE Email='$user'"); //Seleccionar la ultima conexion del usuario(la actual).
	$res->data_seek(0);
	$r=$res->fetch_assoc();
	$id=implode("", $r);
	$_SESSION['ID']= $id; //Variable de sesion para el identificador de conexion
?>
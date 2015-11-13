<?php
	//incluimos la clase nusoap.php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//creamos el objeto de tipo soap_server
//	$ns="http://localhost/nusoap-0.9.5/samples";
	$ns="http://localhost/samples";
	$server = new soap_server;
	$server->configureWSDL('comprobarPass',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	//registramos la función que vamos a implementar
	$server->register('comprobarPass',
	array('x'=>'xsd:string'),
	array('z'=>'xsd:string'),
	$ns);
	
	//Función que comprueba si el string dado se encuentra en el fichero de texto o no.
	function comprobarPass($x){
		$esta = false;
		$file = fopen("toppasswords.txt", "r");
		while((!$esta)&&(!feof($file))) {

			$r=trim(fgets($file));
			if(strcmp($r,$x)==0){
				$esta=true;
				break;
			}
		}
		fclose($file);
				
		if($esta){
			return "INVALIDO";
		}else{
			return "VALIDO";
		}
	}
	
	//llamamos al método service de la clase nusoap
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>
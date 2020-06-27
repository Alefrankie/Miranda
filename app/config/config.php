<?php
		//CONFIGURACIÓN DE ACCESO A LA BASE DE data
		define ('DB_HOST', 'localhost');
		define ('DB_USUARIO', 'root');
		define ('DB_PASSWORD', '30089812');
		define ('DB_NOMBRE', 'miranda');
		//Ruta de la aplicación

		//echo dirname(dirname(__FILE__));
		//Ruta de la aplicación
		define ('RUTA_APP', dirname(dirname(__FILE__)));
		define ('RUTA_ORIGIN', dirname(dirname(dirname(__FILE__))));
		$url= $_SERVER["REQUEST_URI"];
		
		$host= $_SERVER["HTTP_HOST"];

		//Ruta url Ejemplo: http://localhost/Miranda/
		define ('RUTA_URL', 'http://'. $host . '/Miranda');

		define ('NOMBRESITIO', 'Municipio Miranda');

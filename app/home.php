<?php

//Cargamos librerías
require_once 'config/config.php';

require_once 'helpers/url_helper.php';


//LIBRERÍAS MANUAL
//require_once 'library/Db.php';
//require_once 'library/AppController.php';
//require_once 'library/Core.php';

//LIBRERÍAS AUTOMÁTICAS
//AUTOLOAD PHP PARA LAS CLASES
spl_autoload_register(function($nombreClase){
	require_once 'library/' .$nombreClase. '.php';
});

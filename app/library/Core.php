<?php
/*
Mapear la url ingresada en el navegador,
1 - Controlador
2 - Método (Funciones)
3 - Parámetro
Ejemplo: /articulo/actualizar/4
*/

class Core{
	protected $currentController = 'Paginas';
	protected $currentMethod = 'index';
	protected $parameters = [];

	//Constructor
	public function __construct(){
		//print_r($this->getUrl());
		$url = $this->getUrl();

		//Buscar en controladores si el controlador existe
		if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
			//si existe se setea como controlador por defecto.
			$this->currentController = ucwords($url[0]);

			//unset indice
			unset($url[0]);
		}
		// Requerir el controlador
		require_once '../app/controllers/'.$this->currentController . '.php';
		$this->currentController = new $this->currentController;

		//Checker la segunda parte de la url que sería el método.

		if (isset($url[1])) {
			if (method_exists($this->currentController, $url[1])) {
			//Chequeamos el método.
				$this->currentMethod = $url[1];
				unset($url[1]);
			}
		}
		//Traer Método, Prueba
		//echo $this->currentMethod;

		//Obtener los parámetros
		$this->parameters = $url ?  array_values($url) : [];

		//llamar callback con parámetros array
		call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);
		unset($url[2]);

	}

	public function getUrl(){
		//echo $_GET['url'];

		if(isset($_GET['url'])){
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}

?>
<?php
	/**
	*Clase controlador principal
	*Se encarga de poder cargar los modelos y las vistas
	 */
	class AppController{

		//Cargar  Modelo
		public function model($model)
		{
			//Carga
			require_once '../app/models/' . $model . '.php';
			//Instanciar el modelo
			return new $model();
		}

		//Cargar  Vista
		public function view($view, $datos = []){
			//chequear si el archivo vista existe
			if (file_exists('../app/views/' . $view . '.php')) {
				require_once '../app/views/' . $view . '.php';
			}else{
				//si el archivo de la vista no existe
				die('La Vista No Existe');
			}
		}
	}

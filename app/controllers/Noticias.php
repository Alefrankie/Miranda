<?php

class Noticias extends AppController{

	public function index(){

		/*$articulos = $this->articuloModelo->obtenerArticulos();
		$datos = [

			'titulo' => 'Bienvenidos a MVC render2web',
			'articulos' => $articulos
		];*/

		$this->view('templates/noticias');
	}
}

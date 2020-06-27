<?php

class Paginas extends AppController
{
	public function __construct()
	{
		session_start();
		$this->usuarioModelo = $this->model('UsuarioModel');
	}

	public function index()
	{
		//Obtener los usuarios
		$usuarios = $this->usuarioModelo->obtenerUsuarios();

		$data = [
			'titulo' => "The Parametrization it is works",
			'usuarios' => $usuarios
		];
		//Si Todo Salió Correcto, Importo los data de MySQL A JSON
		$file = RUTA_ORIGIN . '/public_html/json/data.json';
		$json_string = json_encode($usuarios);
		file_put_contents($file, $json_string);

		//Redireccion hacia Index
		$this->view('templates/inicio', $data);
	}
}

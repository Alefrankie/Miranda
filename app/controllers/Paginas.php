<?php

class Paginas
{
	use ChargeModel;
	use ChargeView;
	public function __construct()
	{
		session_start();
		 $this->userModel = $this->chargeModel('UsuarioModel');
	}

	public function index()
	{
		//Obtener los usuarios
		$usuarios = $this->userModel->obtenerUsuarios();

		$data = [
			'titulo' => "The Parametrization it is works",
			'usuarios' => $usuarios
		];
		//Si Todo Salió Correcto, Importo los data de MySQL A JSON
		$file = RUTA_ORIGIN . '/public_html/json/data.json';
		$json_string = json_encode($usuarios);
		file_put_contents($file, $json_string);

		//Redireccion hacia Index
		$this->chargeView('templates/inicio', $data);
	}
}

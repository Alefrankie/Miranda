<?php

class Paginas extends AppController
{
	public function __construct()
	{
		$this->usuarioModelo = $this->model('Usuario');
		//echo "Controlador pagina cargada";
	}

	public function index()
	{
		//Obtener los usuarios
		$usuarios = $this->usuarioModelo->obtenerUsuarios();

		$datos = [
			'titulo' => "The Parametrization it is works",
			'usuarios' => $usuarios
		];
		//Si Todo Salió Correcto, Importo los datos de MySQL A JSON
		$file = RUTA_APP . '/data.json';
		$json_string = json_encode($usuarios);
		file_put_contents($file, $json_string);

		//Redireccion hacia Index
		$this->view('templates/inicio', $datos);
	}

	public function agregar()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
			$datos = [
				'nombre' => trim($_POST['nombre']),
				'apellido' => trim($_POST['apellido']),
				'pass' => $hash
			];

			if ($this->usuarioModelo->agregarUsuario($datos)) {

				$this->view('templates/agregar');
			} else {
				die('Algo salió mal');
			}
		} else {
			$datos = [
				'nombre' => '',
				'apellido' => ''
			];
			$this->view('templates/agregar', $datos);
		}
	}
	public function editar($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
			$datos = [
				'id' => $id,
				'nombre' => trim($_POST['nombre']),
				'apellido' => trim($_POST['apellido']),
				'pass' => $hash
			];
			if ($this->usuarioModelo->actualizarUsuario($datos)) {
				//redireccionar('templates/paginas');
				$this->view('templates/editar');
			} else {
				die('Algo salió mal');
			}
		} else {

			//Obtener informacion de usuario desde el modelo

			$usuario = $this->usuarioModelo->obtenerUsuarioID($id);

			$datos = [
				'id' => $usuario->id,
				'nombre' => $usuario->nombre,
				'apellido' => $usuario->apellido,
				'pass' => $usuario->pass
			];
			$this->view('templates/editar', $datos);
		}
	}

	public function borrar($id)
	{
		//Obtener informacion de usuario desde el modelo
		$usuario = $this->usuarioModelo->obtenerUsuarioID($id);

		$datos = [
			'id' => $usuario->id,
			'nombre' => $usuario->nombre,
			'apellido' => $usuario->apellido
		];


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'id' => $id
			];

			if ($this->usuarioModelo->borrarUsuario($datos)) {
				//redireccionar('templates/paginas');
				$this->view('templates/editar');
			} else {
				die('Algo salió mal');
			}
		}
		$this->view('templates/borrar', $datos);
	}
}

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
		// $usuarios = $this->usuarioModelo->obtenerUsuarios();

		// $datos = [
		// 	'titulo' => "The Parametrization it is works",
		// 	'usuarios' => $usuarios
		// ];
		$this->view('templates/inicio');
	}

	public function agregar()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'cedula' => trim($_POST['cedula']),
				'nombre' => trim($_POST['nombre']),
				'apellido' => trim($_POST['apellido'])
				// 'telefono' => trim($_POST['telefono']),
				// 'correo' => trim($_POST['correo']),
				// 'correo' => trim($_POST['user']),
				// 'correo' => trim($_POST['password'])
			];

			if ($this->usuarioModelo->agregarUsuario($datos)) {
				$this->view('templates/agregar');
			} else {
				die('Algo salió mal');
			}
		} else {
			$datos = [
				'cedula' => '',
				'nombre' => '',
				'apellido' => ''
			];
			$this->view('templates/agregar', $datos);
		}
	}
	public function editar($id)
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'id' => $id,
				'cedula' => trim($_POST['cedula']),
				'nombre' => trim($_POST['nombre']),
				'apellido' => trim($_POST['apellido'])
				// 'telefono' => trim($_POST['telefono']),
				// 'correo' => trim($_POST['correo']),
				// 'correo' => trim($_POST['user']),
				// 'correo' => trim($_POST['password'])
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
				'cedula' => $usuario->cedula,
				'nombre' => $usuario->nombre,
				'apellido' => $usuario->apellido
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
			'cedula' => $usuario->cedula,
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

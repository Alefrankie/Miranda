<?php

class Usuarios extends AppController
{

    public function __construct()
    {
        $this->usuarioModelo = $this->model('Usuario');
    }

    public function login()
    {
        $this->view('templates/usuarios/login');
    }

    public function register()
    {
        $this->view('templates/usuarios/register');
    }

    public function dashboard()
    {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();

        $datos = [
            'titulo' => "The Parametrization it is works",
			'usuarios' => $usuarios,
            't_user' => trim($_POST['t_user'])
        ];

        $this->view('templates/usuarios/dashboard', $datos);
    }
}

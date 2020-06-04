<?php

class Usuarios extends AppController
{

    public function __construct()
    {
        $this->usuarioModelo = $this->model('Usuario');
        $this->loginModelo = $this->model('Login');
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
        $user = trim($_POST['user']);
        $pass = trim($_POST['pass']);

        $autenticated = $this->usuarioModelo->GetUser($user);

        if ($user != $autenticated->user and $pass != $autenticated->pass) {

            $usuarios = $this->usuarioModelo->obtenerUsuarios();
            $currentUser = $this->usuarioModelo->GetUser($user);
            $currentUserImage = $this->usuarioModelo->showImage($user);
            
            $datos = [
                'titulo' => "The Parametrization it is works",
                'usuarios' => $usuarios,
                'usuario' => $autenticated->user,
                'id' => $currentUser->id,
                'nombre' => $currentUser->nombre,
                'password' => $currentUser->pass,
                't_user' => $currentUser->t_user,
                'imagen' => $currentUserImage->imagen
            ];
            $this->view('templates/usuarios/dashboard', $datos);

        } else {
            echo $user, $autenticated->user;
            echo $pass, $autenticated->pass;
            $this->view('templates/usuarios/login');
            die("Algo Salió Mal");
        }
    }

    public function saveDataProccess()
    {
        $this->dashboard();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = trim($_POST['user']);
            $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
            $datos = [
                'user' => $user,
                'imagen' => $photo
            ];

            if ($this->usuarioModelo->uploadImage($datos)) {
            } else {
                die('Algo salió mal');
            }
        } else {
            die('Algo Salió Mal');
        }
    }
}

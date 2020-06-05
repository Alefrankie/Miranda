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
    public function validate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = trim($_POST['user']);
            $pass = trim($_POST['pass']);
            $autenticated = $this->usuarioModelo->GetUser($user);
            if ($user == $autenticated->user and $pass == $autenticated->pass) {
                $this->dashboard($user);
            } else {
                $validate = "Usuario/Contraseña Incorrectos";
                $this->view('templates/usuarios/login', $validate);
            }
        } else {
            die("No se enviaron por POST");
        }
    }
    public function dashboard($user)
    {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $currentUser = $this->usuarioModelo->GetUser($user);
        $currentUserImage = $this->usuarioModelo->showImage($user);
        $datos = [
            'titulo' => "The Parametrization it is works",
            'usuarios' => $usuarios,
            'usuario' => $currentUser->user,
            'id' => $currentUser->id,
            'nombre' => $currentUser->nombre,
            'password' => $currentUser->pass,
            't_user' => $currentUser->t_user,
            'imagen' => $currentUserImage->imagen
        ];
        $this->view('templates/usuarios/dashboard', $datos);
    }

    public function saveDataProccess()
    {
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

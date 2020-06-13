<?php

class Test extends AppController
{
    public function __construct()
    {
        session_start();
        $this->usuarioModelo = $this->model('Usuario');
        $this->loginModelo = $this->model('Login');
    }

    public function index()
    {

    }

    public function dashboard()
    {
        $user = new test("Alefrank");

        // try {
        //     $this->user
        // } catch ($th) {
        //     //throw $th;
        // }

        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
        $currentUserImage = $this->usuarioModelo->showImage($currentUser->id);
        $datos = [
            'usuarios' => $usuarios,
            'id' => $currentUser->id,
            'nombre' => $currentUser->nombre,
            'apellido' => $currentUser->apellido,
            'user' => $currentUser->user,
            'pass' => $currentUser->pass,
            'imagen' => $currentUserImage->photoPerfil,
            't_user' => $currentUser->t_user,
            'status_user' => "Online"
        ];
        $this->usuarioModelo->updateStatus($datos);
        $this->view('templates/usuarios/dashboard', $datos);
    }
}

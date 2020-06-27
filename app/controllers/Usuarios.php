<?php

class Usuarios extends AppController
{
    public function __construct()
    {
        session_start();
        $this->usuarioModelo = $this->model('UsuarioModel');
    }

    public function index()
    {
        $this->view('templates/usuarios/login');
    }

    public function login()
    {
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $admi = $this->usuarioModelo->ValidateAdmin("Administrador");
            if (empty($admi)) {
                $admi = "";
            } else {
                $admi = $admi->t_user;
            }
            $data = [
                "admi" => $admi
            ];
            return $this->view('templates/usuarios/login', $data);
        }

        $dataPOST = json_decode(file_get_contents('php://input'));
        $dataDB = $this->usuarioModelo->GetUser($dataPOST->user);
        if (empty($dataPOST) || empty($dataDB)) {
            return printf(json_encode("Usuario no encontrado."));
        }

        if (!(password_verify($dataPOST->pass, $dataDB->pass))) {
            return printf(json_encode("Contraseña incorrecta."));
        }

        $_SESSION['SESSION_USER'] = $dataDB->user;
        echo json_encode("<br>Inicio de Sesión Exitoso.<br>");
    }

    public function register()
    {
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            return $this->view('templates/usuarios/register');
        }
        $dataPOST = json_decode(file_get_contents('php://input'));
        $hashPass = password_hash($dataPOST->a_pass, PASSWORD_DEFAULT, ['cost' => 10]);
        $data = [
            'a_name' => $dataPOST->a_name,
            'a_lastName' => $dataPOST->a_lastName,
            'an_user' => $dataPOST->an_user,
            'a_pass' => $hashPass,
        ];

        if (!($this->usuarioModelo->registerUser($data))) {
            echo json_encode("Registro Fallido");
        }
        echo json_encode("Registro Exitoso");
    }

    public function editar($id)
    {
        $userDB = $this->usuarioModelo->obtenerUsuarioID($id);

        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $data = [
                'an_id' => $userDB->id,
                'a_name' => $userDB->nombre,
                'a_lastName' => $userDB->apellido,
                'an_user' => $userDB->user,
                'a_pass' => $userDB->pass,
            ];

            return $this->view('templates/usuarios/editar', $data);
        }

        $dataPOST = json_decode(file_get_contents('php://input'));
        $hashPass = password_hash($dataPOST->a_pass, PASSWORD_DEFAULT, ['cost' => 10]);
        $data = [
            'an_id' => $dataPOST->an_id,
            'a_name' => $dataPOST->a_name,
            'a_lastName' => $dataPOST->a_lastName,
            'an_user' => $dataPOST->an_user,
            'a_pass' => $hashPass,
        ];
        $this->usuarioModelo->updateUser($data);
        echo json_encode("Registro Modificado Exitosamente");
    }

    public function delete($id)
    {
        if (!($this->usuarioModelo->deleteUser($id))) {
            echo json_encode("No se ha Eliminado el Usuario");
        }
        echo json_encode("Usuario Eliminado con Éxito");
    }

    public function dashboard()
    {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
        $currentUserImage = $this->usuarioModelo->showImage($currentUser->id);
        $data = [
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
        $this->usuarioModelo->updateStatus($data);
        $this->view('templates/usuarios/dashboard', $data);
    }

    public function closeSession()
    {
        $currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
        $data = [
            'id' => $currentUser->id,
            'status_user' => "Offline"
        ];
        $this->usuarioModelo->updateStatus($data);
        unset($_SESSION['SESSION_USER']);
        session_destroy();
        redireccionar("/usuarios/login");
    }

    public function PhotoPerfil()
    {
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
            $photo = base64_encode(stripslashes($currentUser->photoPerfil));
            return printf(json_encode($photo));
        }
        $currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
        $photo = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $photoDecode = base64_encode(stripslashes($photo));
        $data = [
            'id' => $currentUser->id,
            'photoPerfil' => $photo
        ];
        $this->usuarioModelo->updateImage($data);
        return printf(json_encode($photoDecode));
    }

    public function chargeTableUsers()
    {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        echo json_encode($usuarios);
    }

    public function AnnouncementNews1News2()
    {
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $announcement =  json_decode(file_get_contents(RUTA_ORIGIN . '/public_html/json/announcement.json'), true);
            $news1 =  json_decode(file_get_contents(RUTA_ORIGIN . '/public_html/json/news1.json'), true);
            $news2 =  json_decode(file_get_contents(RUTA_ORIGIN . '/public_html/json/news2.json'), true);

            $data = [
                "announcement" => $announcement['announcement'],
                "news1" =>  $news1['news1'],
                "news2" => $news2['news2']
            ];

            return printf(json_encode($data));
        }

        $imagen = base64_encode(stripslashes(addslashes(file_get_contents($_FILES['image']['tmp_name']))));
        $data = [
            'nameFile' => $_POST['nameFile'],
            $_POST['nameFile'] => $imagen
        ];

        if ($_POST['nameFile'] == "announcement") {
            $file = RUTA_ORIGIN . '/public_html/json/announcement.json';
            $json_string = json_encode($data);
            file_put_contents($file, $json_string);
        }

        if ($_POST['nameFile'] == "news1") {
            $file = RUTA_ORIGIN . '/public_html/json/news1.json';
            $json_string = json_encode($data);
            file_put_contents($file, $json_string);
        }

        if ($_POST['nameFile'] == "news2") {
            $file = RUTA_ORIGIN . '/public_html/json/news2.json';
            $json_string = json_encode($data);
            file_put_contents($file, $json_string);
        }
        return printf(json_encode($imagen));
    }
}

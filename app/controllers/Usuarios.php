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

        if (!(password_verify($dataPOST->password, $dataDB->pass))) {
            return printf(json_encode("Contraseña incorrecta."));
        }

        $_SESSION['SESSION_USER'] = $dataDB->name_user;
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
                'an_user' => $userDB->name_user,
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
            'name_user' => $currentUser->name_user,
            'pass' => $currentUser->pass,
            'imagen' => $currentUserImage->photo_perfil,
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
        $currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $photo = $currentUser->photo_perfil;
            return printf(json_encode($photo));
        }
        $photo = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
        $data = [
            'id' => $currentUser->id,
            'photo_perfil' => $photo
        ];
        $this->usuarioModelo->updateImage($data);
        return printf(json_encode($photo));
    }

    public function chargeTableUsers()
    {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        echo json_encode($usuarios);
    }

    public function AnnouncementNews1News2()
    {
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $data = json_decode(file_get_contents(RUTA_ORIGIN . '/public_html/json/AnnouncementNews1News2.json'));

            $data = [
                "announcement" => $data['0']->imagen,
                "news1" =>  $data['1']->imagen,
                "news2" => $data['2']->imagen
            ];

            return printf(json_encode($data));
        }

        $file = RUTA_ORIGIN . '/public_html/json/AnnouncementNews1News2.json';
        if (!file_exists($file)) {
            $data = '
            [
            {   "file_name":"announcement",
                "imagen":"archivo base 641"
            },
            {   "file_name":"news1",
                "imagen":"archivo base 642"
            },
            {   "file_name":"news2",
                "imagen":"archivo base 643"
            }]
            ';

            $file = RUTA_ORIGIN . '/public_html/json/AnnouncementNews1News2.json';
            $json_string = $data;
            file_put_contents($file, $json_string);
        }
        #FILE EXIST

        $imagen = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

        $json = file_get_contents(RUTA_ORIGIN . '/public_html/json/AnnouncementNews1News2.json');

        $data = json_decode($json);

        foreach ($data as $obj) {
            if ($obj->file_name == $_POST['nameFile']) {
                $obj->imagen = $imagen;
            }
        }

        $file = RUTA_ORIGIN . '/public_html/json/AnnouncementNews1News2.json';
        $json_string = json_encode($data);
        file_put_contents($file, $json_string);
        return printf(json_encode($imagen));
    }

    public function TEST()
    {
        $json = file_get_contents(RUTA_ORIGIN . '/public_html/json/data.json');

        $data = json_decode($json);

        foreach ($data as $obj) {
            $Id = $obj->Id;
            $Username = $obj->Username;
            $FatherName = $obj->FatherName;

            if ($obj->Id == "2") {
                $obj->Username = "José";
            }
            echo $Id . " " . $Username . " " . $FatherName;
        }

        $file = RUTA_ORIGIN . '/public_html/json/data.json';
        $json_string = json_encode($data);
        file_put_contents($file, $json_string);
    }
    public function TEST2()
    {

        $file = RUTA_ORIGIN . '/public_html/json/photos_perfil.json';
        // if (!file_exists($file)) {

        $data = [];
        for ($i = 1; $i < data; $i++) {
            $data += ["id$i" => "$i"];
        }

        $file = RUTA_ORIGIN . '/public_html/json/photos_perfil.json';
        $json_string = json_encode($data);
        file_put_contents($file, $json_string);
        // }
        // #FILE EXIST

        // $imagen = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

        // $json = file_get_contents(RUTA_ORIGIN . '/public_html/json/photos_perfil.json');

        // $data = json_decode($json);

        // foreach ($data as $obj) {
        //     if ($obj->file_name == $_POST['nameFile']) {
        //         $obj->imagen = $imagen;
        //     }
        // }

        // $file = RUTA_ORIGIN . '/public_html/json/photos_perfil.json';
        // $json_string = json_encode($data);
        // file_put_contents($file, $json_string);
        // return printf(json_encode($imagen));
    }
}

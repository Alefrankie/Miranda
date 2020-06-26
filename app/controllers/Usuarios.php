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
            return $this->view('templates/usuarios/login');
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
        $datos = [
            'a_name' => $dataPOST->a_name,
            'a_lastName' => $dataPOST->a_lastName,
            'an_user' => $dataPOST->an_user,
            'a_pass' => $hashPass,
        ];

        if (!($this->usuarioModelo->registerUser($datos))) {
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
        $data2 = [
            'an_id' => $dataPOST->an_id,
            'a_name' => $dataPOST->a_name,
            'a_lastName' => $dataPOST->a_lastName,
            'an_user' => $dataPOST->an_user,
            'a_pass' => $hashPass,
        ];
        $this->usuarioModelo->updateUser($data2);
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

    public function closeSession()
    {
        $currentUser = $this->usuarioModelo->GetUser($_SESSION['SESSION_USER']);
        $datos = [
            'id' => $currentUser->id,
            'status_user' => "Offline"
        ];
        $this->usuarioModelo->updateStatus($datos);
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
        $datos = [
            'id' => $currentUser->id,
            'photoPerfil' => $photo
        ];
        $this->usuarioModelo->updateImage($datos);
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

        if ($_POST['nameFile'] == "announcement") {
            $datos = [
                'nameFile' => $_POST['nameFile'],
                'announcement' => $imagen
            ];
            $file = RUTA_ORIGIN . '/public_html/json/announcement.json';
            $json_string = json_encode($datos);
            file_put_contents($file, $json_string);
        }

        if ($_POST['nameFile'] == "news1") {
            $datos = [
                'nameFile' => $_POST['nameFile'],
                'news1' => $imagen
            ];
            $file = RUTA_ORIGIN . '/public_html/json/news1.json';
            $json_string = json_encode($datos);
            file_put_contents($file, $json_string);
        }

        if ($_POST['nameFile'] == "news2") {
            $datos = [
                'nameFile' => $_POST['nameFile'],
                'news2' => $imagen
            ];
            $file = RUTA_ORIGIN . '/public_html/json/news2.json';
            $json_string = json_encode($datos);
            file_put_contents($file, $json_string);
        }
        return printf(json_encode($imagen));
    }

    // public function importJson()

    // {
    //     $json = file_get_contents(RUTA_APP . '/data.json');

    //     $data =  json_decode($json, true);

    //     foreach ($data as $row) {
    //         $id = $row["id"];
    //         $nombre = $row["nombre"];
    //         $apellido = $row["apellido"];
    //         $user = $row["user"];
    //         $pass = $row["pass"];
    //         $imagen = $row["imagen"];
    //         $t_user = $row["apellido"];
    //     }

    //     $datos["responsable"]["Aficiones"][0] = "Natación";

    //     $fh = fopen("../app/datos_out.json", 'w+')
    //         or die("Error al abrir fichero de salida");
    //     fwrite($fh, json_encode($datos, JSON_UNESCAPED_UNICODE));
    //     fclose($fh);
    //     //Esto para eliminar archivos
    //     // unlink();


    //     // Código para crear clientes.json

    //     $arr_clientes = array(
    //         'nombre' => 'Jose', 'edad' => '20', 'genero' => 'masculino',
    //         'email' => 'correodejose@dominio.com', 'localidad' => 'Madrid', 'telefono' => '91000000'
    //     );


    //     //Creamos el JSON
    //     $json_string = json_encode($arr_clientes);
    //     $file = 'clientes.json';
    //     file_put_contents($file, $json_string);




    //     // Código para leer clientes.json


    //     //Leemos el JSON
    //     $datos_clientes = file_get_contents("clientes.json");
    //     $json_clientes = json_decode($datos_clientes, true);

    //     foreach ($json_clientes as $cliente) {

    //         echo $cliente . "<br>";
    //     }
    // }

    // public function cifrado()
    // {
    //     session_start();
    //     $hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
    //     if (password_verify("Contraseña", "Contraseña de la base de datos")) {
    //         $_SESSION['usuario'] = "Usuario en la base de datos";
    //     } else {
    //     }
    // }
    // public function suma()
    // {
    //     $photoDefault = RUTA_URL . "/img/usuarios/profile.png";
    //     echo ($photoDefault);
    //     $photo = $_POST['photo'];


    //     echo ($photo);
    //     // $file = RUTA_APP . '/data.json';
    //     $dataBase = json_decode(file_get_contents($file), true);

    //     if($dataPOST->user == $dataBase[""] && password_verify($dataPOST->pass, $dataBase->pass) == true){
    //         echo json_encode("Si Funciona");
    //     }else{
    //         echo json_encode("No sirve");
    //     }

    //     $Contenido = json_encode("datos.txt", "Nombre: 'Hola', Contraseña: '1234567'");
    //     file_put_contents($Contenido, FILE_APPEND);

    //     $user = "Alefrank";
    //     $data = $this->usuarioModelo->GetUser($user);

    //     $dataArray = [count($data)];

    //     foreach($dataArray as $key){
    //         $dataArray["id"] = $data->id;
    //     }
    //     print_r($dataArray);
    //     echo ($dataArray["id"]);
    //     if (empty($data)) {
    //         echo ("Array Vacío");
    //     } else {
    //         print_r($data);
    //     }

    //     if ($data["0"] == $user) {
    //         echo ("<br>Si Funciona <br>");
    //     } else {
    //         echo ("<br>No sirve <br>");
    //     }
    // }
}

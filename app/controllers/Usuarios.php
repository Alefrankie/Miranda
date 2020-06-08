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
        $photoDefault1 = RUTA_URL . "/public_html/img/usuarios/profile.png";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT, ['cost' => 10]);
            $photoDefault = addslashes(file_get_contents($_FILES[$photoDefault1]['tmp_name']));
            $datos = [
                'nombre' => trim($_POST['nombre']),
                'apellido' => trim($_POST['apellido']),
                'user' => trim($_POST['user']),
                'pass' => $hash,
                'imagen' => $photoDefault
            ];

            if ($this->usuarioModelo->agregarUsuario($datos)) {
                echo json_encode("Registro Exitoso.");
            } else {
                echo json_encode ("Registro Fallido");
            }
        } else {
            $datos = [
                "photo" => $photoDefault1
            ];
            $this->view('templates/usuarios/register', $datos);
        }
    }

    public function editar(){
        $this->view('templates/usuarios/editar');
    }

    public function validate()
    {
        $dataPOST = json_decode(file_get_contents('php://input'));
        if (empty($dataPOST)) {
            echo json_encode("No hay Datos");
        } else {
            $dataDB = $this->usuarioModelo->GetUser($dataPOST->user);
            if (empty($dataDB)) {
                echo json_encode("Usuario no encontrado.");
            } else if (password_verify($dataPOST->pass, $dataDB->pass)) {
                session_start();
                echo json_encode("<br>Inicio de Sesión Exitoso.<br>");
            } else {
                echo json_encode("<br>Usuario/Contraseña incorrectos.<br>");
            }
        }
    }

    public function dashboard($user)
    {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $currentUser = $this->usuarioModelo->GetUser($user);
        $currentUserImage = $this->usuarioModelo->showImage($currentUser->id);
        $datos = [
            'usuarios' => $usuarios,
            'id' => $currentUser->id,
            'nombre' => $currentUser->nombre,
            'password' => $currentUser->pass,
            't_user' => $currentUser->t_user,
            'imagen' => $currentUserImage
        ];

        $this->view('templates/usuarios/dashboard', $datos);
    }

    public function closeSession()
    {
        unset($_SESSION['usuario']);
        session_destroy();
        redireccionar("/usuarios/login");
    }

    public function saveDataProcess()
    {
        $currentUser = $this->usuarioModelo->GetUser("Alefrank");
        $photo = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $datos = [
            'id_usuario' => $currentUser->id,
            'imagen' => $photo
        ];
        $this->usuarioModelo->updateImage($datos);
        $photoDecode = base64_encode(stripslashes($datos['imagen']));
        echo json_encode($photoDecode);
    }

    public function importJson()

    {
        $json = file_get_contents(RUTA_APP . '/data.json');

        $data =  json_decode($json, true);

        foreach ($data as $row) {
            $id = $row["id"];
            $nombre = $row["nombre"];
            $apellido = $row["apellido"];
            $user = $row["user"];
            $pass = $row["pass"];
            $imagen = $row["imagen"];
            $t_user = $row["apellido"];
        }

        $datos["responsable"]["Aficiones"][0] = "Natación";

        $fh = fopen("../app/datos_out.json", 'w+')
            or die("Error al abrir fichero de salida");
        fwrite($fh, json_encode($datos, JSON_UNESCAPED_UNICODE));
        fclose($fh);
        //Esto para eliminar archivos
        // unlink();


        // Código para crear clientes.json

        $arr_clientes = array(
            'nombre' => 'Jose', 'edad' => '20', 'genero' => 'masculino',
            'email' => 'correodejose@dominio.com', 'localidad' => 'Madrid', 'telefono' => '91000000'
        );


        //Creamos el JSON
        $json_string = json_encode($arr_clientes);
        $file = 'clientes.json';
        file_put_contents($file, $json_string);




        // Código para leer clientes.json


        //Leemos el JSON
        $datos_clientes = file_get_contents("clientes.json");
        $json_clientes = json_decode($datos_clientes, true);

        foreach ($json_clientes as $cliente) {

            echo $cliente . "<br>";
        }
    }

    public function cifrado()
    {
        session_start();
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
        if (password_verify("Contraseña", "Contraseña de la base de datos")) {
            $_SESSION['usuario'] = "Usuario en la base de datos";
        } else {
        }
    }
    public function suma()
    {
        $photoDefault = RUTA_URL . "/img/usuarios/profile.png";
        echo ($photoDefault);
        // $photo = $_POST['photo'];


        // echo ($photo);
        // // $file = RUTA_APP . '/data.json';
        // $dataBase = json_decode(file_get_contents($file), true);

        // if($dataPOST->user == $dataBase[""] && password_verify($dataPOST->pass, $dataBase->pass) == true){
        //     echo json_encode("Si Funciona");
        // }else{
        //     echo json_encode("No sirve");
        // }

        // $Contenido = json_encode("datos.txt", "Nombre: 'Hola', Contraseña: '1234567'");
        // file_put_contents($Contenido, FILE_APPEND);

        // $user = "Alefrank";
        // $data = $this->usuarioModelo->GetUser($user);

        // $dataArray = [count($data)];

        // foreach($dataArray as $key){
        //     $dataArray["id"] = $data->id;
        // }
        // print_r($dataArray);
        // echo ($dataArray["id"]);
        // if (empty($data)) {
        //     echo ("Array Vacío");
        // } else {
        //     print_r($data);
        // }

        // if ($data["0"] == $user) {
        //     echo ("<br>Si Funciona <br>");
        // } else {
        //     echo ("<br>No sirve <br>");
        // }
    }
}

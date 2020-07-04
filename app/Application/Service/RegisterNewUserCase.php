<?php

class RegisterNewUserCase extends AppController
{

    private $a_name;
    private $a_last_name;
    private $an_user;
    private $a_password;

    public function __construct($a_name, $a_last_name, $an_user, $a_password)
    {
        $this->usuarioModelo = $this->model('UsuarioModel');
        $this->a_name = $a_name;
        $this->a_last_name = $a_last_name;
        $this->an_user = $an_user;
        $this->a_password = $a_password;
    }

    public function __invoke()
    {
        $hashPass = password_hash($this->a_password, PASSWORD_DEFAULT, ['cost' => 10]);

        $data = [
            'a_name' => $this->a_name,
            'a_lastName' => $this->a_last_name,
            'an_user' => $this->an_user,
            'a_pass' => $hashPass
        ];

        if ($this->usuarioModelo->registerUser($data)) {
            return printf(json_encode("Registro Exitoso"));
        }
        return printf(json_encode("Registro Fallido"));
    }
}

<?php

class Test
{
    private $db;
    private $user;

    public function __construct($an_user)
    {
        $this->db = new Db;
        $this->user = $an_user;
    }

    public function obtenerUsuario()
    {
        $this->db->query('SELECT * FROM Usuarios');
        $resultado = $this->db->registro();
        return $resultado;
    }
}

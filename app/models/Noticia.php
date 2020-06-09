<?php 

class Noticia{
    private $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function getNewsImages()
    {
        $this->db->query('SELECT * FROM imagesnews');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function uploadNews($datos)
    {
        $this->db->query('INSERT INTO imagesnews (id_usuario, user, imagen, description_image) values (:id_usuario, :user, :imagen, :description_image)');

        //Vincular valores
        $this->db->bind(':id_usuario', $datos['id_usuario']);
        $this->db->bind(':user', $datos['user']);
        $this->db->bind(':imagen', $datos['imagen']);
        $this->db->bind(':description_image', $datos['description_image']);

        //Ejecutar inserción

        if ($this->db->execute()) {
            return true;
        } else {
            return true;
        }
    }

    public function GetUser($user)
    {
        $this->db->query('SELECT * FROM Usuarios WHERE user = :user');
        $this->db->bind(':user', $user);
        $fila = $this->db->registro();
        return $fila;
    }
}

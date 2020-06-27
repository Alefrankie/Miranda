<?php

class NoticiaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function getNewsImages()
    {
        $this->db->query('SELECT * FROM imagesnews');
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function getNewsImagesPerfil($user)
    {
        $this->db->query('SELECT photoPerfil FROM usuarios WHERE user = :user');
        $this->db->bind(':user', $user);
        $fila = $this->db->registro();
        return $fila;
    }

    public function uploadNews($data)
    {
        $this->db->query('INSERT INTO imagesnews (id_usuario, nameUser, imagenNews, description_image) values (:id_usuario, :nameUser, :imagenNews, :description_image)');

        $this->db->bind(':id_usuario', $data['id_usuario']);
        $this->db->bind(':nameUser', $data['nameUser']);
        $this->db->bind(':imagenNews', $data['imagenNews']);
        $this->db->bind(':description_image', $data['description_image']);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function deleteNews($id_noticia)
    {
        $this->db->query('DELETE FROM imagesnews WHERE id_noticia = :id_noticia');

        //Vincular valores
        $this->db->bind(':id_noticia', $id_noticia);

        //Ejecutar inserción
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function GetUser($user)
    {
        $this->db->query('SELECT * FROM usuarios WHERE user = :user');
        $this->db->bind(':user', $user);
        $fila = $this->db->registro();
        return $fila;
    }
}

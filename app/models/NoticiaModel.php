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

    public function uploadNews($datos)
    {
        $this->db->query('INSERT INTO imagesnews (id_usuario, nameUser, imagenNews, description_image) values (:id_usuario, :nameUser, :imagenNews, :description_image)');

        //Vincular valores
        $this->db->bind(':id_usuario', $datos['id_usuario']);
        $this->db->bind(':nameUser', $datos['nameUser']);
        $this->db->bind(':imagenNews', $datos['imagenNews']);
        $this->db->bind(':description_image', $datos['description_image']);

        //Ejecutar inserción

        if ($this->db->execute()) {
            return true;
        } else {
            return true;
        }
    }

    public function deleteNews($id_noticia)
    {
        $this->db->query('DELETE FROM imagesnews WHERE id_noticia = :id_noticia');

        //Vincular valores
        $this->db->bind(':id_noticia', $id_noticia);

        //Ejecutar inserción
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function GetUser($user)
    {
        $this->db->query('SELECT * FROM usuarios WHERE user = :user');
        $this->db->bind(':user', $user);
        $fila = $this->db->registro();
        return $fila;
    }
}

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

    public function getNewsImagesPerfil($name_user)
    {
        $this->db->query('SELECT photo_perfil FROM usuarios WHERE name_user = :name_user');
        $this->db->bind(':name_user', $name_user);
        $fila = $this->db->registro();
        return $fila;
    }

    public function uploadNews($data)
    {
        $this->db->query('INSERT INTO imagesnews (id_usuario, name_user, image_news, description_image) values (:id_usuario, :name_user, :image_news, :description_image)');

        $this->db->bind(':id_usuario', $data['id_usuario']);
        $this->db->bind(':name_user', $data['name_user']);
        $this->db->bind(':image_news', $data['image_news']);
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

    public function GetUser($name_user)
    {
        $this->db->query('SELECT * FROM usuarios WHERE name_user = :name_user');
        $this->db->bind(':name_user', $name_user);
        $fila = $this->db->registro();
        return $fila;
    }
}

<?php

class NoticiaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Db;
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
        throw new Exception("Error Processing Request");
    }
}

class Querys
{
    private $table;
    private $column;
    private $value;
    private $db;

    public function __construct(string $table, string $column = NULL, $value = NULL)
    {
        $this->db = new Db;
        $this->table = $table;
        $this->column = $column;
        $this->value = $value;
    }

    public function typeQuery($type)
    {
        switch ($type) {
            case 'DELETE':
                return $this->delete();
                break;
            case 'SEARCH':
                return $this->search();
                break;
            case 'SEARCH_ALL':
                return $this->searchALL();
                break;

            default:
                throw new Exception("Query Invalid");
                break;
        }
    }

    public function delete()
    {
        $query = ('DELETE FROM ' . $this->table . ' WHERE ' . $this->column . ' = :' . $this->column);

        $this->db->query($query);
        $this->db->bind(':' . $this->column, $this->value);

        if ($this->db->execute()) {
            return "Query Successful";
        }
        throw new Exception("Query Failed");
    }

    public function search()
    {
        $query = ('SELECT * FROM ' . $this->table . ' WHERE ' . $this->column . ' = :' . $this->column);
        $this->db->query($query);
        $this->db->bind(':' . $this->column, $this->value);
        $fila = $this->db->registro();
        return $fila;
    }
    public function searchALL()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        $resultado = $this->db->registros();
        return $resultado;
    }

    // public function search()
    // {
    // $this->db->query("DELETE FROM imagesnews WHERE id_noticia = :id_noticia");

    // foreach ($this->data as $index => $value) {
    // $this->db->bind(':' . $index, $value);
    // }

    // if ($this->db->execute()) {
    // return "Query Successful";
    // }
    // throw new Exception("Query Failed");
    // }
}

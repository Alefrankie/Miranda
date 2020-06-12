<?php

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function obtenerUsuarios()
    {
        $this->db->query('SELECT id, nombre, apellido, user, pass, t_user, status_user FROM usuarios');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerUsuario()
    {
        $this->db->query('SELECT * FROM usuarios');
        $resultado = $this->db->registro();
        return $resultado;
    }

    public function registerUser($datos)
    {
        $this->db->query('INSERT INTO usuarios (nombre, apellido, user, pass) values (:a_name, :a_lastName, :an_user, :a_pass)');

        //Vincular valores

        $this->db->bind(':a_name', $datos['a_name']);
        $this->db->bind(':a_lastName', $datos['a_lastName']);
        $this->db->bind(':an_user', $datos['an_user']);
        $this->db->bind(':a_pass', $datos['a_pass']);

        //Ejecutar inserción

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerUsuarioID($id)
    {
        $this->db->query('SELECT * FROM usuarios WHERE id = :id');
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }

    public function updateUser($datos)
    {
        $this->db->query('UPDATE usuarios SET nombre = :a_name, apellido = :a_lastName, user = :an_user, pass = :a_pass WHERE id = :an_id');

        //Vincular valores
        $this->db->bind(':an_id', $datos['an_id']);
        $this->db->bind(':a_name', $datos['a_name']);
        $this->db->bind(':a_lastName', $datos['a_lastName']);
        $this->db->bind(':an_user', $datos['an_user']);
        $this->db->bind(':a_pass', $datos['a_pass']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id)
    {
        $this->db->query('DELETE FROM usuarios WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $id);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStatus($datos)
    {
        $this->db->query('UPDATE usuarios SET status_user = :status_user WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':status_user',  $datos['status_user']);

        //Ejecutar
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

    public function updateImage($datos)
    {
        $this->db->query('UPDATE usuarios SET id = :id, photoPerfil = :photoPerfil WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':photoPerfil', $datos['photoPerfil']);

        //Ejecutar insercion

        if ($this->db->execute()) {
            return true;
        } else {
            return true;
        }
    }

    public function showImage($id)
    {
        $this->db->query('SELECT * FROM usuarios WHERE id = :id');
        $this->db->bind(':id', $id);
        $file = $this->db->imagen();
        return $file;
    }
}

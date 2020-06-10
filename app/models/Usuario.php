<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function obtenerUsuarios()
    {
        $this->db->query('SELECT id, nombre, apellido, user, pass, t_user, status_user FROM Usuarios');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerUsuario()
    {
        $this->db->query('SELECT * FROM Usuarios');
        $resultado = $this->db->registro();
        return $resultado;
    }

    public function agregarUsuario($datos)
    {
        $this->db->query('INSERT INTO Usuarios (nombre, apellido, user, pass, photoPerfil) values (:nombre, :apellido, :user,:pass, :photoPerfil)');

        //Vincular valores

        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':user', $datos['user']);
        $this->db->bind(':pass', $datos['pass']);
        $this->db->bind(':photoPerfil', $datos['photoPerfil']);

        //Ejecutar inserción

        if ($this->db->execute()) {
            return true;
        } else {
            return true;
        }
    }


    public function obtenerUsuarioID($id)
    {
        $this->db->query('SELECT * FROM Usuarios WHERE id = :id');
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }

    public function actualizarUsuario($datos)
    {
        $this->db- $this->db->query('UPDATE Usuarios SET nombre = :nombre, apellido = :apellido, user = :user, pass = :pass, photoPerfil = :photoPerfil, t_user = :t_user, status_user = :status_user WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':user', $datos['user']);
        $this->db->bind(':pass', $datos['pass']);
        $this->db->bind(':photoPerfil', $datos['photoPerfil']);
        $this->db->bind(':t_user', $datos['t_user']);
        $this->db->bind(':status_user',  $datos['status_user']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStatus($datos)
    {
        $this->db->query('UPDATE Usuarios SET status_user = :status_user WHERE id = :id');

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
        $this->db->query('SELECT * FROM Usuarios WHERE user = :user');
        $this->db->bind(':user', $user);
        $fila = $this->db->registro();
        return $fila;
    }

    public function updateImage($datos)
    {
        $this->db->query('UPDATE Usuarios SET id = :id, photoPerfil = :photoPerfil WHERE id = :id');

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
        $this->db->query('SELECT * FROM Usuarios WHERE id = :id');
        $this->db->bind(':id', $id);
        $file = $this->db->imagen();
        return $file;
    }

    public function borrarUsuario($datos)
    {
        $this->db->query('DELETE FROM Usuarios WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

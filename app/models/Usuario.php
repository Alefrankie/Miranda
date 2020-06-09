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
        $this->db->query('INSERT INTO Usuarios (nombre, apellido, user, pass, imagen) values (:nombre, :apellido, :user,:pass, :imagen)');
        
        //Vincular valores

        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':user', $datos['user']);
        $this->db->bind(':pass', $datos['pass']);
        $this->db->bind(':imagen', $datos['imagen']);

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
        $this->db->query('UPDATE Usuarios SET nombre = :nombre, apellido = :apellido, pass = :pass WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':pass', $datos['pass']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStatus($user, $status_user)
    {
        $this->db->query('UPDATE Usuarios SET user = :user, status_user = :status_user WHERE user = :user');

        //Vincular valores
        $this->db->bind(':user', $user);
        $this->db->bind(':status_user', $status_user);

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
        $this->db->query('UPDATE Usuarios SET id = :id, imagen = :imagen WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':imagen', $datos['imagen']);

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

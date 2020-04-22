<?php

class Usuario{
    private $db;

	public function __construct(){
		$this->db = new Db;
	}

    public function obtenerUsuarios(){
        $this->db->query('SELECT * FROM usuarios');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerUsuario(){
        $this->db->query('SELECT * FROM usuarios');
        $resultado = $this->db->registro();
        return $resultado;
    }


    public function agregarUsuario($datos){
        $this->db->query('INSERT INTO usuarios (cedula, nombre, apellido) values (:cedula, :nombre, :apellido)');

        //Vincular valores

        $this->db->bind(':cedula', $datos ['cedula']);
        $this->db->bind(':nombre', $datos ['nombre']);
        $this->db->bind(':apellido', $datos ['apellido']);

        //Ejecutar insercion

        if ($this->db->execute()) {
            return true;
        }else{
            return true;
        }
    }

    public function obtenerUsuarioID($id){
        $this->db->query('SELECT * FROM usuarios WHERE id = :id');
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }

    public function actualizarUsuario($datos){
        $this->db->query('UPDATE usuarios SET cedula = :cedula, nombre = :nombre, apellido = :apellido WHERE id = :id ');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':cedula', $datos['cedula']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);

        //Ejecutar
        if ($this->db->execute()) {
           return true;
        }else{
            return false;
        }
    }

    public function borrarUsuario($datos){
        $this->db->query('DELETE FROM usuarios WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);

        //Ejecutar
        if ($this->db->execute()) {
           return true;
        }else{
            return false;
        }
    }
}

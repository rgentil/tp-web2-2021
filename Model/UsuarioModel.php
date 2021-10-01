<?php

class UsuarioModel{

    public $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tp_web2_2021;charset=utf8', 'root', '');
    }

    function getUsuario($codigo){
        $sentencia = $this->db->prepare('SELECT id_usuario, nombre, codigo, password, rol FROM usuario WHERE codigo = ?');
        $sentencia->execute(array($codigo));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }   

    function getAll(){
        $sentencia = $this->db->prepare('SELECT id_usuario, nombre, codigo, password, rol FROM usuario');
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    } 

    function getById($id){
        $sentencia = $this->db->prepare('SELECT id_usuario, nombre, codigo, password, rol FROM usuario WHERE id_usuario = ?');
        $sentencia->execute(array($id));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    function insert($nombre, $codigo, $password, $rol){
        $sentencia = $this->db->prepare('INSERT INTO usuario(nombre, codigo, password, rol) VALUES(?, ?, ?, ?)');
        $sentencia->execute(array($nombre, $codigo, $password, $rol));
        return $this->db->lastInsertId();
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM usuario WHERE id_usuario=?');
        $sentencia->execute(array($id));
    }

    function update($id,$nombre,$rol){
        $sentencia = $this->db->prepare("UPDATE usuario SET nombre=?,rol=? WHERE id_usuario=?");
        $sentencia->execute(array($nombre, $rol, $id));
        return $this->db->lastInsertId();
    }
    
}
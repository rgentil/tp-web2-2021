<?php

class UsuarioModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tp_web2_2021;charset=utf8', 'root', '');
    }

    function getAll(){
        $sentencia = $this->db->prepare('SELECT id_usuario, nombre, codigo, password, rol, email,
                                                CASE
                                                    WHEN rol = "Admin" THEN "Administrador"
                                                    WHEN rol = "Comun" THEN "Común"
                                                    ELSE "Sin especificar"
                                                END as rol_descrip
                                            FROM usuario');
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    } 

    function getById($id){
        $sentencia = $this->db->prepare('SELECT id_usuario, nombre, codigo, password, rol, email,
                                                CASE
                                                    WHEN rol = "Admin" THEN "Administrador"
                                                    WHEN rol = "Comun" THEN "Común"
                                                    ELSE "Sin especificar"
                                                END as rol_descrip
                                            FROM usuario WHERE id_usuario = ?');
        $sentencia->execute(array($id));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    function insert($nombre, $codigo, $password, $rol, $email){
        $sentencia = $this->db->prepare('INSERT INTO usuario(nombre, codigo, password, rol, email) VALUES(?, ?, ?, ?, ?)');
        $sentencia->execute(array($nombre, $codigo, $password, $rol,$email));
        return $this->db->lastInsertId();
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM usuario WHERE id_usuario=?');
        $sentencia->execute(array($id));
    }

    function update($nombre,$rol,$email,$id){
        $sentencia = $this->db->prepare('UPDATE usuario SET nombre=?,rol=?,email=? WHERE id_usuario=?');
        $sentencia->execute(array($nombre, $rol, $email, $id));
    }

    function getUsuario($codigo){
        $sentencia = $this->db->prepare('SELECT id_usuario, nombre, codigo, password, rol, email,
                                                CASE
                                                    WHEN rol = "Admin" THEN "Administrador"
                                                    WHEN rol = "Comun" THEN "Común"
                                                    ELSE "Sin especificar"
                                                END as rol_descrip
                                            FROM usuario WHERE codigo = ?');
        $sentencia->execute(array($codigo));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }   
    
}
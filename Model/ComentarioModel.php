<?php

class ComentarioModel {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tp_web2_2021;charset=utf8', 'root', '');
    }
    
    function getAll(){
        $sentencia = $this->db->prepare('SELECT id_comentario, descripcion, puntuacion, id_usuario, id_avion
                                            FROM comentario c ');
        $sentencia->execute();
        $aviones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $aviones;
    } 

    function getById($id_comentario){
        $sentencia = $this->db->prepare('SELECT id_comentario, descripcion, puntuacion, id_usuario, id_avion
                                            FROM comentario c 
                                                WHERE c.id_comentario = ?');
        $sentencia->execute(array($id_comentario));
        $avion = $sentencia->fetch(PDO::FETCH_OBJ);
        return $avion;
    }

    function insert($descripcion,$puntuacion, $id_avion, $id_usuario){
        $sentencia = $this->db->prepare('INSERT INTO comentario(descripcion, puntuacion, id_avion, id_usuario) VALUES(?, ?, ?, ?)');
        $sentencia->execute(array($descripcion, $puntuacion, $id_avion, $id_usuario));
        return $this->db->lastInsertId();
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id_comentario=?');
        $sentencia->execute(array($id));
    }

    //No esta ruteado en el router-api
    function update($descripcion, $puntuacion, $id_comentario){
        $sentencia = $this->db->prepare("UPDATE comentario SET descripcion=?, puntuacion=? WHERE id_comentario=?");
        $sentencia->execute(array($descripcion, $puntuacion, $id_comentario));
    }

}
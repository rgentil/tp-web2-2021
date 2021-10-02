<?php

class HangarModel{

    public $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tp_web2_2021;charset=utf8', 'root', '');
    }

    function getAll(){
        $sentencia = $this->db->prepare('SELECT h.id_hangar, h.nombre, h.ubicacion, h.capacidad, a.id_avion, COUNT(a.id_avion) AS cantAviones
                                         FROM hangar h LEFT JOIN avion a ON (a.id_hangar = h.id_hangar)
                                         GROUP BY h.id_hangar');
        $sentencia->execute();
        $hangares = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $hangares;
    } 

    function getById($id){
        $sentencia = $this->db->prepare('SELECT id_hangar, nombre, ubicacion, capacidad FROM hangar WHERE id_hangar = ?');
        $sentencia->execute(array($id));
        $hangar = $sentencia->fetch(PDO::FETCH_OBJ);
        return $hangar;
    }

    function insert($nombre, $ubicacion, $capacidad){
        $sentencia = $this->db->prepare('INSERT INTO hangar(nombre, ubicacion, capacidad) VALUES(?, ?, ?)');
        $sentencia->execute(array($nombre, $ubicacion, $capacidad));
        return $this->db->lastInsertId();
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM hangar WHERE id_hangar=?');
        $sentencia->execute(array($id));
    }

    function update($nombre,$ubicacion,$capacidad,$id){
        $sentencia = $this->db->prepare("UPDATE hangar SET nombre=?, ubicacion=?, capacidad=? WHERE id_hangar=?");
        $sentencia->execute(array($nombre,$ubicacion,$capacidad,$id));
        return $this->db->lastInsertId();
    }

}
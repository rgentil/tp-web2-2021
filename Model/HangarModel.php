<?php

class HangarModel{

    public $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tp_web2_2021;charset=utf8', 'root', '');
    }

    function getAll(){
        $sentencia = $this->db->prepare('select h.id_hangar, h.nombre, h.ubicacion, h.capacidad from hangar h');
        $sentencia->execute();
        $hangares = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $hangares;
    } 

    function getById($id){
        $sentencia = $this->db->prepare('select h.id_hangar, h.nombre, h.ubicacion, h.capacidad from hangar h where h.id_hangar = ?');
        $sentencia->execute(array($id));
        $hangar = $sentencia->fetch(PDO::FETCH_OBJ);
        return $hangar;
    }

    function insert($nombre, $ubicacion, $capacidad){
        $sentencia = $this->db->prepare('INSERT INTO hangar(nombre, ubicacion, capacidad) VALUES(?, ?, ?)');
        $sentencia->execute(array($nombre, $ubicacion, $capacidad));
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM hangar WHERE id_hangar=?');
        $sentencia->execute(array($id));
    }

    function update($id,$nombre){
        $sentencia = $this->db->prepare("UPDATE hangar SET nombre=? WHERE id_hangar=?");
        $sentencia->execute(array($id,$nombre));
    }

}
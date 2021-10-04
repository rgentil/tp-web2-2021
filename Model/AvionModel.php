<?php

class AvionModel {

    public $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tp_web2_2021;charset=utf8', 'root', '');
    }

    function getAll(){
        $sentencia = $this->db->prepare('SELECT a.id_avion, a.nombre, a.fabricante, a.tipo, a.id_hangar, 
                                                h.nombre AS h_nombre, h.ubicacion, h.capacidad 
                                            FROM avion a 
                                                LEFT JOIN hangar h ON (h.id_hangar = a.id_hangar)');
        $sentencia->execute();
        $aviones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $aviones;
    } 

    function getById($id){
        $sentencia = $this->db->prepare('SELECT a.id_avion, a.nombre, a.fabricante, a.tipo, a.id_hangar, 
                                                h.nombre AS h_nombre, h.ubicacion, h.capacidad 
                                                FROM avion a 
                                                LEFT JOIN hangar h ON (h.id_hangar = a.id_hangar) 
                                            WHERE a.id_avion = ?');
        $sentencia->execute(array($id));
        $avion = $sentencia->fetch(PDO::FETCH_OBJ);
        return $avion;
    }

    function getByIdHangar($id_hangar){
        $sentencia = $this->db->prepare('SELECT a.id_avion, a.nombre, a.fabricante, a.tipo, a.id_hangar, 
                                                h.nombre AS h_nombre, h.ubicacion, h.capacidad 
                                            FROM avion a 
                                                LEFT JOIN hangar h ON (h.id_hangar = a.id_hangar)
                                                WHERE a.id_hangar = ?');
        $sentencia->execute(array($id_hangar));
        $aviones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $aviones;
    } 

    function getHangaresDisponibles(){
        $sentencia = $this->db->prepare('SELECT h.id_hangar AS hIdHangar, h.nombre AS hNombre, h.ubicacion, h.capacidad 
                                            FROM hangar h 
                                            WHERE h.capacidad > (SELECT count(id_avion) FROM avion a WHERE a.id_hangar = h.id_hangar )'
                                        );
        $sentencia->execute();
        $hangares = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $hangares;
    } 
    
    function insert($nombre, $fabricante, $tipo, $id_hangar){
        $sentencia = $this->db->prepare('INSERT INTO avion(nombre, fabricante, tipo, id_hangar) VALUES(?, ?, ?, ?)');
        $sentencia->execute(array($nombre, $fabricante, $tipo, $id_hangar));
        return $this->db->lastInsertId();
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM avion WHERE id_avion=?');
        $sentencia->execute(array($id));
    }

    function update($nombre, $fabricante, $tipo, $id_hangar,$id){
        $sentencia = $this->db->prepare("UPDATE avion SET nombre=?, fabricante=?, tipo=?, id_hangar=? WHERE id_avion=?");
        $sentencia->execute(array($nombre, $fabricante, $tipo, $id_hangar,$id));
    }

}
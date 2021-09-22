<?php

class AvionModel {

    public $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tp_web2_2021;charset=utf8', 'root', '');
    }

    function getAll(){
        $sentencia = $this->db->prepare('select a.id_avion, a.nombre, a.fabricante, a.tipo, a.id_hangar, 
                                                h.nombre as h_nombre, h.ubicacion, h.capacidad 
                                            from avion a 
                                                left join hangar h on (h.id_hangar = a.id_hangar)');
        $sentencia->execute();
        $aviones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $aviones;
    } 

    function getById($id){
        $sentencia = $this->db->prepare('select a.id_avion, a.nombre, a.fabricante, a.tipo, a.id_hangar, 
                                                h.nombre as h_nombre, h.ubicacion, h.capacidad 
                                            from avion a 
                                                left join hangar h on (h.id_hangar = a.id_hangar) 
                                            where a.id_avion = ?');
        $sentencia->execute(array($id));
        $avion = $sentencia->fetch(PDO::FETCH_OBJ);
        return $avion;
    }

    function getByIdHangar($id_hangar){
        $sentencia = $this->db->prepare('select a.id_avion, a.nombre, a.fabricante, a.tipo, a.id_hangar, 
                                                h.nombre as h_nombre, h.ubicacion, h.capacidad 
                                            from avion a 
                                                left join hangar h on (h.id_hangar = a.id_hangar)
                                                where a.id_hangar = ?');
        $sentencia->execute(array($id_hangar));
        $aviones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $aviones;
    } 


    function insert($nombre, $fabricante, $tipo, $id_hangar){
        $sentencia = $this->db->prepare('INSERT INTO avion(nombre, fabricante, tipo, id_hangar) VALUES(?, ?, ?, ?)');
        $sentencia->execute(array($nombre, $fabricante, $tipo, $id_hangar));
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM avion WHERE id_avion=?');
        $sentencia->execute(array($id));
    }

    function update($id,$id_hangar){
        $sentencia = $this->db->prepare("UPDATE avion SET id_hangar=? WHERE id_avion=?");
        $sentencia->execute(array($id_hangar,$id));
    }

}
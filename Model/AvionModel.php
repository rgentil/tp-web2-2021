<?php

class AvionModel {

    private $db;

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

    function getById($id_avion){
        $sentencia = $this->db->prepare('SELECT a.id_avion, a.nombre, a.fabricante, a.tipo, a.id_hangar, 
                                                h.nombre AS h_nombre, h.ubicacion, h.capacidad 
                                                FROM avion a 
                                                LEFT JOIN hangar h ON (h.id_hangar = a.id_hangar) 
                                            WHERE a.id_avion = ?');
        $sentencia->execute(array($id_avion));
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

    //Retorna los hangares disponibles para alta o modificaión de aviones
    function getHangaresDisponibles($id_avion = null){
        //Para el caso de actualizar avión, se le pasa el id del avión para mostrar también el hangar al cual pertenece el avión
        if ($id_avion != null){
            $sentencia = $this->db->prepare('SELECT h.id_hangar AS hIdHangar, h.nombre AS hNombre, h.ubicacion, h.capacidad 
            FROM hangar h 
            WHERE h.capacidad > (SELECT count(id_avion) FROM avion a WHERE a.id_hangar = h.id_hangar ) OR h.id_hangar = (SELECT id_hangar FROM avion a WHERE a.id_avion = ?)'
            );
            $sentencia->execute(array($id_avion));
        }else{
            $sentencia = $this->db->prepare('SELECT h.id_hangar AS hIdHangar, h.nombre AS hNombre, h.ubicacion, h.capacidad 
            FROM hangar h 
            WHERE h.capacidad > (SELECT count(id_avion) FROM avion a WHERE a.id_hangar = h.id_hangar )'
            );
            $sentencia->execute();
        }
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
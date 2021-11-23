<?php

class ApiView {

    public function response($entidad,$data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($entidad,$status));
        echo json_encode($data);
    }
    
    private function _requestStatus($entidad,$code){
        $status = array(
            200 => "OK",
            204 => "No hay contenido",
            400 => "Bad Request",
            404 => "No encontrado",
            500 => "Error en el servidor",
            501 => "No implementador"
        );
        
        return (isset($status[$code]))? $entidad . $status[$code] : $entidad . $status[500];
    }

}
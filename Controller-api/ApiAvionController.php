<?php

require_once "Model/AvionModel.php";
require_once "Model/HangarModel.php";
require_once "View/ApiView.php";
require_once "Controller-api/ApiController.php";

class ApiAvionController extends ApiController {

    private $model;
    private $view;

    public function __construct(){
        $this->model = new AvionModel();
        $this->modelHangar = new HangarModel();
        $this->view = new APIView();;
    }

    public function get($params = null){
        try {
            if($params == null){
                $aviones = $this->model->getAll();
                if(!empty($aviones)) {
                    return $this->view->response('Avion',$aviones, 200);
                }else{
                    return $this->view->response('Avion',"No se encontraron resultados", 204);
                }
            }else{
                $id = $params[":ID"];
                $avion = $this->model->getById($id);
                if(!empty($avion)) {
                    return $this->view->response('Avion',$avion, 200);//Si tiene valores
                }else{
                    return $this->view->response('Avion',"El avión con id = " . $id . " no existe", 404);//Si vuelvo vacio
                }
            }
        } catch (\Throwable $th) {
            return $this->view->response('Avion',$th, 500);
        }        
    }
    
    public function create($params = null){
        //Obterner body del request. (json)
        try {
            $body = $this->getBody();
            if (empty($body) || empty($body->nombre) || empty($body->fabricante) || empty($body->tipo) ||  empty($body->id_hangar)){
                return $this->view->response('Avion','Error en los parámetros enviados', 400);
            }else{
                $nombre = $body->nombre;
                $fabricante = $body->fabricante;
                $tipo = $body->tipo;
                $id_hangar = $body->id_hangar;
                $hangarDisponible = $this->modelHangar->disponible($id_hangar);
                if ($hangarDisponible->tieneEspacio == 0){
                    return $this->view->response('Avion','El hangar con id = ' . $id_hangar . ' se encuentra completo', 500);
                }else{
                    $id = $this->model->insert($nombre,$fabricante, $tipo, $id_hangar);
                    if($id!=0) {
                        return $this->view->response('Avion','Se insertó el avión con id = ' . $id . ' correctamente en el hangar ' . $id_hangar , 200);//Si tiene valores
                    }else{
                        return $this->view->response('Avion','No se pudo insertar el avión', 500);
                    }
                }
            }
        } catch (\Throwable $th) {
            return $this->view->response('Avion',$th, 500);
        }        
    }

    public function update($params = null){
        //Obterner body del request. (json)
        try {
            if($params != null){
                $id = $params[":ID"];
                $avion = $this->model->getById($id);
                if(!empty($avion)) {
                    $body = $this->getBody();
                    if (empty($body) || empty($body->nombre) || empty($body->fabricante) || empty($body->tipo) ||  empty($body->id_hangar)){
                        return $this->view->response('Avion','Error en los parámetros enviados', 400);
                    }else{
                        $nombre = $body->nombre;
                        $fabricante = $body->fabricante;
                        $tipo = $body->tipo;
                        $id_hangar = $body->id_hangar;
                        $hangarDisponible = $this->modelHangar->disponible($id_hangar);
                        if ($hangarDisponible->tieneEspacio == 0){
                            return $this->view->response('Avion','El hangar con id = ' . $id_hangar . ' se encuentra completo', 500);
                        }else{
                            $id = $this->model->update($nombre,$fabricante, $tipo, $id_hangar,$id);
                            if($id!=0) {
                                return $this->view->response('Avion','Se actualizó el avión con id = ' . $id . ' correctamente en el hangar ' . $id_hangar , 200);//Si tiene valores
                            }else{
                                return $this->view->response('Avion','No se pudo actualizar el avión', 500);
                            }
                        }                        
                    }
                }
                else{
                    return $this->view->response('Avion','No se encontró avión con id ' . $id , 404);
                }
            }else{
                return $this->view->response('Avion','Error en los parámetros enviados', 400);
            }
        } catch (\Throwable $th) {
            return $this->view->response('Avion',$th, 500);
        }        
    }

    public function delete($params = null){
        try {
            if($params != null){
                $id = $params[":ID"];
                $avion = $this->model->getById($id);
                if(!empty($avion)) {
                    $this->model->delete($id);    
                    return $this->view->response('Avion','Se eliminó correctamente el avión con id ' . $id , 200);
                }
                else{
                    return $this->view->response('Avion','No se encontró avión con id ' . $id , 404);
                }
            }else{
                return $this->view->response('Avion','Error en los parámetros enviados', 400);
            }
        } catch (\Throwable $th) {
            return $this->view->response('Avion',$th, 500);
        }        
    }
    
}
<?php

require_once "Model/ComentarioModel.php";
require_once "View/ApiView.php";
require_once "Controller-api/ApiController.php";

class ApiComentarioController extends ApiController {

    private $model;
    private $view;

    public function __construct(){
        $this->model = new ComentarioModel();
        $this->view = new APIView();;
    }

    public function get($params = null){
        try {
            if($params == null){
                $comentarios = $this->model->getAll();
                if(!empty($comentarios)) {
                    return $this->view->response('Comentario',$comentarios, 200);
                }else{
                    return $this->view->response('Comentario',"No se encontraron resultados", 204);
                }
            }else{
                $id = $params[":ID"];
                $comentario = $this->model->getById($id);
                if(!empty($comentario)) {
                    return $this->view->response('comentario',$comentario, 200);//Si tiene valores
                }else{
                    return $this->view->response('comentario',"El comentario con id = " . $id . " no existe", 404);//Si vuelvo vacio
                }
            }
        } catch (\Throwable $th) {
            return $this->view->response('comentario',$th, 500);
        }        
    }

    public function create($params = null){
        //Obterner body del request. (json)
        try {
            if(!isset($_SESSION)){ 
                session_start(); 
            } 
            $id_usuario = $_SESSION["id"];
            //verificar que este logueado
            $body = $this->getBody();
            if (empty($body) || empty($body->descripcion) || empty($body->puntuacion) ||  empty($body->id_avion)){
                return $this->view->response('comentario','Error en los parámetros enviados', 400);
            }else{
                $descripcion = $body->descripcion;
                $puntuacion = $body->puntuacion;
                $id_avion = $body->id_avion;
                $id = $this->model->insert($descripcion,$puntuacion, $id_avion, $id_usuario);
                if($id!=0) {
                    return $this->view->response('comentario','Se insertó el comentario con id = ' . $id, 200);//Si tiene valores
                }else{
                    return $this->view->response('comentario','No se pudo insertar el comentario', 500);
                }
            }
        } catch (\Throwable $th) {
            return $this->view->response('comentario',$th, 500);
        }        
    }

    public function delete($params = null){
        try {
            if($params != null){

                $id_usuario = $_SESSION["id"];
                $rol = $_SESSION["rol"];
                //validar logueado y ser admin

                $id = $params[":ID"];
                $comentario = $this->model->getById($id);
                if(!empty($comentario)) {
                    $this->model->delete($id);    
                    return $this->view->response('comentario','Se eliminó correctamente el comentario con id ' . $id , 200);
                }
                else{
                    return $this->view->response('comentario','No se encontró comentario con id ' . $id , 404);
                }
            }else{
                return $this->view->response('comentario','Error en los parámetros enviados', 400);
            }
        } catch (\Throwable $th) {
            return $this->view->response('comentario',$th, 500);
        }        
    }
    
}
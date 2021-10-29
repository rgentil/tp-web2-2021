<?php

require_once "Model/HangarModel.php";
require_once "View/HangarView.php";
require_once 'Helpers/ControlLoginHelper.php';

class HangarController {

    private $model;
    private $view;
    private $controlLoginHelper;

    public function __construct(){
        $this->model = new HangarModel();
        $this->view = new HangarView();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    public function showAll(){
        $this->controlLoginHelper->checkLoggedIn();
        $hangares = $this->model->getAll();
        $this->view->showAll($hangares);
    }

    public function showById($id){
        $this->controlLoginHelper->checkLoggedIn();
        $hangar = $this->model->getById($id);
        $this->view->showHangar($hangar);
    }

    public function showAlta(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $this->view->showHangarAlta();
    }  

    public function showUpdate($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $hangar = $this->model->getById($id);        
        $this->view->showHangarUpdate($hangar);    
    }  

    function createHangar(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $mensaje_valores_requeridos = "Se debe ingresar nombre, ubicación y capacidad";
        if (!isset($_POST['nombre']) || !isset($_POST['ubicacion']) || !isset($_POST['capacidad']) ){
            $this->view->showHangarAlta($mensaje_valores_requeridos);    
        }else{
            $id = $this->model->insert($_POST['nombre'], $_POST['ubicacion'], $_POST['capacidad']);
            $this->showById($id);
        }
    }

    function updateHangar(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        if (!isset($_POST['id'])){
            $this->showAll();
        }
        else{
            $id = $_POST['id'];
            $mensaje_valores_requeridos = "Se debe ingresar nombre, ubicación y capacidad";
            if (!isset($_POST['nombre']) || !isset($_POST['ubicacion']) || !isset($_POST['capacidad']) ){
                $hangar = $this->model->getById($id);
                $this->view->showHangarUpdate($hangar, $mensaje_valores_requeridos);    
            }else{
                $this->model->update($_POST['nombre'], $_POST['ubicacion'], $_POST['capacidad'],$id);
                $this->showById($id);
            }
        }
    }

    function deleteHangar($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

}
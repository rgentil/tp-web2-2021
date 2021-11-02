<?php

require_once "Model/AvionModel.php";
require_once "View/AvionView.php";
require_once 'Helpers/ControlLoginHelper.php';

class AvionController {

    private $model;
    private $view;
    private $controlLoginHelper;

    public function __construct(){
        $this->model = new AvionModel();
        $this->view = new AvionView();
        $this->controlLoginHelper = new ControlLoginHelper();
    }

    public function showAll(){
        $this->controlLoginHelper->checkLoggedIn();
        $aviones = $this->model->getAll();
        $this->view->showAll($aviones);
    }

    public function showById($id){
        $this->controlLoginHelper->checkLoggedIn();
        $avion = $this->model->getById($id);
        $this->view->showAvion($avion);
    }

    public function showByIdHangar($id_hangar){
        $this->controlLoginHelper->checkLoggedIn();
        $aviones = $this->model->getByIdHangar($id_hangar);
        $this->view->showAllByHangar($aviones);
    }

    public function showAlta(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $hangaresDisponibles = $this->model->getHangaresDisponibles();
        $this->view->showAvionAlta($hangaresDisponibles);
    }  

    public function showUpdate($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $hangaresDisponibles = $this->model->getHangaresDisponibles($id);
        $avion = $this->model->getById($id);        
        $this->view->showAvionUpdate($avion,$hangaresDisponibles);
    }  

    function createAvion(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $mensaje_valores_requeridos = "Se debe ingresar nombre, fabricante, tipo y hangar";
        if (!isset($_POST['nombre']) || !isset($_POST['fabricante']) || !isset($_POST['tipo']) || !isset($_POST['idHangar'])){
            $this->view->showAvionAlta($mensaje_valores_requeridos);            
        }else{
            $id = $this->model->insert($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar']);
            $this->showById($id);
        }
    }

    function updateAvion(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        if (!isset($_POST['id'])){
            $this->showAll();
        }
        else{
            $id = $_POST['id'];  
            $mensaje_valores_requeridos = "Se debe ingresar nombre, fabricante, tipo y hangar";
            if (!isset($_POST['nombre']) || !isset($_POST['fabricante']) || !isset($_POST['tipo']) || !isset($_POST['idHangar'])){
                $avion = $this->model->getById($id);
                $hangaresDisponibles = $this->model->getHangaresDisponibles($id);
                $this->view->showAvionUpdate($avion,$hangaresDisponibles,$mensaje_valores_requeridos);
            }else{
                $this->model->update($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar'],$id);
                $this->showById($id);
            }    
        }        
    }

    function deleteAvion($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

}
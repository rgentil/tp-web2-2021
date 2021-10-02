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
        $this->view->showHangarAlta();
    }  

    public function showUpdate($id){
        $this->controlLoginHelper->checkLoggedIn();
        $hangar = $this->model->getById($id);        
        $this->view->showHangarUpdate($hangar);    
    }  

    function createHangar(){
        $this->controlLoginHelper->checkLoggedIn();
        $id = $this->model->insert($_POST['nombre'], $_POST['ubicacion'], $_POST['capacidad']);
        $this->showById($id);
    }

    function updateHangar(){
        $id = $_POST['id'];
        $this->controlLoginHelper->checkLoggedIn();
        $this->model->update($_POST['nombre'], $_POST['ubicacion'], $_POST['capacidad'],$id);
        $this->showById($id);
    }

    function deleteHangar($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

}
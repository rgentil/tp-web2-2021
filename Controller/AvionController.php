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
        $this->view->showAll($aviones);
    }

    public function showAlta(){
        $this->controlLoginHelper->checkLoggedIn();
        $hangaresDisponibles = $this->model->getHangaresDisponibles();
        $this->view->showAvionAlta($hangaresDisponibles);
    }  

    public function showUpdate($id){
        $this->controlLoginHelper->checkLoggedIn();
        $hangaresDisponibles = $this->model->getHangaresDisponibles();
        $avion = $this->model->getById($id);        
        $this->view->showAvionUpdate($avion,$hangaresDisponibles);
    }  

    function createAvion(){
        $this->controlLoginHelper->checkLoggedIn();
        $id = $this->model->insert($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar']);
        $this->showById($id);
    }

    function updateAvion(){
        $this->controlLoginHelper->checkLoggedIn();
        $id = $_POST['id'];
        $this->model->update($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar'],$id);
        $this->showById($id);
    }

    function deleteAvion($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

}
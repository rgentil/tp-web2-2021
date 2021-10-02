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

    public function showAlta($id=null){

        $this->controlLoginHelper->checkLoggedIn();

        $hangaresDisponibles = $this->model->getHangaresDisponibles($id);

        if (!empty($id)){
            $avion = $this->model->getById($id);        
            $this->view->showAvionAlta($avion,$hangaresDisponibles);
        }else{
            $this->view->showAvionAlta(null,$hangaresDisponibles);
        }        
    }  
    
    function createAvion(){
        $this->controlLoginHelper->checkLoggedIn();
        $id = $this->model->insert($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar']);
        $this->showById($id);
    }

    function deleteAvion($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

}
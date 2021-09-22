<?php

require_once "Model/AvionModel.php";
require_once "View/AvionView.php";

class AvionController {

    private $model;
    private $view;

    public function __construct(){
        $this->model = new AvionModel();
        $this->view = new AvionView();
    }

    public function showAll(){
        $aviones = $this->model->getAll();
        $this->view->showAll($aviones);
    }

    public function showById($id){
        $avion = $this->model->getById($id);
        $this->view->showAvion($avion);
    }

    public function showByIdHangar($id_hangar){
        $aviones = $this->model->getByIdHangar($id_hangar);
        $this->view->showAll($aviones);
    }

    

}
<?php

require_once "Model/HangarModel.php";
require_once "View/HangarView.php";

class HangarController {

    private $model;
    private $view;

    public function __construct(){
        $this->model = new HangarModel();
        $this->view = new HangarView();
    }

    public function showAll(){
        $hangares = $this->model->getAll();
        $this->view->showAll($hangares);
    }

    public function showById($id){
        $hangar = $this->model->getById($id);
        $this->view->showHangar($hangar);
    }

}
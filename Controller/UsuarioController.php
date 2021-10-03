<?php

require_once "Model/UsuarioModel.php";
require_once "View/UsuarioView.php";
require_once 'Helpers/ControlLoginHelper.php';

class UsuarioController {

    private $model;
    private $view;
    private $controlLoginHelper;

    public function __construct(){
        $this->model = new UsuarioModel();
        $this->view = new UsuarioView();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    /*ABM DE USUARIO*/

    public function showAll(){
        $this->controlLoginHelper->checkLoggedIn();
        $usuarios = $this->model->getAll();
        $this->view->showAll($usuarios);
    }

    public function showById($id){
        $this->controlLoginHelper->checkLoggedIn();
        $usuario = $this->model->getById($id);
        $this->view->showUsuario($usuario);
    }

    public function showAlta(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->view->showUsuarioAlta();
    } 
    
    public function showUpdate($id){
        $this->controlLoginHelper->checkLoggedIn();
        $usuario = $this->model->getById($id);        
        $this->view->showUsuarioUpdate($usuario);
    }  

    function createUsuario(){
        $this->controlLoginHelper->checkLoggedIn();
        $passHasheado = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $id = $this->model->insert($_POST['nombre'], $_POST['codigo'], $passHasheado, $_POST['rol']);
        $this->showById($id);
    }

    function updateUsuario(){
        $this->controlLoginHelper->checkLoggedIn();
        $id = $_POST['id'];
        //$passHasheado = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->model->update($_POST['nombre']/*, $_POST['codigo'], $passHasheado, $_POST['rol']*/, $id);
        $this->showById($id);
    }

    function deleteUsuario($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

    /*REGISTRO DE USUARIO*/
    public function showRegistro(){
        $this->view->showRegistro();
    }  

    function registrarUsuario(){
        $id = $this->model->getUsuario($_POST['codigo']);
        if ($id != null){
            $this->view->showRegistro("El código de usuario ya existe.");
        }else{
            $passHasheado = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->model->insert($_POST['nombre'], $_POST['codigo'], $passHasheado, $_POST['rol']);
            $this->view->showLogin();
        }
    }
}
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
        $this->controlLoginHelper->checkRolLoggedIn();
        $usuarios = $this->model->getAll();
        $this->view->showAll($usuarios);
    }

    public function showById($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $usuario = $this->model->getById($id);
        $this->view->showUsuario($usuario);
    }

    public function showAlta(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $this->view->showUsuarioAlta();
    } 
    
    public function showUpdate($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $usuario = $this->model->getById($id);        
        $this->view->showUsuarioUpdate($usuario);
    }  

    function createUsuario(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $mensaje_valores_requeridos = "Se debe ingresar nombre, password, código, rol";
        if (!isset($_POST['nombre']) || !isset($_POST['password']) || !isset($_POST['codigo']) || !isset($_POST['rol'])){
            $this->view->showUsuarioAlta($mensaje_valores_requeridos);    
        }
        else{
            $passHasheado = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $id = $this->model->insert($_POST['nombre'], $_POST['codigo'], $passHasheado, $_POST['rol'],$_POST['email']);
            $this->showById($id);
        }        
    }

    function updateUsuario(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        if (!isset($_POST['id'])){
            $this->showAll();
        }
        else{
            $id = $_POST['id'];
            $mensaje_valores_requeridos = "Se debe ingresar nombre, rol";
            if (!isset($_POST['nombre']) || !isset($_POST['rol'])){
                $usuario = $this->model->getById($id);
                $this->view->showUsuarioUpdate($usuario, $mensaje_valores_requeridos);    
            }else{
                //$passHasheado = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->model->update($_POST['nombre']/*, $_POST['codigo'], $passHasheado,*/, $_POST['rol'],$_POST['email'], $id);
                $this->showById($id);
            }
        }        
    }

    function deleteUsuario($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

    /*REGISTRO DE USUARIO*/
    public function showRegistro(){
        $this->view->showRegistro();
    }  

    function registrarUsuario(){

        if (!isset($_POST['nombre']) || !isset($_POST['codigo']) || !isset($_POST['rol']) || !isset($_POST['password'])){
            $this->view->showRegistro("Ingrese los valores requeridos.");
        }
        else{
            $nombre = $_POST['nombre'];
            $codigo = $_POST['codigo'];
            $rol = $_POST['rol'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $id = $this->model->getUsuario($codigo);
            if ($id != null){
                $this->view->showRegistro("El código de usuario ya existe.");
            }else{
                $passHasheado = password_hash($password, PASSWORD_BCRYPT);
                $id_usuario = $this->model->insert($nombre, $codigo, $passHasheado, $rol, $email);
                //Una vez registrado queda logueado el nuevo usuario.
                if(!isset($_SESSION)){ 
                    session_start(); 
                } 
                $_SESSION["id"] = $id_usuario;
                $_SESSION["codigo"] = $codigo;
                $_SESSION["nombre"] = $nombre;
                $_SESSION["rol"] = $rol;
                $_SESSION["email"] = $email;
                $this->view->showHome();
            }
        }
    }

}
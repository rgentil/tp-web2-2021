<?php

require_once "Model/UsuarioModel.php";
require_once "View/LoginView.php";

class LoginController {

    private $model;
    private $view;

    public function __construct(){
        $this->model = new UsuarioModel();
        $this->view = new LoginView();
    }

    function logout(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        session_destroy();
        //$this->view->showLogin();
        //Cuando se oblitario loguear va a login
        header("Location: ".BASE_URL."home");
    }

    public function showLogin(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if (isset($_SESSION["codigo"]) && !empty($_SESSION["codigo"])){
            $this->view->showHome();
        }else{                
            $this->view->showLogin();
        }
    }
    
    public function loguear(){
        if (!empty($_POST['codigo']) && !empty($_POST['password'])) {
            $password = $_POST['password'];
            $usuario = $this->model->getUsuario($_POST['codigo']);
            if ($usuario && password_verify($password, $usuario->password)) {
                if(!isset($_SESSION)){ 
                    session_start(); 
                } 
                $_SESSION["codigo"] = $usuario->codigo;
                $_SESSION["nombre"] = $usuario->nombre;
                $_SESSION["rol"] = $usuario->rol;
                $this->view->showHome();
            }else{
                $this->view->showLogin('Credenciales erroneas');
            }        
        }
    }

}
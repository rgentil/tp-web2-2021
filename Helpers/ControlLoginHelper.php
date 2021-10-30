<?php

require_once "View/LoginView.php";

class ControlLoginHelper{

    //private $view;

    public function __construct(){
        //$this->view = new LoginView();
    }

    // Métodos para controlar el acceso a las páginas o realizar acciones. 

    //Controla que el usuario logueado tengo rol de administrador
    function checkRolLoggedIn(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "Admin"){
            //$this->view->showLogin();
            header("Location: ".BASE_URL."login");
        }
    }

    function estaLogueadoUsuario(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if (isset($_SESSION["codigo"]) && !empty($_SESSION["codigo"])){
            return true;
        }
        return false;
    }

    function getNombreUsuarioLogueado(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if (isset($_SESSION["nombre"]) && !empty($_SESSION["nombre"])){
            return $_SESSION["nombre"];
        }
        return null;
    }

    function getCodigoUsuarioLogueado(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if (isset($_SESSION["codigo"]) && !empty($_SESSION["codigo"])){
            return $_SESSION["codigo"];
        }
        return null;
    }

    function esUsuarioAdmin(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        try {
            if ($_SESSION["rol"] == "Admin"){
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    //Controla que se halla logueado
    function checkLoggedIn(){
        //Lo comento para esta entrega, porque se puede navegar la aplicacion sin tener que estar logueado.
        /*if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if(!isset($_SESSION["codigo"])){
            //$this->view->showLogin();
            header("Location: ".BASE_URL."login");
        }*/
    }


    
}
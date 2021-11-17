<?php

require_once "View/LoginView.php";

class ControlLoginHelper{

    //private $view;

    public function __construct(){
        //$this->view = new LoginView();
    }

    // Métodos para controlar el acceso a las páginas o realizar acciones. 

    //Controla que el usuario logueado tenga rol de administrador
    function checkRolLoggedIn(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "Admin"){
            //$this->view->showLogin();
            header("Location: ".BASE_URL."login");
            die();
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

    function getIdUsuarioLogueado(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if (isset($_SESSION["id"]) && !empty($_SESSION["id"])){
            return $_SESSION["id"];
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

    //Controla que se este logueado para recorrer la aplicación
    function checkLoggedIn(){
        //Lo comento porque se puede navegar la aplicacion sin tener que estar logueado.
        //Caso contrario se tiene que descomentar y controlar en donde se esta llamando.
        /*if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if(!isset($_SESSION["codigo"])){
            //$this->view->showLogin();
            header("Location: ".BASE_URL."login");
            die();
        }*/
    }


    
}
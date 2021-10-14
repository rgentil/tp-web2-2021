<?php

require_once "View/LoginView.php";

class ControlLoginHelper{

    //private $view;

    public function __construct(){
        //$this->view = new LoginView();
    }

    // Métodos para controlar el acceso a las páginas o realizar acciones. 

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
    
}
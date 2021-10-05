<?php

require_once "View/LoginView.php";

class ControlLoginHelper{

    //private $view;

    public function __construct(){
        //$this->view = new LoginView();
    }

    function checkLoggedIn(){
        /*if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if(!isset($_SESSION["codigo"])){
            //$this->view->showLogin();
            header("Location: ".BASE_URL."login");
        }*/
    }

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
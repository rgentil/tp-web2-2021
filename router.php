<?php

require_once "Controller/LoginController.php";
require_once "Controller/HomeController.php";
require_once "Controller/HangarController.php";
require_once "Controller/AvionController.php";
require_once 'Controller/UsuarioController.php';
require_once "Controller/ErrorController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['accion'])) {
    $action = $_GET['accion'];
} else {
    $action = 'login'; // acción por defecto si no envían
}

$params = explode('/', $action);

$login = new LoginController();
$home = new HomeController();
$hangar = new HangarController();
$avion = new AvionController();
$usuario = new UsuarioController();
$error = new ErrorController();

// determina que camino seguir según la acción
switch ($params[0]) {
    // LOGIN
    case 'login': 
        $login->showLogin(); 
        break;
    case 'loguear': 
        $login->loguear(); 
        break;
    case 'logout': 
        $login->logout(); 
        break;
    
    //REGISTRO
    case 'registro':
        $usuario->showRegistro(); 
        break;
    case 'registrarUsuario': 
        $usuario->registrarUsuario(); 
        break;

    // HOME
    case 'home': 
        $home->showHome(); 
        break;

    //ABM USUARIO
    case 'usuarios': 
        $usuario->showAll(); 
        break;
    case 'usuario': 
        $usuario->showById($params[1]); 
        break;
    case 'usuarioCrud': 
        if (isset($params[1]) && !empty($params[1])){
            $usuario->showCrud($params[1]); 
        }else{
            $usuario->showCrud(); 
        }
        break;   
    case 'createUsuario': 
        $usuario->createUsuario(); 
        break;     
    case 'deleteUsuario': 
        $usuario->deleteUsuario($params[1]); 
        break;     
        
    //ABM HANGARES    
    case 'hangares': 
        $hangar->showAll(); 
        break;
    case 'hangar': 
        $hangar->showById($params[1]); 
        break;
    case 'hangarCrud': 
        if (isset($params[1]) && !empty($params[1])){
            $hangar->showCrud($params[1]); 
        }else{
            $hangar->showCrud(); 
        }
        break;   
    case 'createHangar': 
        $hangar->createHangar(); 
        break;     
    case 'deleteHangar': 
        $hangar->deleteHangar($params[1]); 
        break;    
    
    //ABM AVIONES
    case 'aviones': 
        $avion->showAll(); 
        break;
    case 'avion': 
        $avion->showById($params[1]); 
        break;
    case 'avionCrud': 
        if (isset($params[1]) && !empty($params[1])){
            $avion->showCrud($params[1]); 
        }else{
            $avion->showCrud(); 
        }
        break;
    case 'createAvion': 
        $avion->createAvion(); 
        break;     
    case 'deleteAvion': 
        $avion->deleteAvion($params[1]); 
        break;     
    case 'avionesHangar': 
        $avion->showByIdHangar($params[1]); 
        break;
    default: 
        $error->showError404(); 
        break;
}
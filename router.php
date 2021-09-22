<?php

require_once "Controller/HomeController.php";
require_once "Controller/HangarController.php";
require_once "Controller/AvionController.php";
require_once "Controller/ErrorController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['accion'])) {
    $action = $_GET['accion'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$home = new HomeController();
$hangar = new HangarController();
$avion = new AvionController();
$error = new ErrorController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $home->showHome(); 
        break;
    case 'hangares': 
        $hangar->showAll(); 
        break;
    case 'hangar': 
        $hangar->showById($params[1]); 
        break;
    case 'aviones': 
        $avion->showAll(); 
        break;
    case 'avion': 
        $avion->showById($params[1]); 
        break;
    case 'avionesHangar': 
        $avion->showByIdHangar($params[1]); 
        break;
    default: 
        $error->showError404(); 
        break;
}
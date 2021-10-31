<?php

require_once 'libs/Router.php';
require_once 'Controller-api/ApiAvionController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo

// Entidad avion
$router->addRoute('aviones', 'GET', 'ApiAvionController', 'get');
$router->addRoute('aviones/:ID', 'GET', 'ApiAvionController', 'get');
$router->addRoute('aviones', 'POST', 'ApiAvionController', 'create');
$router->addRoute('aviones/:ID', 'PUT', 'ApiAvionController', 'update');
$router->addRoute('aviones/:ID', 'DELETE', 'ApiAvionController', 'delete');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);


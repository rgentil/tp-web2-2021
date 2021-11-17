<?php

require_once 'libs/Router.php';
require_once 'Controller-api/ApiAvionController.php';
require_once 'Controller-api/ApiComentarioController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo

// Entidad avion
$router->addRoute('aviones', 'GET', 'ApiAvionController', 'get');
$router->addRoute('aviones/:ID', 'GET', 'ApiAvionController', 'get');
$router->addRoute('aviones', 'POST', 'ApiAvionController', 'create');
$router->addRoute('aviones/:ID', 'PUT', 'ApiAvionController', 'update');
$router->addRoute('aviones/:ID', 'DELETE', 'ApiAvionController', 'delete');

// Entidad comentario
$router->addRoute('comentarios', 'GET', 'ApiComentarioController', 'get');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentarioController', 'get');
$router->addRoute('comentarios-avion/:ID', 'GET', 'ApiComentarioController', 'getByIdAvion');
$router->addRoute('comentarios', 'POST', 'ApiComentarioController', 'create');
$router->addRoute('comentarios/:ID', 'PUT', 'ApiComentarioController', 'update');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentarioController', 'delete');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);


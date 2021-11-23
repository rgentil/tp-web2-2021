<?php

require_once 'libs/Router.php';
require_once 'Controller-api/ApiComentarioController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo

// Entidad comentario
//$router->addRoute('aviones/comentarios', 'GET', 'ApiComentarioController', 'get');
//$router->addRoute('aviones/:ID/comentarios', 'GET', 'ApiComentarioController', 'get');

$router->addRoute('aviones/:ID/comentarios', 'GET', 'ApiComentarioController', 'getByIdAvion');

$router->addRoute('aviones/comentarios', 'POST', 'ApiComentarioController', 'create');
$router->addRoute('aviones/comentarios/:ID', 'PUT', 'ApiComentarioController', 'update');
$router->addRoute('aviones/comentarios/:ID', 'DELETE', 'ApiComentarioController', 'delete');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);


<?php
require_once 'libs/Router.php';
require_once 'Controller/ApiTaskController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('libros', 'GET', 'ApiTaskController', 'getBooks');
$router->addRoute('libro/:ID', 'GET', 'ApiTaskController', 'getBook');
$router->addRoute('libro/:ID', 'PUT', 'ApiTaskController', 'updateBook');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
<?php
require_once 'libs/Router.php';
require_once 'Controller/ApiTaskController.php';
require_once 'Controller/ApiCommentController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('libros', 'GET', 'ApiTaskController', 'getBooks');
$router->addRoute('libro/:ID', 'GET', 'ApiTaskController', 'getBook');
$router->addRoute('libro/:ID', 'PUT', 'ApiTaskController', 'updateBook');

//referido a los comentarios
$router->addRoute('comentarios', 'GET', 'ApiCommentController', 'getComments');
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'getComment');
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'addComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'deleteComment');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
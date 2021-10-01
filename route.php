<?php

// require_once "libros.php";
require_once "./Controller/BookController.php";
require_once "./Controller/AuthorController.php";
require_once "./Controller/LoginController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']. dirname($_SERVER['PHP_SELF']).'/');
 
if(!empty($_GET['action'])){ //lee la accion
    $action =$_GET['action'];
}
else{
    $action= 'home';
}

$params = explode('/', $action);

$bookController = new BooksController();
$authorController = new AuthorController();
$loginController = new LoginController();


switch($params[0]){
    case 'home':
        $bookController->showHome();
        $authorController->authors();
        break;
    case 'admhome':
        $bookController->showadmHome();
        $authorController->authors();
        break;
    case 'CreateBook':
        $bookController->CreateBook();
        // $authorController->checkAuthors();
        break;
    case 'CreateAuthor':
        $authorController->createAuthor();
        break;
    case 'showAuthors':
        $authorController->authors();
        break;
     case 'deleteBook':
        $bookController->deleteBook($params[1]);
         break;
    /*case 'editBook':
        $bookController->editBook($params[1]);
        break;*/
    case 'deleteAuthor': //no funciona porque no le puse id en la bd de autor, hay q modificar o volver a hacerla
        $authorController->deleteAuthor($params[1]);
        break;
    case 'viewBook': 
        $bookController->viewBook($params[1]); 
        break; 
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'verifylogin':
        $loginController->verifyLogin();
        break;
    case 'register':
        $loginController->insertUsuario();
        break;
    default:
    echo ("404 Page not found");
    break;
}
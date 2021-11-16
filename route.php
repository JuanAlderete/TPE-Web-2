<?php

// require_once "libros.php";
require_once "./Controller/BookController.php";
require_once "./Controller/AuthorController.php";
require_once "./Controller/LoginController.php";
require_once "./Controller/AdmController.php";

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
$admController = new AdmController();


switch($params[0]){
    case 'home':
        $bookController->showHome();
        $authorController->authors();
        break;
    case 'admhome':
        $admController->showadmHome();
        break;
    case 'CreateBook':
        $bookController->CreateBook();
        break;
    case 'createAuthor':
        $authorController->createAuthor();
        break;
    case 'showAuthors':
        $authorController->authors();
        break;
    case 'deleteBook':
        $bookController->deleteBook($params[1]);
        break;
    case 'formEditAuthor':
        // $authorController->editAuthor();
        $authorController->formEditauthor($params[1]);
        break;
    case 'editAuthor':
        $authorController->editAuthor();
        break;
    case 'formEditbook':
        $bookController->formEditbook($params[1]);
        break;
    case 'editBook':
        $bookController->editBook();
        break;
    case 'deleteAuthor': 
        $authorController->deleteAuthor();
        break;
    case 'viewBook': 
        $bookController->viewBook($params[1]); 
        break; 
    case 'viewAuthor': 
        $authorController->viewAuthor($params[1]); 
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
    case 'searchBooks':
        $bookController->checkBooks();
    break;
    case 'ApiCSR':
        $bookController->ApiCSR();
    break;
    case 'users':
        $admController->showUsers();
    break;
    case 'doAdmin':
        $admController->doAdmin($params[1]);
    break;
    case 'undoAdmin':
        $admController->undoAdmin($params[1]);
    break;
    echo ("404 Page not found");
    break;
}
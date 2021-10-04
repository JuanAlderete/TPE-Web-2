<?php

require_once "./Model/BookModel.php";
require_once "./Model/AuthorModel.php";
require_once "./View/BookView.php";
require_once "./Helpers/AuthHelper.php";


class BooksController{

    private $model;
    private $view;
    private $authorModel;
    private $helper;

    function __construct(){
        $this->model = new BooksModel();
        $this->view = new BooksView();
        $this->authorModel = new AuthorModel();
        $this->helper = new AuthHelper();
    }

    function showHome(){
        $books = $this->model->getBooks();
        $authors = $this->authorModel->getAuthors();
        $this->view->showBooks($books, $authors);
    }

    function CreateBook(){
         //esto va en el controller del book
        $this->helper->checkLoginIn();
        if(!empty($_POST['nombre'] && $_POST['fk_id_autor']&& $_POST['fecha_publicacion'])) {
    
            $nombre =$_POST['nombre'];
            $fk_id_autor=$_POST['fk_id_autor'];
            $fecha_publicacion= $_POST['fecha_publicacion'];
            //check($autor);
        }
        //$this->model->CreateBook($_POST['nombre'], $_POST['autor'], $_POST['fecha_publicacion']);
        $this->view->showHomeLocation();
    }
    
    function deleteBook($id){
        $this->helper->checkLoginIn();
        $this->model->deleteBookDB($id);
        $this->view->showHomeLocation();
    }

    function viewBook($id){
        $book = $this->model->getBook($id);
        $this->view->showBook($book);
    }

}

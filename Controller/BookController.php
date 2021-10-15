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
        if(!empty($_POST['titulo'] && $_POST['fecha_publicacion'] && $_POST['AuthorSelect'])) {
    
            // $nombre =$_POST['nombre'];
            // $fecha_publicacion= $_POST['fecha_publicacion'];
            // $fk_id_autor= $_POST['AuthorSelect'];
            //check($autor);
            $this->model->insertBooks($_POST['titulo'], $_POST['fecha_publicacion'], $_POST['AuthorSelect']);
        }
        $this->helper->showAdmHomeLocation();
    }
    
    function deleteBook($id){
        $this->helper->checkLoginIn();
        $this->model->deleteBookDB($id);
        $this->helper->showAdmHomeLocation();
    }

    function viewBook($id){
        $book = $this->model->getBook($id);
        $this->view->showBook($book);
    }

    function checkBooks(){
        $books = $this->model->checkBooks($_POST['filter']);
        $authors = $this->authorModel->getAuthors();
        $this->view->showBooks($books, $authors);
    }

    function editBook(){
        $this->helper->checkLoginIn();
        var_dump($_POST);
        $this->model->edit($_POST['titulo'], $_POST['fecha_publicacion'], $_POST['AuthorSelect'], $_POST['book_id'] );
        $this->helper->showAdmHomeLocation();
    }

    function formEditbook($id){
        // EditAuthor pero con un tpl (acordarse de agregar $id como variable que trae la funcion)
        $this->helper->checkLoginIn();
        $book = $this->model->getBook($id);
        $authors = $this->authorModel->getAuthors();
        $this->view->showForm($book, $authors);
    }

}

<?php

require_once "./Model/AuthorModel.php";
require_once "./View/AuthorView.php";

class AuthorController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new AuthorModel();
        $this->view = new AuthorView();
    }

    function authors(){
        $authors = $this->model->getAuthors();
        $this->view->showAuthors($authors);
    }

    function Admauthors(){
        $authors = $this->model->getAuthors();
        $this->view->showAdmAuthors($authors);
    }

    // function checkAuthors($autor){
    //     $this->model->check($autor);      
    // }

    function deleteAuthor($id){
        $this->model->deleteAuthorDB($id);
        $this->view->showHomeLocation();
    }

    function createAuthor(){
        $this->model->insertAuthor($_POST['author']);
        $this->view->showHomeLocation();
    }
}

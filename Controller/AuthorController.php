<?php

require_once "./Model/AuthorModel.php";
require_once "./View/AuthorView.php";
require_once "./Helpers/AuthHelper.php";

class AuthorController{

    private $model;
    private $view;
    private $helper;

    function __construct(){
        $this->model = new AuthorModel();
        $this->view = new AuthorView();
        $this->helper = new AuthHelper();
    }

    function authors(){
        $authors = $this->model->getAuthors();
        $this->view->showAuthors($authors);
    }

    function deleteAuthor($id){
        $this->helper->checkLoginIn();
        $this->model->deleteAuthorDB($id);
        $this->helper->showAdmHomeLocation();
    }

    function createAuthor(){
        $this->helper->checkLoginIn();
        $this->model->insertAuthor($_POST['author']);
        $this->helper->showAdmHomeLocation();
    }
    
    function viewAuthor($id){
        $author = $this->model->getAuthor($id);
        $this->view->showAuthor($author);
    }

    function editAuthor(){
        // EditAuthor pero con un tpl (acordarse de agregar $id como variable que trae la funcion)
        // $this->helper->checkLoginIn();
        // $author = $this->model->getAuthor($id);
        // $this->view->showForm($author);

        $this->helper->checkLoginIn();
        var_dump($_POST);
        $this->model->edit($_POST['author'],$_POST['author_id'] );
        $this->helper->showAdmHomeLocation();
    }
}

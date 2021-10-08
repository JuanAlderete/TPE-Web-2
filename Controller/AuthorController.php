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
        $this->view->showAdmHomeLocation();
    }

    function createAuthor(){
        $this->helper->checkLoginIn();
        $this->model->insertAuthor($_POST['author']);
        $this->view->showAdmHomeLocation();
    }
}

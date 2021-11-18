<?php

require_once "./Model/AuthorModel.php";
require_once "./Model/BookModel.php";
require_once "./Model/LoginModel.php";
require_once "./Model/CommentModel.php";
require_once "./Helpers/AuthHelper.php";
require_once "./View/AdmView.php";


class AdmController{

    private $BookModel;
    private $AuthorModel;
    private $LoginModel;
    private $CommentModel;
    private $view;
    private $helper;

    function __construct(){
        $this->BookModel = new BooksModel();
        $this->AuthorModel = new AuthorModel();
        $this->LoginModel = new LoginModel();
        $this->CommentModel = new CommentModel();
        $this->helper = new AuthHelper();
        $this->view = new AdmView();
    }

    function Admauthors(){
        $this->helper->checkLoginIn();
        $this->helper->checkAdmin();

        $authors = $this->AuthorModel->getAuthors();
        $this->view->showAdmAuthors($authors);
    }

    function showadmHome(){
        $this->helper->checkLoginIn();
        $this->helper->checkAdmin();

        $books = $this->BookModel->getBooks();
        $authors = $this->AuthorModel->getAuthors();
        $this->view->showAdmBooks($books, $authors);
    }

    function showUsers(){
        $this->helper->checkLoginIn();
        $this->helper->checkAdmin();

        $users = $this->LoginModel->getUsers();
        $this->view->showUsers($users);
    }

    function deleteUser($id_user){
        $this->helper->checkLoginIn();
        $this->helper->checkAdmin();

        $this->LoginModel->deleteUserDB($id_user);
        $this->helper->showAdmUsers();
    }

    function doAdmin($id){
        $this->helper->checkLoginIn();
        $this->helper->checkAdmin();

        $this->LoginModel->doAdmin($id);
        $this->helper->showAdmUsers();
    }

    function undoAdmin($id){
        $this->helper->checkLoginIn();
        $this->helper->checkAdmin();

        $this->LoginModel->undoAdmin($id);
        $this->helper->showAdmUsers();
    }
}
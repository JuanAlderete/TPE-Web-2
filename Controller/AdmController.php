<?php

require_once "./Model/AuthorModel.php";
require_once "./Model/BookModel.php";
require_once "./Helpers/AuthHelper.php";
require_once "./View/AdmView.php";

class AdmController{

    private $Bookmodel;
    private $AuthorModel;
    private $view;
    private $helper;

    function __construct(){
        $this->Bookmodel = new BooksModel();
        $this->AuthorModel = new AuthorModel();
        $this->helper = new AuthHelper();
        $this->view = new AdmView();
    }

    function Admauthors(){
        $this->helper->checkLoginIn();
        $authors = $this->Authormodel->getAuthors();
        $this->view->showAdmAuthors($authors);
    }

    function showadmHome(){
        $this->helper->checkLoginIn();
        $books = $this->Bookmodel->getBooks();
        $authors = $this->AuthorModel->getAuthors();
        $this->view->showAdmBooks($books, $authors);
    }
}
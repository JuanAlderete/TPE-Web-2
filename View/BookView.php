<?php

require_once "./Src/smarty-3.1.39/libs/Smarty.class.php";

class BooksView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showBooks($books, $authors){     
        $this->smarty->assign('books', $books);
        $this->smarty->assign('authors', $authors);

        $this->smarty->display('templates/showBooks.tpl');
    }

    function showBook($book){
        $this->smarty->assign('book', $book);

        $this->smarty->display('Templates/showBook.tpl');
       
    }

    function showForm($book, $authors){
        $this->smarty->assign('book', $book);
        $this->smarty->assign('authors', $authors);

        $this->smarty->display('Templates/editBook.tpl');
    }

    function ShowHomeApiCSR(){
        $this->smarty->display('Templates/showHomeApiCSR.tpl');
    }
   

}

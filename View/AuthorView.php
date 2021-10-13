<?php

require_once "./Src/smarty-3.1.39/libs/Smarty.class.php";

class AuthorView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showAuthors($authors){     
        $this->smarty->assign('authors', $authors);

        $this->smarty->display('templates/showAuthors.tpl');
    }

    function showAuthor($author){
        $this->smarty->assign('author', $author);

        $this->smarty->display('Templates/showAuthor.tpl');
    }

    function showForm($author){
        $this->smarty->assign('author', $author);

        $this->smarty->display('Templates/editForm.tpl');
    }
}
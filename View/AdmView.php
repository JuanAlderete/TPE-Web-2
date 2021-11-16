<?php

require_once "./Src/smarty-3.1.39/libs/Smarty.class.php";

class AdmView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showAdmAuthors($authors){     
        $this->smarty->assign('authors', $authors);

        $this->smarty->display('templates/showAdmAuthors.tpl');
    }

    function showAdmBooks($books, $authors){     
        $this->smarty->assign('books', $books);
        $this->smarty->assign('authors', $authors);

        $this->smarty->display('templates/showAdmBooks.tpl');
    }

    function showUsers($users){
        $this->smarty->assign('users', $users);

        $this->smarty->display('templates/showAdmUsers.tpl');
    }
}
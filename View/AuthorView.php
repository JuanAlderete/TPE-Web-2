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

    function showHomeLocation(){
        header("Location:" .BASE_URL. "home");
    }

    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }
}
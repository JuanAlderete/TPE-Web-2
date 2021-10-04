<?php

require_once "./Src/smarty-3.1.39/libs/Smarty.class.php";

class LoginView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($error = "") {
        $this->smarty->assign('error', $error);

        $this->smarty->display('Templates/login.tpl');
    }

    function showAdmHomeLocation(){
        header("Location: ".BASE_URL."admhome");
    }

    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }
}
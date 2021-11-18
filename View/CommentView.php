<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class TaskView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showComments(){
        $this->smarty->display('templates/apiCommentCSR.tpl');
    }
}
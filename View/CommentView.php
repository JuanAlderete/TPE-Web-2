<?php
require_once "./Src/smarty-3.1.39/libs/Smarty.class.php";

class CommentView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showComments(){
        
        $this->smarty->display('templates/apiCommentCSR.tpl');

    }
    
}
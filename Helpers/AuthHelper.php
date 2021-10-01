<?php

Class AuthHelper {

    function __construct(){

    }

    function checkLoginIn(){
        session_start();
        if(!isset($_SESSION["email"])){
            header("Location: ".BASE_URL."login");
        }
    }

}
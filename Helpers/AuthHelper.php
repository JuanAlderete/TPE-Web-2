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

    function showAdmHomeLocation(){
        header("Location:" .BASE_URL. "admhome");
    }

    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }

}
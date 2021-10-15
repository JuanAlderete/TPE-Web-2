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

    function checkLogin(){
        session_start();
        if(isset($_SESSION["email"])){
            echo '<script language="javascript">alert("Ya estas logueado");window.location.href="home"</script>';
            // header("Location: ".BASE_URL."home");
        }
    }

    function showAdmHomeLocation(){
        header("Location:" .BASE_URL. "admhome");
    }

    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }

}
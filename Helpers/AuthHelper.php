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

    function checkAdmin(){
        if(!isset($_SESSION["admin"])){
            header("Location: ".BASE_URL."login");
        }else {
            if($_SESSION["admin"] != 1){
                header("Location: ".BASE_URL."home");
            }
        }
    }

    function checkLogin(){
        session_start();
        if(isset($_SESSION["email"])){
            echo '<script language="javascript">alert("Ya estas logueado");window.location.href="home"</script>';
            // header("Location: ".BASE_URL."home");
        }
    }

    function getUser() {
        $this->checkLoginIn();
        $iduser = ($_SESSION["iduser"]);
        return $iduser;
    }

    function showAdmHomeLocation(){
        header("Location:" .BASE_URL. "admhome");
    }

    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }

    function showHomeLocation(){
        header("Location:" .BASE_URL. "home");
    }

    function showAdmUsers(){
        header("Location:" .BASE_URL. "users");
    }

}
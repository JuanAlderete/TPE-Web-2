<?php

require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";
require_once "./Helpers/AuthHelper.php";


class LoginController{

    private $model;
    private $view;
    private $helper;

    function __construct(){
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->helper = new AuthHelper();
    }

    function login(){
        $this->helper->checkLogin();
        $this->view->showLogin();
    }

    function insertUsuario(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $hash     = password_hash($password, PASSWORD_DEFAULT);
            $isAdmin  = '0';
            $this->model->InsertarUsuario($email, $hash, $isAdmin);
            // $this->helper->showAdmHomeLocation();
        }
        $this->verifyLogin();
    }

    function verifyLogin(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUser($email);

            if (!empty($user) && password_verify($password, $user->contraseña)){

                session_start();
                $_SESSION["email"] = $user;
                $_SESSION["iduser"] = $user->id_user;
                $_SESSION["admin"] = $user->isAdmin;

                $this->helper->showHomeLocation("Acceso confirmado");
            } else {
                $this->helper->showLoginLocation("Acceso Denegado");
            }
        }
    }

    function logout(){
        session_start();
        session_destroy();

        $this->helper->showLoginLocation();
    }
}
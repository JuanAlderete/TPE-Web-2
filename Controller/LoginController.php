<?php

require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";


class LoginController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    function login(){
        $this->view->showLogin();
    }

    function insertUsuario(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hash      = password_hash($password, PASSWORD_DEFAULT);
            $isAdmin          = '0';
            $this->model->InsertarUsuario($email, $hash, $isAdmin);
            $this->view->showHomeLocation();
        }
    }

    function verifyLogin(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUser($email);

            if (!empty($user) && password_verify($password, $user->contraseña)){

                session_start();
                $_SESSION["email"] = $user;

                $this->view->showHomeLocation("Acceso confirmado");
            } else {
                $this->view->showLoginLocation("Acceso Denegado");
            }
        }
    }

    function logout(){
        session_start();
        session_destroy();

        $this->view->showLoginLocation();
    }
}
<?php

class LoginModel{

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }
    
    function getUser($email){
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function InsertarUsuario($user, $pass, $isAdmin){
        $sentencia = $this->db->prepare("INSERT INTO users(email, contraseña, isAdmin) VALUES(?,?,?)");
        $sentencia->execute(array($user, $pass, $isAdmin));
    }

}
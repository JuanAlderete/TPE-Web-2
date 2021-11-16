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

    function getUsers(){
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function InsertarUsuario($user, $pass, $isAdmin){
        $sentencia = $this->db->prepare("INSERT INTO users(email, contraseña, isAdmin) VALUES(?,?,?)");
        $sentencia->execute(array($user, $pass, $isAdmin));
    }

    function doAdmin ($id){
        $sentencia = $this->db->prepare('UPDATE `users` SET `isAdmin` = "1" WHERE `users`.`id_user` = ?');
        $sentencia->execute(array($id));
    }

    function undoAdmin ($id){
        $sentencia = $this->db->prepare('UPDATE `users` SET `isAdmin` = "0" WHERE `users`.`id_user` = ?');
        $sentencia->execute(array($id));
    }

}
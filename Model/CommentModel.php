<?php

class CommentModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getComments(){
        $sentencia = $this->db->prepare( "SELECT * FROM comentario");
        $sentencia->execute();
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function getComment($id){
        $sentencia = $this->db->prepare( "SELECT * FROM comentario INNER JOIN libro ON comentario.fk_id_libro=libro.id WHERE comentario.id=?");
        $sentencia->execute(array($id));
        $comment = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comment;
    }
}
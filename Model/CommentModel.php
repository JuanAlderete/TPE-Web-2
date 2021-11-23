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
    
    /*function getComments($fk_id_libro){
        $sentencia = $this->db->prepare( "SELECT * FROM comentario WHERE fk_id_libro=?");
        $sentencia->execute(array($fk_id_libro));
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }*/
   

    //funciona    //
    function getComment($id){     // SELECT detalle FROM comentario INNER JOIN libro ON comentario.fk_id_libro=libro.id WHERE fk_id_libro=?
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id=?");
        $sentencia->execute(array($id));
        $comment = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }

    function deleteComment($id){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id=?");
        $sentencia->execute(array($id));
    }

    function insertComment($comentario, $calificacion, $fk_id_libro, $fk_id_user){
        $sentencia = $this->db->prepare("INSERT INTO comentario(comentario,  calificacion, fk_id_libro, fk_id_user) VALUES(?,?,?,?)");
        $sentencia = $sentencia->execute(array($comentario,  $calificacion, $fk_id_libro, $fk_id_user));
        return $this->db->lastInsertId();
    }
}
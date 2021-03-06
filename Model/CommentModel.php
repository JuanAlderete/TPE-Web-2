<?php

class CommentModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getComments(){
        $sentencia = $this->db->prepare("SELECT comentario.id, comentario.detalle, comentario.calificacion, comentario.fk_id_libro, comentario.fk_id_user, users.email  FROM comentario INNER JOIN users ON comentario.fk_id_user = users.id_user");
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

    function insertComment($detalle, $calificacion, $fk_id_libro, $fk_id_user){
        $sentencia = $this->db->prepare("INSERT INTO comentario (detalle, calificacion, fk_id_libro, fk_id_user) VALUES(?,?,?,?)");
        $sentencia = $sentencia->execute(array($detalle, $calificacion, $fk_id_libro, $fk_id_user));
        return $this->db->lastInsertId();
    }
}
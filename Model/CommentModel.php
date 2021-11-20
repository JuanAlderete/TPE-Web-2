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
        $sentencia = $this->db->prepare( "SELECT * FROM comentario INNER JOIN libro ON comentario.fk_id_libro=libro.id WHERE id=?");
        $sentencia->execute(array($id));
        $comment = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comment;
    }
    function deleteComment($id){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id=$id");
        $sentencia->execute();
    }

    function insertComment($detalle, $fk_id_libro, $fk_id_user){
        $sentencia = $this->db->prepare("INSERT INTO comentario(detalle, fk_id_libro, fk_id_user) VALUES(?,?,?)");
        $a = $sentencia->execute(array($detalle, $fk_id_libro, $fk_id_user));
        return $this->db->lastInsertId();
    }
}
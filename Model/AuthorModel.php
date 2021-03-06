<?php

class AuthorModel{

    private $db;

    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getAuthors(){
        $sentencia = $this->db->prepare( "SELECT * FROM autor");
        $sentencia->execute();
        $authors = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $authors;
    }

    
    function insertAuthor ($author){
        $sentencia = $this->db->prepare("INSERT INTO `autor` (`nombre`) VALUES (?)");
        $sentencia->execute(array($author));
        echo "Autor agregado";
    }

    function deleteAuthorDB($id){
        $sentencia = $this->db->prepare("DELETE FROM autor WHERE id_autor=?");
        $sentencia->execute(array($id));
    }

    function getAuthor($id){
        $sentencia = $this->db->prepare( "SELECT * FROM autor  WHERE id_autor=?");
        $sentencia->execute(array($id));
        $author = $sentencia->fetch(PDO::FETCH_OBJ);
        return $author;
    }

    function getBooksAuthor($id){
        $sentencia = $this->db->prepare( "SELECT * FROM libros  WHERE id_fk_autor_id=?");
        $sentencia->execute(array($id));
        $author = $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function edit($nombre, $id_autor){
        $sentencia = $this->db->prepare( "UPDATE autor SET nombre=? WHERE id_autor=?");
        $sentencia->execute(array($nombre, $id_autor));
    }
    
}
    
    



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
    
}
    
    



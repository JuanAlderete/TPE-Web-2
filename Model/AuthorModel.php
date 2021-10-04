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

    // function check($autor){
    //     $host = 'localhost';
    //     $db = 'db_libros';
    //     $user = 'root';
    //     $passwd = '';
    //     $conn = mysqli_connect($host, $user, $passwd, $db);
    //     $result = $conn->query("SELECT * FROM `autor` WHERE autor LIKE '%$autor%'");
    //     if (mysqli_num_rows($result) > 0) {
    //         // insertBooks($nombre, $autor, $fecha_publicacion);
    //         echo "Libro agregado";
    //     } else { 
    //         // insertAutor ($autor);
    //         // insertBooks($nombre, $autor, $fecha_publicacion);
    //         echo "Autor y libro agregado";
    //     }
    // }
    
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
    
    



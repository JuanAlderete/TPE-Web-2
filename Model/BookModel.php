<?php

class BooksModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
    }

    function getBooks(){
        $sentencia = $this->db->prepare( "SELECT * FROM libro");
        $sentencia->execute();
        $books = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    function getBook($id){
        $sentencia = $this->db->prepare( "SELECT * FROM libro INNER JOIN autor ON libro.fk_id_autor = autor.id_autor WHERE id=?");
        $sentencia->execute(array($id));
        $book = $sentencia->fetch(PDO::FETCH_OBJ);
        return $book;
    }

    function insertBooks ($titulo, $fecha_publicacion, $imagen = null, $fk_id_autor){
        // $sentencia = $this->db->prepare("INSERT INTO libro(titulo, fecha_publicacion, fk_id_autor) VALUES(?, ?, ?)");
        // $sentencia->execute(array($titulo, $fecha_publicacion, $fk_id_autor));

        $pathImg = null;
        if ($imagen) {
            $pathImg = $this->uploadImage($imagen);
        }
        $query = $this->db->prepare("INSERT INTO libro(titulo, fecha_publicacion, imagen, fk_id_autor) VALUES(?, ?, ?, ?)");
        $query->execute(array($titulo, $fecha_publicacion, $pathImg, $fk_id_autor));
    }

    private function uploadImage($imagen){
        $target = './img/libros/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target);
        return $target;
    }
    
    /*function insertAutor ($autor){
        $sentencia = $this->db->prepare("INSERT INTO autor1(autor) VALUES(?)");
        $sentencia->execute(array($autor));*/
     
    function getItems($titulo){
        $sentencia = $this->db->prepare( "select * from libro where titulo = ?");
        $sentencia->execute(array($titulo));
        $titulos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $titulos;
    }

    function deleteBookDB($id){
        $sentencia = $this->db->prepare("DELETE FROM libro WHERE id=?");
        $sentencia->execute(array($id));
    }

    function checkBooks($filter){
        $sentencia = $this->db->prepare( "SELECT * FROM `libro` WHERE titulo LIKE '%$filter%'");
        $sentencia->execute();
        $books = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    function edit($titulo, $fecha_publicacion, $imagen = null, $fk_id_autor, $id){
        $pathImg = null;
        if ($imagen) {
            $pathImg = $this->uploadImage($imagen);
        }

        $sentencia = $this->db->prepare( "UPDATE libro  SET titulo=? , fecha_publicacion=?, imagen=?, fk_id_autor=?  WHERE id=?");
        $sentencia->execute(array($titulo, $fecha_publicacion, $pathImg, $fk_id_autor, $id));
    }
}


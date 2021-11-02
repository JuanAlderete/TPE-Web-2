<?php

require_once "./Model/BookModel.php";
require_once "./Model/AuthorModel.php";
require_once "./View/ApiView.php";
require_once "./Helpers/AuthHelper.php";

class ApiTaskController{

  private $BookModel;
  private $view;
  private $AuthorModel;
  private $helper;

  function __construct(){
      $this->BookModel = new BooksModel();
      $this->AuthorModel = new AuthorModel();
      $this->view = new ApiView();
      $this->helper = new AuthHelper();
  }

  function getBooks(){
    $books = $this->BookModel->getBooks();
    return $this->view->response($books, 200);
  }

  function getBook($params = null){
    $idBook = $params = [":ID"];
    if(empty($params)){
      $books = $this->BookModel->getBooks();
      return $this->view->response($books,200);
    }
    else {
      $book = $this->BookModel->getBook($idBook);
      if(!empty($book)) {
        return $this->view->response($book,200);
      }
    }
  }

  function insertBook(){
    $body = $this->getBody();

    $id = $this->BookModel->insertBooks($body->titulo, $body->fecha_publicacion, $body->fk_id_autor);
    if($id != 0){
      return $this->view->response("El libro se ainserto correctamente", 200);
    } else {
      return $this->view->response("El libro no se pudo insertar", 500);
    }
  }

  private function getBody(){
    $bodyString = file_get_contents("php://input");
    return json_decode($bodyString);
  }

  function updateBook(){
    $idBook = $params = [":ID"];
    $body = $this->getBody();

    $book = $this->BookModel->getBook($idBook);
    if($book){
      $this->BookModel->edit($body->titulo, $body->fecha_publicacion, $body->fk_id_autor, $idBook);
      return $this->view->response("El libro se actualizo correctamente", 200);
    } else {
      return $this->view->response("El libro con el id=$idBook no existe", 404);
    }
  }

  function deleteBook(){

  }
}
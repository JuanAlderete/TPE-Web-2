<?php

require_once "./Model/CommentModel.php";
require_once "./Model/BookModel.php";
require_once "./View/ApiView.php";
require_once "./View/CommentView.php";
require_once "./Helpers/AuthHelper.php";

class ApiCommentController{
  private $CommentModel;
  private $view;
  private $helper;
  private $viewComment;
  PRIVATE $bookModel;

  function __construct(){
      $this->CommentModel = new CommentModel();
      $this->bookModel = new BooksModel();
      $this->view = new ApiView();
      $this->helper = new AuthHelper();
      $this->viewComment = new CommentView();

  }
  function getComments(){
    $comments = $this->CommentModel->getComments();
    return $this->view->response($comments, 200);
  }

  function getComment($params =null){
    $id = $params = [":ID"];
    if(empty($params)){
      $comments = $this->CommentModel->getComments();
      return $this->view->response($comments,200);
    }
    else {
      $comment = $this->CommentModel->getComment($id);
      if(!empty($comment)) {
        return $this->view->response($comment,200);
      }
    }
  }

  private function getBody(){
    $bodyString = file_get_contents("php://input");
    return json_decode($bodyString);
  }

  function insertComment(){
    $body = $this->getData();

    $id = $this->CommentModel->insertComment($body->detalle, $body->fk_id_libro, $body->fk_id_usuario, $body->fk_id_user);
    if($id != 0){
      return $this->view->response("Comentario insertado", 200);
    } else {
      return $this->view->response("No se pudo insertar el comentario", 500);
    }
  }
 
  function deleteComment($params = null) {
    $idComment = $params[':ID'];

    $comment = $this->model->getComment($idComment);

    if (!empty($comment)) {
        $this->model->deleteComment($idComment);
        $this->view->response("Tarea id=$idComment fue eliminada con éxito", 200);
    }
    else 
        $this->view->response("Task id=$idComment not found", 404);
}


  function CommentsApiCSR(){
    $this->viewComment->showComments();
  }
}

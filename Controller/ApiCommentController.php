<?php

require_once "./Model/CommentModel.php";
require_once "./View/ApiView.php";
require_once "./Helpers/AuthHelper.php";

class ApiCommentController{
  private $CommentModel;
  private $view;
  private $helper;

  function __construct(){
      $this->CommentModel = new CommentModel();
      $this->view = new ApiView();
      $this->helper = new AuthHelper();
  }
  function getComments(){
    $comments = $this->CommentModel->getComments();
    return $this->view->response($comments, 200);
  }
  function getComment($params =null){
    $idComment = $params = [":ID"];
    if(empty($params)){
      $comments = $this->CommentModel->getComments();
      return $this->view->response($books,200);
    }
    else {
      $comment = $this->CommentModel->getComment($idComment);
      if(!empty($comment)) {
        return $this->view->response($comment,200);
      }
    }
  }

  function insertComment(){
    $body = $this->getBody();

    $id = $this->CommentModel->insertComment($body->detalle, $body->fk_id_libro, $body->fk_id_usuario, $body->fk_id_user);
    if($id != 0){
      return $this->view->response("Comentario insertado", 200);
    } else {
      return $this->view->response("No se pudo insertar el comentario", 500);
    }
  }

  function CommentsApiCSR(){
    $this->view->showComments();
  }
}

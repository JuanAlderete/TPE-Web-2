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
  private $bookModel;
  private $data;

  function __construct(){
      $this->CommentModel = new CommentModel();
      $this->bookModel = new BooksModel();
      $this->view = new ApiView();
      $this->helper = new AuthHelper();
      $this->viewComment = new CommentView();
      $this->data = file_get_contents("php://input");
  }
  
  function getComments(){
    $comments = $this->CommentModel->getComments();
    return $this->view->response($comments, 200);
  }

  function getComment($params =null){
    $id = $params [":ID"];
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

function addComment($params=null){
  $body = $this->getBody();

  if (isset($params)) { 
        $idComment = $this->CommentModel->insertComment($body->detalle, $body->calificacion, $body->fk_id_libro, $body->fk_id_user);
        if($idComment != 0){
          return $this->view->response("Comentario insertado", 200);
        } else {
          return $this->view->response("No se pudo insertar el comentario", 500);
        }
    }else {
      echo 'No funciono';
    }
}

private function getBody(){
  return json_decode($this->data);
}

  function deleteComment($params = null) {
    $idComment = $params[':ID'];
    $comment = $this->CommentModel->getComment($idComment);

    if ($comment) {
        $this->CommentModel->deleteComment($idComment);
        $this->view->response("El comentario con el id=$idComment fue eliminado con éxito", 200);
    }
    else 
        $this->view->response("El comentario con el id=$idComment no existe", 404);
}

  function CommentsApiCSR(){
    $iduser = $this->helper->getUser();
    $this->viewComment->showComments($iduser);
  }
}

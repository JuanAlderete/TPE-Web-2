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
        if(!empty($_POST['comentario']) &&  !empty($_POST['calificacion']) &&  !empty($_POST['fk_id_libro']) &&  !empty($_POST['fk_id_user'])) {
            
            $idComment = $this->CommentModel->insertComment($body->comentario, $body->calificacion, $body->fk_id_libro, $body->fk_id_user);
            if($idComment != 0){
              return $this->view->response("Comentario insertado", 200);
            } else {
              return $this->view->response("No se pudo insertar el comentario", 500);
                   }
        }
  
}
private function getBody(){
  $bodyString = file_get_contents("php://input");
  return json_decode($bodyString);
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

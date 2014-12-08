<?php

namespace app\controller;

class login {
  function __construct() {
    require_once ("view/login/login.php");
    $this->view = new \app\view\login;
  }
  function index() {
    $this->view->index();
  }

  function loginUser() {
      $id = filter_input(INPUT_POST, 'id');
      require_once("model/domainRepository.php");
      require_once("model/autenticator.php");
      $userCollection = new \app\model\repository("user");
      $user = $userCollection->retrive($id);

      \app\model\autenticator::login($user);

      //header("location: http://fellowship/login");
      $this->view->index();
  }

  function logoutUser() {

      require_once("model/autenticator.php");
      \app\model\autenticator::logout();

      //header("location: http://fellowship/login");
      $this->view->index();
  }
}

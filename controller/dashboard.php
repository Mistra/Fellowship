<?php

namespace app\controller;

class dashboard {
  function __construct() {
    require_once "view/dashboard/dashboard.php";
    $this->_view = new \app\view\dashboard;
  }

  function index() {
    $this->_view->index();
  }

  function insertUser() {
    $name = filter_input(INPUT_POST, 'name');
    $surname = filter_input(INPUT_POST, 'surname');
    $age = (int)filter_input(INPUT_POST, 'age');

    require_once("model/domainRepository.php");

    $userCollection = new \app\model\repository("user");
    $user = new \app\model\user($name, $surname, $age);
    $userCollection->persist($user);

    $this->_view->index();
  }

  function deleteUser($id) {
    require_once("model/domainRepository.php");

    $userCollection = new \app\model\repository("user");
    $userCollection->delete($id);

    $this->_view->index();
    //header("location: http://fellowship/dashboard");
  }

}

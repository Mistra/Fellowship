<?php
class dashboard {
  function __construct() {
    require_once "view/dashboard.php";
    $this->_view = new dashboardView;
  }
  
  function index() {
    $this->_view->index();
  }
  
  function insertUser() {
    $name = filter_input(INPUT_POST, 'name');
    $surname = filter_input(INPUT_POST, 'surname');
    $age = (int)filter_input(INPUT_POST, 'age');

    require_once("model/domainRepository.php");

    $userCollection = new userRepository;
    $user = new user($name, $surname, $age);
    $userCollection->persist($user);
    
    header("location: http://fellowship/dashboard");
  }
  
  function deleteUser($id) {
    require_once("model/domainRepository.php");

    $userCollection = new userRepository;
    $userCollection->delete($id);
    
    header("location: http://fellowship/dashboard");
  }
  
}


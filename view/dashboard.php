<?php

class dashboardView {
  function __construct() {

  }

  function index() {
    require_once("model/domainRepository.php");

    $collection = new userRepository;
    
    $usersArray = $collection->retriveAll();
    
    include "view/index.html";
  }
}
<?php

namespace app\view;

class dashboard {
  function __construct() {

  }

  function index() {
    require_once("model/domainRepository.php");
    $collection = new \app\model\repository("user");
    $usersArray = $collection->retriveAll();
    include "view/index.html";
  }
}

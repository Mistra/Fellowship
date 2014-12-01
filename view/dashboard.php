<?php

class dashboardView {
  function __construct() {

  }

  function index() {
    require_once("model/user.php");
    require_once("model/userCollection.php");
    require_once("model/config.php");

    $collection = userCollectionFactory::create("SQLite");
    $usersArray = $collection->findAll();
    
    include "view/index.html";
  }
}
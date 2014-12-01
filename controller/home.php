<?php
class home {
  function __construct() {
    require_once "view/home.php";
  }
  function index() {
    $view = new homeView;
    $view->index();
  }
}


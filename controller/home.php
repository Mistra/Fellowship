<?php

namespace app\controller;

class home {
  function __construct() {
    require_once "view/home/home.php";
    $this->view = new \app\view\home;
  }
  function index() {
    $this->view->index();
  }
}

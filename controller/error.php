<?php

namespace app\controller;

class error {
    function __construct() {
        require_once "view/error/error.php";
        $this->view = new \app\view\error;
    }
    function index() {
        $this->view->index();
    }
}

?>

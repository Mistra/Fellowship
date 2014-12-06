<?php

namespace app\view;

class error {

    public function __construct() {

    }

    public function index() {
        include "view/header.html";
        include "view/error/index.html";
        include "view/footer.html";
    }

}

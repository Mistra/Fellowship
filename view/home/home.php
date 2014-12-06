<?php

namespace app\view;

class home {

    public function __construct() {

    }

    public function index() {
        include "view/header.html";
        include "view/home/index.html";
        include "view/footer.html";
    }

}

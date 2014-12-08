<?php

namespace app\view;

class home {

    public function __construct() {

    }

    public function index() {
        require_once ("extra/settings.php");
        $baseUrl = \app\settings::get("address");
        include "view/header.html";
        include "view/home/index.html";
        include "view/footer.html";
    }

}

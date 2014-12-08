<?php

namespace app\view;

class login {

    public function __construct() {

    }

    public function index() {
        require_once ("extra/settings.php");
        $baseUrl = \app\settings::get("address");

        include "view/header.html";

        require_once("model/autenticator.php");
        require_once("model/domainObject.php");

        $user = \app\model\autenticator::getCurrent();
        if ($user == null) {
            include "view/login/index.html";
        }
        else {
            include "view/login/index2.html";
        }


        include "view/footer.html";
    }

}

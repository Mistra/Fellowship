<?php

namespace app\model;

//require_once ("model/domainObject.php");
//require_once ("model/domainRepository.php");

class autenticator {
    private static $started = false;

    static function login($user) {
        if (!self::$started) {
            session_start();
            self::$started = true;
        }
        $_SESSION["user"] = $user;
    }

    static function getCurrent() {
        if (!self::$started) {
            session_start();
            self::$started= true;
        }
        if (!isset($_SESSION["user"]) or $_SESSION["user"] == null) {
            return null;
        }
        else {
            return $_SESSION["user"];
        }
    }

    static function logout() {
        if (!self::$started) {
            session_start();
            self::$started= true;
        }
        session_unset($_SESSION["user"]);
    }
}

<?php

namespace app\extra;

class settings {
    private static $settings = null;

    protected static function load() {
        if (self::$settings == null) {
            require("settings.php"); // require is ok
            self::$settings = $settings;
        }
    }

    public static function get($value){
        self::load();
        return self::$settings[$value]; // add error handling
    }
}

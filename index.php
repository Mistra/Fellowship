<?php

namespace app;

error_reporting(E_ALL);
ini_set("display_errors", 1);
require "bootstrap.php";
$app = new bootstrap;
$app->enroute();

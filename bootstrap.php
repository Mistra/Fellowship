<?php

namespace app;

class bootstrap {

  private $controller = NULL;
  private $method = NULL;
  private $params = array();

  public function enroute($url = \NULL) {
    if ($url == NULL)
      $url = filter_input(INPUT_GET, 'url');
    $urlArray = $this->decompose($url);
    $this->assign($urlArray);
    $this->check();
    $obj = new $this->controller;
    call_user_func_array(
            array($obj, $this->method), $this->params);
  }

  public function decompose($url) {
    $urlArray = explode('/', trim($url, "/"));
    return $urlArray;
  }

  public function assign($urlArray) {
    $this->controller = ($urlArray[0] == "") ? "home" : $urlArray[0];
    $this->method = (!isset($urlArray[1]) ) ? "index" : $urlArray[1];
    $this->params = array_slice($urlArray, 2);
  }

  public function check() {
    if (file_exists("controller/" . $this->controller . ".php")) {
      require_once("controller/" . $this->controller . ".php");
      // Namespace of controller has to be included fully
      // for method_exists and call_user_func_array
      $this->controller = "app\\controller\\" . $this->controller;
      if (method_exists($this->controller, $this->method)) {
        return;
      }
    }
    $this->controller = "error";
    $this->method = "index";
    require_once("controller/" . $this->controller . ".php");
  }

}

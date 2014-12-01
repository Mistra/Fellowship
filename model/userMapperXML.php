<?php

//NOT WORKING


class myXMLWriter {
  function __construct($file) {
    $this->_file = $file;
  }
  
  function add($var, $tag, $supertag) {
    
  }

  private $_file;
}

class userMapperXML implements userMapper {
  function __construct() {
    $this->_file = "users.xml";
  }
  
  function save($userArray) {
    $myfile = fopen($this->_file, "w");
    fwrite($myfile, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
    fwrite($myfile, "<user>");
    foreach ($userArray as $key => $var) {
      $tag = "<" . $key . ">";
      fwrite($myfile, $tag);
      fwrite($myfile, $var);
      $tag = "</" . $key . ">";
      fwrite($myfile, $tag);
    }
    fwrite($myfile, "</user>");
    fclose($myfile);
  }

  function load($id) {
  }

  function loadAll() {
  }
  
  private $_file;
  }
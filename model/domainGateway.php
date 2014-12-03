<?php

interface domainGateway {
  function __construct($name);
  function persist();
  function load($id);
  function loadAll();
  //function update($id);
  //function delete($id);
}

class gatewaySQLite {
  function __construct($name) {
    $this->file_db = new PDO('sqlite:messaging.sqlite3');
    $this->file_db->setAttribute(PDO::ATTR_ERRMODE, 
				 PDO::ERRMODE_EXCEPTION);
    $this->_name = $name;
  }

  function prepareStatement($dataArray, &$upper, &$lower) {
    $upper = implode (",",array_keys($dataArray));
    $lower = implode (",", array_fill(0, count($dataArray), '?'));
  }
  
  function retrive($id) {
    $string = "SELECT * FROM " . $this->_name .
      " WHERE id=? LIMIT 0,1";
    $query = $this->file_db->prepare($string);
    $query->execute(array($id));
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function retriveAll() {
    $result = $this->file_db->prepare('SELECT * FROM ' . $this->_name);
    $result->execute();
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function persist($dataArray) {
    $upper;
    $lower;
    $this->prepareStatement($dataArray, $upper, $lower);
    $string = "INSERT INTO " . $this->_name .
      "(" . $upper . ")" .
      " VALUES (" . $lower . ")";
    echo $string;
    $query = $this->file_db->prepare($string);
    $query->execute(array_values($dataArray));
    return $this->file_db->lastInsertId();
  } 
  protected $file_db;

  public function delete($id) {
    $string = "DELETE FROM " . $this->_name .
      " WHERE (id = ?)";
    $query = $this->file_db->prepare($string);
    $query->execute(array($id));
  }
}
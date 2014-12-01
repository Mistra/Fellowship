<?php

class user {
  function __construct($name, $surname, $age) {
    $this->_id = null;
    $this->_name = (string)$name;
    $this->_surname = (string)$surname;
    $this->_age = (integer)$age;
    $this->_permanent = (boolean)False;
  }

  function setId($value) {
    if ($value == null) 
       $this->_permanent = False;
    else
      $this->_permanent = True;
    $this->_id = $value;
  }
    
  function getFields() {
    return array("name"=>$this->_name,
		 "surname"=>$this->_surname,
		 "age"=>$this->_age);
  }

  function getName() {
    return $this->_name;
  }

  function getSurname() {
    return $this->_surname;
  }

  function getAge() {
    return $this->_age;
  }
  
  function getId() {
    return $this->_id;
  }

  private $_id;
  private $_name;
  private $_surname;
  private $_age;
  private $_permanent;
}
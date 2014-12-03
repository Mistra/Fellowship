<?php

/*interface domainObject {
  function __construct();
  function getId();
  function setId($value);
  }*/

abstract class abstractObject{
  function __construct () {
    $this->_id = null;
    $this->_permanent = (boolean)False;
  }

  function getId() {
    return $this->_id;
  }
  
  function setId($value) {
    if ($value == null) 
       $this->_permanent = False;
    else
      $this->_permanent = True;
    $this->_id = $value;
  }

  protected $_id;
  protected $_permanent;
}

class user extends abstractObject {
  function __construct($name, $surname, $age) {
    parent::__construct();
    $this->_name = (string)$name;
    $this->_surname = (string)$surname;
    $this->_age = (integer)$age;
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

  function getData() {//Da rivedere... pare che con classe astratta dia tutto
    //return get_object_vars($this);
    return array("name" => $this->_name,
		 "surname" => $this->_surname,
		 "age" => $this->_age);
  }

  private $_name;
  private $_surname;
  private $_age;
}
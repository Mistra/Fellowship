<?php

namespace app\model;

class objectFactory {
    static function create($name, $data) {
        switch($name) {
        case "user": {
            $user = new user($data["name"], $data["surname"], $data["age"]);
            $user->setId($data["id"]);
            return $user;
        }
        //case
        }
    }
}

interface domainObject {
    function getId();
    function setId($value);
    function getData();
}

abstract class abstractObject {
    function __construct () {
        $this->_id = null;
        $this->_permanent = (boolean)False;
    }

    function getId() {
        return $this->_id;
    }

    function setId($value) {
        if ($value == null) $this->_permanent = False;
        else $this->_permanent = True;
        $this->_id = $value;
    }

    protected $_id;
    protected $_permanent;
}

class user extends abstractObject implements domainObject {
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

    function getData() {
        return array(
            "name" => $this->_name,
            "surname" => $this->_surname,
            "age" => $this->_age);
    }

    private $_name;
    private $_surname;
    private $_age;
}

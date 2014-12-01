<?php
require_once("user.php");
require_once("userMapper.php");

class userCollectionFactory {
  static function create($mapper) {
    switch ($mapper) {
    case "SQLite": {
      require_once ("model/userMapperSQLite.php");
      return new userCollection(new userMapperSQLite);
    }
    case "Stub": {
      require_once ("model/userMapperStub.php");
      return new userCollection(new userMapperStub);
    }
      throw "not found";
    }
  }
}

class userCollection {
  function __construct(userMapper $mapper) {
    $this->_mapper = $mapper;
  }
  
  function save($user) {
    $id = $this->_mapper->save($user->getFields());
    $user->setId((int)$id);
    return $id;
  }

  function load($id) {
    $data = $this->_mapper->load($id);
    $user = new user($data["name"],
		     $data["surname"],
		     $data["age"]);
    $user->setId($data["id"]);
    return $user;
  }

  function delete($id) {
    $this->_mapper->delete($id);
  }

  function findAll() {
    $data = $this->_mapper->loadAll();
    return $data;
  }

  protected $_mapper;
}

class collector {
  function __construct($mapper) {
    $this->_mapper = $mapper;
  }
}
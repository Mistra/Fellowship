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

class collection {
  function __construct($mapper) {
    $this->_mapper = $mapper;
  }

  function save($object) {
    $id = $this->_mapper->save($object->getFields());
    $object->setId((int)$id);
    return $object;
  }

  function find($id) {
    
  }

  function findAll() {
    $data = $this->_mapper->loadAll();      
    return $data;
  }
  
  function update($id) {

  }

  function delete($id) {
    $this->_mapper->delete($id);
  }

  protected $_mapper;
}

class userCollection extends collection {

  private function toUser($data) {
    $user = new user($data["name"],
		     $data["surname"],
		     $data["age"]);
    $user->setId($data["id"]);
    return $user;
  }
  
  function find($id) {
    $data = $this->_mapper->load($id);
    return $this->toUser($data);
  }

  function findAll() {
    $data = $this->_mapper->loadAll();
    $userArray = array();
    foreach ($data as $userData) {
      $userArray[] = $this->toUser($userData);
    }
    return $userArray;
  }
}


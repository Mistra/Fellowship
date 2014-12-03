<?php
require_once("domainObject.php");
require_once("domainGateway.php");

class userRepository {
  function __construct() {
    $this->_gateway = new gatewaySQLite("user");
  }

  
  function persist($user) {
    /*
    $data = array("name" => $user->getName(),
		  "surname" => $user->getSurname(),
		  "age" => $user->getAge());
    */
    $data = $user->getData();
    $id = $this->_gateway->persist($data);
    $user->setId($id);
    return $user;
  }
  
  private function toUser($data) {
    $user = new user($data["name"],
		     $data["surname"],
		     $data["age"]);
    $user->setId($data["id"]);
    return $user;
  }
  
  function retrive($id) {
    $data = $this->_gateway->retrive($id);
    return $this->toUser($data);
  }

  
  function retriveAll() {
    $data = $this->_gateway->retriveAll();
    $userArray = array();
    foreach ($data as $userData) {
      $userArray[] = $this->toUser($userData);
    }
    return $userArray;
  }

  function delete($id) {
    $this->_gateway->delete($id);
  }
  
  private $gateway;
}

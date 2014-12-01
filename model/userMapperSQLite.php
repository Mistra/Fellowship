<?php

interface mapper {
  function __construct();
}

class userMapperSQLite implements userMapper {
  function __construct() {
    $this->file_db = new PDO('sqlite:messaging.sqlite3');
    //$this->file_db = new PDO('sqlite::memory:');
    $this->file_db->setAttribute(PDO::ATTR_ERRMODE, 
				 PDO::ERRMODE_EXCEPTION);
    
    $this->file_db->exec("CREATE TABLE IF NOT EXISTS user (
                          id INTEGER PRIMARY KEY, 
                          name TEXT, 
                          surname TEXT, 
                          age INTEGER)");
  }
  
  function save($userArray) {
    $userArray = array_values($userArray);
    $insert = "INSERT INTO user (name, surname, age) 
                VALUES (?, ?, ?)";
    $stmt = $this->file_db->prepare($insert);
    $stmt->execute($userArray);
    return $this->file_db->lastInsertId();
  }

  public function load($id) {
    $stmt = $this->file_db->prepare('SELECT * FROM user 
                                     WHERE (id = ?)');
    $stmt->execute(array($id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function loadAll() {
    $result = $this->file_db->prepare('SELECT * FROM user');
    $result->execute();
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function delete($id) {
    $delete = "DELETE FROM user 
               WHERE (id = ?)";
    $stmt = $this->file_db->prepare($delete);
    $stmt->execute(array($id));
  }
  
}
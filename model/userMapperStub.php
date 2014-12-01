<?php

class userMapperStub implements userMapper {
  function __construct() {
    echo "userMapperStub::constructor", PHP_EOL;
  }
  
  function save($user) {
    echo "userMapperStub::save", PHP_EOL;
  }

  function load($id) {
    echo "userMapperStub::load", PHP_EOL;
    return null;
  }

  function update($id) {
    echo "userMapperStub::update", PHP_EOL;
  }
 function loadAll() {
    echo "userMapperStub::update", PHP_EOL;
 }
  
}
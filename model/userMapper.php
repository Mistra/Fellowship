<?php

interface userMapper {
  function __construct();
  function save($user);
  function load($id);
  function loadAll();
  function delete($id);
}
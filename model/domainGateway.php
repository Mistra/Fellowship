<?php

namespace app\model;
use \app\extra as extra;

class gatewayFactory {
    static $storage = null;

    static function create($name) {
        require_once("extra/settings.php");
        switch(\app\settings::get("persistance")) {
            case "SQLite3": {
                if (self::$storage == null) {
                    self::$storage = new \PDO('sqlite:messaging.sqlite3');
                    self::$storage->setAttribute(\PDO::ATTR_ERRMODE,
                    \PDO::ERRMODE_EXCEPTION);
                }
                return new gatewaySQLite($name, self::$storage);
            }
        }
    }
}

interface gateway {
    function __construct($name, $storage);
    function persist($dataAssociativeArray);
    function retrive($id);
    function retriveAll();
    //function update($id);
    function delete($id);
}

class gatewaySQLite implements gateway{
    protected $tableName;
    protected $db;

    private $insert;
    private $valueNames;

    function __construct($tableName, $database) {
        $this->db = $database;
        $this->tableName = $tableName;
    }

    function prepareStatement($dataArray) {
        $this->insert = implode (",",array_keys($dataArray));
        $this->valueNames = implode (",", array_fill(0, count($dataArray), '?'));
    }

    function retrive($id) {
        $string = "SELECT * FROM " . $this->tableName .
            " WHERE id=? LIMIT 0,1";
        $query = $this->db->prepare($string);
        $query->execute(array($id));
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function retriveAll() {
        $result = $this->db->prepare('SELECT * FROM ' . $this->tableName);
        $result->execute();
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    function persist($dataArray) {
        $this->prepareStatement($dataArray);
        $string = "INSERT INTO " . $this->tableName .
            "(" . $this->insert . ")" .
            " VALUES (" . $this->valueNames . ")";
        $query = $this->db->prepare($string);
        $query->execute(array_values($dataArray));
        return $this->db->lastInsertId();
    }

    public function delete($id) {
        $string = "DELETE FROM " . $this->tableName .
            " WHERE (id = ?)";
        $query = $this->db->prepare($string);
        $query->execute(array($id));
    }
}

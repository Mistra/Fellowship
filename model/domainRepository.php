<?php
namespace app\model;

require_once("domainObject.php");
require_once("domainGateway.php");

class repository {
    private $objName;
    
    function __construct($objName) {
        $this->objName = $objName;
        $this->_gateway = gatewayFactory::create($this->objName);
    }
    
    function persist($obj) {
        $data = $obj->getData();
        $id = $this->_gateway->persist($data);
        $obj->setId($id);
        return $obj;
    }

    function retrive($id) {
        $data = $this->_gateway->retrive($id);
        $obj = objectFactory::create($this->objName, $data);
        return $obj;
    }
    
    function retriveAll() {
        $data = $this->_gateway->retriveAll();
        $objArray = array();
        foreach ($data as $objData) {
            $objArray[] = objectFactory::create($this->objName, $objData);
        }
        return $objArray;
    }
    
    function delete($id) {
        $this->_gateway->delete($id);
    }
    
    private $gateway;
}

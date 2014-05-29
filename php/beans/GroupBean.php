<?php

class GroupBean extends BeansSuper {
    
    __construct() {
        parent::tableName = 'groups';
    }
	
	public function setId($value) {
	    $this->data["id"] = $value;
	}
	public function getId() {
	    return $this->data["id"];
	}
	
	public funstion setName($value) {
	    $this->data["name"] = $value;
	}
	public function getName() {
	    return $this->data["name"];
	}
}
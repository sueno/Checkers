<?php

class GroupBean extends BeansSuper {
    
    public function __construct() {
        $this->tableName = 'groups';
    }
	
	public function setId($value) {
	    $this->data["groups_id"] = $value;
	}
	public function getId() {
	    return $this->data["groups_id"];
	}
	
	public function setName($value) {
	    $this->data["groups_name"] = $value;
	}
	public function getName() {
	    return $this->data["groups_name"];
	}
}

?>
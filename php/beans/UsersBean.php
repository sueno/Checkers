<?php

class UsersBean extends BeansSuper {
    
    public function __construct() {
        $this->tableName = 'users';
    }
	
	public function setId($value) {
	    $this->data["users_id"] = $value;
	}
	public function getId() {
	    return $this->data["users_id"];
	}
	
    public function setGroupId($value) {
	    $this->data["users_group_id"] = $value;
	}
	public function getGroupId() {
	    return $this->data["users_group_id"];
	}
	
	public function setStat($value) {
	    $this->data["users_stat"] = $value;
	}
	public function getStat() {
	    return $this->data["users_stat"];
	}
	
	public function setName($value) {
	    $this->data["users_name"] = $value;
	}
	public function getName() {
	    return $this->data["users_name"];
	}
	
	public function setMail($value) {
	    $this->data["users_mail"] = $value;
	}
	public function getMail() {
	    return $this->data["users_mail"];
	}
	
	public function setPassword($value) {
	    $this->data["users_password"] = $value;
	}
	public function getPassword() {
	    return $this->data["users_password"];
	}
	
	public function setImgPath($value) {
	    $this->data["users_img_path"] = $value;
	}
	public function getImgPath() {
	    return $this->data["users_img_path"];
	}

	public function setName($value) {
	    $this->data["users_name"] = $value;
	} 
	public function getName() {
	    return $this->data["users_name"];
	}

	public function setLatestLogin($value) {
	    $this->data["users_latest_login"] = $value;
	}
	public function getLatestLogin() {
	    return $this->data["users_latest_login"];
	}

}

?>
<?php

class ContentsBean extends BeansSuper {
    
    public function __construct() {
        $this->tableName = 'users';
    }
	
	public function setId($value) {
	    $this->data["users_id"] = $value;
	}
	public function getId() {
	    return $this->data["users_id"];
	}
	
    public function setUserId($value) {
	    $this->data["contents_user_id"] = $value;
	}
	public function getUserId() {
	    return $this->data["contents_user_id"];
	}
	
	public function setTitle($value) {
	    $this->data["contents_title"] = $value;
	}
	public function getTitle() {
	    return $this->data["contents_title"];
	}
	
	public function setBody($value) {
	    $this->data["contents_body"] = $value;
	}
	public function getBody() {
	    return $this->data["contents_body"];
	}
	
	public function setContentDate($value) {
	    $this->data["contents_date"] = $value;
	}
	public function getContentDate() {
	    return $this->data["contents_date"];
	}
	
	public function setUpdateDate($value) {
	    $this->data["contents_update_date"] = $value;
	}
	public function getUpdateDate() {
	    return $this->data["contents_update_date"];
	}
	
	public function setDeleteFlg($value) {
	    $this->data["contents_delete_flg"] = $value;
	}
	public function getDeleteFlg() {
	    return $this->data["contents_delete_flg"];
	}

	public function setKind($value) {
	    $this->data["contents_kind"] = $value;
	} 
	public function getKind() {
	    return $this->data["contents_kind"];
	}
	
}

?>
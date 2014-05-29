<?php

class ContentsBean extends BeansSuper {
    
    __construct() {
        parent::tableName = 'users';
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
	
	public funstion setBody($value) {
	    $this->data["contents_body"] = $value;
	}
	public function getBody() {
	    return $this->data["contents_body"];
	}
	
	public funstion setDate($value) {
	    $this->data["contents_date"] = $value;
	}
	public function getDate() {
	    return $this->data["contents_date"];
	}
	
	public funstion setUpdateDate($value) {
	    $this->data["contents_update_date"] = $value;
	}
	public function getUpdateDate() {
	    return $this->data["contents_update_date"];
	}
	
	public funstion setDeleteFlg($value) {
	    $this->data["contents_delete_flg"] = $value;
	}
	public function getDeleteFlg() {
	    return $this->data["contents_delete_flg"];
	}

	public funstion setKind($value) {
	    $this->data["contents_kind"] = $value;
	} 
	public function getKind() {
	    return $this->data["contents_kind"];
	}
	
}

?>
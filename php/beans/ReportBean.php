<?php

class ReportBean extends BeansSuper {
    
    public function __construct() {
        $this->tableName = 'report';
    }
	
	public function setContentId($value) {
	    $this->data["content_id"] = $value;
	}
	public function getContentId() {
	    return $this->data["content_id"];
	}
	
    public function setTitle($value) {
	    $this->data["title"] = $value;
	}
	public function getTitle() {
	    return $this->data["title"];
	}
	
	public function setUserId($value) {
	    $this->data["user_id"] = $value;
	}
	public function getUserId() {
	    return $this->data["user_id"];
	}
	
	public function setUserName($value) {
	    $this->data["user_name"] = $value;
	}
	public function getUserName() {
	    return $this->data["user_name"];
	}
	
	public function setBody($value) {
	    $this->data["body"] = $value;
	}
	public function getBody() {
	    return $this->data["body"];
	}
	
	public function setContentDate($value) {
	    $this->data["content_date"] = $value;
	}
	public function getContentDate() {
	    return $this->data["content_date"];
	}
	
	public function setCommentNum($value) {
	    $this->data["comment_num"] = $value;
	}
	public function getCommentNum() {
	    return $this->data["comment_num"];
	}

}

?>
<?php

class CommentBean extends BeansSuper {
    
    public function __construct() {
        $this->tableName = 'comments';
    }
	
	public function setId($value) {
	    $this->data["comments_id"] = $value;
	}
	public function getId() {
	    return $this->data["comments_id"];
	}
	
    public function setContentId($value) {
	    $this->data["comments_contents__id"] = $value;
	}
	public function getContentId() {
	    return $this->data["commnets_contents_id"];
	}
	
	public function setPoster($value) {
	    $this->data["comments_poster"] = $value;
	}
	public function getPoster() {
	    return $this->data["comments_poster"];
	}
	
	public function setBody($value) {
	    $this->data["comments_body"] = $value;
	}
	public function getBody() {
	    return $this->data["comments_body"];
	}
	
	public function setCommentDate($value) {
	    $this->data["comments_comment_date"] = $value;
	}
	public function getCommentsDate() {
	    return $this->data["comments_comment_date"];
	}
	
	public function setDeleteFlg($value) {
	    $this->data["comments_delete_flg"] = $value;
	}
	public function getDeleteFlg() {
	    return $this->data["comments_delete_flg"];
	}
	
	public function setDeleteFlg($value) {
	    $this->data["contents_delete_flg"] = $value;
	}
	public function getDeleteFlg() {
	    return $this->data["contents_delete_flg"];
	}

}

?>
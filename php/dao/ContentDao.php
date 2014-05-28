<?php
require_once 'php/dao/DaoInterface.php';
require_once 'php/dao/DaoSuper.php';

class ContentDao extends DaoSuper implements DaoInterface {

	private $tableName = "contains";
	
	public function connect () {
		parent::connect();
	}
	
	public function insert ($post) {
		if ( parent::postExist($post, array("users_id","contents_title","contents_body","contents_date","contents_kind")) ) {
			return parent::insertTable($this->tableName,"null,".$group_id.",".$status.",'".$post["users_name"]."','".$post["users_mail"]."','".$post["users_password"]."',".$image.",date()");
		} else {
			return -1;
		}
	}
	
	public function select ($data, $elem = "*", $conditions = "") {
		return parent::selectTable($this->tableName,$elem,$conditions);
	}
	
}
?>
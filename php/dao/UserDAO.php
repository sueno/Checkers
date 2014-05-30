<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class UserDao extends DaoSuper {

	private $tableName = "users";
	
	public function connect () {
		parent::connect();
	}
	
	/**
	 * @Override
	 */
	public function insert ($post) {
		if ( parent::postExist($post, array("users_name","users_mail","users_password","group_id")) ) {
		    $status = 1;
		    $image = "null";
			return parent::insertTable($this->tableName,"null,".$post["group_id"].",".$status.",'".$post["users_name"]."','".$post["users_mail"]."','".$post["users_password"]."',".$image.",now()");
		} else {
			return -1;
		}
	}
	
	/**
	 * @Override
	 */
	public function select ($post = null, $elem = "*", $conditions = "") {
		return parent::selectTable($this->tableName,$elem,$conditions);
	}
	
	/**
	 * @Override
	 */
	 public function update ($post) {
	     return parent::updateTable($this->tableName,$post);
	 }
}
?>
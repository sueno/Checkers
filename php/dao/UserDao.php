<?php
require_once './DaoInterface.php';
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
		if ( parent::postExist($post, array("users_name","users_mail","users_password","groups_name")) ) {
		    $group_id = 0;
		    $status = 1;
		    $image = "null";
			return parent::insertTable($this->tableName,"null,".$group_id.",".$status.",'".$post["users_name"]."','".$post["users_mail"]."','".$post["users_password"]."',".$image.",date()");
		} else {
			return -1;
		}
	}
	
	/**
	 * @Override
	 */
	public function select ($data = null, $elem = "*", $conditions = "") {
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
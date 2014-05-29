<?php
require_once 'php/dao/DaoInterface.php';
require_once 'php/dao/DaoSuper.php';

class GroupDao extends DaoSuper implements DaoInterface {

	private $tableName = "users";
	
	public function connect () {
		parent::connect();
	}
	
	/**
	 * @Override
	 */
	public function insert ($post) {
		if ( parent::postExist($post, array("groups_name")) ) {
			return parent::insertTable($this->tableName,"null,'".$post["groups_name"]."'");
		} else {
			return -1;
		}
	}
	
	/**
	 * @Override
	 */
	public function select ($post, $elem = "*", $conditions = "") {
		return parent::selectTable($this->tableName,$elem,$conditions);
	}
	
}
?>
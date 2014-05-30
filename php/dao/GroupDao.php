<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class GroupDao extends DaoSuper implements DaoInterface {

	private $tableName = "groups";
	
	/**
	 * @Override
	 */
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
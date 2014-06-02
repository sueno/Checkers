<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class MemberDao extends DaoSuper implements DaoInterface {

	/**
	 * @Override
	 */
	public function insert ($post) {
		return -1;
	}

	/**
	 * @Override
	 */
	public function select ($post = null, $elem = "*", $conditions = "") {
		if ( parent::postExist($post, array("groups_id","stat")) ) {
			return parent::selectTable(
					"users",
					"id as member_id, name as member_name",
					"where group_id = {$post['groups_id']} and stat = {$post['stat']}");
		}
	}

	/**
	 * @Override
	 */
	public function update ($post) {
		return false;
	}
}
?>
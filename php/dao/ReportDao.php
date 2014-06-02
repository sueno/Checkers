<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class ReportDao extends DaoSuper implements DaoInterface {

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
		if ( parent::postExist($post, array()) ) {
			return parent::selectTable(
					"contents",
					"contents.id as content_id, title, users.id as user_id, users.name as user_name, contents.body, content_date, count(comments.id) as comment_num",
// 					"where id = {$post['contents_id']} ".
					"join comments on contents.id = comments.content_id ".
					"join users on contents.user_id = users.id ".
					"order by content_date");
		}
	}

	/**
	 * @Override
	 */
	public function update ($post) {
		return false;
	}
}
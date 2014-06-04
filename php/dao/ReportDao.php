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
	public function select ($post = null, $elem = "", $conditions = "") {
		if ( parent::postExist($post, array()) ) {
			
			return parent::selectTable(
					"contents",
// 					"contents.id as content_id, title, contents.user_id as user_id, users.name as user_name, contents.body as body, content_date, contents.delete_flg as delete_flg, count(comments.*) as comment_num {$elem} ",
// 					"join users on contents.user_id = users.id ".
// 					"left join comments on contents.id = comments.content_id ".
// 					" {$conditions} ".
// 					"group by contents.id".
// 					"order by contents.content_date desc");

					"contents.id as content_id, title, contents.user_id as user_id, users.name as user_name, contents.body as body, content_date, contents.delete_flg as delete_flg, count(comments.id) as comment_num",
					"join users on contents.user_id = users.id ".
					"left join comments on contents.id = comments.content_id ".
// 					"where users.group_id = 2 ".
					" {$conditions} ".
					"and contents.delete_flg = 0 ".
					"group by contents.id ".
					"order by contents.content_date desc");
		}
	}

	/**
	 * @Override
	 */
	public function update ($post) {
		return false;
	}
}